<<<<<<< HEAD
<?php include('src/View/header.php'); ?>
 
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('web/cleanblog/img/home.jpg')">
=======

<?php include_once('../VIEW/header.php'); ?>
 
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../VIEW/img/home.jpg')">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading"><br><br>
              <h1>Réponses au commentaire de <?php echo $commentunique->getPseudo(); ?></h1>
<<<<<<< HEAD
=======
              <span class="subheading">de Jean Forteroche</span>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
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
          <h3><?php echo $commentunique->getPseudo(); ?> </h3></br>
              <p> <?php echo $commentunique->getComment(); ?> </p></br>
            le  <?php echo $commentunique->getDatecomment(); ?> <br><br> 
             
    <p><?php if ($commentunique->getReport() >= 1 ) { echo '<div class="list-group-item list-group-item-danger"><em>Ce commentaire a été signalé</em></div>'; } ?></p> </li>
<<<<<<< HEAD
            <a href="index.php?action=post&id=<?php echo $commentunique->getId_post(); ?>"><input type="submit" class="btn btn-default" value="Revenir au billet"></a>
=======
            <a href="../index.php?action=post&id=<?php echo $commentunique->getId_post(); ?>"><input type="submit" class="btn btn-default" value="Revenir au billet"></a>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
            
            </div> <br>
           <div class="col-md-10 col-md-offset-2">
               <?php foreach ($listanswer as $answer) { ?>
        <ul class="lis-group">
          <li class="list-group-item"><p><strong><?php echo $answer->getPseudo(); ?></strong> - <em>le <?php echo $answer->getDateanswer(); ?></em></p>

              <p><?php echo $answer->getAnswer();  ?></p>
<<<<<<< HEAD
              <p> <a href="index.php?action=comment&idrep=<?php echo $answer->getId(); ?>&id=<?php echo $commentunique->getId(); ?>&report"><input type="submit" class="btn btn-danger submit" value="SIGNALER"></a></p>
=======
              <p> <a href="../index.php?action=comment&idrep=<?php echo $answer->getId(); ?>&id=<?php echo $commentunique->getId(); ?>&report"><input type="submit" class="btn btn-danger submit" value="SIGNALER"></a></p>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
              <p><?php if ($answer->getReport() >= 1 ) { echo '<div class="list-group-item list-group-item-danger"><em>Cette réponse a été signalée</em></div>'; 
               } ?></p> 
             </li>
    

             
        </ul>
        <?php } ?>
        </div> 
            
      <div class="container">
          
          
<<<<<<< HEAD
            <br><p><strong>Répondre au commentaire</strong></strong></p><br>
        <form method="post" action="index.php?action=comment&id=<?php echo $commentunique->getId(); ?>">
=======
            <br><p  id="coms"><strong>Répondre au commentaire</strong></strong></p><br>
        <form method="post" action="../index.php?action=comment&id=<?php echo $commentunique->getId(); ?>">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
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
    
    
    <!-- Footer -->
<<<<<<< HEAD
    <?php include_once('src/View/footer.php'); ?>
=======
    <?php include_once('../VIEW/footer.php'); ?>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
  </body>

</html>
