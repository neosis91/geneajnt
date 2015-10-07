<?php 
session_start();
include "connect.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<?php include 'head.php'?>
</head>
<body>
<?php include 'menu.php'?>
<?php

	if (isset($_GET['page']))
	{
		if ($_GET['page']=='carte')
		{
			include 'carte.php';
		}
		if ($_GET['page']=='envoi')
		{
			include 'envoi.php';
		}
		if ($_GET['page']=='monarbre')
		{
			include 'monarbre.php';
		}
		if ($_GET['page']=='personnes')
		{
			include 'personnes.php';
		}
		if ($_GET['page']=='unepersonne')
		{
			include 'unepersonne.php';
		}
		if ($_GET['page']=='profil')
		{
			include 'profil.php';
		}
		if ($_GET['page']=='apropos')
		{
			include 'apropos.php';
		}
		if ($_GET['page']=='messagerie')
		{
			include 'messagerie.php';
		}
		if ($_GET['page']=='lire')
		{
			include 'lire.php';
		}
		if ($_GET['page']=='supprimermessage')
		{
			include 'supprimermessage.php';
		}
		if ($_GET['page']=='nouveaumessage')
		{
			include 'nouveaumessage.php';
		}
		
	}
	else
	{
		if (isset($_SESSION['droit']) == true)
		{
			include 'reconnu.php';
		}
		else
		{
			include 'accueil.php';
		}
	}
	
?>


<div class="clear"></div>
<div class="footer_outside">
	<div class="footer">
    	<div class="footer_social">
        	<a href="https://www.facebook.com/bertrandjt" target="_blank"><img src="donnees/icon-facebook.png"></a>
            <a href="https://twitter.com/Bertrand_Jnt" target="_blank"><img src="donnees/icon-twitter.png"></a>
        </div>
    	<div class="footer_link1">
            <a href="index.php">geneajnt</a><a href="#">Contact</a>
        </div>
        <div class="footer_link2">
            <span>2012 - 2014 geneajnt.net76.net, Tout droit réservé</span>
        </div>
    </div>
</div>
<span id="hide_load"></span>


<div id="tiptip_holder" style="max-width:auto;"><div id="tiptip_arrow"><div id="tiptip_arrow_inner"></div></div><div id="tiptip_content"></div></div><div style="width: 100%; border: 0px none; padding: 0px; margin: 0px; background: none repeat scroll 0% 0% rgb(0, 0, 0); opacity: 0.78; z-index: 1099; position: fixed; top: 0px; left: 0px; height: 900px; display: none;" onclick="closePopup(300)" class="blockModalPopupDiv" id="blockModalPopupDiv"></div></body></html>