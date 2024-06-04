<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
?>
<body>

<section id="banner">
    <div class="inner">
        <header><h1>로그인</h1>
        </header>
        <form name="join_form" method="POST" action="/proc/">
            <input type="hidden" name="user_ip" value="<?=$user_ip?>">
            <input type="hidden" name="sign_date" value="<?=$time?>">
            <input type="hidden" name="type" value="user">
            <input type="hidden" name="mode" value="login">
            <div class="flex ">
                <div>
                    <h3>회원 아이디</h3>
                    <p>
                        <input type="text" name="user_id">
                    </p>
                </div>

                <div>
                    <h3>비밀번호</h3>
                    <p>
                        <input type="text" name="password">
                    </p>
                </div>

                <div>
                    <h3>이름</h3>
                    <p>
                        <input type="text" name="user_name">
                    </p>
                </div>
            </div>
            <footer>
                <button type="submit" class="button">완료</button>
            </footer>
        </form>
    </div>
</section>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.footer.php';
?>

