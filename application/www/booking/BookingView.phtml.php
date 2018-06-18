<!-- Message de notification -->

<!-- Code HTML à écrire -->

<nav class="user-interface"> 
	<button class="button button-primary"><a href="<?= $requestUrl ?>/booking">Réserver</a></button>
	<button class="button button-primary"><a href="<?= $requestUrl ?>/commande">Commander</a></button>
	<button class="button button-primary"><a href="<?= $requestUrl ?>/deconnexion">Déconnexion</a></button>
</nav>


<!-- Liste des aliments -->
<h3><i></i>Réservation d'une table</h3>
<form method="post" action="<?= $requestUrl ?>/resa">
	<fieldset>
		<legend>Informations</legend>
		<ul>
			<li>
				<label for="dateresa">Date de réservation :</label>
				<select>
					<option></option>
					<?php for ($i = 1 ; $i<32 ; $i++) : ?>
						<option id="resaj" name="resaj" values("<?= $i ?>")><?= $i ?></option>
					<?php endfor ?>
				</select>
				<select>
					<option></option>
					<?php for ($i = 1 ; $i<13 ; $i++) : ?>
						<option name="resam" values("<?= $i ?>")><?= $i ?></option>
					<?php endfor ?>
				</select>
				<select>
					<option></option>
					<?php for ($i = 2019 ; $i<2020 ; $i++) : ?>
						<option name="resaa" values("<?= $i ?>")><?= $i ?> </option>
					<?php endfor ?>
				</select>

			</li>
			<li>
				<label for="nbseat">Nombre de couverts :</label>
				<input type="text" id="nbseat" name="seat_number">
			</li>
		</ul>
	</fieldset>
	<button class="button button-primary" name="button" value="resa">Réserver</button>
	<button class="button button-cancel" name="button" value="abandon">Abandonner</button>
</form>