<?php
require_once('Model.php');

class Seat extends Model {
    public function getByShowtime($showtime_id) {
        $query = 
        "SELECT s.*, IF (bs.id IS NULL, 'available', 'booked') AS status
        From seats s LEFT JOIN booking_seats bs ON bs,seat_id = s.id
        LEFT JOIN bookings b ON b.id = bs.booking_id WHERE b.showtime_id = ? OR b.showtime_id IS NULL";

        return $this->fetchAll($query, [$showtime_id], "i");
    }
}