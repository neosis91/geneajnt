<link href="donnees/tables.css" rel="stylesheet" type="text/css">
<div class="contenu">

<?php
// on vérifie toujours qu'il s'agit d'un membre qui est connecté
if (!isset($_SESSION['identifiant'])) {
// si ce n'est pas le cas, on le redirige vers l'accueil
header ('Location: index.php');
exit();
}
?>

<div id="topbarre3">
<div class="topbarre2_contenu">
<a href="index.php?page=nouveaumessage" class="topbarre2_lien">Nouveau message</a>
<a href="#" class="topbarre2_lien">Supprimer</a>
</div>
</div>
<br />
<body>

<?php
// on prépare une requete SQL cherchant tous les titres, les dates ainsi que l'auteur des messages pour le membre connecté
$sql = 'SELECT id_message, titre, DAY(date) AS jour, MONTH(date) AS mois, YEAR(date) AS annee, message, prenom, nom FROM tb_messagerie INNER JOIN tb_utilisateur ON expediteur = identifiant WHERE destinataire="'.$_SESSION['identifiant'].'" ORDER BY date DESC';
// lancement de la requete SQL
$req = mysqli_query($link,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
$nb = mysqli_num_rows($req);

if ($nb == 0) {
echo 'Vous n\'avez aucun message.';
}
else {
// si on a des messages, on affiche la date, un lien vers la page lire.php ainsi que le titre et l'auteur du message
echo '<table summary="Summary Here" cellpadding="0" cellspacing="0"><thead>
          <tr>
			<th><input type="checkbox" name="supprimer" value=""></th>
            <th>Expéditeur</th>
            <th>Objet du message</th>
            <th>Date de réception</th>
          </tr>
        </thead>
		<tbody>';
while ($data = mysqli_fetch_array($req)) {
echo '<tr class="light"><td align="center"><input type="checkbox" name="supprimer" value=""></td>
						<td align="center"><a href="index.php?page=lire&id_message='.$data['id_message'].'">'.utf8_encode($data['prenom']).' '.utf8_encode($data['nom']).'</a></td>
						<td align="center"><a href="index.php?page=lire&id_message='.$data['id_message'].'">'.utf8_encode($data['titre']).'</a></td>
						<td align="center"><a href="index.php?page=lire&id_message='.$data['id_message'].'">'.$data['jour'].'/'.$data['mois'].'/'.$data['annee'].'</a></td></tr>';
}
echo '</tbody></table>';
}
mysqli_free_result($req);
?>
<br />
</div>