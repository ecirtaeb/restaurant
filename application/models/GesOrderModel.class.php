<?php
class GesOrderModel {
	private $db;
	
	public function __construct() {
		
		$this->db = new Database();
	}
	
	public function addOrder(array $order) {

		if ( isset($order['button'] ) ) { array_pop($order); }
		$sql = "INSERT 
						INTO  `order`
								(user_id, status)
						VALUES (:user_id, :status)";
		var_dump($order);		
		$this->db->executeSql($sql, $order);

	}
	
	public function addOrderLine(array $orderLine) {

		if ( isset($orderLine['button'] ) ) { array_pop($orderLine); }
		$sql = "INSERT 
						INTO orderLine
								(order_id, product_id, priceHT, tax, quantity)
						VALUES (:order_id, :product_id, :priceHT, :tax, :quantity)";
		var_dump($orderLine);		
		$this->db->executeSql($sql, $orderLine);
	}

	public function getOrderByUserId($id)  {
 
		if ( isset($order['button'] ) ) { array_pop($order); }
		
		$sql = "SELECT c.id, l.priceHT, l.quantity, l.tax, l.product_id
					FROM `order` c
					JOIN orderline l ON c.id = l.order_id
					WHERE c.user_id = " . $id;


	    return $orders = $this->db->query($sql);
	
  	}

}