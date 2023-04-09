<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Truyen</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/bxh.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.3.0-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>
<body>
    <div class="app">
        <header class="header">
            <nav class="header__navbar">

                <div class="sidebar__bars">
                    <i class="fa-solid fa-bars"></i>
                </div>

                <div class="header__navbar-sidebar">
                    <div class="sidebar__item sidebar__header">
                        <div class="sidebar__webname webname">
                            <a href="main.php" style=" font-size: 2.5em;
                                                font-weight: 900;
                                                text-decoration: none;
                                                color: palevioletred;
                                ">210Comic</a>
                        </div>

                        <div class="sidebar__item sidebar__close">
                            <i class="fa-solid fa-chevron-left"></i>
                        </div>
                    </div>

                    <div class="sidebar__item sidebar__list">
                        <li><a href="">Truyện Tranh</a></li>
                        <li><a href="">Truyện Chữ</a></li>
                        <li><a href="">Lịch Sử</a></li>
                        <li><a href="page/bxh.html">Xếp Hạng</a></li>
                        <li><a href="">Theo Dõi</a></li>
                        <li><a id="open-modal-btn" style="cursor: pointer;">Điều khoản và chính sách bảo mật</a></li>
                    </div>
                </div>

                <div class="header__navbar-item header__navbar-search ">
                    <form action="" class="search" >
                        <input type="search" placeholder="Type something..." class="search__input">

                        <div class="search__btn">
                            <i class="fa-solid fa-magnifying-glass search__icon"></i>
                            <i class="fa-solid fa-xmark search__close"></i>
                        </div>
                    </form>
                </div>

                <div class="header__navbar-item webname">
                    <a href="main.php" style=" font-size: 2.5em;
                                                font-weight: 900;
                                                text-decoration: none;
                                                color: palevioletred;
                                ">210Comic</a>
                </div>

                <div class="header__navbar-item header__navbar-auth">
                    <button class="auth__icon"><i class="fa-solid fa-user"></i></button>
                </div>

                <div class="header__navbar-dropmenu">
                    <li><a href="page/auth.html">User</a></li>
                    <li class="authPopUp">Login/Register</li>
                    <li><a href="">Logout</a></li>
                </div>
                
            </nav>

            <div class="type">
                <div class="type__bar">
                    <a style="width: 50px;" class="type__item" href=""><i class="fa-solid fa-house"></i></a>
                    <a class="type__item" href="">Hot</a>
                    <a class="type__item" href="">Thể Loại</a>
                    <a class="type__item" href="">Lịch Sử</a>
                    <a class="type__item" href="">Thành Tựu</a>
                    <a class="type__item" href="">Góp Ý</a>
                    <a class="type__item" href="">Donate</a>
                    <a style="width: 100px; cursor: pointer;" class="type__item" id="open-modal-btn2">Về Chúng Tôi</a>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="container__webbody">
                    <div class="container__webbody-box ">
                            <?php
                                require('./php/connect.php');
                                $sql = "SELECT * FROM truyen";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<a class='container__webbody-tag' href='page/truyen1.html'>";
                                        echo "<div class='tag__img' style='background-image: url(assets/img/".$row['truyen_hinh-dai-dien'].")'></div>";
                                        echo "<div class='tag__title'><h2>" . $row['truyen_ten'] . "</h2></div>";
                                        echo "<h4 class='new-chap'>Chap 3</h4>";
                                        echo "<h4 class='new-chap'>Chap 2</h4>";
                                        echo "<h4 class='new-chap'>Chap 1</h4>";
                                        echo "</a>";
                                    }
                                }
                            ?>
                        
                        
                        
                    </div>
                    
                    <div class="omenu">
                        <a class="pagelink" href=""><h2></h2></a>
                        <a class="pagelink" href=""><h2>1</h2></a>
                        <a class="pagelink" href=""><h2>2</h2></a>
                        <a class="pagelink" href=""><h2>3</h2></a>
                        <a class="pagelink" href=""><h2>4</h2></a>
                        <a class="pagelink" href=""><h2>5</h2></a>
                        <a class="pagelink" href=""><h2>6</h2></a>
                        <a class="pagelink" href=""><h2>7</h2></a>
                        <a class="pagelink" href=""><h2>8</h2></a>
                        <a class="pagelink" href=""><h2>9</h2></a>
                        <a class="pagelink" href=""><h2>10</h2></a>
                        <a class="pagelink" href=""><h2></h2></a>
                    </div>

            </div>

            <div class="container__bxh">
                <h1 id="ranking-manga-title">Ranking of Manga</h1>
                    <table class="ranking-manga">
                        <thead>
                            <tr>
                                <th class="rank">Rank</th>
                                <th class="name">Name</th>
                                <th class="author">Author</th>
                                <th class="score">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="https://drive.google.com/u/0/uc?id=1FXKKCMadFLSFg8U-nHa42VMVWNZqMYrx&export=download" alt="Rank icon" class="rankimggr"></td>
                                <td class="namegr">
                                    <img src="https://seeklogo.com/images/D/dragon-ball-super-logo-5340BC6DC4-seeklogo.com.png" alt="Manga icon" class="nameimggr">
                                    Dragon Ball
                                </td>
                                <td>Toriyama Akira</td>
                                <td class="scoregr">9.89</td>
                            </tr>
                            <tr>
                                <td><img src="https://drive.google.com/u/0/uc?id=1W6govzm6ZTazheIYRkdQlri8DezRkdyy&export=download" alt="Rank icon" class="rankimggr"></td>
                                <td class="namegr">
                                    <img src="https://inkythuatso.com/uploads/thumbnails/800/2021/12/one-piece-logo-inkythuatso-16-09-46-48.jpg" alt="Manga icon" class="nameimggr">
                                    One Piece
                                </td>
                                <td>Eiichiro Oda</td>
                                <td class="scoregr">9.76</td>
                            </tr>
                            <tr>
                                <td><img src="https://drive.google.com/u/0/uc?id=1F7psEYA3Qb-2cOcoPJal4ZtjIpA3nft-&export=download" alt="Rank icon" class="rankimggr"></td>
                                <td class="namegr">
                                    <img src="https://w0.peakpx.com/wallpaper/729/445/HD-wallpaper-naruto-logo-naruto-anime.jpg" alt="Manga icon" class="nameimggr">
                                    Naruto
                                </td>
                                <td>Masashi Kishimoto</td>
                                <td class="scoregr">9.68</td>
                            </tr>
                            <tr>
                                <td class="rankgr">4</td>
                                <td class="namegr">
                                    <img src="https://seeklogo.com/images/B/bleach-logo-F81A422109-seeklogo.com.png" alt="Manga icon" class="nameimggr">
                                    Bleach
                                </td>
                                <td>Tite Kubo</td>
                                <td class="scoregr">9.67</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
        <div>
            <div id="modal" class="modal">
                <div class="modal-content">
                 <span class="close"></span>
                 <h2>Điều khoản và chính sách bảo mật</h2>
                          <p>- Khi đã truy cập và sử dụng website này, nghĩa là Người dùng đã đọc, hiểu, chấp nhận và tuân thủ những điều được quy định trong Điều khoản sử dụng của chúng tôi. Trường hợp Người dùng không đồng ý với bất kỳ thỏa thuận nào trong điều khoản này, vui lòng không truy cập và sử dụng website này.</p>
                          <p>- website này chỉ dành cho Người dùng từ 13 tuổi trở lên. Nếu dưới 13 tuổi, xin vui lòng không sử dụng và truy cập vào website này. </p>
                          <p>- Người dùng phải có đủ thẩm quyền tham gia vào các điều khoản, bảo đảm và tuân thủ được quy định trong Điều khoản Sử dụng này.</p>
                          <p>- Trang này là một nền tảng mở, mọi thành viên có quyền đăng truyện do mình sáng tác, sưu tầm hoặc dịch từ các ngôn ngữ khác. Các truyện tranh sưu tầm hoặc dịch từ các ngôn ngữ khác đều có ghi tên tác giả và đường link liên kết ngược trang gốc nhằm tôn trọng quyền tác giả. Tất cả Người dùng website này không được chụp ảnh, đăng tải lại các nội dung và hình ảnh có trong  website này nếu chưa được các thành viên, nhóm dịch, người dịch cho phép.</p>
                </div>
            </div>

            <div id="modal2" class="modal2">
                <div class="modal-content2">
                 <span class="close2"></span>
                 <h2>Về chúng tôi </h2>
                  <p>- Chào mừng đến với trang web truyện của chúng tôi! Đây là nơi để bạn có thể tìm thấy những câu chuyện tuyệt vời và cập nhật những tác phẩm mới nhất của các tác giả tài năng. Chúng tôi tự hào là một trong những trang web truyện phổ biến nhất trên mạng, với một cộng đồng độc giả đông đảo và năng động.</p>
                  <p>- Trang web của chúng tôi cung cấp cho bạn trải nghiệm đọc truyện trực tuyến đầy đủ và miễn phí, với một bộ sưu tập đa dạng của các thể loại từ lãng mạn đến phiêu lưu, hành động đến kinh dị. Bất kể bạn đang tìm kiếm một câu chuyện ngắn hay một tiểu thuyết dài, chúng tôi đều có những gì bạn cần.</p>
                  <p>- Trang web của chúng tôi cũng cung cấp cho bạn cơ hội để đăng ký tài khoản và tham gia vào cộng đồng độc giả của chúng tôi. Bằng cách làm điều này, bạn có thể chia sẻ ý kiến của mình về các câu chuyện yêu thích của mình, đánh giá các tác phẩm, và thảo luận với các độc giả khác.</p>
                  <p>- Chúng tôi hy vọng rằng trang web của chúng tôi sẽ mang đến cho bạn niềm vui khi đọc truyện và cũng giúp bạn kết nối với cộng đồng độc giả trên toàn thế giới. Hãy bắt đầu khám phá trang web của chúng tôi và tìm kiếm những câu chuyện tuyệt vời nhất!</p>
               </div>
            </div>
        </div>
    </div>
    <!-- Modal layout-->
                <div class="auth-form">
                    <span class="auth-form__close"><i class="fa-solid fa-xmark"></i></span>
                    <div class="auth-form__login">
                        <h2>Login</h2>
            
                        <form action="./php/getLogin.php" method="GET">
                            <div class="input-box">
                                <span class="input-box__icon"><i class="fa-solid fa-envelope"></i></span>
                                <input type="text" name="username-login" required>
                                <label> Username</label>
                            </div>
            
                            <div class="input-box">
                                <span class="input-box__icon"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password-login" required>
                                <label> Password</label>
                            </div>
            
                            <div class="remember-forgot">
                                <input type="checkbox" class="remember-forgot__checkbox" >
                                <label> Remember me</label>
                                <a href="#" class="remember-forgot__forgot">Forgot Password?</a>
                            </div>
            
                            <button type="submit" class="btn" name="submit">Login</button>
            
                            <div class="login-register">
                                <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                            </div>
                        </form>
                    </div>

                    <div class="auth-form__regis">
                        <h2>Registration</h2>
            
                        <form action="./php/getRegis.php" method="GET">
                            <div class="input-box">
                                <span class="input-box__icon"><i class="fa-solid fa-user"></i></span>
                                <input type="text" name="username-regis" required>
                                <label> Username    </label>
                            </div>

                            <div class="input-box">
                                <span class="input-box__icon"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="email" required>
                                <label> Email</label>
                            </div>
            
                            <div class="input-box">
                                <span class="input-box__icon"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password-regis" required>
                                <label> Password</label>
                            </div>
            
                            <div class="remember-forgot">
                                <input type="checkbox" required>
                                <label> Đồng ý với điều khoản dịch vụ</label>
                            </div>
            
                            <button type="submit" class="btn" name="submit">Register</button>
            
                            <div class="login-register">
                                <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>


        <footer class="footer">
            <div class="footer__back">
                
            </div>
        </footer>
        <script src="assets/js/main.js"></script>
</body>
</html>