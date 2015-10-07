<div class="contenu">
<div class="left">


<?php
 

			if (isset($_POST['nom']))
			{	
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$date = $_POST['date'];
				$mail = $_POST['mail'];
				$num = $_POST['num'];
				$id=$_SESSION['identifiant'];
				
				
					
				$sql="UPDATE tb_utilisateur set nom='$nom', prenom='$prenom', datenaissance='$date', mail='$mail', numero='$num' WHERE identifiant=$id";
				
				$inserer = mysqli_query($link,$sql);
				if (!mysqli_query($link,$sql)) $mes = 'Echec dans la mise à jour' ;
				else
				{
					$headers ='From: "geneajnt"<geneajnt@nepasrepondre.fr>'."\n";
					$headers .='Content-Type: text/plain; charset="utf-8"'."\n";
					$headers .='Content-Transfer-Encoding: 8bit'."\n";
					$sujet = "Changement de vos donnees personnelles - geneajnt.net76.net";
					$message = "Bonjour $nom $prenom,


								Suite à votre demande, la modification de vos données a été effectuée.
								
								Pour rappel, voici vos informations:
								nom:$nom
								prénom:$prenom
								date de naissance:$date
								mail:$mail
								numero:$num
								
								Veuillez ne pas répondre à ce message envoyé automatiquement.


								Cordialement,

																geneajnt.net76.net";

					 if ($envoie = mail($mail, $sujet, $message , $headers))
					 {
						$mes = 'Un mail vous a été envoyé pour vous confirmer la modification de vos données.';
					 }
					
					 
				 }
						
					
				
				
				if ($mes!='') echo '<p class="alert">'.$mes.'</p>' ;
			}
			
			
			
			
			if (isset($_POST['ancien']))
			{	
				
				$ancien = sha1($_POST['ancien']);
				$nouveau = $_POST['nouveau'];
				$shanouveau = sha1($_POST['nouveau']);
				$renouveau = $_POST['renouveau'];
				$id=$_SESSION['identifiant'];
				$nom=$_SESSION['nom'];
				$prenom=$_SESSION['prenom'];
				
				$sql="SELECT password FROM tb_utilisateur WHERE identifiant=$id";
				$exe=mysqli_fetch_array(mysqli_query($link,$sql));
				if ($exe['password']==$ancien)
				{
					if($nouveau==$renouveau)
					{
						$sql="UPDATE tb_utilisateur set password='$shanouveau' WHERE identifiant=$id";
						$exe=mysqli_query($link,$sql);
						echo 'Votre message a bien été envoyer';
						
						$headers ='From: "geneajnt"<geneajnt@nepasrepondre.fr>'."\n";
						$headers .='Content-Type: text/plain; charset="utf-8"'."\n";
						$headers .='Content-Transfer-Encoding: 8bit'."\n";
						$sujet = "Changement de votre mot de passe - geneajnt.net76.net";
						$message = "Bonjour $nom $prenom,


								Suite à votre demande, la modification de votre mot de passe a été effectué.
								
								Pour rappel, voici votre mot de passe:
								Mot de passe: $nouveau
								
								
								Veuillez ne pas répondre à ce message envoyé automatiquement.


								Cordialement,

																geneajnt.net76.net";

					 if ($envoie = mail($mail, $sujet, $message , $headers))
					 {
						$mes = 'Un mail vous a été envoyé pour vous confirmer la modification de vos données.';
					 }
						
						
						
					}
					else
					{
						echo 'La re-saisie de votre nouveau mot de passe ne correspond pas';
					}
					
					
				}
				else
				{
					echo 'Votre mot de passe actuel n\'est pas valide!';
				}
				
			}




echo '<h2>Modifier vos informations</h2><br>';

$id=$_SESSION['identifiant'];
$sql="SELECT identifiant, nom, prenom, password, mail, numero, droit, datenaissance 
FROM tb_utilisateur 
WHERE identifiant='$id'";

$exec=mysqli_query($link,$sql) ;
while ($ligne=mysqli_fetch_array($exec))
{
	
	
	echo '<form action="index.php?page=profil" name="formulaire_modifier" method="post">
			<input class="topbarre_upload" type="submit" name="modifier" value="Modifier vos informations">
			<input style="background-image:url(donnees/personne.png);" placeholder="Nom" name="nom" class="champs_log" maxlength="60" type="text" value="'.$ligne['nom'].'">
			<input style="background-image:url(donnees/personne.png);" placeholder="Prénom" name="prenom" class="champs_log" maxlength="60" type="text" value="'.$ligne['prenom'].'">
			<input style="background-image:url(donnees/calendrier.png);" placeholder="Date de naissance" name="date" class="champs_log" maxlength="60" type="date" value="'.$ligne['datenaissance'].'">
			<input style="background-image:url(donnees/mail.png);" placeholder="Mail" name="mail" class="champs_log" maxlength="60" type="mail" value="'.$ligne['mail'].'">
			<input style="background-image:url(donnees/telephone.png);" placeholder="Numéro de téléphone" name="num" class="champs_log" maxlength="60" type="text" value="'.$ligne['numero'].'">
			</form>';

}

echo '<br><br><br>
<h2>Modifier votre mot de passe</h2>
<br>
		<form action="index.php?page=profil" name="formulaire_modifier" method="post">
			<input class="topbarre_upload" type="submit" name="modifier" value="Modifier votre mot de passe">
			<input style="background-image:url(donnees/etoile.png);" placeholder="Mot de passe actuel" name="ancien" class="champs_log" maxlength="60" type="password" value="'.$ligne['nom'].'">
			<input style="background-image:url(donnees/cadenas.png);" placeholder="Nouveau mot de passe" name="nouveau" class="champs_log" maxlength="60" type="password" value="'.$ligne['prenom'].'">
			<input style="background-image:url(donnees/fleche.png);" placeholder="Retaper le mot de passe" name="renouveau" class="champs_log" maxlength="60" type="password" value="'.$ligne['prenom'].'">
			
			</form>';?>


</div>
</div>