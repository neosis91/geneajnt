<div class="contenu">
<div id="arbre">
		
		<?php 
				$param=$_GET['param'];
				$paramsosa=intval($param);
				$paraminferieur=intval($param)/2;
		if($paraminferieur<=1)
		{
		1;
		}
		else
		{
		$paraminferieur;
		}
		
		
		//recuperation des info
		 
        /* 1 er */ 
		        $exec1 = mysqli_query($link,"SELECT sosa, g, photo, nom, prenom, acte_n, lieu_naissance, date_naissance, acte_m, lieu_mariage, date_mariage, acte_d, lieu_deces, date_deces FROM tb_monarbre LEFT JOIN tb_mariage ON mariage = num_mariage WHERE sosa='$paramsosa' ORDER BY sosa;");
		/* 2 eme */ 
				$numsosa2=intval($paramsosa)*2;
				$numsosa3=intval($paramsosa)*2+1;
				$exec2 = mysqli_query($link,"SELECT sosa, g, nom, photo, prenom, acte_n, lieu_naissance, date_naissance, acte_m, lieu_mariage, date_mariage, acte_d, lieu_deces, date_deces FROM tb_monarbre LEFT JOIN tb_mariage ON mariage = num_mariage WHERE sosa='$numsosa2' OR sosa='$numsosa3'  ORDER BY sosa;");
        /* 3 eme */ 
		        $numsosa4=intval($numsosa2)*2;
				$numsosa5=intval($numsosa2)*2+1;
				$numsosa6=intval($numsosa3)*2;
				$numsosa7=intval($numsosa3)*2+1;
				$exec3 = mysqli_query($link,"SELECT sosa, g, photo, nom, prenom, acte_n, lieu_naissance, date_naissance, acte_m, lieu_mariage, date_mariage, acte_d, lieu_deces, date_deces FROM tb_monarbre LEFT JOIN tb_mariage ON mariage = num_mariage WHERE sosa='$numsosa4' OR sosa='$numsosa5' OR sosa='$numsosa6' OR sosa='$numsosa7' ORDER BY sosa;");
		?>
				
                    <center><table><center>
				<tr>
				<?php
				/*
				récupération des informations pour les grands-parents de la première personne.
				*/
					while($ligne=mysqli_fetch_array($exec3))
					{
						
						echo '
							<th align="center"><a href="index.php?page=monarbre&param='.$ligne['sosa'].'"><img src="images/fleche-haut.png" border="0" style="max-width:100%" /></a></br>
							<a href="index.php?page=monarbre&param='.$ligne['sosa'].'">Monter d\'une génération</a></br>
						
						
		
						
						
							</center></br>'.$ligne['sosa'].' ';
							if ($ligne['photo']=="")
							{
							echo '<img src="images/profil.png" style="max-width:100%" /><a href="index.php?page=unepersonne&id='.$ligne['sosa'].'" ><img src="donnees/topbarre2_plus_menu-icon.png"></a>     ';
							}
							else
							{
							echo '<img src="'.$ligne['photo'].'" style="max-width:100%" /><a href="index.php?page=unepersonne&id='.$ligne['sosa'].'" ><img src="donnees/topbarre2_plus_menu-icon.png"></a>     ';
							}
							
							echo '</br>
							<a href="index.php?page=monarbre&param='.$ligne['sosa'].'">'.utf8_encode($ligne['nom']).'</br>'.utf8_encode($ligne['prenom']).'</a></br>';
							
							
						
						if ($ligne['date_naissance']=="")
						{
						echo '????-??-??';
						}
						else
						{      
						echo $ligne['date_naissance'];
						}
						
						echo ' - ';
						
						if ($ligne['date_deces']=="")
						{
						echo '????-??-??';
						}
						else
						{      
						echo $ligne['date_deces'];
						}
											
						echo '</th>';
					}
				?>
				</tr>
				
				<tr>
				<?php
				/*
				récupération des informations pour les parents de la première personne.
				*/
					while($ligne=mysqli_fetch_array($exec2))
					{
					
						echo '<center> 
							<th align="center" colspan="2">'.$ligne['sosa'].' ';
							if ($ligne['photo']=="")
							{
							echo '<img src="images/profil.png" style="max-width:100%" /><a href="index.php?page=unepersonne&id='.$ligne['sosa'].'" ><img src="donnees/topbarre2_plus_menu-icon.png"></a>';
							}
							else
							{
							echo '<img src="'.$ligne['photo'].'" style="max-width:100%" /><a href="index.php?page=unepersonne&id='.$ligne['sosa'].'" ><img src="donnees/topbarre2_plus_menu-icon.png"></a>';
							}
							
							
							echo '</br>
							<a href="index.php?page=monarbre&param='.$ligne['sosa'].'">'.utf8_encode($ligne['nom']).'</br>'.utf8_encode($ligne['prenom']).'</a></br>';
							
							
							if ($ligne['date_naissance']=="")
						{
						echo '????/??/??';
						}
						else
						{      
						echo $ligne['date_naissance'];
						}
						
						echo ' - ';
						
						if ($ligne['date_deces']=="")
						{
						echo '????/??/??';
						}
						else
						{      
						echo $ligne['date_deces'];
						}
											
						echo '</th> 
							
							</center>' ;
					}
				?>
				</tr>
				
				<tr>
				<?php
				
				/*
				récupération des informations pour la premiere personne.
				*/
					
					
					while($ligne=mysqli_fetch_array($exec1))
					{
					
						echo '<center> 
							<th align="center" colspan="4">'.$ligne['sosa'].' ';
							if ($ligne['photo']=="")
							{
							echo '<img src="images/profil.png" style="max-width:100%" /><a href="index.php?page=unepersonne&id='.$ligne['sosa'].'" ><img src="donnees/topbarre2_plus_menu-icon.png"></a>';
							}
							else
							{
							echo '<img src="'.$ligne['photo'].'" style="max-width:100%" /><a href="index.php?page=unepersonne&id='.$ligne['sosa'].'" ><img src="donnees/topbarre2_plus_menu-icon.png"></a>';
							}
							
							
							echo '</br>
							<a href="index.php?page=monarbre&param='.$ligne['sosa'].'">'.utf8_encode($ligne['nom']).'</br>'.utf8_encode($ligne['prenom']).'</a></br>';
							
							if ($ligne['date_naissance']=="")
						{
						echo '????/??/??';
						}
						else
						{      
						echo $ligne['date_naissance'];
						}
						
						echo ' - ';
						
						if ($ligne['date_deces']=="")
						{
						echo '????/??/??';
						}
						else
						{      
						echo $ligne['date_deces'];
						}
											
						echo '</br></br>';
						if(isset($_GET['param']))
						{
							if ($_GET['param']==1)
							{
								echo '</th></center>' ;
							}
							else
							{
								echo '<a href="index.php?page=monarbre&param=';
								if($paraminferieur<=1)
								{
									echo '1';
								}
								else
								{
									echo $paraminferieur;
								}
								
									
									
								echo '">Descendre d\'une génération</a></br>
									
									
								<a href="index.php?page=monarbre&param=';
								if($paraminferieur<=1)
								{
									echo '1';
								}
								else
								{
									echo $paraminferieur;
								}						
								
								
								echo '"><img src="images/fleche-bas.png" border="0" style="max-width:100%" /></th></center>' ;
									
								$personne=$ligne['sosa'];
							}
							
						}
					}
				?>
				</tr>
				</br></center>
				</table></center>
        </div>
		</div>