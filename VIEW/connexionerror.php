<?php include_once('../VIEW/header.php'); ?>
<link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Page Header -->
   
    <header class="masthead" style="background-image: url('../VIEW/img/home.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading"><br><br><br><br>
              <h1>Connexion</h1>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="alert span5 alert-danger">
      <h3>Attention ! </h3>
      <p>Votre nom d'utilisateur ou votre mot-de-passe est incorrect, essayez à nouveau :</p>
    </div>
    <div class="container">
        <form method="post" action="../index.php?action=admin">
          <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="titre">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="user" id="user">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="description">Mot-de-passe</label>
                <input type="password" class="form-control" id="password" name="password" >
              </div>
              <div>

               <input type="submit" class="btn btn-default submit" value="Connexion"> 
              </div>
              
          </div>
        </form>
      </div>



    <!-- Footer -->
       <?php include_once('../VIEW/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../VIEW/vendor/jquery/jquery.min.js"></script>
    <script src="../VIEW/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../VIEW/js/clean-blog.min.js"></script>

  </body>

</html>
