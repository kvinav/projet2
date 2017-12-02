<?php include_once('../VIEW/header.php'); ?>


    <!-- Page Header -->
   
    <header class="masthead" style="background-image: url('../VIEW/img/home.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading"><br><br><br>
              <h1><?php echo $postunique->getTitle($post); ?></h1><br><br>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
          <p> <?php echo $postunique->getPost(); ?> </p>
          <p> Publié par <em><?php echo $postunique->getAuthor(); ?> </em><p>
            <p>Le <em> <?php echo $postunique->getDatepost(); ?></em></p><br>

      
        <h3 id="coms">Commentaires</h3><br>
        <?php foreach ($listcomment as $comment) { ?>
        <ol class="lis-group">
          <li class="list-group-item"><p><strong><?php echo $comment->getPseudo(); ?></strong> - <em>le <?php echo $comment->getDatecomment(); ?></em></p>

              <p><?php echo $comment->getComment(); ?></p>
              <p> <a href="../index.php?action=post&id=<?php echo $postunique->getId(); ?>&idcom=<?php echo $comment->getId(); ?>&report"><input type="submit" class="btn btn-danger submit" value="SIGNALER"></a>
             <a href="../index.php?action=comment&id=<?php echo $comment->getId(); ?>"><input type="submit" class="btn btn-default submit" value="Voir les réponses / Répondre"></a></p>
                <p><?php if ($comment->getReport() >= 1 ) { echo '<div class="list-group-item list-group-item-danger"><em>Ce commentaire a été signalé</em></div>'; } ?></p> </li>
               
                
        </ol>
        <?php } ?>
      

           <div class="container">
            <p><strong>Laissez un commentaire</strong></p><br>
        <form method="post" action="../index.php?action=post?id=<?php echo $postunique->getId(); ?>">
          <div class="col-md-6 form-line">
              <div class="form-group">
                <label>Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo">
                <span id="aidePseudo"></span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Commentaire</label>
                <textarea  class="form-control" id="comment" name="comment" ></textarea>
              </div>
              <div>

                <input type="submit" class="btn btn-default" value="Envoyer">
              </div>
              
          </div>
        </form>
      </div>
        </div>
      </div>
    </div>



    <hr>

    <!-- Footer -->
     <?php include_once('../VIEW/footer.php'); ?>
    <script src="../VIEW/js/test.js"></script>
  </body>

</html>
