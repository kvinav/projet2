
 <?php include_once('../VIEW/header.php'); ?>
 
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../VIEW/img/home.jpg')">
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
            

            <!-- Génère la liste des billets -->
        
             <?php foreach ($billets as $billet) { ?>
          <div class="post-preview">

            <!-- Renvoie vers un post en fonction de l'id  -->
            <a href="../CONTROLER/controlerpost.php?id=<?php echo $billet->getId(); ?>">

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
         
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <?php include_once('../VIEW/footer.php'); ?>
  </body>

</html>
