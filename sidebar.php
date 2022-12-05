<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $username; ?></h6>
                        <span><?php echo $usertype; ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index_main.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>메인 메뉴</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa me-2">🎵</i>음악 저장소</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="MusicList.php?id=best" class="dropdown-item">인기 음악 리스트</a>
                            <a href="MusicList.php?id=new" class="dropdown-item">신규 등록 리스트</a>
                            <a href="MusicList.php?id=game" class="dropdown-item">게임 별 리스트</a>
                            <a href="MusicList.php?id=follow" class="dropdown-item">사용자 지정 리스트</a>
                        </div>
                    </div>
                    <a href="shop.php" class="nav-item nav-link"><i class="fa me-2">🛒</i>포인트 상점</a>
                    <a href="board.php?id=best" class="nav-item nav-link"><i class="fa me-2">★</i>인기 게시글</a>
                    <a href="board.php?id=user" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>이용자 커뮤니티</a>
                    <a href="board.php?id=maker" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>개발자 커뮤니티</a>
                </div>
            </nav>
        </div>