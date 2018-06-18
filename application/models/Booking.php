<?php
class Booking {
		
	private id;
	private user_id;
	private seat_number;
	private booking_date;
	private booking_time;
	private created_at;

	public function alim(array $donnees)
	{
	  foreach ($donnees as $key => $value)
	  {
	    $method = 'set'.ucfirst($key);  // on transforme la première en majuscule
		 
	    if (method_exists($this, $method)) {   // Si la méthode correspondante existe.
		
	      $this->$method($value); // On appelle la fonction setAttribut (setName par exemple)
	    }
	  }
	 }
	 
	public function id() { return $this->id; }
	public function user_id() { return $this->user_id; }
	public function seat_number() { return $this->seat_number; }
	public function booking_date() { return $this->booking_date; }
	public function booking_time() { return $this->booking_time; }
	public function created_at() { return $this->created_at; }
	
		
	public function setId($id) {
    		$this->id = (int) $id;
 	 }	
	 
	public function setUser_Id($user_id) {
    		$this->user_id = (int) $user_id;
 	 }			

	public function setSeat_number($seat_number) {
    		$this->seat_number = (int) $seat_number;
 	 }
	 
	public function setCreated_At() {
		$this->created_at = new DateTime();
	}

}