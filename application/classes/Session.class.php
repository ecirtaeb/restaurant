<?php
class Session {

// init session	
	function start() {

		session_start();

	}
	
// récupération d'une session s'il y a	
	static function getSession() {

        $infoUser = [];
        if (isset ($_SESSION['iduser']) ) {
            $user = new GesUserModel();
            $infoUser = $user->getUserById($_SESSION['iduser']);
        }
        return $infoUser;
	}
	function getUser() {

		 return UserModel::getUserById($_SESSION['user_id']);

	}
	
// récupération du panier
	static function getPanier() {

        $panier = [];
        if (isset ($_SESSION['panier']) ) {
			// retourne une liste de produits
             $panier =  PanierModel::getProductsById($_SESSION['panier']);
        }
        return $panier;
	}
	
	
// Ajout au panier
	static function addPanier(array $infos) {

        if (isset ($_SESSION['panier']) ) {
			// retourne le contenu du panier
 			 $_SESSION['panier'][] = $infos;
        }
 	}
	
// Supprime du panier
	static function delPanier($id) {

         if (isset ($_SESSION['panier']) ) {

             array_splice($_SESSION['panier'],$id,1);
        }
	}
	
// Vérification si connexion en cours	
	static function isConnected() {

		if (empty($_SESSION['iduser'])) {
			return false;
		} else {
			return true;
		}
	}
	
// Sauvegarde d'une connexion	et initialisation du panier avec commande en cours (plus tard)
		function connect($user) {

		$_SESSION['user_id'] = $user['id'];
		$_SESSION['panier'] = [];
	}

// Kill session
	function logout() {

		session_destroy();

	}
	
		
// Sauvegarde d'une connexion	
		function connect($user) {

		$_SESSION['user_id'] = $user['id'];
	}
	
	
	
}