<div class="block_menu">
        <a href="#" class="m_titre"><img src="donnees/icon-top.png">STATISTIQUES</a>
        <div class="m_top_membre">
        	                
							
                 <?php
				 
				$sql="SELECT COUNT(*) AS TOTAL FROM tb_monarbre";
				
				$exec=mysqli_query($link,$sql);
				while($ligne=mysqli_fetch_array($exec))
				{  
					echo '
				  <table><tr><td><b class="m_top_membre_ligne_pos pos1">'.$ligne['TOTAL'].'</b></td><td><h2>PERSONNES</h2></td></tr>';
				}
                ?> 
				
				 <?php
				
				$sql="SELECT COUNT( sosa ) AS HOMME
				FROM tb_monarbre
				WHERE sosa %2 =0";
				
				$exec=mysqli_query($link,$sql);
				while($ligne=mysqli_fetch_array($exec))
				{  
					echo '
				<tr><td><b class="m_top_membre_ligne_pos pos1">'.$ligne['HOMME'].'</b></td><td><h2>HOMMES</h2></td></tr>';
				}
                ?> 
				
				 <?php
				
				$sql="SELECT COUNT( sosa ) AS FEMME
				FROM tb_monarbre
				WHERE sosa %2 =1";
				
				$exec=mysqli_query($link,$sql);
				while($ligne=mysqli_fetch_array($exec))
				{  
					echo '
				  <tr><td><b class="m_top_membre_ligne_pos pos1">'.$ligne['FEMME'].'</b></td><td><h2>FEMMES</h2></td></tr></table>';
				}
                ?> 


				
			      
        </div>
    </div>