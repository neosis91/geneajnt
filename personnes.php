<div class="contenu">
								
                <h2>Ajouter une personne</h2></br>
				
				<?php
				$mes='';
				if (isset($_POST['ajouter']))
				{		
					if((!empty($_POST['nom'])) && (!empty($_POST['prenom'])) && (!empty($_POST['sosa'])))
					{
						$sosa=$_POST['sosa'];
						$binsosa=decbin($sosa);
						$generation=strlen($binsosa);
						$num_mariage=floor($sosa/2);
						$nom= strtoupper($_POST['nom']);
						$prenom= $_POST['prenom'];
						$lieu1=strtoupper($_POST['lieu1']);
						$date1=$_POST['date1'];
						$lieu2=strtoupper($_POST['lieu2']);
						$date2=$_POST['date2'];
						$lieu3=strtoupper($_POST['lieu3']);
						$date3=$_POST['date3'];
										
						
						
						$sql="INSERT INTO tb_monarbre (sosa, g, nom, prenom, lieu_naissance, date_naissance, lieu_deces, date_deces, mariage)
						VALUES ('$sosa', '$generation', '$nom', '$prenom', '$lieu1', '$date1', '$lieu3', '$date3', '$num_mariage')";
						mysqli_query($link,$sql);
						
						$sql2="INSERT INTO tb_mariage (num_mariage, lieu_mariage, date_mariage)
						VALUES ('$num_mariage', '$lieu2', '$date2')";
						mysqli_query($link,$sql2);
					
					}
					else
					{
						 $mes = 'Données manquantes' ;
					}
				if ($mes!='') echo '<p class="alert">'.$mes.'</p>' ;
				}
				
				
				echo '<center><table><center>
						<form action="index.php?page=personnes" method="post">						
						<tr class="sautligne">
						<td><center><input placeholder="Sosa" type="text" name="sosa" size="10"></center></td>
						<td><center><input placeholder="Nom" type="text" name="nom" maxlength=255></center></td>
						<td><center><input placeholder="Prénom" type="text" name="prenom" maxlength=255></center></td>
						<td><center><input placeholder="Naissance (aaaa-mm-jj)" type="date" name="date1"></center></td>
						<td><center><input placeholder="Mariage (aaaa-mm-jj)" type="date" name="date2"></center></td>
						<td><center><input placeholder="Décès (aaaa-mm-jj)" type="date" name="date3"></center></td>
						<td rowspan=2><center><input class="topbarre_envoi" type="submit" name="ajouter" value="Ajouter"></center></td>
											
						<tr class="sautligne">
						<td></td>
						<td></td>
						<td></td>
						<td><center><input placeholder="Lieu de la naissance" type="text" name="lieu1" maxlength=255></center></td>
						<td><center><input placeholder="Lieu du mariage" type="text" name="lieu2" maxlength=255></center></td>
						<td><center><input placeholder="Lieu du décès" type="text" name="lieu3" maxlength=255></center></td>
						</form>
						
						
						</center></table></center>
						';
				?>	
					
					<h2>Mon arbre</h2>
                    <p>Actes disponibles: <img src="images/v.PNG" border="0"></p>
				<p>Actes non-disponibles: <img src="images/x.PNG" border="0"></p>
					<center>
								
				<?php
					 
					$sql="SELECT sosa, g, nom, prenom, acte_n, lieu_naissance, date_naissance, acte_m, lieu_mariage, date_mariage, acte_d, lieu_deces, date_deces FROM tb_monarbre LEFT JOIN tb_mariage ON mariage = num_mariage  ORDER BY sosa";
					$exec=mysqli_query($link,$sql) ;
					echo '<table><center>
						<tr class="sautligne">
						<th>SOSA</th>
						<th>Generation</th>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Acte N</th>
						<th>Lieu de naissance</th>
						<th>Date de naissance</th>
						<th>Acte M</th>
						<th>Lieu de mariage</th>
						<th>Date du mariage</th>
						<th>Acte D</th>
						<th>Lieu du deces</th>
						<th>Date du deces</th>
						</tr>';
					while($ligne=mysqli_fetch_array($exec))
					{
							echo '<tr class="sautligne">
      <td><center>'.$ligne['sosa'].'</center></td>
      <td><center>G'.$ligne['g'].'</center></td>
      <td><center>'.utf8_encode($ligne['nom']).'</center></td>
      <td><center>'.utf8_encode($ligne['prenom']).'</center></td>';

if ($ligne['acte_n']=="")
       {
       echo'<td><center><img src="images/x.PNG" border="0"></center></td>';
       }
else
       {      
       echo '<td><center><a href="'.$ligne['acte_n'].'"><img src="images/v.PNG" border="0"></a></center></td>';
       }

      echo '<td><center><a href="https://maps.google.fr/maps?daddr='.utf8_encode($ligne['lieu_naissance']).'" target="_blank">'.utf8_encode($ligne['lieu_naissance']).'</a></center></td>
      <td><center>'.$ligne['date_naissance'].'</center></td>';

if ( $ligne['acte_m']=="")
     {
      echo '
      <td><center><img src="images/x.PNG" border="0"></center></td>';
     }
else
     {
      echo '<td><center><a href="'.$ligne['acte_m'].'"><img src="images/v.PNG" border="0"></a></center></td>';
     }

      echo '<td><center><a href="https://maps.google.fr/maps?daddr='.utf8_encode($ligne['lieu_mariage']).'" target="_blank">'.utf8_encode($ligne['lieu_mariage']).'</a></center></td>
      <td><center>'.$ligne['date_mariage'].'</center></td>';

if ( $ligne['acte_d']=="")
     {
      echo '<td><center><img src="images/x.PNG" border="0"></center></td>';
     }
else
     {
      echo '<td><center><a href="'.$ligne['acte_d'].'"><img src="images/v.PNG" border="0"></a></center></td>';
     }

     echo' <td><center><a href="https://maps.google.fr/maps?daddr='.utf8_encode($ligne['lieu_deces']).'" target="_blank">'.utf8_encode($ligne['lieu_deces']).'</a></center></td>
      <td><center>'.$ligne['date_deces'].'
	
	  
	  
	  
	  
	  </center></td>
      </tr>';
							
					}
				?>
				</br>
				</table>
				</center>
</div>