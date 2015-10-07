<script language="javascript">
	
	function confirmation()
	{
		if (confirm(" La suppression de cette personne va supprimer l'ensemble des informations la concernant! Désirez-vous réellement supprimer cette personne?"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	</script>	
<div class="contenu">
<div class="left">

<div class="post reload1" id="post_JHCZ3231">
<?php
 
$id=$_GET['id'];

//si suppression
			$mes='';
			if (isset($_GET['supprimer']))
			{	
				/*$mariage=$id/2;
				$sql2="DELETE num_mariage, lieu_mariage, date_mariage FROM tb_mariage WHERE num_mariage='$mariage'";
				mysqli_query($link,$sql2);*/
				
				
				$sql="DELETE FROM tb_monarbre WHERE sosa='$id'";
				mysqli_query($link,$sql);
				header("Location:index.php?page=monarbre&param=1");
			}
			


$sql="SELECT sosa, g, photo, nom, prenom, acte_n, lieu_naissance, DATE_FORMAT(date_naissance,'%d/%m/%Y') AS naissance, acte_m, lieu_mariage, DATE_FORMAT(date_mariage,'%d/%m/%Y') AS mariage, acte_d, lieu_deces, DATE_FORMAT(date_deces,'%d/%m/%Y') AS deces FROM tb_monarbre LEFT JOIN tb_mariage ON mariage = num_mariage WHERE sosa='$id'";
$exec=mysqli_query($link,$sql) ;
	echo '<form action="index.php?page=unepersonne&id='.$id.'&test=1" method="post">';	
while($ligne=mysqli_fetch_array($exec))
{	
	echo '<h2>'.$ligne['nom'].' '.utf8_encode($ligne['prenom']).'</h2>





<p class="post_stat"><span class="post_lvl_nb" ><img src="donnees/naissance.png">'; 
if($ligne['naissance']=='') {echo 'Date inconnue';} 
else { echo 'Le '.$ligne['naissance'].'';} 
if(($ligne['naissance']=='')&&($ligne['lieu_naissance']=='')) {echo ' et ';}
if($ligne['lieu_naissance']=='') {echo 'lieu inconnu</span></p>';} 
else { echo ' à '.utf8_encode($ligne['lieu_naissance']).'</span></p>';} 


echo '<p class="post_stat"><span class="post_lvl_nb" ><img src="donnees/mariage.png">'; 
if($ligne['mariage']=='') {echo 'Date inconnue';} 
else { echo 'Le '.$ligne['mariage'].'';} 
if(($ligne['mariage']=='')&&($ligne['lieu_mariage']=='')) {echo ' et ';}
if($ligne['lieu_mariage']=='') {echo 'lieu inconnu</span></p>';} 
else { echo ' à '.utf8_encode($ligne['lieu_mariage']).'</span></p>';} 


echo '<p class="post_stat"><span class="post_lvl_nb" ><img src="donnees/deces.png">'; 
if($ligne['deces']=='') {echo 'Date inconnue';} 
else { echo 'Le '.$ligne['deces'].'';} 
if(($ligne['deces']=='')&&($ligne['lieu_deces']=='')) {echo ' et ';}
if($ligne['lieu_deces']=='') {echo 'lieu inconnu</span></p>';} 
else { echo ' à '.utf8_encode($ligne['lieu_deces']).'</span></p>';} 




if ($ligne['photo']=="")
{
	echo '<img src="images/profil.png" style="max-width:100%" data-original="/photo/post/490/4030207016356.jpg" class="post_photo link" >';
}
else
{
	echo '<img src="'.$ligne['photo'].'" data-original="/photo/post/490/4030207016356.jpg" style="max-width:100%" class="post_photo link" >';
}
echo '<div class="post_contenu">
<div class="post_level"><strong>SOSA </strong> <b> '.$id.'</b></div>';
if (isset($_SESSION['droit']) == true)
{
	echo '<div class="post_level_change"><img src="donnees/mettreajour.png"><span>METTRE A JOUR</span></div>
	
	
	<form action="index.php?page=unepersonne&id='.$id.'&supprimer=1" method="post">
	<div class="post_level_change"><input type="image" src="donnees/supprimer.png" name="supprimer" onclick="return confirmation()"/><span>SUPPRIMER</span></div>
	</form>';
}
echo '</div>';
}

echo '';

?>
<div class="clear"></div>
<br><div class="post_share">
<div class="post_share_facebook" onclick="PopupShare('https://www.facebook.com/sharer/sharer.php?u=http://geneajnt.net76.net?page=unepersonne&id=<?php echo ''.$id.'';?>')"><img src="donnees/share-facebook.png">Partager sur Facebook</div>
<div class="post_share_twitter" onclick="PopupShare('https://twitter.com/intent/tweet?original_referer=http://geneajnt.net76.net?page=unepersonne&id=<?php echo ''.$id.'';?>;text=Voici un lien que je partage avec vous: http://geneajnt.net76.net')"><img src="donnees/share-twitter.png">Tweet</div>
<div class="clear"></div>


</div>
</div>


<?php
//récupération acte de naissance
$sql="SELECT sosa, sosan, addr FROM tb_monarbre INNER JOIN tb_n ON sosan = sosa WHERE sosa='$id'";
$exec=mysqli_query($link,$sql) ;

echo '<div class="entry-content">';
		$nombre=mysqli_fetch_row($exec);
		if ($nombre!=0) 
		{	echo 'acte de naissance
            <ul class="gallery-items">';
			  $exec=mysqli_query($link,$sql) ;	
			  while($ligne=mysqli_fetch_array($exec))
				{
				echo '<li class="item"> <a href="arbre/'.$ligne['sosa'].'/n/'.$ligne['addr'].'" class="view" rel="gallery"> <span class="overlay zoom"></span> <img src="arbre/'.$ligne['sosa'].'/n/'.$ligne['addr'].'" alt=""> </a> </li>';
                }
				echo '</ul>';
        }
          echo '</div>'; 
?>
<br>
<?php
//récupération acte de mariage
$sql="SELECT sosa, sosam, addr FROM tb_monarbre INNER JOIN tb_m ON sosam = sosa WHERE sosa='$id'";
$exec=mysqli_query($link,$sql) ;

echo '<div class="entry-content">';
		$nombre=mysqli_fetch_row($exec);
		if ($nombre!=0) 
		{	echo 'acte de mariage
            <ul class="gallery-items">';
			  $exec=mysqli_query($link,$sql) ;	
			  while($ligne=mysqli_fetch_array($exec))
				{
				echo '<li class="item"> <a href="arbre/'.$ligne['sosa'].'/m/'.$ligne['addr'].'" class="view" rel="gallery"> <span class="overlay zoom"></span> <img src="arbre/'.$ligne['sosa'].'/m/'.$ligne['addr'].'" alt=""> </a> </li>';
                }
				echo '</ul>';
        }
          echo '</div>'; 
?>
<br>
<?php
//récupération acte de deces
$sql="SELECT sosa, sosad, addr FROM tb_monarbre INNER JOIN tb_d ON sosad = sosa WHERE sosa='$id'";
$exec=mysqli_query($link,$sql) ;

echo '<div class="entry-content">';
		$nombre=mysqli_fetch_row($exec);
		if ($nombre!=0) 
		{	echo 'acte de décès
            <ul class="gallery-items">';
			  $exec=mysqli_query($link,$sql) ;	
			  while($ligne=mysqli_fetch_array($exec))
				{
				echo '<li class="item"> <a href="arbre/'.$ligne['sosa'].'/d/'.$ligne['addr'].'" class="view" rel="gallery"> <span class="overlay zoom"></span> <img src="arbre/'.$ligne['sosa'].'/d/'.$ligne['addr'].'" alt=""> </a> </li>';
                }
				echo '</ul>';
        }
          echo '</div>'; 
?>
</div>
 
    <div class="right">
        <?php include 'statrapide.php';?>
    <br>
	</div>
</div>
