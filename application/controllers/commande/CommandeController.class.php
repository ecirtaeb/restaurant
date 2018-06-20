<?php

class CommandeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
	// liste des produits
		$productModel = new GesProductModel();
        $productList = $productModel->getAllProducts();
		
		$session = new Session();
		$infoUser = $session->getSession();

    	$order = new GesOrderModel();
		$orderLines = $order->getOrderByUserId($infoUser['id']);
        $userOrder = [];
        foreach ( $orderLines as $line ) {
            $product = $productModel->getProductById($line['product_id']);
            $userOrder[] = array_merge ($line, $product);
        }
		
	// liste des produits déjà en commande pour ce compte
	
	// on renvoie les 2 listes
        return ['products' => $productList, 'orderLines' => $userOrder];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */


 //       $http->redirectTo('login');


    
    }
}