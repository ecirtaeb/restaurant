<?php
class Product {
		
	private id;
	private name;
	private description;
	private priceHT;
	private tax;
	private stock;
	private is_active;
	private created_at;
	private updated_at; 

	public function alim(array $donnees) {
	
	  foreach ($donnees as $key => $value) {
	    $method = 'set'.ucfirst($key);  // on transforme la première en majuscule
		 
	    if (method_exists($this, $method)) {   // Si la méthode correspondante existe.
		
	      $this->$method($value); // On appelle la fonction setAttribut (setName par exemple)
	    }
	  }
	 }
	public function id() { return $this->id; }
	public function nom() { return $this->nom; }
	public function description() { return $this->description; }
	public function priceHT() { return $this->priceHT; }
	public function tax() { return $this->tax; }
	public function stock() { return $this->stock; }
	public function is_active() { return $this->is_active; }
	public function created_at() { return $this->created_at; }
	public function updated_at() { return $this->updated_at; }
		
		
	public function setId($id) {
    		$this->id = (int) $id;
 	 }		
        
	public function setName($name)  {
	    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
	    // Dont la longueur est inférieure à 50 caractères.
	    if (is_string($name) && strlen($name) <= 50) {
	      $this->name = $name;
	    }
	  }
	  
	public function setDescription($description) {
	    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
	    if (is_string($description) ) {
	      $this->name = $description;
	    }
	  }
	  
	public function setTax($tax) {
    		$this->tax = (float) $tax;
 	 }		
	 
	public function setpricetHT($priceHT) {
    		$this->priceHT = (float) $priceHT;
 	 }		
	public function setIsActiv($isActiv) {
    		$this->isActiv = (int) $isActiv;
 	 }		

	public function setStock($stock) {
    		$this->stock = (int) $stock;
 	 }
	 
	public function setCreated_At() {
		$this->created_at = new DateTime();
	}
	
	public function setUpdatedAt() {
		$this->update = null;
	}			
        


}