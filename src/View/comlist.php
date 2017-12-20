<?php include('src/View/headeradmin.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Liste des commentaires
      </h1>
    </section><br><br><br><br>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- small box -->
        <?php foreach ($listcomment as $comment) { ?>
        <div class="list-group">
          <div class="list-group-item">
             
              <h3><strong><?php echo $comment->getPseudo(); ?></strong></h3> - <p><em>le <?php echo $comment->getDatecomment(); ?></em></p>

              <p><?php echo $comment->getComment(); ?></p>
               <p> <?php if ($comment->getReport() >= 1) { echo '<div class="list-group-item list-group-item-danger col-md-3"><em>Ce commentaire a été signalé '; echo $comment->getReport(); echo ' fois</em></div>';
                    echo '
                <a href="index.php?action=listComments&id='; echo $comment->getId(); echo '&deletereport"><input type="submit" class="btn btn-default submit" value="Supprimer les signalements" OnClick="return confirm(\'Voulez-vous vraiment supprimer les signalements ?\');"></a>'; } ?> </p><br>

              <a href="index.php?action=listComments&id=<?php echo $comment->getId(); ?>&delete"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a>
              <a href="index.php?action=postAdmin&id=<?php echo $comment->getId_post(); ?>"><input type="submit" class="btn btn-default submit" value="Voir le billet associé"></a><br><br>
              <a href="index.php?action=commentAdmin&id=<?php echo $comment->getId(); ?>"><input type="submit" class="btn btn-default submit" value="Voir les réponses / Répondre"></a><br><br>
              
              </div><br>
              
   
        <?php } ?>
          </div>
        </div>
        
    </section>
    
   
     
<?php include_once('src/View/footeradmin.php'); ?>