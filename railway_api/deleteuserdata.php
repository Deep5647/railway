<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteUser($id)) {
        echo json_encode(array("message" => "User deleted successfully"));
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Failed to delete user"));
    }
}
?>