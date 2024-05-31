<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/main.php';

    $myClass = new MyClass();
?>

<body>

<section id="banner">
    <div class="inner">
        <header><h1>시간 보내기</h1>
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

        <footer>
            <a href="#" class="button">Get Started</a>
        </footer>
    </div>
</section>

</body>
</html>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.footer.php';
?>