<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
?>
<body>

<section id="banner">
    <div class="inner">
        <header><h1>회원가입</h1>
        </header>
        <form name="join_form">
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
        </form>
    </div>
</section>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.footer.php';
?>

