
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
		<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- CUSTOM BOOTSTRAP CSS-->
		<link href="css/perfilusuario/styles.css" rel="stylesheet">


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
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="https://github.com/fontenele/bootstrap-navbar-dropdowns" target="_blank">GitHub</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu 2 <b class="caret"></b></a>

                        <ul class="dropdown-menu">
                            <li><a href="#">Action [Menu 2.1]</a></li>
                            <li><a href="#">Another action [Menu 2.1]</a></li>
                            <li><a href="#">Something else here [Menu 2.1]</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link [Menu 2.1]</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link [Menu 2.1]</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown [Menu 2.1] <b class="caret"></b></a>

                                <ul class="dropdown-menu">
                                    <li><a href="#">Action [Menu 2.2]</a></li>
                                    <li><a href="#">Another action [Menu 2.2]</a></li>
                                    <li><a href="#">Something else here [Menu 2.2]</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link [Menu 2.2]</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown [Menu 2.2] <b class="caret"></b></a>

                                        <ul class="dropdown-menu ">
                                            <li>
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown [Menu 2.3] <b class="caret"></b></a>

                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Action [Menu 2.4]</a></li>
                                                    <li><a href="#">Another action [Menu 2.4]</a></li>
                                                    <li><a href="#">Something else here [Menu 2.4]</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link [Menu 2.4]</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">One more separated link [Menu 2.4]</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
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

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                      <!--contenido de la página-->
                      <!--información de usuario-->
                      <div class="container">

      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
<p class=" text-info">May 05,2014,03:00 pm </p>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Sheena Shrestha</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <div class="header agile">
                        	<div class="wrap">
                        		<div class="login-main wthree">
                        			<div class="login">

                        			<div class="clear"> </div>
                        				<h4><a href="logout.php"> Cerrar sesión</a></h4>
                        			</div>


                        		</div>
                        	</div>
                        </div>
                        <td>Nombre:</td>
                        <td><?php echo $_SESSION['nombreusu'].' '.$_SESSION['emailusu']; ?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $_SESSION['emailusu']; ?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>01/24/1988</td>
                      </tr>

                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td>Female</td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td>Kathmandu,Nepal</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com">info@support.com</a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                        </td>

                      </tr>

                    </tbody>
                  </table>

                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>

          </div>
        </div>
      </div>
    </div>
                      <!--fin de información de usuario-->

                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


  </body>

  <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

</html>
