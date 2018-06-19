<?php

class ConnexionController
{
    public function httpGetMethod(Http $http, array $queryFields)  {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */

    }

    public function httpPostMethod(Http $http, array $formFields)  {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
       
		$user = new GesUserModel();
        $infoUser = $user->getUser($formFields);
//      
 		if ($infoUser == null) {
			 $http->redirectTo('connexion');

		} else {

 //           Tools::newSession();
			$_SESSION['iduser'] = $infoUser['id'];
            var_dump ($_SESSION);
			//return ['user' => $_SESSION['firstname']];
		    $http->redirectTo('');
			exit;
		} 

	}
			
}