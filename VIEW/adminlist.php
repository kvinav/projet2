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
        <?php foreach ($posts as $post) { ?>
        <div class="lis-group">
          <div class="list-group-item"><h3><strong><?php echo $post->getTitle(); ?></strong></h3>
          <?php if ($post->getDatepost() == $post->getDatemodif()) { 
                   
                  ?> Publié le  <?php echo $post->getDatepost(); ?> <?php
              }
              
              else {
                  ?> Publié le  <?php echo $post->getDatepost(); ?> <br> Mise-à-jour le <?php echo $post->getDatemodif(); ?> </p>
             <?php } ?>

              <p><?php echo substr($post->getPost(), 0, 100); ?>(...)</p>

              <a href="../CONTROLER/controleradminpost.php?id=<?php echo $post->getId(); ?>"><input type="submit" class="btn btn-default submit" value="Gérer"></a>
           </div>  
        </div><br>
        <?php } ?>
          </div>
        </div>
        
    </section>
     
<?php include_once('../VIEW/footeradmin.php'); ?>