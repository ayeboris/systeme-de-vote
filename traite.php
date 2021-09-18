<?php
if (!isset($_SESSION)) {
	session_start();

	// Initialisation des variables referents aux variables manipulables dans le formulaire
	$_SESSION['note'] = 0;
	$_SESSION['commentaire'] = "";
	$_SESSION['pays'] = "";
	$_SESSION['cpt_pers'] = 0;
	$_SESSION['prix']=0;
}

// Affectation des valeurs du formulaire dans les variables sessions
$_SESSION['note'] = !empty($_POST['note']) ? $_POST['note'] : 0 ;
$_SESSION['commentaire'] = !empty($_POST['commentaire']) ? $_POST['commentaire']: '';
$_SESSION['pays'] = !empty($_POST['pays']) ? $_POST['pays'] : '' ;
$_SESSION['cpt_pers'] = $_SESSION['cpt_pers']++ ;
$_SESSION['prix']=!empty($_POST['prix']) ? $_POST['prix'] : 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulaire</title>
	<link rel="stylesheet" href="boris.css">
	<link rel="stylesheet" href="print.css" media="print">

</head>

<body>

	<div class="container">

		<div class="form">


			<div class="form-group around">

				<h1 class="form-title">Rediger un avis pour un produit</h1>

				<h2>Votre avis</h2>

				<div class="section-etoiles">
					<div class="etoileGroupe">

						<?php if (isset($_SESSION['note'])) : ?>
							<?php for ($j = 0; $j < 5 - $_SESSION['note']; $j++) : ?>
								<div class=" reponseVides"></div>
							<?php endfor; ?>

							<?php for ($j = 0; $j < $_SESSION['note']; $j++) : ?>
								<div class="reponseEtoile"></div>
							<?php endfor; ?>

						<?php else : ?>
							<?php for ($j = 0; $j < 5; $j++) : ?>
								<div class=" reponseVides"></div>
							<?php endfor; ?>

						<?php endif; ?>

					</div>

				</div>

				<div class="form-controle">
					<h2>Votre commentaire</h2>
					<p>
						<?= nl2br($_SESSION['commentaire']) ?>
					</p>
				</div>

				<div class="form-controle">
					<h2><label for="range" class="center-block badge">Merci pour Votre soutient : <?= $_SESSION['prix'] ?> / 0F - 10 000F</label></h2>
				</div>

				<!-- 	NOTE SPECIALE	 -->
				<div class="form-controle">
					<h2><label for="DataList" class="form-label">Votre pays : <?= $_SESSION['pays'] ?></label></h2>
				</div>

				<div class="form-controle">
					Statistiques <span class="badge"><?= $_SESSION['cpt_pers'] + 1 ?> personnes</span>
				</div>

				<!-- SAISI DES BOUTONS DE SAISI -->
				<div class="btn-group center-block">

					<a href="javaScript:void(0)" id="print-btn" onclick="window.print();" class="btn btn-primary">imprimer</a>

					<a href="index.html" class="btn btn-secondary">Retour</a>

				</div>


			</div>

		</div>
	</div>

	<script src="boris.js"></script>
</body>

</html>