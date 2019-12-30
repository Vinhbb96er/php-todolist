<?php

require_once('moldels/Work.php');

class WorkController
{
    private $work;

    public function __construct($action)
    {
        if (method_exists('WorkController', $action)) {
            $this->work = new Work;
            $this->$action();
        } else {
            header('Location:views/errors/404.php');
        }
    }

    public function index()
    {
        try {
            $params = [];

            if (isset($_GET['keyword'])) {
                $params['keyword'] = $_GET['keyword'];
            }

            $works = $this->work->getList($params);

            require_once('views/works/index.php');
        } catch (Exception $e) {
            header('Location:views/errors/404.php');
        }
    }
}
