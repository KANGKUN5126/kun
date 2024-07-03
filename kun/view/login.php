<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
?>
<body>

<section id="banner">
    <div class="inner login_form">
        <h1>로그인</h1>
        <form name="join_form" method="POST" action="/proc/">
            <input type="hidden" name="user_ip" value="<?=$user_ip?>">
            <input type="hidden" name="sign_date" value="<?=$time?>">
            <input type="hidden" name="type" value="user">
            <input type="hidden" name="mode" value="login">
            <div class="flex-column login_whole">
                <div>
                    <h3>회원 아이디</h3>
                    <input type="text" name="user_id">
                </div>

                <div>
                    <h3>비밀번호</h3>
                    <input type="text" name="password">
                </div>

                <div>
                    <h3>이름</h3>
                    <input type="text" name="user_name">
                </div>
            </div>
            <button type="submit" class="button login_btn">완료</button>
        </form>
    </div>
</section>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.footer.php';
?>

