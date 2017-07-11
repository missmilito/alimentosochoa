
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Bootgrid example with add,edit and delete using PHP,MySQL and AJAX</title>
<!--tabla-->
    <link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
    <link href="dist/jquery.bootgrid.css" rel="stylesheet" />
    <script src="dist/jquery-1.11.1.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
    <script src="dist/jquery.bootgrid.min.js"></script>

    <!--sidebar-->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.js">
    <link rel="stylesheet" href="vendor/jquery/jquery-3.2.1.min.js">
    <link rel="stylesheet" href="theme/styles.css">
  </head>

<body>
  <div  class="col-xs-12">
  <div><?php include('theme/theme.php') ?></div>
  <div id="wrapper" >

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

  <div id="page-content-wrapper">
         <div class="container"  style="margin-top:50px" >
             <div class="row">
               <div class="col-lg-8">
  <a href="#menu-toggle" class="btn btn-primary btnabrir"  id="menu-toggle"><span class="glyphicon glyphicon-list-alt "></span></a>
  <div class="container">
        <div class="">
          <h1>Simple Bootgrid example with add,edit and delete using PHP,MySQL and AJAX</h1>
          <div class="col-lg-12">

      </div>
        </div>
      </div>


          </div>
      </div>
  </div>
  </div>

</div>
</div>

</body>
</div>
</html>
<script type="text/javascript">
$( document ).ready(function() {
	var grid = $("#employee_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},

		url: "cclientes/response.php",
		formatters: {
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " +
		                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    grid.find(".command-edit").on("click", function(e)
    {
        //alert("You pressed edit on row: " + $(this).data("row-id"));
			var ele =$(this).parent();
			var g_id = $(this).parent().siblings(':first').html();
            var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
console.log(g_id);
                    console.log(g_name);

		//console.log(grid.data());//
		$('#edit_model').modal('show');
					if($(this).data("row-id") >0) {

                                // collect the data
                                $('#edit_id').val(ele.siblings(':first').html()); // in case we're changing the key
                                $('#edit_name').val(ele.siblings(':nth-of-type(2)').html());
                                $('#edit_salary').val(ele.siblings(':nth-of-type(3)').html());
                                $('#edit_age').val(ele.siblings(':nth-of-type(4)').html());
					} else {
					 alert('Now row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {

		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
					alert(conf);
                    if(conf){
                                $.post('cclientes/response.php', { id: $(this).data("row-id"), action:'delete'}
                                    , function(){
                                        // when ajax returns (callback),
										$("#employee_grid").bootgrid('reload');
                                });
								//$(this).parent('tr').remove();
								//$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                    }
    });
});

function ajaxAction(action) {
				data = $("#frm_"+action).serializeArray();
				$.ajax({
				  type: "POST",
				  url: "cclientes/response.php",
				  data: data,
				  dataType: "json",
				  success: function(response)
				  {
					$('#'+action+'_model').modal('hide');
					$("#employee_grid").bootgrid('reload');
				  }
				});
			}

			$( "#command-add" ).click(function() {
			  $('#add_model').modal('show');
			});
			$( "#btn_add" ).click(function() {
			  ajaxAction('add');
			});
			$( "#btn_edit" ).click(function() {
			  ajaxAction('edit');
			});
});


   $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
   });

</script>
