<?php

include('connect.php');



ob_start();
?>

<page align="center" backtop="5%" backbottom="5%" backleft="5%" backright="5%">
<img src="donnees/logo3.gif" border="0" style="max-width:100%" align="center" />




</page>


<?php
$content = ob_get_clean();
require('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','fr','true','UTF-8');
$pdf->writeHTML($content);
$pdf->Output('arbre.pdf');
?>