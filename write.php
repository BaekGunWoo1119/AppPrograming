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
    
        $getid = $_GET['id'];
        if($getid == null){
            $getid = 'best';
        }
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
    <!-- include summernote css/js -->
    <link href="summernote/summernote.min.css" rel="stylesheet">
    <script src="summernote/summernote.min.js"></script>
    <script src="summernote/lang/summernote-ko-KR.js"></script>
    <script src="summernote/lang/summernote-ko-KR.min.js"></script>
    <script>
        $(document).ready(function() {
            //여기 아래 부분
            $('#summernote').summernote({
                  width: 900,
                  height: 500,                 // 에디터 높이
                  minHeight: null,             // 최소 높이
                  maxHeight: null,             // 최대 높이
                  focus: true,                  // 에디터 로딩후 포커스를 맞출지 여부
                  lang: "ko-KR",					// 한글 설정
                  placeholder: '원색적인 모욕/비난글은 관리자에 의해 삭제처리 될 수 있습니다.'	//placeholder 설정

            });
            $('.note-fontname').remove();
        });
    </script>
    
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
        <div class="content">
            <!-- Navbar Start -->
            <?php include 'header.php';?>
            <!-- Navbar End -->
             <div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded align-items-center justify-content-center mx-0" style="margin-top:0;">
                    <p>.</p><br><br><br>
                    <form action="WriteOk.php" method="post">
                        <div class="form-floating mb-3">
                            <textarea name="title" id="utitle" class="form-control" rows="1" cols="55" maxlength="100" required></textarea>
                            <label for="utitle">제목</label>
                        </div>
                        <div class="form-floating mb-3">
                            <?php if(!$username){
                            $username = "익명";
                            } else{ }?>
                            <input type="hidden" name="usernick" id="uname" value="<?php echo $username;?>" />
                        </div>
                        <div>
                            <textarea id="summernote" class="form-control" name="content"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <?php
                                if(!$userpw){?>
                                <input class="form-control" type="password" name="pw" id="upw" placeholder="비밀번호" />
                            <?php } else{?>
                                <input class="form-control" type="hidden" name="pw" id="upw" value="<?php echo $userpw;?>" />
                            <?php } ?>
                            </div>
                        <div class="bt_se">
                            <button type="submit">글 작성</button>
                        </div>
                    </form>
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