<?php

require_once('moldels/Work.php');
require_once('commons/session.php');

class WorkController
{
    private $work;
    private $session;

    public function __construct($action)
    {
        if (method_exists('WorkController', $action)) {
            $this->work = new Work;
            $this->session = new SessionManager;
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

    public function store()
    {
        try {
            if (!isset($_POST['name']) || !isset($_POST['name']) || !isset($_POST['name'])) {
                throw new Exception("Data Invalid");
            }

            $data = [
                'name' => $_POST['name'],
                'starting_date' => $_POST['starting_date'],
                'ending_date' => $_POST['ending_date'],
            ];

            $works = $this->work->create($data);
            $this->session->set('success', 'Create Work Success!');

            header('Location:index.php');
        } catch (Exception $e) {
            $this->session->set('error', 'Create Work Failed!');
            header('Location:index.php');
        }
    }

    public function delete()
    {
        try {
            if (!isset($_POST['id'])) {
                throw new Exception("Data Invalid");
            }

            $works = $this->work->delete($_POST['id']);
            $this->session->set('success', 'Delete Work Success!');

            header('Location:index.php');
        } catch (Exception $e) {
            $this->session->set('error', 'Delete Work Failed!');
            header('Location:index.php');
        }
    }

    public function edit()
    {
        try {
            if (!isset($_POST['id'])) {
                throw new Exception("Data Invalid");
            }

            $work = $this->work->getWork($_POST['id']);

            require_once('views/works/edit.php');
        } catch (Exception $e) {
            echo 'Get work detail failed!';
        }
    }

    public function update()
    {
        try {
            if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['name']) || !isset($_POST['name'])) {
                throw new Exception("Data Invalid");
            }

            $data = [
                'name' => $_POST['name'],
                'starting_date' => $_POST['starting_date'],
                'ending_date' => $_POST['ending_date'],
            ];

            $work = $this->work->update($_POST['id'], $data);
            $this->session->set('success', 'Update Work Success!');

            header('Location:index.php');
        } catch (Exception $e) {
            $this->session->set('error', 'Update Work Failed!');
            header('Location:index.php');
        }
    }

    public function calendarView()
    {
        try {
            require_once('views/works/calendar.php');
        } catch (Exception $e) {
            header('Location:views/errors/404.php');
        }
    }

    public function getCalendarData()
    {
        try {
            $works = $this->work->getCalendarData();
            echo json_encode($works);
        } catch (Exception $e) {
            return false;
        }
    }
}
