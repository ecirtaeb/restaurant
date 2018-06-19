<!-- Message de notification -->

<!-- Code HTML à écrire -->
<nav class="user-interface"> 
	<a class="button button-primary" href="<?= $requestUrl ?>/compte">creer un compte</a>
	<a class="button button-primary" href="<?= $requestUrl ?>/connexion">connexion</a>
</nav>

<!-- Liste des aliments -->
<h3><i></i>Création d'un compte</h3>
<form method="post" class="generic-form" action="<?= $requestUrl ?>/compte">
	<fieldset>
		<legend>Identité et coordonnées</legend>
		<ul>
			<li>
				<label for="lastname">Nom:</label>
				<input type="text" id="lastname" name="lastname">
			</li>
			<li>
				<label for="firstname">Prénom :</label>
				<input type="text" id="firstname" name="firstname">
			</li>
			<li>
				<label for="birthdate">Date de naissance :</label>
				<select name="birthD" >
					<option></option>
					<?php for ($i = 1 ; $i < 32 ; $i++) : ?>
						<option id="birthdate" values("<?= $i ?>")><?= $i ?></option>
					<?php endfor ?>
				</select>
				<select name="birthM">
					<option></option>
					<?php for ($i = 1 ; $i < 8 ; $i++) : ?>
						<option  values("<?= $i ?>")><?= $i ?></option>
					<?php endfor ?>
				</select>
				<select name="birthA" >
					<option></option>
					<?php for ($i = 2000 ; $i>1920 ; $i--) : ?>
						<option values("<?= $i ?>")><?= $i ?></option>
					<?php endfor ?>
				</select>
			</li>
			<li>
				<label for="address">Adresse :</label>
				<textarea id="address" values="address" name="address"></textarea>
			</li>	
			<li>
				<label for="city">Ville :</label>
				<input type="text" id="city" name="city">
			</li>
			<li>
				<label for="zipcode">Code postal :</label>
				<input type="text" id="zipcode" name="zipcode">
			</li>
			<li>
				<label for="phone">Téléphone :</label>
				<input type="text" id="phone" name="phone">
			</li>

		</ul>
	</fieldset>
	<fieldset>
		<legend>Informations d'authentification</legend>
		<ul>
			<li>
				<label for="mail">e-mail :</label>
				<input type="text" id="mail" values="email" name="email">
			</li>
			<li>
				<label for="password">Mot de passe:</label>
				<input type="text" id="password" name="password">
			</li>
		</ul>
	</fieldset>
	<button class="button button-primary" name="button" value="creation">Créer le compte</button>
	<button class="button button-cancel" name="button" value="abandon">Abandonner</button>
</form>
	