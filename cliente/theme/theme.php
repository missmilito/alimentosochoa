<?php include('security.php') ?>
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

  <a target="_blank" href="#menu-toggle" class="btn navbar-brand"  id="menu-toggle"><span class="glyphicon glyphicon-list-alt "></span></a>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right ">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"><?php echo $_SESSION['nombreusu'].'.'.$_SESSION['apeusu'] ?></i><b class="caret"></b></a>

                    <ul class="dropdown-menu">

                        <li><a href="#">Perfil.</a></li>
                        <li class="divider"></li>
                        <li><a href="../login/logout.php">Cerrar sesión.</a></li>

                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
