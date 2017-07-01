<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Salem Witch</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url();?>assets/admin/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="<?php echo base_url();?>assets/admin/css/fontcss.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/admin/css/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>assets/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>assets/admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>assets/admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url();?>assets/admin/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url();?>assets/admin/css/themes/all-themes.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    
    <link href="<?php echo base_url();?>assets/js/alertifyjs/css/alertify.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>assets/js/alertifyjs/css/themes/default.min.css" rel="stylesheet" media="screen">

    
    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url();?>assets/admin/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!---Loading modal-->


    <div class="modal fade" id="loading">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">      
          <div class="modal-body">
            <div align="center" >
                Guardando ...<br>
                <div class="preloader pl-size-xl" >
                    <div class="spinner-layer">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>      
        </div>
      </div>
    </div>
    <div class="modal fade" id="deleting">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">      
          <div class="modal-body">
            <div align="center" >
                Borrando ...<br>
                <div class="preloader pl-size-xl" >
                    <div class="spinner-layer">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>      
        </div>
      </div>
    </div>
    <!--#END# Loading modal-->
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">                    
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->