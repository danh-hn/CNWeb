<?php

$one_year = 365 * 24 * 60 * 60; // seconds in one year

ini_set('session.gc_maxlifetime', (string)$one_year);
session_set_cookie_params($one_year, '/');
session_start();

$task_list = filter_input(INPUT_POST, 'tasklist', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($task_list === NULL) {
    if (!empty($_SESSION['task_list']) && is_array($_SESSION['task_list'])) {
        $task_list = $_SESSION['task_list'];
    } else {
        $task_list = array();
    }
}

$action = filter_input(INPUT_POST, 'action');
$errors = array();

switch( $action ) {
    case 'add':
        $new_task = filter_input(INPUT_POST, 'newtask');
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            $task_list[] = $new_task;
        }
        break;
    case 'delete':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === NULL || $task_index === FALSE) {
            $errors[] = 'The task cannot be deleted.';
        } else {
            unset($task_list[$task_index]);
            $task_list = array_values($task_list);
        }
        break;
}

// Persist the (possibly updated) task list in the session
$_SESSION['task_list'] = $task_list;

include('task_list.php');
?>