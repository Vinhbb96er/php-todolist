<?php

require_once('configs/setting.php');
require_once('controllers/WorkController.php');

$action = isset($_GET['a']) ? $_GET['a'] : 'index';

$controler = new WorkController($action);
