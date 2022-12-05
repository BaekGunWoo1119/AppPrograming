<!DOCTYPE html>
<html lang="ko">
<?php
    session_start();
    include "db/db_conn.php";  
    
        $userid = $_SESSION['id'];
        $username = $_SESSION['username'];
        $usertype = $_SESSION['usertype'];
        $userfav = $_SESSION['userfav'];
        $userpw = $_SESSION['userpw'];
?>
<head>
    <meta charset="utf-8">
    <title>PlayG - Play Game Music</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <!-- 내가 짠 CSS 버튼코드 -->
    <link href="css/bgw.css" rel="stylesheet">
    
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        
        <!-- Sidebar Start -->
        <?php include 'sidebar.php';?>
        <!-- Sidebar End -->

    
        
        <!-- Content Start -->
        <div id="bgw_menu1" class="content">
            <!-- Navbar Start -->
            <?php include 'header.php';?>
            <!-- Navbar End -->
             <div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded align-items-center justify-content-center mx-0" style="margin-top:0;">
                        <span class="btn-alley" style="width:90%; border-radius:5px; position:fixed; z-index:2; top:70px;"><p class="bgw_title">메뉴</p></span>
                        <div class="bgw_section" style="position:fixed; top:110px; z-index:1; line-height:25px;">
                            <a href="#bgw_menu1">1. 인기게시글</a><br>
                            <a href="#bgw_menu2">2. 게임 음악 모음 저장소</a><br>
                            <a href="#bgw_menu3">3. 이용자 커뮤니티</a><br>
                            <a href="#bgw_menu4">4. 개발자 커뮤니티</a><br>
                        </div>
                    <p>.</p><br><br><br><br><br><br><br>
                    <span id="bgw_menu2" class="btn-alley" style="width:90%; border-radius:5px;"><p class="bgw_title">인기 게시글</p></span>
                    <div class="col-md-6 text-center p-4 bgw_box">
                            <div class="left">
                                <div class="inner"><!-- border상자 -->
                                    <p class="bgw_write">준비중입니다.</p>
                                    <a href="ImoticonView.php?id="><img width=100%; src="img/board1.png" alt="게시글"></a>
                                    <p></p>
                                </div>
                            </div>
                            <div class="left">
                                <div class="inner"><!-- border상자 -->
                                    <p class="bgw_write">준비중입니다.</p>
                                    <a href="ImoticonView.php?id="><img width=100%; src="img/board2.png" alt="게시글"></a>
                                    <p></p>
                                </div>
                            </div>
                            <div class="left">
                                <div class="inner"><!-- border상자 -->
                                    <p class="bgw_write">준비중입니다.</p>
                                    <a href="ImoticonView.php?id="><img width=100%; src="img/board3.png" alt="게시글"></a>
                                    <p></p>
                                </div>
                            </div>
                        <button onclick="location.href='board.php?id=best';" class="btn-sub-mit" style="float:right; width:30%; color:white;"><p class="bgw_title" style="font-size:15px;">더 보기</p></button><br><br>
                    </div>
                    <span class="btn-alley" style="width:90%; border-radius:5px;"><p class="bgw_title">게임 음악 모음 저장소</p></span>
                    <div id="bgw_menu3" class="col-md-6 text-center p-4 bgw_box">
                            <?php
                            $sql = mq("select * from Music order by MusicID desc limit 3");
                        
                            while($category = $sql->fetch_array()){
                                $msid = $category['MusicID'];
                                $msname = $category['Name'];
                                $msgenre = $category['Genre'];
                                $mstext = $category['Text'];
                                $msimg = $category['MusicImg'];
                                $msfile = $category['MusicFile'];
                            ?><div class="left">
                                <div class="inner"><!-- border상자 -->
                                    <p class="bgw_write"><?php echo $msname ;?></p>
                                    <a href="MusicView.php?id=<?php echo $msid?>"><?php echo $msimg ;?></a>
                                    <p><?php echo $msgenre ;?></p>
                                </div>
                            </div><?php } ?>
                        <button onclick="location.href='MusicList.php';" class="btn-sub-mit" style="float:right; width:30%; color:white;"><p class="bgw_title" style="font-size:15px;">더 보기</p></button><br><br>
                    </div>
                    <span class="btn-alley" style="width:90%; border-radius:5px;"><p class="bgw_title">이용자 커뮤니티</p></span>
                    <div id="bgw_menu4" class="col-md-6 text-center p-4 bgw_box">
                            <div class="left">
                                <div class="inner"><!-- border상자 -->
                                    <p class="bgw_write">준비중입니다.</p>
                                    <a href="ImoticonView.php?id="><img width=100%; src="img/marketing4.png" alt="광고"></a>
                                    <p></p>
                                </div>
                            </div>
                            <div class="left">
                                <div class="inner"><!-- border상자 -->
                                    <p class="bgw_write">준비중입니다.</p>
                                    <a href="ImoticonView.php?id="><img width=100%; src="img/marketing5.png" alt="광고"></a>
                                    <p></p>
                                </div>
                            </div>
                            <div class="left">
                                <div class="inner"><!-- border상자 -->
                                    <p class="bgw_write">준비중입니다.</p>
                                    <a href="ImoticonView.php?id="><img width=100%; src="img/marketing6.png" alt="광고"></a>
                                    <p></p>
                                </div>
                            </div>
                        <button onclick="location.href='board.php?id=user';" class="btn-sub-mit" style="float:right; width:30%; color:white;"><p class="bgw_title" style="font-size:15px;">더 보기</p></button><br><br>
                    </div>
                    <span class="btn-alley" style="width:90%; border-radius:5px;"><p class="bgw_title">개발자 커뮤니티</p></span>
                    <div class="col-md-6 text-center p-4 bgw_box">
                            <div class="left">
                                <div class="inner"><!-- border상자 -->
                                    <p class="bgw_write">준비중입니다.</p>
                                    <a href="ImoticonView.php?id="><img width=100%; src="img/marketing4.png" alt="광고"></a>
                                    <p></p>
                                </div>
                            </div>
                            <div class="left">
                                <div class="inner"><!-- border상자 -->
                                    <p class="bgw_write">준비중입니다.</p>
                                    <a href="ImoticonView.php?id="><img width=100%; src="img/marketing5.png" alt="광고"></a>
                                    <p></p>
                                </div>
                            </div>
                            <div class="left">
                                <div class="inner"><!-- border상자 -->
                                    <p class="bgw_write">준비중입니다.</p>
                                    <a href="ImoticonView.php?id="><img width=100%; src="img/marketing6.png" alt="광고"></a>
                                    <p></p>
                                </div>
                            </div>
                        <button onclick="location.href='board.php?id=maker';" class="btn-sub-mit" style="float:right; width:30%; color:white;"><p class="bgw_title" style="font-size:15px;">더 보기</p></button><br><br>
                    </div>
                </div>
            </div>
            <?php include 'footer.php';?>
          </div>
        <!-- Sign In End -->
        </div>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>