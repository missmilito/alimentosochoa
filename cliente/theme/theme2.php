
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

  <a target="_blank" href="#menu-toggle" style="color: #FFFFFF" class="btn navbar-brand"  id="menu-toggle"><span class="glyphicon glyphicon-list-alt "></span></a>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right ">
                <li>
                    <a id="menu" href="" style=" color: #FFFFFF; background-color: #395DA1" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"><span style="font-family:arial;"> <?php echo $_SESSION['nombreusu'].' '.$_SESSION['apeusu'] ?></span></i><b class="caret"></b></a>
                    <ul id="menu" style="background-color: #395DA1; color: #FFFFFF" class="dropdown-menu">
                        <li><a href="perfilusuario.php" id="menu" style="background-color: #395DA1; color: #FFFFFF" href="#">Perfil.</a></li>
                        <li class="divider"></li>
                        <li><a id="menu" href="" style="background-color: #395DA1; color: #FFFFFF" onclick="myFunction()">Cerrar sesión.</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<script type="text/javascript">
function myFunction() {
  top.location.replace("../login/logout.php");
}
</script>
