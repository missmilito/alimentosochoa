<div class="container">
      <div class="">
        <h1>Simple Bootgrid example with add,edit and delete using PHP,MySQL and AJAX</h1>
        <div class="col-lg-12">
    <div class="well clearfix">
      <div class="pull-right"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
      <span class="glyphicon glyphicon-plus"></span> Record</button></div></div>
      <div class="table-responsive col-sm-12">
    <table id="subcat_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
      <thead>
        <tr>
                    <th data-column-id="id" data-identifier="true">ID SubCategoria</th>
                    <th data-column-id="nomsub">Nombre</th>

          <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
        </tr>
      </thead>
    </table>
  </div>
    </div>
      </div>
    </div>

    <div id="add2_model" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Employee</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="frm_add">
            <input type="hidden" value="add" name="action" id="action">
                      <div class="form-group">
                        <label for="nomcliente" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name"/>
                      </div>
                      <div class="form-group">
                        <label for="apellidocli" class="control-label">Salary:</label>
                        <input type="text" class="form-control" id="salary" name="salary"/>
                      </div>
              <div class="form-group">
                        <label for="s" class="control-label">Age:</label>
                        <input type="text" class="form-control" id="age" name="age"/>
                      </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_add" class="btn btn-primary">Save</button>
                </div>
          </form>
            </div>
        </div>
    </div>


    <div id="edit2_model" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Employee</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="frm_edit">
            <input type="hidden" value="edit" name="action" id="action">
            <input type="hidden" value="0" name="edit_id" id="edit_id">
                      <div class="form-group">
                        <select id="edit_name" name="edit_name" class="form-control">
                          <option value="1"> Pendiente </option>
                          <option value="2"> Procesado </option>
                          <option value="3"> Entregado </option>
                        </select>
                      </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_edit" class="btn btn-primary">Save</button>
                </div>
          </form>
            </div>
        </div>
    </div>
