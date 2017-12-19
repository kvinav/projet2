<?php include('src/View/headeradmin.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1>
        <?php echo $postunique->getTitle(); ?>
      </h1>
    </section><br><br><br><br>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- small box -->
            <p> <?php echo $postunique->getPost(); ?> </p>
          <p> Publié par <em><?php echo $postunique->getAuthor(); ?> </em><p>
            <?php if ($postunique->getDatepost() == $postunique->getDatemodif()) { 
                   
                  ?> le  <?php echo $postunique->getDatepost(); ?> <br><br> <?php
              }
              
              else {
                  ?> le  <?php echo $postunique->getDatepost(); ?> <br> Mise-à-jour le <?php echo $postunique->getDatemodif(); ?> </p>
             <?php } ?>

             <a href="index.php?action=updatePost&id=<?php echo $postunique->getId(); ?>"><input type="submit" class="btn btn-primary submit" value="Modifier"></a>  <a href="index.php?action=postAdmin&id=<?php echo $postunique->getId(); ?>&deletepost"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a> <br><br><br>
      
        
        <?php foreach ($listcomment as $comment) { ?>
        <ul class="lis-group">
          <li class="list-group-item"><p><strong><?php echo $comment->getPseudo(); ?></strong> - <em>le <?php echo $comment->getDatecomment(); ?></em></p>

              <p><?php echo $comment->getComment();  ?></p>
              <p> <?php if ($comment->getReport() >= 1) { echo '<div class="list-group-item list-group-item-danger"><em>Ce commentaire a été signalé '; echo $comment->getReport(); echo ' fois</em></div>'; } ?> </p>

              <a href="index.php?action=postAdmin&id=<?php echo $comment->getId_billet(); ?>&idcom=<?php echo $comment->getId(); ?>&deletecom"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a>
              <a href="index.php?action=commentAdmin&id=<?php echo $comment->getId(); ?>"><input type="submit" class="btn btn-default submit" value="Voir les réponses / Répondre"></a>
             
        </ul>
        <?php } ?>
            </div>
          </div>
        </div>
        
    </section>
     
<?php include_once('src/View/footeradmin.php'); ?>