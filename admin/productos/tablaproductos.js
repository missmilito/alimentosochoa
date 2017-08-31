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
    labels: {

            loading: "No existen productos registrados actualmente"
        },

    url: "productos/response.php",

    formatters: {

            "commands": function(column, row)
            {
                return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> ";
            }

        }
   }).on("loaded.rs.jquery.bootgrid", function()
{
  $('[data-toggle="tooltip"]').tooltip();
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
                                $('#edit_cod').val(ele.siblings(':nth-of-type(2)').html());

                                $('#edit_nombre').val(ele.siblings(':nth-of-type(3)').html());
                                $('#edit_desc').val(ele.siblings(':nth-of-type(4)').html());
                                $('#edit_precio').val(ele.siblings(':nth-of-type(5)').html());
                                $('#edit_capacidad').val(ele.siblings(':nth-of-type(6)').html());



          } else {
           alert('Now row selected! First select row, then click edit button');
          }
    });
});

function ajaxAction(action) {
        data = $("#frm_"+action).serializeArray();
        $.ajax({
          type: "POST",
          url: "productos/response.php",
          data: data,
          dataType: "json",
          success: function(response)
          {
          $('#'+action+'_model').modal('hide');
          $("#employee_grid").bootgrid('reload');
          }
        });
      }

      function ajaxAction2(action) {
              data = $("#frm_"+action).serializeArray();
              $.ajax({
                type: "POST",
                url: "productos/logcapacidad.php",
                data: data,
                dataType: "json",
                success: function(response)
                {

                }
              });
            }

      $( "#command-add" ).click(function() {
        $('#add_model').modal('show');
      });
      $( "#btn_add" ).click(function() {

        ajaxAction('add');
          ajaxAction2('add');
      });
      $( "#btn_edit" ).click(function() {
        ajaxAction2('edit');
        ajaxAction('edit');

      });
});
