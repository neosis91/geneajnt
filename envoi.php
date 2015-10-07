<div class="contenu">
	<center><form method="POST" action="upload.php" enctype="multipart/form-data">
	<br><br>Votre document est : 
	<input type="radio" name="document" value="n"> un acte de naissance
	<input type="radio" name="document" value="m"> un acte de mariage
	<input type="radio" name="document" value="d"> un acte de décès
	<input type="radio" name="document" value="profil"> la photo d'une personne<br><br><br>
	
	Quelle est la personne concernée par ce document?
	<br><br>
	<?php
	$sql="SELECT sosa, nom, prenom FROM tb_monarbre ORDER BY sosa";
	$exec=mysqli_query($link,$sql);				
	echo '<select name="personne">';
	while($ligne=mysqli_fetch_array($exec))
	{
	echo '<option value="'.$ligne['sosa'].'">'.$ligne['sosa'].' - '.utf8_encode($ligne['nom']).' '.utf8_encode($ligne['prenom']).'<option>';
	}
	echo '</select>';
	?>
	<br><br><br>

	Fichier : <input type="file" name="avatar">
	<br><br><br><input type="submit" name="envoyer" value="Envoyer le fichier"><br><br>
	</form></center>
</div>