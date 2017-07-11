<?php

include('security.php');
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

    <!-- CUSTOM BOOTSTRAP CSS-->
		<link href="css/perfilusuario/styles.css" rel="stylesheet">
    <link href="theme/style.css" rel="stylesheet">


  </head>
  <body>



        <!-- Page Content -->
        <div id="page-content-wrapper">
          <!--Theme -->
      <div><?php include('theme/theme.php') ?></div>

          <!--Theme-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                      <!--contenido de la página-->
                      <!--información de usuario-->
                      <div class="container">

      <div class="row">
      <div style="margin-top: 50px" class="col-md-5  toppad  pull-right col-md-offset-3 ">

        <?php
$hoy = date("d/m/Y");
?>
<td><p class="text-info">Maracay, <?= $hoy; ?></p></td>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Perfil de usuario</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/userpic.jpg" class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <div class="header agile">
                        	<div class="wrap">
                        		<div class="login-main wthree">
                        			<div class="login">

                        			<div class="clear"> </div>

                        			</div>


                        		</div>
                        	</div>
                        </div>
                        <td>Nombre:</td>
                        <td><?php echo $_SESSION['nombreusu'] ?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $_SESSION['emailusu']; ?></td>
                      </tr>
                      <tr>
                        <td>Empresa:</td>
                        <td><?php echo $_SESSION['empusu']; ?></td>
                      </tr>

                         <tr>
                             <tr>
                        <td>Dirección:</td>
                        <td><?php echo $_SESSION['empdir']; ?></td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td>Kathmandu,Nepal</td>
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
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <script src="js/perfilusuario/scripts.js"></script>
    <script src="theme/script.js"></script>

</html>
