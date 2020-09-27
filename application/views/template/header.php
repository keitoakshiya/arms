<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$title?> </title>
    <!-- jQuery -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
          <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
         <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <!-- DataTables -->

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script  src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">



    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../application/views/assets/images/favicon.ico" />
    <!-- Bootstrap -->
    <link href="../application/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/c469f4bd9f.js"></script>
    <link href="../application/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->  
    <!-- <link href="../application/vendors/nprogress/nprogress.css" rel="stylesheet"> -->
    <!-- jQuery custom content scroller -->
    <link href="../application/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Pnotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Pnotify -->
    <script src="../vendors/pnotify/dist/pnotify.js" type="text/javascript"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js" type="text/javascript"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js" type="text/javascript"></script>

<!--    Moments -->
    <link href="../vendors/moment/min/moment.min.js" rel="stylesheet">

    <!-- daterangerpicker Js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Custom Theme Style -->
    <link href="../application/build/css/custom.min.css" rel="stylesheet">
    <link href="../application/build/css/ew.css" rel="stylesheet">

    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard" style="padding-left: 30px; padding-top: 10px; padding-bottom: 0px">
                <img src="../build/images/logo2.png" alt="arms logo" width="80" height="70">
              </a>          
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
<!--             <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->

            <br />

            <br>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>

                <ul class="nav side-menu">
                  <li><a href="dashboard"><i class="fa fa-bar-chart"></i> Graph Report </a></li>
                  <li><a href="add_patient"><i class="fa fa-edit"></i>Register Patient </a></li>
                  <li><a href="patients"><i class="fa fa-list-alt"></i>Patient List </a></li>
                  <li><a><i class="fa fa-table"></i> Summary <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="accounts_receivable">Accounts Receivable</a></li>
                      <li><a href="payment_summary">Total Payment</a></li>
                      <li><a href="remaining_balance">Remaining Balance</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Payment Application <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="official_receipt">Official Receipts</a></li>
                      <li><a href="company_list">Add Official Receipt Payment</a></li>
                    </ul>
                  </li>

                  <!-- <li><a><i class="fa fa-plus-square-o"></i> Add Payment <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> -->
                      

                    <!-- </ul>
                  </li> -->
                  <li><a href="list_company"><i class="fa fa-building-o"></i>Company List</a></li>
                  <li><a href="add_company"><i class="fa fa-edit"></i> Add Company </a></li>
                  
                  



                </ul>
              </div>

              
              

              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="Archive"><i class="fa fa-file-archive-o"></i> Archive </a></li>
                  <li><a href="add_account"><i class="fa fa-edit"></i> Add Account </a></li>
                  <li><a href="roles"><i class="fa fa-users"></i> Manage Roles </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
<!--             <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                     <?echo $session_data['username'];?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <!-- <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a> -->
                      <a class="dropdown-item"  href="/arms/main/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  

                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->


