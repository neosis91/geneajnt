<div class="contenu">
<?php
// on vérifie toujours qu'il s'agit d'un membre qui est connecté
if (!isset($_SESSION['identifiant'])) {
// si ce n'est pas le cas, on le redirige vers l'accueil
header ('Location: index.php');
exit();
}
?>
<?php
$id_message=$_GET['id_message'];
echo '<div id="topbarre3">
<div class="topbarre2_contenu">
<a href="index.php?page=messagerie" class="topbarre2_lien">Boîte de réception</a>
<a href="envoyer.php" class="topbarre2_lien">Répondre</a>
<a href="index.php?page=supprimermessage&id_message='.$id_message.'" class="topbarre2_lien">Supprimer</a>
</div>
</div>
<br />';

// on teste si notre paramètre existe bien et qu'il n'est pas vide
if (!isset($_GET['id_message']) || empty($_GET['id_message'])) {
echo 'Aucun message reconnu.';
}
else {
// on prépare une requete SQL selectionnant la date, le titre et l'expediteur du message que l'on souhaite lire, tout en prenant soin de vérifier que le message appartient bien au membre connecté
$sql = 'SELECT DAY(date) AS jour, MONTH(date) AS mois, YEAR(date) AS annee, login, nom, prenom, titre, message FROM tb_messagerie INNER JOIN tb_utilisateur ON expediteur = identifiant WHERE destinataire="'.$_SESSION['identifiant'].'" AND id_message="'.$_GET['id_message'].'"';
// on lance cette requete SQL à MySQL
$req = mysqli_query($link,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
$nb = mysqli_num_rows($req);

if ($nb == 0) {
echo 'Aucun message reconnu.';
}
else {
// si le message a été trouvé, on l'affiche
$data = mysqli_fetch_array($req);
echo 'Message reçu le '.$data['jour'].'/'.$data['mois'].'/'.$data['annee'].' et envoyé par '.stripslashes(htmlentities(trim($data['prenom']))).' '.stripslashes(htmlentities(trim($data['nom']))).'<br />';
echo '<h3>'.stripslashes(htmlentities(trim($data['titre']))).'</h3>';
echo nl2br(stripslashes(htmlentities(trim($data['message']))));
}
mysqli_free_result($req);

}
?>
<br />
</div>