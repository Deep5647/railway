<?php

include 'functions.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'getAllUsers':
        $users = getAllUsers();
        echo json_encode($users);
        break;
    case 'getAllTrains':
        $trains = getAllTrains();
        echo json_encode($trains);
        break;
    case 'getAllStations':
        $stations = getAllStations();
        echo json_encode($stations);
        break;
    case 'getAllBookings':
        $bookings = getAllBookings();
        echo json_encode($bookings);
        break;
    case 'getAllCoaches':
        $coaches = getAllCoaches();
        echo json_encode($coaches);
        break;
    case 'getAllCoachBookings':
        $coachBookings = getAllCoachBookings();
        echo json_encode($coachBookings);
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
}