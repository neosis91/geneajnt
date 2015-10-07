<div id="topbarre1_out">
<div id="topbarre1">
<a href="index.php" id="topbarre1_logo"><img src="donnees/logo3.gif"></a>
<form action="/recherche.php?form=ok" method="post" id="topbarre1_search">
<input name="r" placeholder="Entrez un sosa, un nom, une année..." id="topbarre1_search_champs" type="text"><input name="" value="" style="background-image:url(donnees/topbarre-search.gif);" id="topbarre1_search_bouton" type="submit">
</form>

<?php
if (isset($_SESSION['droit']) == true)
{
	echo '<div class="topbarre_upload">Upload</div>
	<div class="topbarre_connect"><a href="deconnecter.php">Deconnexion<a></div>';
}
?>
<div class="topbarre_connect" onclick="Popin('connexion.php', 'connexion')"><a>Connexion</a></div>


</div>
</div>
<div style="top: 50px;" id="topbarre2_out">
<div id="topbarre2">
<div id="topbarre2_social">
<a href="https://twitter.com/Bertrand_Jnt" target="_blank"><img src="donnees/tb-twitter.png"></a>
<a href="https://www.facebook.com/bertrandjt" target="_blank"><img src="donnees/tb-facebook.png"></a>
</div>
<div id="topbarre2_left">
<a style="display: none;" href="index.php" id="topbarre2_logo" class="topbarre2_hide"><img src="donnees/logob.gif"></a>
<?php
if (isset($_SESSION['droit']) == true)
{
	echo '<div class="topbarre2_plus_menu"><img src="donnees/topbarre2_plus_menu-icon.png" class="topbarre2_plus_menu_icon">Plus<img src="donnees/topbarre2_plus_menu-arrow.png" class="topbarre2_plus_menu_arrow"></div>';}?>
</div>
<div class="topbarre2_contenu">
<a href="index.php" class="topbarre2_lien t2l_select">Accueil</a>
<a href="index.php?page=monarbre&param=1" class="topbarre2_lien">Mon arbre</a>
<a href="index.php?page=personnes" class="topbarre2_lien">Personnes</a>
<a href="index.php?page=carte" class="topbarre2_lien">Carte</a>
</div>
</div>
</div>

<div id="topbarre2_espace"></div>
<div id="plus">
<a class="plus_titre">Mon geneajnt</a>
<a href="index.php?page=profil" class="plus_lien"><img src="donnees/icone-profil.png">Profil</a>
<a href="index.php?page=messagerie" class="plus_lien"><img src="donnees/icone-messagerie.png">Messagerie</a>
<div class="plus_separation"></div>
<a class="plus_titre">Paramètres</a>
<a href="index.php?page=theme" class="plus_lien"><img src="donnees/icone-theme.png">Thème</a>
<a href="index.php?page=confidentialite" class="plus_lien"><img src="donnees/icone-confidentialite.png">Confidentialité</a>
<a href="index.php?page=apropos" class="plus_lien"><img src="donnees/icone-apropos.png">A propos</a>
</div>