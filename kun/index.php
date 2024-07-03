<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/Main.php';

    $myClass = new MyClass();
?>
<script>
    $(document).on('click', '#board_move', function(){
        let value = $(this).data('value');
        if(!value){
            alert('로그인 해주세요.');
            location.replace('/view/login.php')
            return false;
        }
    });
</script>

<body>

<section id="banner">
    <div class="inner">
        <header><h1><?=isset($_SESSION['user_name']) ? $_SESSION['user_name'].'님 안녕하세요.' : '시간 보내기'?></h1>
        </header>
        <div class="flex ">

            <div>
                <span class="icon fa-car"></span>
                <h3>퇴근시간</h3>
                <p class="time"></p>
            </div>

            <div>
                <span class="icon fa-camera"></span>
                <h3>총 방문자 수</h3>
                <p><?= $myClass->getVisitCount($connect)?></p>
            </div>

            <div>
                <span class="icon fa-bug"></span>
                <h3>오늘의 점심메뉴 추천</h3>
                <p><?=$_SESSION['lunch_menu']?></p>
            </div>

        </div>

        <div class="quick_menuBox">
            <div class="menu_box"><i class="fa-solid fa-bars"></i></div>
            <div class="quick_inner">
                <!-- 퀵메뉴 뭐 하실지 몰라서 걍 a태그로 만듬 쓰세욤 -->
                <a href="javascript:void(0)" class="quick_menu">퀵메뉴1</a>
                <a href="javascript:void(0)" class="quick_menu">퀵메뉴1</a>
                <a href="javascript:void(0)" class="quick_menu">퀵메뉴1</a>
            </div>

        <footer>
            <a href="/view/board/" class="button" data-value="<?= $_SESSION['user_sid'] ?>" id="board_move">Get Started</a>
        </footer>
    </div>
</section>

</body>
</html>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.footer.php';
?>