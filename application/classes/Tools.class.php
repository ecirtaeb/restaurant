<?php
class Tools {
	
	static function pre($kekchoz) {

		echo("<pre>");
		print_r($kekchoz);
		echo("</pre>");
	} 


	public static function formatPrice($priceHT) {

		return number_format($priceHT, 2, ',', ' ') . "€ TTC";

	}
}