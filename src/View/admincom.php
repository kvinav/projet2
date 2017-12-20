<<<<<<< HEAD
<?php include('src/View/headeradmin.php'); ?>
=======
<?php include_once('../VIEW/headeradmin.php'); ?>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

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
          <h3><?php echo $commentunique->getPseudo(); ?> </h3></br>
              <p> <?php echo $commentunique->getComment(); ?></p></br>
            le  <?php echo $commentunique->getDatecomment(); ?> <br><br> 
             

<<<<<<< HEAD
             <a href="index.php?action=commentAdmin&id=<?php echo $commentunique->getId(); ?>&deletecom"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a>
             <a href="index.php?action=postAdmin&id=<?php echo $commentunique->getId_post(); ?>"><input type="submit" class="btn btn-default submit" value="Voir le billet associé"></a> <br><br><br>
=======
             <a href="../index.php?action=commentAdmin&id=<?php echo $commentunique->getId(); ?>&deletecom"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a>
             <a href="../index.php?action=postAdmin&id=<?php echo $commentunique->getId_post(); ?>"><input type="submit" class="btn btn-default submit" value="Voir le billet associé"></a> <br><br><br>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
              </div> <br>
         
           <div class="col-md-10 col-md-offset-1">
                <?php foreach ($listanswer as $answer) { ?>
        <ul class="lis-group">
          <li class="list-group-item"><p><strong><?php echo $answer->getPseudo(); ?></strong> - <em>le <?php echo $answer->getDateanswer(); ?></em></p>

              <p><?php echo $answer->getAnswer();  ?></p>
              <p> <?php if ($answer->getReport() >= 1) { echo '<div class="list-group-item list-group-item-danger"><em>Cette réponse a été signalée '; echo $answer->getReport(); echo ' fois</em></div>';
<<<<<<< HEAD
               echo '<a href="index.php?action=commentAdmin&idrep='; echo $answer->getId(); echo '&deletereport=0&id='; echo $commentunique->getId(); echo '"><input type="submit" class="btn btn-default submit" value="Supprimer les signalements" OnClick="return confirm(\'Voulez-vous vraiment supprimer les signalements ?\');"></a>';} ?> </p>

              <a href="index.php?action=commentAdmin&id=<?php echo $commentunique->getId(); ?>&idrep=<?php echo $answer->getId(); ?>&deleteanswer"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a>
=======
               echo '<a href="../index.php?action=commentAdmin&idrep='; echo $answer->getId(); echo '&deletereport=0&id='; echo $commentunique->getId(); echo '"><input type="submit" class="btn btn-default submit" value="Supprimer les signalements" OnClick="return confirm(\'Voulez-vous vraiment supprimer les signalements ?\');"></a>';} ?> </p>

              <a href="../index.php?action=commentAdmin&id=<?php echo $commentunique->getId(); ?>&idrep=<?php echo $answer->getId(); ?>&deleteanswer"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
             
        </ul>
        <?php } ?>
        </div>
            
     <div class="container">
          
          
          <br><br>
           
<<<<<<< HEAD
        <form method="post" action="index.php?action=commentAdmin&id=<?php echo $commentunique->getId(); ?>">
=======
        <form method="post" action="../index.php?action=commentAdmin&id=<?php echo $commentunique->getId(); ?>">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
             <br><br><label class="col-md-12"><strong>Répondre au commentaire</strong></label>
          <div class="col-md-6 form-line">
              <div class="form-group col-md-6">
               <br> <label>Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" value="Jean Forteroche">
                <span id="aidePseudo"></span>
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="form-group col-md-6">
                <label>Réponse</label>
                <textarea  class="form-control" id="answer" name="answer" ></textarea>
              </div>
              <div>
                <div class="col-md-12">
                <input type="submit" class="btn btn-default" value="Envoyer">
              </div>
              
          </div>
        </form>
      </div>
             
</div><br><br>
        
            </div>
          </div>
        </div>
        
    </section>
     
<<<<<<< HEAD
<?php include_once('src/View/footeradmin.php'); ?>
=======
<?php include_once('../VIEW/footeradmin.php'); ?>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
