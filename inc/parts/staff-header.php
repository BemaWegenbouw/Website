<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../assets/favicon.ico">
        <title>Bema Wegenbouw BV - Personeelszaken</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../assets/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- jQuery -->
        <script type="text/javascript" src="vendor/jquery/"></script>
        <!-- Noty -->
        <script type="text/javascript" src="../assets/js/noty/themes/relax.js"></script>
        <script type="text/javascript" src="../assets/js/noty/packaged/jquery.noty.packaged.min.js"></script>

        <?php if ($page == "login") { ?>
            <link href="../assets/css/signin.css" rel="stylesheet">
        <?php } ?>

        <?php if ($page == "staff-dashboard") { ?>
            <!-- Morris Charts CSS -->
            <link href="vendor/morrisjs/morris.css" rel="stylesheet">
        <?php } ?>
        <?php if ($page == "staff-calendar") { ?>
            <!-- Morris Charts CSS -->
            <link href="calendar/timetable.css" rel="stylesheet">
        <?php } ?> 

        <?php if ($page == "staff-tables") { ?>
            <!-- DataTables CSS -->
            <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
            <!-- DataTables Responsive CSS -->
            <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <?php } ?>

    </head>

    <body>


        <?php
        //Error display
        if (isset($_SESSION["login-error"])) {
            $loginerror = $_SESSION["login-error"];
            print("<script type='text/javascript'>noty({text: '$loginerror', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
            unset($_SESSION["login-error"]);
        } //Einde error display
        ?>

        <?php if ($user->LoggedIn() && $page != "login") { ?>


            <div id="wrapper">
                <!-- Navigation -->
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="staff-dashboard.php">Bema Personeelszaken</a>
                    </div>
                    <!-- /.navbar-header top-->

                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-alert">
                                <li><a href="#"><i class="fa fa-user fa-fw"></i> Gebruikersprofiel</a>
                                </li>
                                <li><a href="instellingen.php"><i class="fa fa-gear fa-fw"></i> Instellingen</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Loguit</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-messages -->
                        </li>
                    </ul>
                    <!-- /.navbar-top-links -->

                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li class="sidebar-search">
                                    <div class="input-group custom-search-form">
                                        <input type="text" class="form-control" placeholder="Zoeken...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </li>
                                <li>
                                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="declaration.php"><i class="fa fa-edit fa-fw"></i> Urendeclaratie</a>
                                </li>

                                <!--start tables / blank template kopieer deze om een nieuwe pagina te maken
                                als je tabellen wilt hebben of zo.-->
                                <li>
                                    <a href="tables.php"><i class="fa fa-edit fa-fw"></i> Tables (template)</a>
                                </li>
                                <li>
                                    <a href="timetable.php"><i class="fa fa-edit fa-fw"></i> Rooster</a>
                                </li>
                                <!--einde tables / blank template-->
								<?php if($user->Get($_SESSION["uid"], "rank_id") >= $permission->Get("menu_admin")) { ?>
                                <li>
                                    <a href="#"><i class="fa fa-user fa-fw"></i> Administratie<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="addstaff.php">Personeel Toevoegen</a>
                                        </li>
                                        <li>
                                            <a href="liststaff.php">Personeelslijst</a>
                                        </li>
                                        <li>
                                            <a href="#">Meer <span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li>
                                                    <a href="#">Third Level Item</a>
                                                </li>
                                                <li>
                                                    <a href="#">Third Level Item</a>
                                                </li>
                                                <li>
                                                    <a href="#">Third Level Item</a>
                                                </li>
                                                <li>
                                                    <a href="#">Third Level Item</a>
                                                </li>
                                            </ul>
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-unlock fa-fw"></i> Uitloggen</a>
                                </li>
							</li>
							<?php } ?>	
                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>




            <?php } ?>