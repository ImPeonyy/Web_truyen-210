<?php
    include '../libs/Medoo-master/src/Medoo.php';

    include '../libs/php-curl-class-9.14.3/src/Curl/CaseInsensitiveArray.php';
    include '../libs/php-curl-class-9.14.3/src/Curl/BaseCurl.php';
    include '../libs/php-curl-class-9.14.3/src/Curl/Curl.php';
    include '../libs/php-curl-class-9.14.3/src/Curl/Url.php';
    include '../libs/php-curl-class-9.14.3/src/Curl/MultiCurl.php';

    include '../libs/DiDOM-2.0.1/src/DiDom/Node.php';
    include '../libs/DiDOM-2.0.1/src/DiDom/Document.php';
    include '../libs/DiDOM-2.0.1/src/DiDom/Element.php';
    include '../libs/DiDOM-2.0.1/src/DiDom/Query.php';
    include '../libs/DiDOM-2.0.1/src/DiDom/Encoder.php';
    include '../libs/DiDOM-2.0.1/src/DiDom/Errors.php';
    

    use Medoo\Medoo;

    use Curl\Curl;
    use Curl\Url;

    use DiDom\Encoder;
    use DiDom\Node;
    use DiDom\Errors;
    use DiDom\Document;
    use DiDom\Element;

    $database = new Medoo([
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'web_truyen-210',
        'username' => 'root',
        'password' => ''
    ]);

    $url = 'https://truyentranhdrraw.blogspot.com/p/isekai-man-chikin-hp-1-no-mmama-de.html';
    if(get_data($url, $content))
    {

        save_truyen($content);

        $truyen_data = insert_truyen(save_truyen($content));
        $truyen_id = $truyen_data['truyen_id'];

        save_chapter($truyen_id, $content);

    }else
        {
            echo "Can't get data for this page";
        }


    function save_truyen($content)
    {

        $dom = new Document();
        $dom->load($content);

        // $truyen_ten = $dom->find('#ctl00_divCenter')[0]->find('#item-detail')[0]->find('.title-detail')[0]->text();
        // $truyen_avatar = $dom->find('#ctl00_divCenter')[0]->find('#item-detail')[0]->find('img')[0]->getAttribute('src');
        // $truyen_the_loai = $dom->find('#ctl00_divCenter')[0]->find('#item-detail')[0]->find('.detail-info')[0]->find('.row')[0]->find('.col-info')[0]->find('.list-info')[0]->find('.kind')[0]->find('.col-xs-8')[0]->text();
        // $truyen_author = $dom->find('#ctl00_divCenter')[0]->find('#item-detail')[0]->find('.detail-info')[0]->find('.row')[0]->find('.col-info')[0]->find('.list-info')[0]->find('.author')[0]->find('p')[1]->text();
        // $truyen_mo_ta = $dom->find('#ctl00_divCenter')[0]->find('#item-detail')[0]->find('.detail-content')[0]->find('p')[0]->text();


        $truyen_ten = $dom->find('.post-body')[0]->find('span')[4]->text();
        $truyen_avatar = $dom->find('.post-body')[0]->find('.separator')[0]->find('a')[0]->getAttribute('href');
        $truyen_the_loai = $dom->find('.post-body')[0]->find('span')[7]->text();
        $truyen_author = $dom->find('.post-body')[0]->find('span')[6]->text();
        $truyen_mo_ta = $dom->find('.post-body')[0]->find('span')[5]->text();

        $truyen = array();
        $truyen['truyen_ten'] = str_replace('NAME: ', '', $truyen_ten);
        $truyen['truyen_avatar'] = $truyen_avatar;
        $truyen['truyen_type'] = str_replace('GENRE(S): ', '', $truyen_the_loai);
        $truyen['truyen_author'] = str_replace('AUTHOR(S): ', '', $truyen_author);
        $truyen['truyen_mo_ta'] = str_replace('OTHER NAMES: ', '', $truyen_mo_ta);

        return $truyen;
    }

     
    function save_chapter($truyen_id, $content)
    {

        $dom = new Document();
        $dom->load($content);

        $all_chapter = $dom->find('#tab-chapper')[0]->find('.tab-text')[0]->find('.table-hover')[0]->find('tr');
        $all_chuong_link= $dom->find('#tab-chapper')[0]->find('.tab-text')[0]->find('.table-hover')[0]->find('tr');

        if(isset($all_chapter) && count($all_chapter) > 0)
        {
            for($i = count($all_chapter) - 1 ; $i >= count($all_chapter) - 3; --$i)
            {
                $chapter = $all_chapter[$i];
                $href = $all_chuong_link[$i];

                $chuong_ten = $chapter->find('td')[0]->find('div')[0]->find('div')[0]->find('a')[0]->find('span')[0]->find('b')[0]->text();
                $chuong_link = $href->find('td')[0]->find('div')[0]->find('div')[0]->find('a')[0]->getAttribute('href');

                $chuong = array();
                $chuong['chuong_ten'] = $chuong_ten;
                $chuong['chuong_link'] = $chuong_link;
                
                insert_chuong($truyen_id, $chuong);

                $chuong_data = insert_chuong($truyen_id, $chuong);
                $chuong_id = $chuong_data['chuong_id'];
                save_all_img($chuong_id, $chuong_link);
            }
        }

    }

    function save_all_img($chuong_id, $chuong_link)
    {
        $folder_name = bin2hex(openssl_random_pseudo_bytes(16));
        $folder_path = './data/'.$folder_name;

        echo 'Create folder: '.$folder_name.PHP_EOL;

        mkdir($folder_path, 0777, true);

        if(get_data($chuong_link, $chapter_content))
        {
            $dom = new Document();
            $dom->load($chapter_content);

            $all_img = $dom->find('.post-body')[0]->find('.separator');

            if(isset($all_img) && count($all_img) > 0)
            {
                for($i = 0 ; $i < 10; ++$i)
                {
                    $img = $all_img[$i];
    
                    $chuong_ten_hinh = $img->find('a')[0]->getAttribute('href');
                    
                    echo 'Look: '.$chuong_ten_hinh.PHP_EOL;

                    $ext = pathinfo($chuong_ten_hinh, PATHINFO_EXTENSION);
                    $file = $folder_path.'/'.$i.'.'.$ext;
                    
                    
                    download_file($chuong_ten_hinh, $file);
                    $chuong_img = array();
                    $chuong_img['chuong_link_hinh_anh'] = $file;


                    insert_chuong_img($chuong_id, $chuong_img);
                }
            }
        }

    }




    function download_file($url, $path)
    {
        $curl = new Curl();

        echo "Start dowload: " . $url.PHP_EOL;


        $curl->setConnectTimeout(60);
        $curl->setTimeout(60);

        $re = $curl->download($url, $path);

        
        if($re)
        {
            $content = $curl->response;
            echo "End dowload: " .$url. "Success !!!".PHP_EOL;
        }else
            {
                echo "End dowload: " .$url. "Fail !!!".PHP_EOL;
            }

        $curl->close();
  
    }

    function get_data($url, &$content)
    {
        $curl = new Curl();

        echo "Start craw: " . $url.PHP_EOL;


        $curl->setConnectTimeout(60);
        $curl->setTimeout(60);

        $curl->get($url);
        
        if(!$curl->error)
        {
            $content = $curl->response;
            echo "End craw: " .$url. "Success !!!".PHP_EOL;
        }else
            {
                echo "End craw: " .$url. "Fail !!!".PHP_EOL;
            }

        $curl->close();

        return !$curl->error;
    }

    function insert_truyen($truyen)
    {
        $truyen_ten =       $truyen['truyen_ten'];
        $truyen_avatar =    $truyen['truyen_avatar'];
        $truyen_the_loai =  $truyen['truyen_type'];
        $truyen_author =    $truyen['truyen_author'];
        $truyen_mo_ta =     $truyen['truyen_mo_ta'];

        $sql = "INSERT INTO truyen (truyen_ten, truyen_hinh_dai_dien, truyen_the_loai, truyen_tac_gia, truyen_mo_ta, truyen_loai)".
                " SELECT '$truyen_ten', '$truyen_avatar', '$truyen_the_loai', '$truyen_author', '$truyen_mo_ta', '1' FROM DUAL".
                " WHERE NOT EXISTS (SELECT * FROM truyen".
                " WHERE truyen_ten = '$truyen_ten') LIMIT 1";

        global $database;

        $database->query($sql);
        $data = $database->query("SELECT * FROM truyen WHERE truyen_ten = '$truyen_ten'")->fetch();
        var_dump($data);

        return $data;
    }

    function insert_chuong($truyen_id, $chuong)
    {
        $chuong_ten = $chuong['chuong_ten'];
        $chuong_link = $chuong['chuong_link'];

        $sql = "INSERT INTO chuong_truyen_tranh (chuong_ten, chuong_link, truyen_id)".
                " SELECT '$chuong_ten', '$chuong_link', '$truyen_id' FROM DUAL".
                " WHERE NOT EXISTS (SELECT * FROM chuong_truyen_tranh".
                " WHERE chuong_link = '$chuong_link') LIMIT 1";

        global $database;

        $database->query($sql);
        $data = $database->query("SELECT * FROM chuong_truyen_tranh WHERE chuong_ten = '$chuong_ten'")->fetch();
        var_dump($data);

        return $data;
    }

    function insert_chuong_img($chuong_id, $chuong_img)
    {
        $chuong_link_hinh_anh = $chuong_img['chuong_link_hinh_anh'];


        $sql = "INSERT INTO chuong_hinh_anh (chuong_link_hinh_anh, chuong_id)".
                " SELECT '$chuong_link_hinh_anh', '$chuong_id' FROM DUAL".
                " WHERE NOT EXISTS (SELECT * FROM chuong_hinh_anh".
                " WHERE chuong_link_hinh_anh = '$chuong_link_hinh_anh') LIMIT 1";

        global $database;

        $database->query($sql);
        $data = $database->query("SELECT * FROM chuong_hinh_anh WHERE chuong_link_hinh_anh = '$chuong_link_hinh_anh'")->fetch();
        var_dump($data);

        return $data;
    }
?>