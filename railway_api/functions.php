<?php

include 'config.php';

function getAllUsers() {
    global $db;
    $query = $db->query("SELECT * FROM users");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getAllTrains() {
    global $db;
    $query = $db->query("SELECT * FROM trains");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getAllStations() {
    global $db;
    $query = $db->query("SELECT * FROM stations");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getAllBookings() {
    global $db;
    $query = $db->query("SELECT * FROM bookings");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCoaches() {
    global $db;
    $query = $db->query("SELECT * FROM coaches");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCoachBookings() {
    global $db;
    $query = $db->query("SELECT * FROM coach_bookings");
    return $query->fetchAll(PDO::FETCH_ASSOC);

}

function getUserId($id) {
    global $db;
    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE user_id = ?");
        var_dump($id);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Optionally, log this to a file or error handling system
        die('Database error: ' . $e->getMessage());
    }
}



function getTrainId($id) {
    global $db;
    try {
        $stmt = $db->prepare("SELECT * FROM trains WHERE train_id = ?");
        var_dump($id);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Optionally, log this to a file or error handling system
        die('Database error: ' . $e->getMessage());
    }
}

function getStationId($id) {
    global $db;
    try {
        $stmt = $db->prepare("SELECT * FROM stations WHERE station_id = ?");
        var_dump($id);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Optionally, log this to a file or error handling system
        die('Database error: ' . $e->getMessage());
    }
}

function getBookingId($id) {
    global $db;
    try {
        $stmt = $db->prepare("SELECT * FROM bookings WHERE booking_id = ?");
        var_dump($id);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Optionally, log this to a file or error handling system
        die('Database error: ' . $e->getMessage());
    }
}

function getCoachId($id) {
    global $db;
    try {
        $stmt = $db->prepare("SELECT * FROM coaches WHERE coach_id = ?");
        var_dump($id);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Optionally, log this to a file or error handling system
        die('Database error: ' . $e->getMessage());
    }
}

function getCoachBookingId($id) {
    global $db;
    try {
        $stmt = $db->prepare("SELECT * FROM coach_bookings WHERE booking_id = ?");
        var_dump($id);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Optionally, log this to a file or error handling system
        die('Database error: ' . $e->getMessage());
    }
}


function insertUser($username, $email, $password) {
    global $db;
    $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);
    return $db->lastInsertId();
}

function insertTrain($train_name, $source_station_id, $destination_station_id, $departure_time, $arrival_time, $total_seats, $available_seats) {
    global $db;
    $stmt = $db->prepare("INSERT INTO trains (train_name, source_station_id, destination_station_id, departure_time, arrival_time, total_seats, available_seats) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$train_name, $source_station_id, $destination_station_id, $departure_time, $arrival_time, $total_seats, $available_seats]);
    return $db->lastInsertId();
}

function insertStation($station_name) {
    global $db;
    $stmt = $db->prepare("INSERT INTO stations (station_name) VALUES (?)");
    $stmt->execute([$station_name]);
    return $db->lastInsertId();
}

function insertBooking($user_id, $train_id, $booking_date, $num_tickets) {
    global $db;
    $stmt = $db->prepare("INSERT INTO bookings (user_id, train_id, booking_date, num_tickets) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $train_id, $booking_date, $num_tickets]);
    return $db->lastInsertId();
}

function insertCoach($train_id, $coach_name, $total_seats, $available_seats) {
    global $db;
    $stmt = $db->prepare("INSERT INTO coaches (train_id, coach_name, total_seats, available_seats) VALUES (?, ?, ?, ?)");
    $stmt->execute([$train_id, $coach_name, $total_seats, $available_seats]);
    return $db->lastInsertId();
}

function insertCoachBooking($booking_id, $coach_id, $num_tickets) {
    global $db;
    $stmt = $db->prepare("INSERT INTO coach_bookings (booking_id, coach_id, num_tickets) VALUES (?, ?, ?)");
    $stmt->execute([$booking_id, $coach_id, $num_tickets]);
    return $db->lastInsertId();
}


function deleteUser($userId) {
    global $db; 
    try {
        $stmt = $db->prepare("DELETE FROM users WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->rowCount(); 
    } catch (PDOException $e) {
        error_log("Error in deleteUser: " . $e->getMessage()); // Log error to the PHP error log
        return false; 
    }
}


function deleteTrain($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM trains WHERE train_id = ?");
    $stmt->execute([$id]);
    return $stmt->rowCount();
}

function deleteStation($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM stations WHERE station_id = ?");
    $stmt->execute([$id]);
    return $stmt->rowCount();
}

function deleteBooking($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM bookings WHERE booking_id = ?");
    $stmt->execute([$id]);
    return $stmt->rowCount();
}

function deleteCoach($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM coaches WHERE coach_id = ?");
    $stmt->execute([$id]);
    return $stmt->rowCount();
}

function deleteCoachBooking($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM coach_bookings WHERE booking_id = ?");
    $stmt->execute([$id]);
    return $stmt->rowCount();
}








?>
