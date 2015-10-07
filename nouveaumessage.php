<div class="contenu">
<?php
// on vérifie toujours qu'il s'agit d'un membre qui est connecté
if (!isset($_SESSION['identifiant'])) {
// si ce n'est pas le cas, on le redirige vers l'accueil
header ('Location: index.php');
exit();
}

// on teste si le formulaire a bien été soumis
if (isset($_POST['go']) && $_POST['go'] == 'Envoyer') {
if (empty($_POST['destinataire']) || empty($_POST['titre']) || empty($_POST['message'])) {
$erreur = 'Au moins un des champs est vide.';
}
else {

// si tout a été bien rempli, on insère le message dans notre table SQL
$sql = 'INSERT INTO tb_messagerie VALUES("", "'.$_SESSION['identifiant'].'", "'.$_POST['destinataire'].'", "'.date("Y-m-d H:i:s").'", "'.utf8_encode($_POST['titre']).'", "'.utf8_encode($_POST['message']).'")';
mysqli_query($link,$sql) or die('Erreur SQL !'.$sql.'<br />'.mysqli_error());


header('Location: index.php?page=messagerie');
exit();
}
}
?>
<?php
echo '<div id="topbarre3">
<div class="topbarre2_contenu">
<a href="index.php?page=messagerie" class="topbarre2_lien">Boîte de réception</a>
</div>
</div>
<br />';




// on prépare une requete SQL selectionnant tous les login des membres du site en prenant soin de ne pas selectionner notre propre login, le tout, servant à alimenter le menu déroulant spécifiant le destinataire du message
$sql = 'SELECT identifiant, nom, prenom FROM tb_utilisateur WHERE identifiant <> "'.$_SESSION['identifiant'].'" ORDER BY prenom, nom ASC';
// on lance notre requete SQL
$req = mysqli_query($link,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
$nb = mysqli_num_rows ($req);

if ($nb == 0) {
// si aucun membre n'a été trouvé, on affiche tout simplement aucun formulaire
echo 'Vous êtes le seul membre inscrit.';
}
else {
// si au moins un membre qui n'est pas nous même a été trouvé, on affiche le formulaire d'envoie de message
?>

<table><center><form action="index.php?page=nouveaumessage" method="post"><select class="champs_log" name="destinataire"><option value="">Choisissez un contact</option>
<?php
// on alimente le menu déroulant avec les login des différents membres du site
while ($data = mysqli_fetch_array($req)) {
echo '<option value="' , $data['identifiant'] , '">'.stripslashes(htmlentities(trim($data['prenom']))).' '.stripslashes(htmlentities(trim($data['nom']))).' </option>';
}
?>
</select><br />
<input placeholder="Objet" class="champs_log" type="text" name="titre" value="<?php if (isset($_POST['titre'])) echo ut8_encode($_POST['titre']); ?>"><br />
<textarea placeholder="Message" class="champs_log" name="message"><?php if (isset($_POST['message'])) echo utf8_encode($_POST['message']); ?></textarea><br />
<input type="submit" name="go" class="topbarre_envoi" value="Envoyer">
</form></center></table>
<?php
}
mysqli_free_result($req);
?>
</select>
<?php
// si une erreur est survenue lors de la soumission du formulaire, on l'affiche
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
<br />
</div>