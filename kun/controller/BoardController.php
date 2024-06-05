<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/BoardModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/func/include.function.php';


class BoardController
{
    private $boardModel;

    public function __construct($connect)
    {
        $this->boardModel = new BoardModel($connect);
    }

    public function boardList()
    {
        return $this->boardModel->getList();
    }

    public function insert($user_sid, $writer, $password, $subject, $content, $time)
    {
        $success = $this->boardModel->insert($user_sid, $writer, $password, $subject, $content, $time);
        if ($success) {
            PutMessageLocation("작성이 완료되었습니다.", "/view/board/");
        } else {
            PutMessageBack("작성에 실패하였습니다. 다시한번 확인해주세요.");
        }
    }

    public function view($number)
    {
        $board_view = $this->boardModel->view($number);
        return $board_view;
    }

    public function count($number)
    {
        $this->boardModel->count($number);
    }

    public function update($writer, $password, $subject, $content, $time, $number)
    {
        $success = $this->boardModel->update($writer, $password, $subject, $content, $time, $number);

        if ($success) {
            PutMessageLocation("수정이 완료되었습니다.", "/view/board/");
        } else {
            PutMessageBack("수정에 실패하였습니다.");
        }
    }

    public function delete($number)
    {
        $success = $this->boardModel->delete($number);

        if ($success) {
            PutMessageLocation("삭제되었습니다.", "/view/board/");
        } else {
            PutMessageBack("삭제에 실패하였습니다.");
        }
    }

}

?>