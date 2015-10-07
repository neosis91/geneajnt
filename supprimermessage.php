<div class="contenu">
<?php
if (!isset($_SESSION['identifiant'])) {
// si ce n'est pas le cas, on le redirige vers l'accueil
header ('Location: index.php');
exit();
}

// on teste si l'id du message a bien été fourni en argument au script envoyer.php
if (!isset($_GET['id_message']) || empty($_GET['id_message'])) {
header ('Location: index.php?page=messagerie');
exit();
}
else {

// on prépare une requête SQL permettant de supprimer le message tout en vérifiant qu'il appartient bien au membre qui essaye de le supprimer
$sql = 'DELETE FROM tb_messagerie WHERE destinataire="'.$_SESSION['identifiant'].'" AND id_message="'.$_GET['id_message'].'"';
// on lance cette requête SQL
$req = mysqli_query($link,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
header ('Location: index.php?page=messagerie');
exit();
}
?>
<br />
</div>