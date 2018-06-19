<?php
class GesBookingModel {
		
	private $db;
	
	public function __construct() {
		
		$this->db = new Database();
	}
	
	public function addBooking(array $booking) {


	if ( isset($booking['button'] ) ) { array_pop($booking); }

	var_dump($booking); exit;

	$booking['booking_date'] = '2018-06-29';
	$booking['booking_time'] = '20:00:00';



	$sql = "INSERT 
					INTO booking 
							(user_id, seat_number, booking_date,
							booking_time, created_at )
					VALUES (:user_id,:seat_number, :booking_date,
							:booking_time, NOW() )";

	$this->db->executeSql($sql, $booking);

	//wLog($insert);
	//wLog($statement->errorCode());
	}
 
}

