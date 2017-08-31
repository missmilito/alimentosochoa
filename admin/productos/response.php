
<?php

	//include connection file
	include_once("connection.php");

	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;

	$action = isset($params['action']) != '' ? $params['action'] : '';
	$clients = new Clients($connString);

	switch($action) {
	 case 'add':
		$clients->insertClients($params);
	 break;
	 case 'edit':
		$clients->updateClients($params);
	 break;
	 case 'delete':
		$clients->deleteClients($params);
	 break;
	 default:
	 $clients->getClients($params);
	 return;
	}

	class Clients {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}

	public function getClients($params) {

		$this->data = $this->getRecords($params);

		echo json_encode($this->data);
	}
	function insertClients($params) {
		$data = array();
		$idprod=$params['codigo'];
		$capacidad=$params['capacidad'];
		$sql = "INSERT INTO tblproducto (codigo, nomprod, descprod, preciounit, capacidad, idsubcat, idproveedor, status) VALUES('$idprod', '" . $params["nombre"] . "', '" . $params["descprod"] . "', '" . $params["precio"] . "', '$capacidad', '" . $params["subcat"] . "', '" . $params["proveedor"]. "', '1');" ;
		mysql_query ("SET NAMES 'utf8'");
		echo $result = mysqli_query($this->conn, $sql) or die("error to insert client data");

	}


	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;

		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
				$start_from = ($page-1) * $rp;

		$sql = $sqlRec = $sqlTot = $where = "";

		if( $params['searchPhrase'] !="" ) {
			$where.="WHERE ";
			$where .=" e.idproducto= a.codigo and a.idproveedor = b.id and a.idsubcat = c.id  and a.status=d.id and (a.nomprod LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.preciounit LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR c.nomsub LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.descprod LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR b.nomprov LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR d.nomstatus LIKE '".$params['searchPhrase']."%' )";

		 if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";

			$sql = "select a.id, a.preciounit, a.descprod,  a.nomprod, b.nomprov, c.nomsub, d.nomstatus, e.stock as capacidad from tblproducto a, tblproveedores b, tblsubcategoria c, tblstatus d, logstock e ";

			$sqlTot = $sql;
			$sqlRec = $sql;
		 }
		 if(isset($where) && $where != '') {

			 $sqlTot= "select a.codigo, a.id, a.preciounit, a.descprod,  a.nomprod, b.nomprov, c.nomsub, d.nomstatus, e.stock as capacidad from tblproducto a, tblproveedores b, tblsubcategoria c, tblstatus d, logstock e   $where";
			 $sqlRec= "select a.codigo, a.id, a.preciounit, a.descprod,  a.nomprod, b.nomprov, c.nomsub, d.nomstatus, e.stock as capacidad from tblproducto a, tblproveedores b, tblsubcategoria c, tblstatus d, logstock e   $where";
		 }
		 if ($rp!=-1)
		 $sqlRec .= " LIMIT ". $start_from .",".$rp;

	 }
		else {

			$sql = "select a.id, a.codigo, a.preciounit, a.descprod, a.nomprod, b.nomprov, c.nomsub, d.nomstatus, e.stock as capacidad from tblproducto a, tblproveedores b, tblsubcategoria c, tblstatus d, logstock e where e.idproducto= a.codigo and a.idproveedor = b.id and a.idsubcat = c.id and a.status=d.id";

			$sqlTot .= $sql;
			$sqlRec .= $sql;
			//concatenate search sql if value exist
			if ($rp!=-1)
			$sqlRec .= " LIMIT ". $start_from .",".$rp;
		}
		 // getting total number records without any search
		 //concatenate search sql if value exist

		 mysql_query ("SET NAMES 'utf8'");
		$qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot employees data");
		$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch employees data");

		while( $row = mysqli_fetch_assoc($queryRecords) ) {
			$data[] = $row;
		}

		$json_data = array(
			"current"            => intval($params['current']),
			"rowCount"            => 10,
			"total"    => intval($qtot->num_rows),
			"rows"            => $data   // total data array
			);

		return $json_data;
	}
	function updateClients($params) {
			$data = array();
		$capacidad = $params["actualizarcap"];
		$nuevacapacidad = $params["edit_capacidad"];
		if (isset($capacidad)){
			if($capacidad=='1'){
				$sql = "Update tblproducto set codigo='".$params["edit_cod"]."', nomprod='".$params["edit_nombre"]."', capacidad='$nuevacapacidad', descprod='".$params["edit_desc"]."', preciounit='".$params["edit_precio"]."', status='".$params["edit_status"]."', idsubcat='".$params["edit_subcat"]."', idproveedor='".$params["edit_proveedor"]."' WHERE id='".$_POST['edit_id']."' ";

			}
		else{
			$sql = "Update tblproducto set codigo='".$params["edit_cod"]."', nomprod='".$params["edit_nombre"]."', descprod='".$params["edit_desc"]."', preciounit='".$params["edit_precio"]."', status='".$params["edit_status"]."', idsubcat='".$params["edit_subcat"]."', idproveedor='".$params["edit_proveedor"]."' WHERE id='".$_POST['edit_id']."' ";

		}
}
		//print_R($_POST);die;


		echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
	}


}
?>
