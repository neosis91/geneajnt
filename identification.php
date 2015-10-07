<?php
//test de données obligatoire
if (($_POST['mail']!='') && ($_POST['mdp']!=''))
{
	$mail=$_POST['mail'];
	$mdp=sha1($_POST['mdp']);

	include "connect.php";
	$sql="SELECT * FROM lw_profil
	where mail_profil = '$mail'
	and password_profil = '$mdp'";
	$exec = mysqli_query($link,$sql);

	if(mysqli_num_rows($exec)==0)
	{
		echo "erreur";
	}
	else
	{
		session_start();
		//récupérer les infos utiles de l'utilisateur
		$ligne=mysqli_fetch_array($exec);
		$_SESSION['id_profil']=$ligne['id_profil'];
		$_SESSION['mail_profil']=$ligne['mail_profil'];
		$_SESSION['nom_profil']=$ligne['nom_profil'];
		$_SESSION['prenom_profil']=$ligne['prenom_profil'];
		$_SESSION['numero_profil']=$ligne['numero_profil'];
		$_SESSION['droit_profil']=$ligne['droit_profil'];
		header("Location:index.php");
		
	}


}
else
{
echo 'ERREUR! données manquantes';
}
?>
