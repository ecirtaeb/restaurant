'use strict';
console.log('commande.js chargé');
console.log($('select#choiceProduct'));

$('select#choiceProduct').on('change',function() {
	
	
	var productId = $(this).val();
//	var idproduct = $('select#choiceProduct').val();
	console.log("change détecté",  productId);
	//	return;
	
// var url = '../../restaurant/index.php/produit?id=1';
	var url = getRequestUrl() + '/produit';
	var params = {
		id: productId
	};
	
		$.get(url, params, function (html) {

			$('li#meal-details').html(html);  // au retour de la requête AJAX on remplit le bout de HTML

	});


})	

// ajout traitement  $.post(url, function (html) ....pour mettre à jour le panier stocké dans la Session


$('button#ajoutPanier').on('click',function() {
	
	var infos = {
		productId : $('select#choiceProduct').val(),
		quantity : $('input#quantity').val()
	}
	//infosPanier = JSON.stringify(infos);
	//	return;
	
// var url = '../../restaurant/index.php/produit?id=1';
	var url = getRequestUrl() + '/panier';

		$.post(url, infos, function (html) {

			$('section#recapCde').html(html);  // au retour de la requête AJAX on remplit le bout de HTML

	});


})	