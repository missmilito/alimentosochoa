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

    <link href="theme/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/perfilusuario/scripts.js"></script>
    <script src="theme/scripts.js"></script>
    <link rel="stylesheet" href="theme/styles.css">
  </head>
  <body>
<div><?php include('theme/theme.php') ?></div>
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
        <div id="page-content-wrapper" style="margin-top:70px">
            <div class="container-fluid">

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
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        </span>
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


    <!-- /#wrapper -->


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
</html>
