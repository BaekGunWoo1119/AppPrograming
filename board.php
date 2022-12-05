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
                    <a href="board.php?id=best" class="<?php if($getid == 'best'){echo 'btn-sub-mit';}else{ echo 'btn-alley';}?>" style="width:30%; margin:0; padding:0; border-radius:5px;"><p class="bgw_title" style="font-size:15px; color:white;";>인기게시판</p></a>
                    <a href="board.php?id=user" class="<?php if($getid == 'user'){echo 'btn-sub-mit';}else{ echo 'btn-alley';}?>" style="width:30%; margin:0; padding:0; border-radius:5px;"><p class="bgw_title" style="font-size:15px; color:white;">이용자게시판</p></a>
                    <a href="board.php?id=maker" class="<?php if($getid == 'maker'){echo 'btn-sub-mit';}else{ echo 'btn-alley';}?>" style="width:30%; margin:0; padding:0; border-radius:5px;"><p class="bgw_title" style="font-size:15px; color:white;">개발자게시판</p></a>
                    <div class="col-md-6 text-center p-4 bgw_box">
                    <?php
                        $sql4 = mq("select count(*) from Board");
                            $count = $sql4->fetch_array()[0];
                            if($count==0){
                                echo "<p>게시글이 없습니다.</p>";
                            }
                            else{
                    ?>
                        <table style="table">
                            <thead>
                                  <tr>
                                        <th width= 75% >제목</th>
                                        <th width= 25% >조회수</th>
                                        <!-- 추천수 항목 추가 -->
                                    </tr>
                        </thead>
                        <?php
                            if($getid == 'best'){
                                $sql2 = mq("select * from Board order by ThumbUp desc");
                            }
                            else if($getid == 'user'){
                                $sql2 = mq("select * from Board where BoardType=user order by idx desc");
                            }
                            else if($getid == 'maker'){
                                $sql2 = mq("select * from Board where BoardType=maker order by idx desc");
                            }
 
                                while($board = $sql2->fetch_array()){
                                  //title변수에 DB에서 가져온 title을 선택
                                  $title=$board["Title"]; 
                                  if(strlen($title)>15){ 
                                    //title이 15 넘어서면 ...표시
                                    $title=str_replace($board["Title"],mb_substr($board["Title"],0,15,"utf-8")."...",$board["Title"]);
                                  }
                                //댓글 수 카운트
                                  $sql3 = mq("select * from Reply where Boardid='".$board['idx']."'"); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택
                                  $rep_count = mysqli_num_rows($sql3); //num_rows로 정수형태로 출력
                            ?>
                          <tbody>
                            <tr>
                              <td width="500"><a href="read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?><span class="re_ct">[<?php echo $rep_count; ?>]</span></a></td>
                              <td width="120"><?php echo $board['hit'];?></td>
                             </tr>
                             <p text-align="left">글쓴이 : <?php echo $board['UserId']; ?></p><p text-align="right">추천 수 : [<?php echo $board['ThumbUp']; ?>]</p>
                            </tbody>
                            <?php
                                }
                            }
                        ?>
                        </table>
                        <br>
                        <button onclick="location.href='write.php';" class="btn-sub-mit" style="float:right; width:30%; line-height:23px; color:white;"><p class="bgw_title" style="font-size:15px;">글쓰기✎</p></button>
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