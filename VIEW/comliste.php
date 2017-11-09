<?php include_once('../VIEW/headeradmin.php'); ?>

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
        <?php foreach ($listcommentaire as $commentaire) { ?>
        <ul class="lis-group">
          <li class="list-group-item"><h3><strong><?php echo $commentaire->getPseudo(); ?></strong></h3> - <p><em>le <?php echo $commentaire->getDatecommentaire(); ?></em></p>

              <p><?php echo $commentaire->getCommentaire(); ?></p>
               <p> <?php if ($commentaire->getSignaler() >= 1) { echo '<div class="list-group-item list-group-item-danger"><em>Ce commentaire a été signalé '; echo $commentaire->getSignaler(); echo ' fois</em></div>'; } ?> </p>

              <a href="../CONTROLER/controlercomliste.php?id=<?php echo $commentaire->getId(); ?>&supprimer"><input type="submit" class="btn btn-danger submit" value="Supprimer"></a>
             
        </ul>
        <?php } ?>
          </div>
        </div>
        
    </section>
     
<?php include_once('../VIEW/footeradmin.php'); ?>