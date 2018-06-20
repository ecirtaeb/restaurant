<?php

class ProduitController
{
    public function httpGetMethod(Http $http, array $queryFields)   {
        /*
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
         */

	    $productModel = new GesProductModel();
		$productId = $queryFields['id'];
	    $product = $productModel->getProductById($productId);
		// '_raw_template' => true indique au FrameWork qu'il ne faut pas recharger le layout
	    return ['_raw_template' => true,'product' => $product];
	
        }

    public function httpPostMethod(Http $http, array $formFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP POST
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
         */
 
    
    }
}

?>