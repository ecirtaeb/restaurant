<?php

class PanierController
{
    public function httpGetMethod(Http $http, array $queryFields)   {
        /*
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
         */



    public function httpPostMethod(Http $http, array $formFields)
    {

	// ajout au panier puis affiche  les contenu
	    $productModel = new GesProductModel();
		$productId = $formFields['id'];
	    $product = $productModel->getProductById($productId);
		// '_raw_template' => true indique au FrameWork qu'il ne faut pas recharger le layout
	    return ['_raw_template' => true,'panier' => $product];
	
        }
     
    }
}

?>