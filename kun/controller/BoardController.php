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


}

?>