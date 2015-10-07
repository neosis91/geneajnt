<body>

<!-- header start -->
<header>
  <div class="container clearfix">
    <div class="chat_box">
  <div class="chat_head">Vos contacts</div>
  <div class="chat_body"> 
  <div class="user"> Mathieu Visintin</div>
  <div class="user"> Kader Raimy</div>
  <div class="user"> Bot1 Quivoulaitdelatune</div>
  </div>
  </div>
    <div class="row">
        <div class="navbar navbar_">
           <? include("chat.php");?>
          <div class="container">
            <h1 class="brand brand_"><a href="index.php"><img class="logo" src="img/logo.png"> </a></h1>
            <div class="nav-collapse nav-collapse_  collapse">
              <ul class="nav sf-menu">
                <li class="active"><img class="navimg" src="<?php echo utf8_encode($_SESSION['image_profil']);?>"></li>
                <li class="active"><a href="index.php">Accueil</a></li>
                <li class="active"><a href="#"><i class="fa fa-fw fa-comments-o"></i></a></li>
                <li class="active"><a href=""><i class="fa fa-fw fa-heart-o"></a></i></li>
                <li class="active"><a href="deconnecter.php">Déconnexion</a></li>
              </ul>
            </div>
          </div>

  <div class="msg_box" style="left:255px">
  <div class="msg_head">Mathieu Visintin
  <div class="close">&cross;</div>
  </div>
  <div class="msg_wrap">
    <div class="msg_body">
      <?php
      echo file_get_contents("chat.txt");
      ?> 
      <div class="msg_push"></div>

      <form method="post" action="#">

      </form>

    </div>
  <div class="msg_footer"><textarea class="msg_input" rows="4"></textarea></div>
</div>
</div>
</header>


<?php include('/functions/heure.php');?>

<div class="bg-content">
  <!--  content  -->
  <div id="content">
    <div class="ic"></div>
    <div class="container">
      <div class="row">
        <article class="span8">
          <div class="inner-1">
            <div class="poststatut">
            
              <form id="statuts" action="index.php?linkeway=statut" method="POST" accept-charset="utf-8" >
              <input class="" type="text" name="intitule" placeholder="Intitulez votre statut...">
              <textarea name="statut" placeholder="Exprimez-vous..."></textarea>
              
            </div>
            <div class="barrestatut">
              <a href="#" class="fa fa-fw fa-camera"></a>
              <a href="#" class="fa fa-fw fa-picture-o"></a>
              <a href="#" class="fa fa-fw fa-user"></a>
              <input class="btn btn-1 boutonstatut" name="publier" value="Publier" type="submit"></input>
              
            </div>
            </form>
            <div class="statutbottom"></div>
            <ul class="list-blog">

              <?php
              /* Début des commentaires*/
                // On récupère les 20 derniers statuts stockés dans la BDD
                $sql="SELECT id_article,nom_profil,prenom_profil,image_profil,COUNT(article_commentaire) AS nombre_commentaire,titre_article,texte_article,url_article,youtube_article,date_article FROM lw_article LEFT JOIN lw_profil ON id_profil=auteur_article LEFT JOIN lw_commentaire ON id_article = article_commentaire GROUP BY id_article ORDER BY date_article DESC LIMIT 0, 20";
                while($donnees=mysqli_fetch_array(mysqli_query($link,$sql)))
                {
                  $article=$donnees['id_article'];
                  
                echo '<li>
                  <div class="name-author"><img class="imgart" src="'.$donnees['image_profil'].'"></i> <a href="#">'.$donnees['prenom_profil'].' '.$donnees['nom_profil'].'</a></div>
                  <time datetime="'.heurecommentaires(strtotime($donnees['date_article'])).'" class="date-1"><i class="fa fa-fw fa-calendar"></i> '.heurecommentaires(strtotime($donnees['date_article'])).'</time>
                  <a href="#" class="comments"><i class="fa fa-fw fa-comment"></i> '.$donnees['nombre_commentaire'].' commentaires</a>
                  <div class="clear"></div>';
                  if($donnees['titre_article'])
                  {
                    echo '<h3>'.$donnees['titre_article'].'</h3>';
                  }
                    echo '<p>'.$donnees['texte_article'].'</p>';
                  if($donnees['url_article'])
                  {
                    echo '<img alt="" src="'.$donnees['url_article'].'">';
                  }
                  else{
                    if($donnees['youtube_article'])
                    {
                      echo '<iframe class="iframeyoutube" src="https://www.youtube.com/embed/'.$donnees['youtube_article'].'" frameborder="0" allowfullscreen></iframe>';
                    }
                  } 

                  //Récupération des commentaires qui sont stockés dans la BDD
                  $sql2="SELECT * FROM (SELECT id_commentaire,auteur_commentaire,texte_commentaire,date_commentaire,image_profil,nom_profil,prenom_profil FROM lw_commentaire LEFT JOIN lw_profil ON auteur_commentaire=id_profil WHERE article_commentaire=".$article." ORDER BY date_commentaire DESC LIMIT 0, 5) as truc ORDER BY date_commentaire ASC";
                  while($donnees2=mysqli_fetch_array(mysqli_query($link,$sql2)))
                  {
                    echo '
                    <div class="lescommentaires"><img class="commentsimg" src="'.$donnees2['image_profil'].'">
                      <div class="lecommentaire"><a href="#">'.$donnees2['prenom_profil'].' '.$donnees2['nom_profil'].'  </a>'.$donnees2['texte_commentaire'].'</div>          
                    <div class="datecommentaire">'.heurecommentaires(strtotime($donnees2['date_commentaire'])).'</div>
                    </div>';
                  }                                   
                  echo'
                  <form id="commenter" action="index.php?linkeway=commentaire" method="POST" >
                  <div class="clearfix">
                    <div class="commentairefond"><img class="commentsimg" src="'.$_SESSION['image_profil'].'">
                      <input type="hidden" value="'.$article.'" name="article"></input>
                      <input class="inputcomment" type="text" name="commentaire" placeholder="Ecrire un commentaire..."></input>
                      <input class="btn btn-1" name="commenter" value="Commenter" type="submit"></input>
                    </div>
                  </div>
                </form>
                </li>';
                }  
                ?>  

            </ul>
          </div>
        </article>
        <article class="span4">
          <h3 class="extra">Search</h3>
          <form id="search" action="#" method="POST" accept-charset="utf-8" >
            <div class="clearfix">
              <input type="text" name="s" placeholder="Effectuer une recherche..." onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" >
              <a href="#" class="btn btn-1">Search</a> </div>
          </form>
         
          <h3>Archive</h3>
          <div class="wrapper">
            <ul class="list extra2 list-pad ">
              <li><a href="#">December 2011</a></li>
              <li><a href="#">November 2012</a></li>
              <li><a href="#">October 2012</a></li>
              <li><a href="#">September 2012</a></li>
              <li><a href="#">August 2012</a></li>
              <li><a href="#">July 2012</a></li>
              <li><a href="#">June 2012</a></li>
              <li><a href="#">May 2012</a></li>
              <li><a href="#">April 2012</a></li>
              <li><a href="#">March 2012</a></li>
              <li><a href="#">February 2012</a></li>
              <li><a href="#">January 2012</a></li>
            </ul>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>

><br><br><br><br>
<!-- footer -->

<script src="js/bootstrap.js"></script>
</body>
</html>
