<?php

require_once('src/configs/setting.php');
require_once('src/controllers/WorkController.php');

$action = isset($_GET['a']) ? $_GET['a'] : 'index';

$controler = new WorkController($action);
