<?php include('security.php') ?>
<div class="navbar navbar-default navbar-fixed-top " style="background-color: #333;" role="navigation">
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

  <a target="_blank" href="#menu-toggle" style="color:white" class="btn navbar-brand"  id="menu-toggle"><span class="glyphicon glyphicon-list-alt "></span></a>
        </div>



        <div class="collapse navbar-collapse">



            <ul class="nav navbar-nav navbar-right  ">

                <li>
                    <a id="menu" href="#" style="color:white" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"><?php echo $_SESSION['puesto'] ?></i><b class="caret"></b></a>

                    <ul id="menu"  class="dropdown-menu navbar-inverse">

                        <li ><a id="menu" style="color:white"  href="perfilusuario.php">Perfil.</a></li>
                        <li class="divider"></li>
                        <li><a id="menu"  style="color:white" href="../login/logout.php">Cerrar Sesión.</a></li>




                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
