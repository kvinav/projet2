<?php include('../VIEW/headeradmin.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ajouter un billet
      </h1>
    </section><br><br><br><br>


        <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
  <div class="container">
        <form method="post" action="../CONTROLER/controlermodifbillet.php?id=<?php echo $billetunique->getId(); ?>">
          <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre" id="titre" value="<?php echo $billetunique->getTitre(); ?>">
              </div>
            </div>
            <div class="col-md-10">
              <div class="form-group">
                <label for="description">Billet</label>
                <textarea class="form-control" id="billet" name="billet"><?php echo $billetunique->getBillet(); ?></textarea>
              </div>
              <div>

               <input type="submit" class="btn btn-default submit" value="Envoyer"> 
              </div>
    <br /><br />
  </form>
          </div>
        </form>
      </div>

          </div>
          </div>
        </div>
        
    </section>

         
<?php include('../VIEW/footeradmin.php'); ?>