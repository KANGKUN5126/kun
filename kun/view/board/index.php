<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/BoardController.php';

$BoardController = new BoardController($connect);

$boardData = $BoardController->boardList();
?>

    <body>
    <section id="banner">
        <div class="inner">

            <header>
                <h1>게시판</h1>
            </header>
            <div class="flex ">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">제목</th>
                        <th scope="col">등록자</th>
                        <th scope="col">등록일</th>
                        <th scope="col">조회</th>
                    </tr>
                    </thead>

                    <tbody class="table-group-divider">
                    <?php if ($boardData): ?>
                        <?php foreach ($boardData as $index => $row): ?>
                            <tr class="view">
                                <th scope="row"><?= $index + 1 ?></th>
                                <td><a href="/view/board/view.php?number=<?=$row['sid']?>"><?= $row['subject'] ?></a></td>
                                <td><?= $row['writer'] ?></td>
                                <td><?= date('Y-m-d',$row['sign_date']) ?></td>
                                <td><?= $row['count'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">게시물이 없습니다.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <footer>
                <a href="/view/board/upsert.php" class="button" data-value="<?= $_SESSION['user_sid'] ?>" id="board_move">글 작성</a>
            </footer>
        </div>
    </section>

    </body>
    </html>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.footer.php';
?>