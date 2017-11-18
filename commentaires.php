
<?php include_once('../VIEW/header.php'); ?>
 
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../VIEW/img/home.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading"><br><br>
              <h1>Réponses au commentaire de <?php echo $commentaireunique->getPseudo(); ?></h1>
              <span class="subheading">de Jean Forteroche</span>
            </div>
          </div>
        </div>
      </div>
    </header>

<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- small box -->

        
            <div class="list-group-item">
          <h3><?php echo $commentaireunique->getPseudo(); ?> </h3></br>
              <p> <?php echo $commentaireunique->getCommentaire(); ?> </p></br>
            le  <?php echo $commentaireunique->getDatecommentaire(); ?> <br><br> 
             
    <p><?php if ($commentaireunique->getSignaler() >= 1 ) { echo '<div class="list-group-item list-group-item-danger"><em>Ce commentaire a été signalé</em></div>'; } ?></p> </li>
            <a href="../CONTROLER/controlerpost.php?id=<?php echo $commentaireunique->getId_billet(); ?>"><input type="submit" class="btn btn-default" value="Revenir au billet"></a>
            
            </div> 
            
            
      <div class="container">
          
          
            <br><p  id="coms"><strong>Répondre au commentaire</strong></strong></p><br>
        <form method="post" action="../CONTROLER/controlercom.php?id=<?php echo $commentaireunique->getId(); ?>#coms">
          <div class="col-md-6 form-line">
              <div class="form-group col-md-6">
                <label>Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo">
                <span id="aidePseudo"></span>
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="form-group col-md-6">
                <label>Réponse</label>
                <textarea  class="form-control" id="reponse" name="reponse" ></textarea>
              </div>
              <div>
                <div class="col-md-12">
                <input type="submit" class="btn btn-default" value="Envoyer">
              </div>
              
          </div>
        </form>
      </div>
             
</div><br><br>
        <?php foreach ($listreponse as $reponse) { ?>
        <ul class="lis-group">
          <li class="list-group-item"><p><strong><?php echo $reponse->getPseudo(); ?></strong> - <em>le <?php echo $reponse->getDatereponse(); ?></em></p>

              <p><?php echo $reponse->getReponse();  ?></p>
    

             
        </ul>
        <?php } ?>
            </div>
          </div>
        </div>
        
    </section>
    
    
    <!-- Footer -->
    <?php include_once('../VIEW/footer.php'); ?>
  </body>

</html>
