<?php

include 'functions.php';
header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($requestType == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);  // Retrieve data from POST body
    if (!$data) {
        echo json_encode(['error' => 'No data provided or data is invalid']);
        exit;
    }
    switch ($action) {
        case 'insertUser':
            // Check required fields for inserting user
            if (isset($data['username'], $data['email'], $data['password'])) {
                $userId = insertUser($data['username'], $data['email'], $data['password']);
                echo json_encode(['success' => true, 'id' => $userId]);
            } else {
                echo json_encode(['error' => 'Missing parameters for inserting user']);
            }
            break;
        case 'insertTrain':
            echo json_encode(['id' => insertTrain($data)]);
            break;
        case 'insertStation':
            echo json_encode(['id' => insertStation($data)]);
            break;
        case 'insertBooking':
            echo json_encode(['id' => insertBooking($data)]);
            break;
        case 'insertCoach':
            echo json_encode(['id' => insertCoach($data)]);
            break;
        case 'insertCoachBooking':
            echo json_encode(['id' => insertCoachBooking($data)]);
            break;
        default:
            echo json_encode(['error' => 'Invalid action']);
    }
} else {
    echo json_encode(['error' => 'Request method not supported for this action']);
}

?>
