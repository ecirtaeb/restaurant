<?php
class Order {
		
	private id;
	private user_id;
	private status;
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
	public function status() { return $this->status; }
	public function created_at() { return $this->created_at; }
	
		
	public function setId($id) {
    		$this->id = (int) $id;
 	 }	
	 
	public function setUser_Id($user_id) {
    		$this->user_id = (int) $user_id;
 	 }			

	public function setStatus($status) {
		if (is_string($status) && strlen($status) = 2) {
	      $this->name = $status;
	    }
 	 }
	 
	public function setCreated_At() {
		$this->created_at = new DateTime();
	}

}