<?php

include 'functions.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : null;

header('Content-Type: application/json');

switch ($action) {
    case 'getUserId':
        if ($id === null) {
            $users = getAllUsers();
            echo json_encode($users);
        } else {
            $user = getUserId($id);
            echo json_encode($user ? $user : ['error' => 'User not found']);
        }
        break;
    case 'getTrainId':
        if ($id === null) {
            $trains = getAllTrains();
            echo json_encode($trains);
        } else {
            $train = getTrainId($id);
            echo json_encode($train ? $train : ['error' => 'Train not found']);
        }
        break;
    case 'getStationId':
        if ($id === null) {
            $stations = getAllStations();
            echo json_encode($stations);
        } else {
            $station = getStationId($id);
            echo json_encode($station ? $station : ['error' => 'Station not found']);
        }
        break;
    case 'getBookingId':
        if ($id === null) {
            $bookings = getAllBookings();
            echo json_encode($bookings);
        } else {
            $booking = getBookingId($id);
            echo json_encode($booking ? $booking : ['error' => 'Booking not found']);
        }
        break;
    case 'getCoachId':
        if ($id === null) {
            $coaches = getAllCoaches();
            echo json_encode($coaches);
        } else {
            $coach = getCoachId($id);
            echo json_encode($coach ? $coach : ['error' => 'Coach not found']);
        }
        break;
    case 'getCoachBookingId':
        if ($id === null) {
            $coachBookings = getAllCoachBookings();
            echo json_encode($coachBookings);
        } else {
            $coachBooking = getCoachBookingId($id);
            echo json_encode($coachBooking ? $coachBooking : ['error' => 'Coach Booking not found']);
        }
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}

?>
