<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
  
=======

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administration</title>
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<<<<<<< HEAD
  <link rel="stylesheet" href="web/administration/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="web/administration/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="web/administration/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="web/administration/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="web/administration/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="web/administration/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="web/administration/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="web/administration/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="web/administration/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="web/administration/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
=======
  <link rel="stylesheet" href="../VIEW/administration/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../VIEW/administration/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../VIEW/administration/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../VIEW/administration/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../VIEW/administration/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../VIEW/administration/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../VIEW/administration/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../VIEW/administration/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../VIEW/administration/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../VIEW/administration/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<<<<<<< HEAD
 <script src="vendor/tinymce/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#post',
     language: 'fr_FR'
  });
=======
  <script type="text/javascript" src="../VIEW/tiny/tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript">
    tinyMCE.init({
      // type de mode
      mode : "exact", 
      // id ou class, des textareas
      elements : "post", 
      // en mode avancé, cela permet de choisir les plugins
      theme : "advanced", 
      // liste des plugins
      plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

      // les outils à afficher
      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
      theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
      theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
      theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
      
      // emplacement de la toolbar
      theme_advanced_toolbar_location : "top",  
      // alignement de la toolbar
      theme_advanced_toolbar_align : "left",
      // positionnement de la barre de statut
      theme_advanced_statusbar_location : "bottom", 
      // permet de redimensionner la zone de texte
      theme_advanced_resizing : true,
      
      // chemin vers le fichier css
      content_css : " ./design-tiny.css,", 
      // taille disponible
      theme_advanced_font_sizes: "10px,11px,12px,13px,14px,15px,16px,17px,18px,19px,20px,21px,22px,23px,24px,25px", 
      // couleur disponible dans la palette de couleur
      theme_advanced_text_colors : "33FFFF, 007fff, ff7f00", 
      // balise html disponible
      theme_advanced_blockformats : "h1, h2,h3,h4,h5,h6",
      // class disponible
      theme_advanced_styles : "Tableau=textTab;TableauSansCadre=textTabSansCadre;", 
      // possibilité de définir les class et leurs styles directement avec le code suivant
      /*
      style_formats : [
        {title : 'Bold text', inline : 'b'},
        {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
        {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
        {title : 'Example 1', inline : 'span', classes : 'example1'},
        {title : 'Example 2', inline : 'span', classes : 'example2'},
        {title : 'Table styles'},
        {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
      ],
      */
    });
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
  </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Administration</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->

      <div class="navbar-custom-menu">
       
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
<<<<<<< HEAD
          <img src="web/administration/dist/img/profil.jpg" class="img-circle" alt="User Image">
=======
          <img src="../VIEW/administration/dist/img/profil.jpg" class="img-circle" alt="User Image">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
        </div>
        <div class="pull-left info">
          <p>Jean Forteroche</p>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <li>
<<<<<<< HEAD
          <a href="index.php?action=dashboard">
=======
          <a href="../index.php?action=admin">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
          </a>
        </li>
        <li>
<<<<<<< HEAD
          <a href="index.php?action=listPostsAdmin">
=======
          <a href="../index.php?action=listPostsAdmin">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
            <i class="fa fa-list"></i>
            <span>Mes billets</span>
          </a>
        </li>
        <li>
<<<<<<< HEAD
          <a href="index.php?action=listComments&get=list">
=======
          <a href="../index.php?action=listComments">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
            <i class="fa fa-comments"></i>
            <span>Tous les commentaires</span>
          </a>
        </li>
        <li>
<<<<<<< HEAD
          <a href="index.php?action=addPost">
=======
          <a href="../index.php?action=addPost">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
            <i class="fa fa-pencil"></i> <span>Créer un billet</span>
          </a>
        </li>
        <li>
<<<<<<< HEAD
          <a href="index.php?action=listPosts" onclick="window.open(this.href); return false;">
=======
          <a href="../index.php?action=listPosts" onclick="window.open(this.href); return false;">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
            <i class="fa fa-home"></i>
            <span>Mon site</span>
          </a>
        </li>
        <li>
<<<<<<< HEAD
          <a href="index.php?action=disconnexion">
=======
          <a href="../index.php?action=disconnexion">
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
            <i class="fa fa-sign-out"></i>
            <span>Déconnexion</span>
          </a>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>