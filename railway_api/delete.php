<?php

include 'functions.php';
header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($requestType == 'DELETE' && $id > 0) {
    switch ($action) {
        case 'deleteUser':
            echo json_encode(['deleted' => deleteUser($id)]);
            break;
        case 'deleteTrain':
            echo json_encode(['deleted' => deleteTrain($id)]);
            break;
        case 'deleteStation':
            echo json_encode(['deleted' => deleteStation($id)]);
            break;
        case 'deleteBooking':
            echo json_encode(['deleted' => deleteBooking($id)]);
            break;
        case 'deleteCoach':
            echo json_encode(['deleted' => deleteCoach($id)]);
            break;
        case 'deleteCoachBooking':
            echo json_encode(['deleted' => deleteCoachBooking($id)]);
            break;
        default:
            echo json_encode(['error' => 'Invalid action']);
    }
} else {
    echo json_encode(['error' => 'Invalid request or ID']);
}

?>
