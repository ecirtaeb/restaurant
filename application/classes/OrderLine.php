<?php
class Ordeline {
		
	private id;
	private order_id;
	private product_id;
	private priceHT;
	private tax;
	private quantity;
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
}
	public function id() { return $this->id; }
	public function order_id() { return $this->order_id; }
	public function product_id() { return $this->product_id; }
	public function priceHT() { return $this->priceHT; }
	public function tax() { return $this->tax; }
	public function quantity() { return $this->quantity; }
	public function created_at() { return $this->created_at; }
	
		
	public function setId($id) {
    		$this->id = (int) $id;
 	 }		
        
	public function setOrder_Id($order_id) {
    		$this->order_id = (int) $order_id;
 	 }		
	 	
 	public function setProduct_Id($product_id) {
    		$this->product_id = (int) $product_id;
 	 }			

	public function setTax($tax) {
    		$this->tax = (float) $tax;
 	 }		
	 
	public function setpricetHT($priceHT) {
    		$this->priceHT = (float) $priceHT;
 	 }		

	public function setQuantity($quantity) {
    		$this->quantity = (int) $quantity;
 	 }
	 
	public function setCreated_At() {
		$this->created_at = new DateTime();
	}
	

}