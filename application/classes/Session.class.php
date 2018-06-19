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

// Vérification si connexion en cours	
	function isConnected() {

		if (empty($_SESSION['iduser'])) {
			return false;
		} else {
			return true;
		}
	}
	
// Sauvegarde d'une connexion	
		function connect($user) {

		$_SESSION['user_id'] = $user['id'];
	}

// Kill session
	function logout() {

		session_destroy();

	}
}