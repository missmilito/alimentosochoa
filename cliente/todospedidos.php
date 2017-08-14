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
		<link href="css/todospedidos/styles.css" rel="stylesheet">
	<link href="theme/styles.css" rel="stylesheet">
    <!--BOOTSTRAP JS-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!--TABLE-->

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



  </body>
<script type="text/javascript">
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>
  <!-- script references -->


</html>
