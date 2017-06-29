
<?php

session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- BOOTSTRAP CORE CSS-->
    <link href="../vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- CUSTOM BOOTSTRAP CSS-->
    <link href="styles.css" rel="stylesheet">


  </head>
  <body>
    <!--inicio navbar logged in -->
    <div class="navbar navbar-default navbar-fixed-top"  role="navigation">
      <!--boton toggle menu -->
        <!--comienzo del navbar-->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#menu-toggle" class="navbar-brand" id="menu-toggle">Menú</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-toggle navbar-left ">
                    <span class="icon-bar"></span>
                </ul>
                <ul class="nav navbar-nav navbar-right ">

                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"><?php echo ' '.$_SESSION['nombreusu'].''.$_SESSION['apeusu'] ?></i><b class="caret"></b></a>

                        <ul class="dropdown-menu">

                            <li><a href="logout.php">Cerrar sesión.</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Another action [Menu 2.1]</a></li>




                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
        <!--fin navbar logged in -->
  <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
  </body>

  <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>

</html>
