$(document).ready(function()
{$('.succes_notif').delay(300).slideDown(500);$('.erreur_notif').delay(300).slideDown(500);DisplayVignetteDroite();$(function(){$(".vignette_badge").tipTip({defaultPosition:"bottom",maxWidth:"auto",edgeOffset:-70,delay:250});$(".profil_droite_fans_liste a").tipTip({defaultPosition:"bottom",maxWidth:"auto",edgeOffset:-8,delay:250});});$(function(){$(".post_photo").lazyload({threshold:1000});});$(document).click(function(e){if(plus_is_open==true&&$("#plus").is(":hover")==false&&$(".topbarre2_plus_menu").is(":hover")==false)
{OpenPlus(0);}});$('.topbarre2_plus_menu').click(function(){if(plus_is_open==true)
{OpenPlus(0);}
else
{OpenPlus(1);}});TopbarreFixe();$(function(){$(window).scroll(function(){TopbarreFixe();});});});function RechercheShow()
{$('#recherche_bouton_fake').hide(0);$('#recherche_bouton').show(0);$('#recherche_champs').show(0);$('#recherche_champs').animate({width:"120px",paddingLeft:"10px"},500)}
function DisplayVignetteDroite()
{var nb_vignette_droite_a_afficher=Math.round(($(document).height()- 500)/190);for(var i=0;i<nb_vignette_droite_a_afficher;i++)
{$('#vignette_droite_'+ i).show(0);}}
function OpenProfilMenu()
{$('.topbarre_profil_menu').slideToggle(120);}
function ClickOnLien(indexItem)
{window.location.href=indexItem;}
function OpenConnexionMenu()
{$('.topbarre_connect div').slideToggle(120);}
function ShowReponse(id)
{$('#r'+ id).slideToggle(280);}
function LoadHome()
{$('#block_buzz_plus').slideUp(250);$('#load_home').load('/load.home.php');setTimeout(function(){DisplayVignetteDroite();},6000);}
function UploadChangeType(type)
{if(type=='image')
{$('#upload_lien_type').slideUp(280);$('#upload_lien_image').slideDown(280);$('#upload_lien_youtube').slideUp(280);$('#upload_lien_vine').slideUp(280);}
else if(type=='youtube')
{$('#upload_lien_type').slideUp(280);$('#upload_lien_image').slideUp(280);$('#upload_lien_youtube').slideDown(280);$('#upload_lien_vine').slideUp(280);}
else if(type=='vine')
{$('#upload_lien_type').slideUp(280);$('#upload_lien_image').slideUp(280);$('#upload_lien_youtube').slideUp(280);$('#upload_lien_vine').slideDown(280);}
else
{$('#upload_lien_type').slideDown(280);$('#upload_lien_image').slideUp(280);$('#upload_lien_youtube').slideUp(280);$('#upload_lien_vine').slideUp(280);}
$('#type').val(type);}
function PopinSwitchConnexionInscription(bool)
{if(bool==1)
{$('#popin_inscription').slideUp(250);$('#popin_connexion').slideDown(250);}
else
{$('#popin_inscription').slideDown(250);$('#popin_connexion').slideUp(250);}}
function Popin(url,type)
{var align='center';var backgroundColor='#FFFFFF';var borderColor='#DDD';var borderWeight=0;var borderRadius=7;var fadeOutTime=300;var disableColor='#000000';var disableOpacity=78;var loadingImage='/design/loading.gif';var source=url;var top=35;var padding=5;var width=700;if(type=='connexion')
{var top=60;var width=400;}
if(type=='upload')
{var top=40;var width=560;}
if(type=='notif')
{var top=60;var width=460;}
if(type=='post')
{var top=20;var width=860;}
if(type=='wholike')
{var top=40;var width=700;}
modalPopup(align,top,width,padding,disableColor,disableOpacity,backgroundColor,borderColor,borderWeight,borderRadius,fadeOutTime,source,loadingImage);}
function EnvoiFormulaire()
{$('#chargement').show();$('.upload_lien_fichier').hide();$('.bouton').hide();$('#formulaire').show(0,function(){document.formulaire.submit();});}
function PopupShare(url)
{var win=window.open(url,'Partager','width=700,height=400,status=0,toolbar=0');}
function Voter(url,value,cle_session)
{if(cle_session=='')
{Popin('/pop.connexion.php','connexion');}
else
{if(value==1)
{$('#'+ url+'_level_up').addClass('phlc_select_up');$('#'+ url+'_level_down').removeClass('phlc_select_down');}
else
{$('#'+ url+'_level_up').removeClass('phlc_select_up');$('#'+ url+'_level_down').addClass('phlc_select_down');}
$('#'+ url+'_level').load('/load.vote.php?url='+url+'&value='+value+'&cle_session='+cle_session);}}
function Follow(url,cle_session)
{$('#hide_load').load('/load.follow.php?url='+url+'&cle_session='+cle_session);}
function SupprimerPost(url,page_post)
{if(confirm("Es-tu sûr de vouloir supprimer ce post ?"))
{$('#hide_load').load('/load.supprimer.php?url='+url);if(page_post)
{alert('Ton post a été effacé !');}
else
{$('#post_'+ url+'').slideUp(1000);}}}
function ShowGif(url,play)
{if(play==1)
{$('#'+ url+'_gif_fixe').hide(0);$('#'+ url+'_gif_anime').show(0);}
else
{$('#'+ url+'_gif_fixe').show(0);$('#'+ url+'_gif_anime').hide(0);}}
var nb_reload=1;var buzz_plus_is_page_suivante=false;function BuzzPlus(post_nb_reload,post_par_page,contenu_total,page_actuelle,url_pagination)
{nb_reload=nb_reload+ 1;var calcul_max=(page_actuelle- 1)*post_par_page+(post_par_page/post_nb_reload*nb_reload);if(calcul_max>=contenu_total)
{$('#block_buzz_plus').slideUp(500);var block_next_page=true;}
if(nb_reload>post_nb_reload)
{var next_page=page_actuelle+ 1;window.location.replace(url_pagination+ next_page);}
else
{$('.reload'+ nb_reload).slideDown(500);if(post_nb_reload==nb_reload)
{buzz_plus_is_page_suivante=true;$('#block_buzz_plus strong').text('Page suivante');$('#block_buzz_plus img').attr("src","/design/icon-fleche-right-w.png");}}
setTimeout(function(){DisplayVignetteDroite();},1000);}
function AutoLoad()
{scrollTopCur=$(document).scrollTop();if(($(document).height()- scrollTopCur)<2000&&buzz_plus_is_page_suivante==false)
{BuzzPlus(post_nb_reload,post_par_page,contenu_total,page_actuelle,url_pagination);}}
function HotLevel(id_POST,bool)
{if(bool==true)
{$('#hide_load').load('/load.hotlevel.php?id_POST='+ id_POST+'&type=oui');}
else
{$('#hide_load').load('/load.hotlevel.php?id_POST='+ id_POST+'&type=non');}
$('#admin'+ id_POST).hide(250);}
function TopbarreFixe()
{scrolltop=Scroll();var topbarre_top=50- scrolltop;if(topbarre_top<=0)topbarre_top=0;$('#topbarre2_out').css('top',topbarre_top+'px');if(scrolltop>=50)
{$('.topbarre2_hide').show(100);}
else
{$('.topbarre2_hide').hide(100);}
if(plus_is_open==true)OpenPlusMarginTop();}
var plus_is_open=false;function OpenPlus(bool)
{if(bool==1)
{$('.topbarre2_plus_menu').addClass('topbarre2_plus_menu_hover');var hauteur_plus=HauteurEcran()- 100;$('#plus').css('height',hauteur_plus+'px');$('#plus').slideDown(250);OpenPlusMarginTop();plus_is_open=true;}
else
{$('.topbarre2_plus_menu').removeClass('topbarre2_plus_menu_hover');$('#plus').slideUp(250);plus_is_open=false;}}
function WhoLike(url,bool)
{if(bool==1)
{Popin('/pop.wholike.php?post='+ url+'&vote=oui','wholike');}
else
{Popin('/pop.wholike.php?post='+ url+'&vote=non','wholike');}}
function OpenPlusMarginTop()
{scrolltop=Scroll();var topbarre_top=50- scrolltop;topbarre_top=topbarre_top+ 40;if(topbarre_top<=40)topbarre_top=40;$('#plus').css('top',topbarre_top+'px');var LargeurEcran=$(window).width();var topbarre_left=-500;if(LargeurEcran<1020)
{topbarre_left=topbarre_left+((1020- LargeurEcran)/2);}
$('#plus').css('margin-left',topbarre_left+'px');}
function LoadComment(url)
{$('#post_comment_'+ url).load('/load.comment.php?url='+ url);$('#post_show_comment_'+ url).hide(0);$('#post_comment_'+ url).show(0);}
function Scroll()
{var scroll_top=$(document).scrollTop();if(scroll_top<0)scroll_top=0;return scroll_top;}
function HauteurEcran()
{return $(window).height();}