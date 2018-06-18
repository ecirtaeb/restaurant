<?php
class User {
		
	private $id;
	private $firstname;
	private $lastname;
	private $birthday;
	private $address;
	private $city;
	private $zipcode;
	private $phone;
	private $email;
	private $password;
	private $is_active;
	private $created_at;
	private $updated_at; 

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
	public function firstname() { return $this->firstname; }	
	public function lastname() { return $this->lastname; }
	public function birthday() { return $this->birthday; }
	public function city() { return $this->city; }
	public function zipcode() { return $this->zipcode; }
	public function phone() { return $this->phone; }
	public function email() { return $this->email; }
	public function password() { return $this->password; }
	public function is_active() { return $this->is_active; }
	public function created_at() { return $this->created_at; }
	public function updated_at() { return $this->updated_at; }
		
		
	public function setId($id) {
    		$this->id = (int) $id;
 	 }		
        
	public function setFirstname($firstname)
	  {
	    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
	    // Dont la longueur est inférieure à 50 caractères.
	    if (is_string($firstname) && strlen($firstname) <= 50) {
	      $this->firstname = $firstname;
	    }
	  }
	  
	public function setLastname($lastname)
	  {
	    if (is_string($lastname) && strlen($lastname) <= 50) {
	      $this->lastname = $lastname;
	    }
	  }
	  
	public function setBirthday($birthday)
	  {
	    if (is_string($birthday) && strlen($birthday) <= 50) {
	      $this->birthday = $birthday;
	    }
	  }
	  	  
	public function setAddress($address) {
	    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
	    if (is_string($address) ) {
	      $this->address = $address;
	    }
	  }

	public function setCity($city)
	  {
	    if (is_string($city) && strlen($city) <= 50) {
	      $this->city = $city;
	    }
	  }
	  
	public function setZipcode($zipcode) {
    		$this->zipcode = (int) $zipcode;
 	 }		
	 
	public function setPhone($phone) {
    		$this->phone = $phone;
 	 }

	public function setEmail($email) {
    		$this->email =$email;
 	 }
	 
	public function setPassword($password)
	  {
	    if (is_string($password) && strlen($password) <= 50) {
	      $this->birthday = $password;
	    }
	  }

	public function setIsActiv($isActiv) {
    		$this->isActiv = 1;
 	 }	
	 	 
	public function setCreated_At() {
		$this->created_at = new DateTime();
	}
	
	public function setUpdatedAt() {
		$this->update_at = null;
	}			
        


}