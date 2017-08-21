<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">

    <script src="dist/jquery-1.11.1.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>

    <!-- BOOTSTRAP CORE CSS-->
		<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- CUSTOM BOOTSTRAP CSS-->

    <link href="theme/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/perfilusuario/scripts.js"></script>
    <script src="theme/scripts.js"></script>
    <link rel="stylesheet" href="theme/styles2.css">
    <style media="screen">
    .row-centered {text-align:center;}
.col-centered { display:inline-block; float:none; margin-right:-4px;}
    </style>
  </head>
  <body>
<div><?php include('theme/theme.php') ?></div>
<div id="wrapper">

  <!-- Sidebar -->
  <div id="sidebar-wrapper">

      <ul class="sidebar-nav">

          <li class="sidebar-brand" >
              <a style="text-align: center">
                  MODULOS
              </a>
          </li>

         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-pencil 2x"> REGISTRO</i><span class="caret"></span></a>
           <ul class="dropdown-menu2 dropdown" >
             <li><a href="nuevopedido.php">Nuevo Pedido.</a></li>
           </ul>
         </li>
         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-ok 2x"> CONSULTAR</i><span class="caret"></span></a>
           <ul class="dropdown-menu2 dropdown" >
             <li><a href="todospedidos.php">Pedidos.</a></li>
             <li><a href="pagos.php">Pagos.</a></li>
           </ul>
         </li>
         <li class="dropdown">
           <a href="herramientas.php" class="dropdown-toggle" ><i class="glyphicon glyphicon-cog 2x"> HERRAMIENTAS</i></a>
         </li>

      </ul>
  </div>
  <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" style="margin-top:90px">
            <div class="container">
              <div class="col-lg-12">
                <?php if (!empty($_GET['edit'])){
                 ?>
                 <div class="row row-centered">
                 <div class="col-xs-12 col-sm-12 col-md-8 col-centered">
                 <div id="message" name="message" class="alert alert-success">Información editada correctamente.</div>
               </div>
             </div>
               <?php } ?>
               <div class="col-lg-12">
                 <?php if (!empty($_GET['psw'])){
                  ?>
                  <div id="message" name="message" class="alert alert-success">Contraseña cambiada exitosamente.</div>
                <?php } ?>
                <div class="col-lg-12">
                <div class="container">
      <div class="row">

      <div  class=" col-md-5 pull-right col-md-offset-3 ">
        <?php
            $hoy = date("d/m/Y");
            ?>
            <td><p class="fecha">Maracay, <?= $hoy; ?></p></td>
      </div>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


          <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #4260A4; color: #FFFFFF">
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
                        <td><?php echo $_SESSION['nombreusu'].' '.$_SESSION['apeusu'] ?></td>
                      </tr>
                      <tr>
                        <td>Teléfo:</td>
                        <td><?php echo $_SESSION['telefusu']; ?></td>
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

                      </tr>

                    </tbody>
                  </table>


                </div>
              </div>
            </div>
                 <div class="panel-footer" style="height: 60px">
                        <span class="pull-right">
                            <a  href="editinfo.php" style="font-size: 15px; background-color:#B03848" type="button" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit " style="color: #FFFFFF;"><span  style="color: #FFFFFF; font-family: arial"> Editar información. </span></i></a>
                        </span>
                        <div id="command-add">
                        <span class="pull-right">
                            <a href="changepassword.php" style="font-size: 15px; background-color:#C67333" type="button" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit " style="color: #FFFFFF;"><span  style="color: #FFFFFF; font-family: arial"> Cambiar contraseña. </span></i></a>
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

            <!-- /#wrapper -->

        </div>
        <!-- /#page-content-wrapper -->




  </body>

  <!-- script references -->

<script type="text/javascript">

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(document).ready(function() {
    $('.navbar a.dropdown-toggle').on('click', function(e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if(!$parent.parent().hasClass('nav')) {
            $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
        }

        $('.nav li.open').not($(this).parents("li")).removeClass("open");

        return false;
    });
});

</script>

<script type="text/javascript">

$( "#command-add" ).click(function() {
  $('#add_model').modal('show');

});
</script>
</html>
