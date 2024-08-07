<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/BoardController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/UserController.php';

$BoardController = new BoardController($connect);
$userController = new UserController($connect);
$user = $userController->getUser($user_sid);
$board_number = isset($_GET['number']) ? $_GET['number'] : '';
$number = isset($_GET['number']) ? $_GET['number'] : '';
$board_data = $BoardController->view($number);
?>
    <script>
        $(document).ready(function() {
            var number = "<?=$number?>";
            var type = $('input[name="type"]').val();
            var mode = 'delete';
            $(document).on('click', '.red_btn', function () {
                location.href = "/proc/index.php?number=" + number + "&type=" + type + "&mode=" + mode;
            });
        });
    </script>
    <body>

    <section id="banner">
        <form method="POST" name="board_form" id="board_form" action="/proc/">
            <input type="hidden" name="user_sid" value="<?=$user['sid']?>">
            <input type="hidden" name="type" value="board">
            <input type="hidden" name="mode" value="<?=($board_number) ? 'update' : 'insert'?>">
            <input type="hidden" name="sign_date" value="<?=$time?>">
            <input type="hidden" name="number" value="<?=$number?>">
            <div class="inner">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">작성자</span>
                    <input type="text" name="writer" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?=$user['user_name']?>" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">작성 비밀번호</span>
                    <input type="text" name="password" class="form-control" value="" placeholder="<?=($board_number) ? '게시글 작성 시 비밀번호를 입력해주세요.' : '수정에 사용됩니다.'?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">제목</span>
                    <input type="text" name="subject" class="form-control" value="<?=$board_data['subject']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="form-floating">
                    <span class="input-group-text" id="inputGroup-sizing-default">내용</span>
                    <textarea class="form-control" name="content" placeholder="내용을 입력해주세요" id="floatingTextarea2" style="height: 160px"><?=$board_data['content']?></textarea>
                </div>
                <br>
                <div class="form_btnBox">
                    <? if($user['sid'] == $board_data['usid']) { ?>
                        <button class="red_btn" type="button">삭제</button>
                    <? } ?>
                        <button type="submit"/><?=($board_number) ? '수정' : '제출'?>
                    <button type="button" onclick="history.back()">뒤로</button>
                </div>
            </div>
        </form>
    </section>

    </body>
    </html>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.footer.php';
?>