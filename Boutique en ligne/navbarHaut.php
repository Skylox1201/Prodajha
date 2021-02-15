<?php
require_once("modeles/Categorie.php");
$Categorie = new Categorie();
$resultatCat = $Categorie->recupererCategories();
 ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a class="navbar-brand" href="index.php">
		<img src="logo_Prodajha.png" style="height: 50px; width:auto; margin-left:0" class="float-left" alt="Prodajha" >
	</a>
	<ul class="nav nav-pill" style="margin-left: 10px;">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Catégories</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="index.php">Toutes</a>
				<div class="dropdown-divider"></div>
				<?php foreach ($resultatCat as $categorie) {
					echo"<a class='dropdown-item'
					href='index.php?idcat=".$categorie['idCategorie']."'>"
					.$categorie['nom']."
					</a>";
				} ?>
			</div>
		</li>		
	</ul>
		<?php
		if($_SESSION) { ?>
		<a class="btn btn-warning ml-auto mr-2" href="panier.php">
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-basket" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
			</svg>
		</a>
		<a class="btn btn-danger" href="traitements\deconnexion.php">Déconnexion</a>
		<?php
		} else {
			if (isset($_GET['idart'])) {
				?><a class="btn btn-secondary ml-auto" href="connexion.php?page=Article&idart=<?php echo($_GET['idart'])?>">Se connecter</a><?php
			}else{
				?><a class="btn btn-secondary ml-auto" href="connexion.php">Se connecter</a><?php
			}
		}
		?>
</nav>
