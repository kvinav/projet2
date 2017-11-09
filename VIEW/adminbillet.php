<?php include_once('../VIEW/headeradmin.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $billetunique->getTitre(); ?>
      </h1>
    </section><br><br><br><br>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- small box -->
            <p> <?php echo $billetunique->getBillet($billet); ?> </p>
          <p> Publié par <em><?php echo $billetunique->getAuteur($billet); ?> </em><p>
            <p>Le <em> <?php echo $billetunique->getDatebillet($billet); ?></em></p><br>

             <a href="../CONTROLER/controlermodifbillet.php?id=<?php echo $billetunique->getId(); ?>&modifier"><input type="submit" class="btn btn-primary submit" value="Modifier"></a>  <a href="../CONTROLER/controleradminbillet.php?id=<?php echo $billetunique->getId(); ?>&supprimerbill"><input type="submit" class="btn btn-danger submit" value="Supprimer"></a> <br><br><br>

        <?php foreach ($listcommentaire as $commentaire) { ?>
        <ul class="lis-group">
          <li class="list-group-item"><p><strong><?php echo $commentaire->getPseudo(); ?></strong> - <em>le <?php echo $commentaire->getDatecommentaire(); ?></em></p>

              <p><?php echo $commentaire->getCommentaire();  ?></p>
              <p> <?php if ($commentaire->getSignaler() >= 1) { echo '<div class="list-group-item list-group-item-danger"><em>Ce commentaire a été signalé '; echo $commentaire->getSignaler(); echo ' fois</em></div>'; } ?> </p>

              <a href="../CONTROLER/controleradminbillet.php?id=<?php echo $commentaire->getId(); ?>&supprimercom"><input type="submit" class="btn btn-danger submit" value="Supprimer"></a>
             
        </ul>
        <?php } ?>
            </div>
          </div>
        </div>
        
    </section>
     
<?php include_once('../VIEW/footeradmin.php'); ?>