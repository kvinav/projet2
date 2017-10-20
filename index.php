<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

include_once('managerbillets.php');
include_once('billets.php');


$billets = new Billets;

try
{
$bdd = new PDO('mysql:host=localhost;dbname=projet2', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$manager = new managerbillets($bdd);
    
$manager->add($billets);
$billets = $manager->getList('');


?>
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
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
          

              <?php foreach ($billets as $billet) { ?>
        
                
              <h2 class="post-title">
                <?php echo $billet->getTitre(''); ?>
              </h2>
              <p class="post-subtitle">
                <?php echo $billet->getBillet(''); ?>
              </p>
            
            <p class="post-meta">Posté par
              <?php echo $billet->getAuteur(''); ?>
              le <?php echo $billet->getDatebillet(''); ?></p>
          </div>
          <?php } ?>
                   <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-secondary float-right" href="#">Anciens billets &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <?php include_once('footer.php'); ?>
  </body>

</html>
