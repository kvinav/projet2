<?php include_once('../VIEW/headeradmin.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section><br><br><br><br>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- small box -->

        
            <div class="list-group-item">
          <h3><?php echo $commentaireunique->getPseudo(); ?> </h3></br>
              <p> <?php echo $commentaireunique->getCommentaire(); ?> </p></br>
            le  <?php echo $commentaireunique->getDatecommentaire(); ?> <br><br> 
             

             <a href="../CONTROLER/controleradmincom.php?id=<?php echo $commentaireunique->getId(); ?>&supprimercom"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a> <br><br><br>
            </div> 
            
            
      <div class="container">
          
          
            <br><p  id="coms"><strong>Répondre au commentaire</strong></strong></p><br>
        <form method="post" action="../CONTROLER/controleradmincom.php?id=<?php echo $commentaireunique->getId(); ?>">
          <div class="col-md-6 form-line">
              <div class="form-group col-md-6">
                <label>Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" value="Jean Forteroche">
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
              <p> <?php if ($reponse->getSignaler() >= 1) { echo '<div class="list-group-item list-group-item-danger"><em>Cette réponse a été signalée '; echo $reponse->getSignaler(); echo ' fois</em></div>'; } ?> </p>

              <a href="../CONTROLER/controleradmincom.php?id=<?php echo $commentaireunique->getId(); ?>&idrep=<?php echo $reponse->getId(); ?>&supprimerrep"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a>
             
        </ul>
        <?php } ?>
            </div>
          </div>
        </div>
        
    </section>
     
<?php include_once('../VIEW/footeradmin.php'); ?>