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
        session_start();
		$user = new Guser();
        $infoUser = $user->getUser($formFields);
//      
 		if ($infoUser == null) {
			  $http->redirectTo('connexion');

		} else {
				var_dump($infoUser);
				$_SESSION['iduser'] = $infoUser['id'];
				$_SESSION['firstname'] = $infoUser['firstname'];
				return ['user' => $_SESSION['firstname']];
			  $http->redirectTo('HomeController');
				exit;
		} 

	}
			
}