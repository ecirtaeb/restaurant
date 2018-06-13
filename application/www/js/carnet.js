"use strict";
//
//       FONCTIONS 
//
function addContact() {

	var newContact = {
		civ : "",
		nom : "",
		prenom : "",
		tel : ""
	};

	var nodeForm = $('select#civ');
	newContact.civ = nodeForm.val();

	var nodeForm = $('input#nom');
	newContact.nom = nodeForm.val();

	var nodeForm = $('input#prenom');
	newContact.prenom = nodeForm.val();

	var nodeForm = $('input#tel');
	newContact.tel = nodeForm.val();
	
	var carnet = getCarnetAdr();
	
	carnet.push(newContact);
	carnet = JSON.stringify(carnet);
	localStorage.setItem("carnetAdr",carnet);

}

function getCarnetAdr() {

	var carnet = localStorage.getItem("carnetAdr");
	console.log(carnet);
	
	if ( carnet == null ) {

		carnet = [];

	} else {

		carnet = JSON.parse(carnet);
	}

	return carnet;

}

function showAllcarnet() {

	console.log("showAll");
	
	var carnet = getCarnetAdr();

	var liste = "<ul>";

	for ( var i = 0 ; i < carnet.length ; i++ ) {

		liste  +=  "<li>" + carnet[i].nom + " " + carnet[i].prenom + " </li>";
	}

	liste += "</ul>";
	var nodeCarnet = $('div#liste');
	nodeCarnet.html(liste);

}


function removeAllContacts() {

	carnet = [];
	localStorage.setItem("carnetAdr",carnet);
}

function showOneContact() {

	var carnet = localStorage.getItem("carnetAdr");
	var nom = this.val;
	console.log(nom);

	if ( carnet == null ) {

		// oups !
		return false;

	} else {

		carnet = JSON.parse(carnet);
		
	}
	
}

function showForm() {

	var nodeForm = $('div#formulaire');
	nodeForm.show();
}

// 
// 
//

console.log("carnet chargé");

//
//	 Affichage formulaire
//
showAllcarnet();
//
//	 clique sur bouton "+" ==> formulaire
//
var nodeAjouter = $('#ajout');

nodeAjouter.on("click", showForm);

//	 clique sur bouton "supprimer" ==> suppression de tous les contacts
//
var nodeSupprimer = $('button#suppression');
nodeSupprimer.on("click", removeAllContacts);
//
//	 clique sur bouton "enregister" ==> sauver formulaire
//
var nodeEnregistrer = $('button#enregistrer');
nodeAjouter.on("click", addContact);

var nodeCarnet= $('#liste li');
for ( var i = 0 ; i < nodeCarnet.length ; i++ ) {

	nodeCarnet.on("click", showOneContact);

}

//showOneContact


