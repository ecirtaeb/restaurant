<?php
class Guser {
		
	private $db;
	
	public function __construct() {
		
		$this->db = new Database();
	}
	
	public function addUser(array $user) {

	
 	$user['firstname'] = strip_tags($user['firstname']);
	$user['lastname'] = strip_tags($user['lastname']);
	$user['city'] = strip_tags($user['city']);
	$user['address'] = strip_tags($user['address']);
	$user['email'] = strip_tags($user['email']);
	$user['password'] = crypt($user['password'], 'abc');
	if ( isset($user['button'] ) ) { array_pop($user); }
	$sql = "INSERT 
					INTO user 
							(firstname, lastname, birthday,
							address, city, zipcode, phone, 	
							email, password, created_at, updated_at )
					VALUES (:firstname,:lastname, NOW(), 
							:address, :city, :zipcode,  :phone, 
							:email, :password,	NOW(), null)";
	var_dump($user);		
	$this->db->executeSql($sql, $user);

	//wLog($insert);
	//wLog($statement->errorCode());
	}


	public function getUser(array $user)  {
 
	if ( isset($user['button'] ) ) { array_pop($user); }
	$user['password'] = crypt($user['password'], 'abc');
	
	$sql = "SELECT id, firstname, lastname
				FROM user
				WHERE email = :email and password = :password";

    return $infoUser = $this->db->queryOne($sql, $user);
	
  	}

}
/*
  	public function getList()  {
  
	    // Retourne la liste de tous les Users.
		$id = [(int) $id];
		$users = [];
		$sql = 'SELECT	id, firstname, lastname, birthday,
								address, city, 	zipcode, phone,
								email, password, is_active, 
								created_at, updated_at 
					FROM user
					WHERE id = :id';
					
		$liste = database->query($sql, $id);
		
		foreach ( $liste as $donnees ) {
		
	      $users[] = new User($donnees);
	    }

  	}

  	public function update(User $user)  {
    // Prépare une requête de type UPDATE.
    // Assignation des valeurs à la requête.
    // Exécution de la requête.
  }

  	public function setDb(PDO $db)  {
    $this->db = new Database();
  }
  
}

*/