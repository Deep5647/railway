<?php

include 'functions.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';

switch ($action) {
    case 'updateUser':
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        updateUser($id, $username, $email);
        echo json_encode(['message' => 'User updated successfully']);
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
}
