<?php
class GesProductModel {

	public function getAllProducts() {

		$db = new Database();

		$sql = "SELECT * FROM product";
		$products = $db->query($sql);

		return $products;
	}

	public function getProductById($id) {

		$db = new Database();

		$sql = "SELECT * FROM product WHERE id = " . $id;
		return $db->queryOne($sql);

	}
}
