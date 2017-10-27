<?php include_once('header.php'); ?>
<link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Page Header -->
   
    <header class="masthead" style="background-image: url('img/home.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading"><br><br><br><br>
              <h1>Ajouter un billet</h1>
            </div>
          </div>
        </div>
      </div>
    </header>


    <!-- Post Content -->
    <div class="container">
        <form method="post" action="controler.php">
          <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre" id="titre" placeholder="Ecrivez le titre du billet">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="description">Billet</label>
                <textarea  class="form-control" id="billet" name="billet" placeholder="Ecrivez votre billet"></textarea>
              </div>
              <div>

                <i class="fa fa-paper-plane" aria-hidden="true"><input type="submit" class="btn btn-default submit" value="Envoyer"></i> 
              </div>
              
          </div>
        </form>
      </div>


        

    <!-- Footer -->
    <?php include_once('footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
