
 <?php include_once('header.php'); ?>
 
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading"><br><br>
              <h1>Un billet simple pour l'Alaska</h1>
              <span class="subheading">de Jean Forteroche</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
             <?php foreach ($billets as $billet) { ?>
          <div class="post-preview">
            <a href="post.php?id=<?php echo $billet->getId(); ?>">

              <h2 class="post-title">
                <?php echo $billet->getTitre(); ?>
              </h2>
              <h3 class="post-subtitle">
                <p><?php echo substr($billet->getBillet(), 0, 100); ?>(...)<p>
              </h3>
            </a>
            <p class="post-meta">Posté par
              <a href="about.php"><?php echo $billet->getAuteur(); ?></a>
              le  <?php echo $billet->getDatebillet(); ?></p>
           
          </div> 
             <?php } ?>

                   <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-secondary float-right" href="ajoutbillet.php">Ajouter un billet &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <?php include_once('footer.php'); ?>
  </body>

</html>
