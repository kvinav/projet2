<?php include('src/View/headeradmin.php');  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tableau de bord
      </h1>
    </section><br><br><br><br>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- small box -->
        <h3 class="col-md-10 col-md-offset-2"><strong>BIENVENUE</strong> sur l'interface d'administration de votre blog</h3><br><br><br><br><br><br><br><br>
       
        
        
        <h3>Derniers commentaires signalés:</h3>
        <?php foreach ($listcomment as $comment) { ?>
          <?php if ($comment->getReport() > 0) { ?>
        <div class="list-group">
          <div class="list-group-item">
             
              <h3><strong><?php echo $comment->getPseudo(); ?></strong></h3> - <p><em>le <?php echo $comment->getDatecomment(); ?></em></p>

              <p><?php echo $comment->getComment(); ?></p>
               <p> <?php if ($comment->getReport() >= 1) { echo '<div class="list-group-item list-group-item-danger col-md-3"><em>Ce commentaire a été signalé '; echo $comment->getReport(); echo ' fois</em></div>'; echo '
                <a href="index.php?action=admin&id='; echo $comment->getId(); echo '&deletereport=0"><input type="submit" class="btn btn-default submit" value="Supprimer les signalements" OnClick="return confirm(\'Voulez-vous vraiment supprimer les signalements ?\');"></a>'; } ?> </p><br>

              <a href="index.php?action=postAdmin&id=<?php echo $comment->getId_post(); ?>"><input type="submit" class="btn btn-default submit" value="Voir le billet associé"></a><br><br>
              <a href="index.php?action=commentAdmin&id=<?php echo $comment->getId(); ?>"><input type="submit" class="btn btn-default submit" value="Voir les réponses / Répondre"></a><br><br>
              
              </div><br>
         
        <?php } else { echo ''; } ?>
        <?php } ?>
            </div>
          </div>
        </div>
        
    </section>
     
<?php include_once('src/View/footeradmin.php'); ?>