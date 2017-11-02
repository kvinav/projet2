
<?php include_once('header.php'); ?>


    <!-- Page Header -->
   
    <header class="masthead" style="background-image: url('img/home.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading"><br><br><br>
              <h1><?php echo $billetunique->getTitre($billet); ?></h1><br><br>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
          <p> <?php echo $billetunique->getBillet($billet); ?> </p>
          <p> Publié par <em><?php echo $billetunique->getAuteur($billet); ?> </em><p>
            <p>Le <em> <?php echo $billetunique->getDatebillet($billet); ?></em></p><br>

      
        <h3>Commentaires</h3><br>
        <?php foreach ($listcommentaire as $commentaire) { ?>
        <ol class="lis-group">
          <li class="list-group-item"><p><strong><?php echo $commentaire->getPseudo(); ?></strong> - <em>le <?php echo $commentaire->getDatecommentaire(); ?></em></p>

              <p><?php echo $commentaire->getCommentaire(); ?></p>
              <p> <a href="controlerpost.php?id=<?php echo $billetunique->getId(); ?>&idcom=<?php echo $commentaire->getId(); ?>&signaler"><input type="submit" class="btn btn-danger submit" value="SIGNALER"></a></p>
                <p><?php if ($commentaire->getSignaler() >= 1 ) { echo '<div class="list-group-item list-group-item-danger"><em>Ce commentaire a été signalé</em></div>'; } ?></p> </li>
        </ol>
        <?php } ?>

           <div class="container">
            <p><strong>Laissez un commentaire</strong></p><br>
        <form method="post" action="controlerpost.php?id=<?php echo $billetunique->getId(); ?>">
          <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="titre">Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="description">Commentaire</label>
                <textarea  class="form-control" id="commentaire" name="commentaire" ></textarea>
              </div>
              <div>

                <input type="submit" class="btn btn-default submit" value="Envoyer">
              </div>
              
          </div>
        </form>
      </div>
        </div>
      </div>
    </div>



    <hr>

    <!-- Footer -->
     <?php include_once('footer.php'); ?>

  </body>

</html>
