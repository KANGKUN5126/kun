<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/BoardController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/UserController.php';

$number = $_GET['number'];
$BoardController = new BoardController($connect);
$userController = new UserController($connect);
$user = $userController->getUser($user_sid);
$board_data = $BoardController->view($number);
$BoardController->count($number);
?>
    <script>
        var number = "<?=$number?>";
        $(document).on('click', '.blue_btn', function() {
            location.href = "/view/board/upsert.php?number=" + number;
        });
    </script>
    <body>

    <section id="banner">
        <form method="POST" name="board_form" id="board_form" action="/proc/">
            <input type="hidden" name="user_sid" value="<?=$user['sid']?>">
            <input type="hidden" name="type" value="board">
            <input type="hidden" name="mode" value="insert">
            <input type="hidden" name="sign_date" value="<?=$time?>">
            <div class="inner">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">작성자</span>
                    <input type="text" name="writer" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?=$user['user_name']?>" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">제목</span>
                    <input type="text" name="subject" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?=$board_data['subject']?>" readonly>
                </div>

                <div class="form-floating">
                    <span class="input-group-text" id="inputGroup-sizing-default">내용</span>
                    <textarea class="form-control" name="content" placeholder="내용을 입력해주세요" id="floatingTextarea2" style="height: 100px" readonly><?=$board_data['content']?></textarea>
                </div>
                <br>
                <button type="button" onclick="history.back()">뒤로</button>
                <? if($user['sid'] == $board_data['usid']) { ?>
                <button class="blue_btn" type="button">수정</button>
                <? } ?>
            </div>
        </form>
    </section>

    </body>
    </html>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.footer.php';
?>