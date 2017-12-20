<<<<<<< HEAD
<?php include('src/View/headeradmin.php'); ?>
=======
<?php include_once('../VIEW/headeradmin.php'); ?>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<<<<<<< HEAD
      
=======
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
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
<<<<<<< HEAD
            <p> <?php echo $postunique->getPost(); ?> </p>
          <p> Publié par <em><?php echo $postunique->getAuthor(); ?> </em><p>
=======
            <p> <?php echo $postunique->getPost($post); ?> </p>
          <p> Publié par <em><?php echo $postunique->getAuthor($post); ?> </em><p>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
            <?php if ($postunique->getDatepost() == $postunique->getDatemodif()) { 
                   
                  ?> le  <?php echo $postunique->getDatepost(); ?> <br><br> <?php
              }
              
              else {
                  ?> le  <?php echo $postunique->getDatepost(); ?> <br> Mise-à-jour le <?php echo $postunique->getDatemodif(); ?> </p>
             <?php } ?>

<<<<<<< HEAD
             <a href="index.php?action=updatePost&id=<?php echo $postunique->getId(); ?>"><input type="submit" class="btn btn-primary submit" value="Modifier"></a>  <a href="index.php?action=postAdmin&id=<?php echo $postunique->getId(); ?>&deletepost"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a> <br><br><br>
      
        
=======
             <a href="../index.php?action=updatePost&id=<?php echo $postunique->getId(); ?>"><input type="submit" class="btn btn-primary submit" value="Modifier"></a>  <a href="../index.php?action=postAdmin&id=<?php echo $postunique->getId(); ?>&deletepost"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a> <br><br><br>

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
        <?php foreach ($listcomment as $comment) { ?>
        <ul class="lis-group">
          <li class="list-group-item"><p><strong><?php echo $comment->getPseudo(); ?></strong> - <em>le <?php echo $comment->getDatecomment(); ?></em></p>

              <p><?php echo $comment->getComment();  ?></p>
              <p> <?php if ($comment->getReport() >= 1) { echo '<div class="list-group-item list-group-item-danger"><em>Ce commentaire a été signalé '; echo $comment->getReport(); echo ' fois</em></div>'; } ?> </p>

<<<<<<< HEAD
             
              <a href="index.php?action=postAdmin&id=<?php echo $comment->getId_post(); ?>&idcom=<?php echo $comment->getId(); ?>&deletecom"><input type="submit" class="btn btn-danger" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a>
              <a href="index.php?action=commentAdmin&id=<?php echo $comment->getId(); ?>"><input type="submit" class="btn btn-default" value="Voir les réponses / Répondre"></a>
=======
              <a href="../index.php?action=postAdmin&id=<?php echo $comment->getId_billet(); ?>&idcom=<?php echo $comment->getId(); ?>&deletecom"><input type="submit" class="btn btn-danger submit" value="Supprimer" OnClick="return confirm('Voulez-vous vraiment supprimer ?');"></a>
              <a href="../index.php?action=commentAdmin&id=<?php echo $comment->getId(); ?>"><input type="submit" class="btn btn-default submit" value="Voir les réponses / Répondre"></a>
             
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
        </ul>
        <?php } ?>
            </div>
          </div>
        </div>
        
    </section>
     
<<<<<<< HEAD
<?php include_once('src/View/footeradmin.php'); ?>
=======
<?php include_once('../VIEW/footeradmin.php'); ?>
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
