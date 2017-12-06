
 <?php include_once('src/View/header.php'); ?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('web/cleanblog/img/home.jpg')">
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
        
             <?php foreach ($posts as $post) { ?>
          <div class="post-preview">

            <!-- Renvoie vers un post en fonction de l'id  -->
            <a href="index.php?action=post&id=<?php echo $post->getId(); ?>">

              <h2 class="post-title">
                <?php echo $post->getTitle(); ?>
              </h2>
              <h3 class="post-subtitle">
                <p><?php echo substr($post->getPost(), 0, 100); ?>(...)<p>
              </h3>
            </a>
            <p class="post-meta">Posté par
              <a href="index.php?action=about"><?php echo $post->getAuthor(); ?></a>
              <?php if ($post->getDatepost() == $post->getDatemodif()) { 
                   
                  ?> le  <?php echo $post->getDatepost(); ?> <?php
              }
              
              else {
                  ?> le  <?php echo $post->getDatepost(); ?> <br> Mise-à-jour le <?php echo $post->getDatemodif(); ?> </p>
             <?php } ?>
              
           
          </div> 
             <?php } ?>

                   <!-- Pager -->
         
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <?php include_once('src/View/footer.php'); ?>
  </body>

</html>
