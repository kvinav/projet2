<?php include_once('headeradmin.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Liste des billets
      </h1>
    </section><br><br><br><br>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- small box -->
        <?php foreach ($billets as $billet) { ?>
        <ul class="lis-group">
          <li class="list-group-item"><h3><strong><?php echo $billet->getTitre(); ?></strong></h3> - <p><em>le <?php echo $billet->getDatebillet(); ?></em></p>

              <p><?php echo substr($billet->getBillet(), 0, 100); ?>(...)</p>

              <a href="controleradminbillet.php?id=<?php echo $billet->getId(); ?>"><input type="submit" class="btn btn-default submit" value="Gérer"></a>
             
        </ul>
        <?php } ?>
          </div>
        </div>
        
    </section>
     
<?php include_once('footeradmin.php'); ?>