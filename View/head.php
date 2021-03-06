<?php
        require_once '../Model/connect.php';            
        require_once '../Controller/UsuarioController.php';
        $objControl = new UsuarioController();
        $objControl->verificarlogin();

        
    ?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Vendas- SV</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!--UFAAAAAAAAAAAAAAAAA-->
<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

  <link rel="stylesheet" href="../plugins/select2/select2.min.css">

<script src="../dist/js/app.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="shortcut icon" href="../imagens/favicon.png" type="image/x-icon" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SV</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SV</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
 
                
                
                <span class="hidden-xs"><b><?php echo $_SESSION['usuario'];?></b></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              
           
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>

                <div class="pull-right">
                   <a href="logout.php" class="btn btn-default btn-flat">Sair</a>
                    
                </div>
              </li>
            </ul>
          </li>
       
        </ul>
		
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Painel de Controle</li>
           <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i> <span>Produto</span>
                       
                </a>
                <ul class="treeview-menu">
                    <li><a href="PROD_listar.php"><i class="fa fa-cube"></i> Listar Produtos</a></li>
                    <li class="active"><a href="PROD_cadastro.php"><i class="fa fa-plus-square"></i> Novo Produto</a></li>
                </ul>
            </li>
   
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-truck"></i> <span>Fornecedor</span>
                       
                </a>
                <ul class="treeview-menu">
                    <li><a href="FORN_listar.php"><i class="fa fa-truck"></i> Listar Fornecedor</a></li>
                    <li class="active"><a href="FORN_cadastro.php"><i class="fa fa-plus-square"></i> Novo Fornecedor</a></li>
                </ul>
            </li>
              <li class="treeview">
                <a href="#">
                    <i class="fa  fa-book"></i> <span>Entradas</span>
                       
                </a>
                <ul class="treeview-menu">
                    <li><a href="ENT_listar.php"><i class="fa fa-book"></i> Listar Entradas</a></li>
                    <li class="active"><a href="ENT_cadastro.php"><i class="fa fa-plus-square"></i> Nova Entrada</a></li>
                </ul>
            </li>
        <li><a href="profile.php"><i class="fa  fa-user"></i> <span>Meus Dados</span></a></li>
        <li><a href="logout.php"><i class="fa  fa-sign-out"></i> <span>Sair</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
