<?php

function connexion() {

	$user ='root';
	$password ='troiswa';
	$password= '';
	$db = new PDO	(
				'mysql:host=localhost;dbname=resto',
				$user,
				$password, 
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
			);	
	$db->exec('SET NAMES UTF8');
	return $db;	
}
//
//   =========>  P R O D U C T S
//
function getProducts() {

	$db = connexion();
	$select = "	
				SELECT *
				INTO 
					{$this.id},
					{$this.name},
					{$this.description},
					{$this.priceHT},
					{$this.tax},
					{$this.stock},
					{$this.is_active},
					{$this.},
					{$this.stock},
					DATE_FORMAT({$this.created_at},'%d/%m/%Y-%H:%i'),
					DATE_FORMAT({$this.updated_at},'%d/%m/%Y-%H:%i')
				FROM product
				";
	$statement = $db->prepare($select);
	$statement->execute();
	$articles = $statement->fetchAll(\PDO::FETCH_ASSOC);
	return $articles;
}


function getArticleById($id) {

	$db = connexion();
	$select = "
				SELECT 
					art.id,
					art.title,
					art.content, 
					concat(aut.firstname, ' ', aut.lastname) auteur, 
					cat.name categ, 
					DATE_FORMAT(credat,'%d/%m/%Y-%H:%i') dcre,
					DATE_FORMAT(upddat,'%d/%m/%Y-%H:%i') dmaj
				FROM article art
				JOIN categorie cat ON cat.id = art.idcateg
				JOIN auteur aut ON aut.id = art.authorid
				WHERE art.id = {$id}"
				;

	$statement = $db->prepare($select);
	$statement->execute();
	return $statement->fetch(\PDO::FETCH_ASSOC);

}


function ajoutArticle(array $article) {

	$db = connexion();
	$article['content'] = strip_tags($article['content']);
	$article['title'] = strip_tags($article['title']);
	$insert = "
	INSERT INTO article 
	(id, title, content, authorid, idcateg, credat, upddat)
	VALUES (null, :title, :content, :authorid, :idcateg, CURRENT_TIMESTAMP, null)
	";
		wLog($insert);
	$statement = $db->prepare($insert);

	$statement->execute($article);

	wLog($insert);
	wLog($statement->errorCode());
}

function modifArticle(array $article) {

	$db = connexion();
	$update = "
	UPDATE article 
	SET 
		title = '{$article["titreArt"]}',
		content = '{$article["textArt"]}',
		upddat = CURRENT_TIMESTAMP
	WHERE
		id = {$id}
	";
	$statement = $db->prepare($update);
	$statement->execute();
	
	$return=$statement->errorCode();
	return $return;
	
}

function supprimeArticleById($id) {
	
	$db = connexion();
	$delete = "DELETE FROM article where id = {$id}";
	$statement=$db->prepare($delete);
	$statement->execute();

	$return=$statement->errorCode();
	return $return;
}

//
//   =========>  A U T E U R   E T   C A T É G O R I E
//

function listeAuteurs() {
	
	$db = connexion();
	$select = 'SELECT id, concat(firstname, " ", lastname) auteur  FROM auteur';
	$statement=$db->prepare($select);
	$statement->execute();
	$auteurs= $statement->fetchAll(\PDO::FETCH_ASSOC);
	return $auteurs;
}

function listeCategories() {
	
	$db = connexion();
	$select = 'SELECT * FROM categorie';
	$statement=$db->prepare($select);
	$statement->execute();
	$categories = $statement->fetchAll(\PDO::FETCH_ASSOC);
	return $categories;
}
//
//   =========>  C O M M E N T A I R E
//

function listeCommentaires($idArticle) {
	
	$db = connexion();
	$select = "	
				SELECT 
					id,
					content,
					pseudo, 
					DATE_FORMAT(credat,'%d/%m/%Y à %H:%i') dcre,
					DATE_FORMAT(upddat,'%d/%m/%Y à %H:%i') dmaj
				FROM commentaire
				WHERE idarticle = {$idArticle}
				";
	//pre($select);
	$statement=$db->prepare($select);
	$statement->execute();
	$comments= $statement->fetchAll(\PDO::FETCH_ASSOC);
	
	$return=$statement->errorCode();
	return $comments;
}


function ajoutComment(array $comment) {

	$db = connexion();
	$comment['pseudo'] = strip_tags($comment['pseudo']);
	$comment['content'] = strip_tags($comment['content']);
	$insert = "
	INSERT INTO commentaire 
	(id, idarticle, content, pseudo, credat, upddat)
	VALUES (null, :idarticle, :content, :pseudo , CURRENT_TIMESTAMP, null)
	";

	$statement = $db->prepare($insert);
	$statement->execute();
	wlog($comment);
	wLog($statement->errorCode());

}

