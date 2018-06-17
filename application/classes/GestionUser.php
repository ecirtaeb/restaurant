<?php
class GestionUser {
		
	private db;
	
	public function__construct($db) {
		
		$this->setDb($db)
	}
	
	public function add(User $user) {
	
 	$user['firstname'] = strip_tags($user['firstname']);
	$user['lastname'] = strip_tags($user['lastname']);
	$article['city'] = strip_tags($user['city']);
	
	$sql = " INSERT 
					INTO user 
							(id, firstname, lastname, birthday,
							address, city, zipcode, phone, 	
							email, password, is_active, 
							created_at, updated_at )
					VALUES (null, :firstname,:lastname, :birthday, 
							:address, :city, :zipcode,  phone, 
							:email, :password, :is_active, 
							NOW(), null)";
	database->query($sql,$user); /// reste à trouver d'où vient database ???	
 public function query($sql, array $criteria = array())
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
	
		public function executeSql($sql, array $values = array())
	{
		$query = $this->pdo->prepare($sql);

		$query->execute($values);

		return $this->pdo->lastInsertId();
	}

    public function query($sql, array $criteria = array())
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryOne($sql, array $criteria = array())
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetch(PDO::FETCH_ASSOC);
    }


	//wLog($insert);
	//wLog($statement->errorCode());
	
  }

  public function delete($id)  {

	$id = (int) $id;
	$sql = 'DELETE from USER WHERE id = :id';
	$stmt = $this->db->prepare($sql);
	$stmt->execute();
  }

  public function getById($id)  {
 
	$id = (int) $id;
	$sql = 'SELECT	id, firstname, lastname, birthday,
							address, city, 	zipcode, phone,
							email, password, is_active, 
							created_at, updated_at 
				FROM user
				WHERE id = {$id}';

    $stmt = $this->db->prepare($sql);
	$stmt->execute();
    $donnees = $stmt->fetch(PDO::FETCH_ASSOC);

    return new User($donnees);
  }

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
    $this->_db = $db;
  }
  
}