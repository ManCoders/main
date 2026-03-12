<?php

declare(strict_types=1);
session_start();
require_once 'module.php';

$allowedActions = ['1'];

$action = htmlspecialchars($_GET['action'], ENT_QUOTES, 'UTF-8');


if (!in_array($action, $allowedActions, true)) {
    header("Location: ./../err.php");
    exit;
}

$data = new Module();

switch ($action) {

    case '1':
        echo htmlspecialchars($data->base_url(), ENT_QUOTES, 'UTF-8');
        break;
    default:
        return json_encode([
            header('location:./../err.php')
        ]);
}
