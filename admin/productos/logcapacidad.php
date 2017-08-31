
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
		$sql = "INSERT INTO logstock (id, idproducto, stock) VALUES('', '" . $params["codigo"] . "', '" . $params["capacidad"] . "');  ";
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
			$where .=" a.idproveedor = b.id and a.idsubcat = c.id  and a.status=d.id and (a.nomprod LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.preciounit LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR c.nomsub LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.descprod LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR b.nomprov LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR d.nomstatus LIKE '".$params['searchPhrase']."%' )";

		 if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";

			$sql = "select a.id, a.preciounit, a.capacidad, a.descprod, a.nomprod, b.nomprov, c.nomsub, d.nomstatus from tblproducto a, tblproveedores b, tblsubcategoria c, tblstatus d ";

			$sqlTot = $sql;
			$sqlRec = $sql;
		 }
		 if(isset($where) && $where != '') {

			 $sqlTot= "select a.id, a.preciounit, a.capacidad, a.descprod, a.nomprod, b.nomprov, c.nomsub, d.nomstatus from tblproducto a, tblproveedores b, tblsubcategoria c, tblstatus d   $where";
			 $sqlRec= "select a.id, a.preciounit, a.descprod, a.nomprod, b.nomprov, c.nomsub, d.nomstatus from tblproducto a, tblproveedores b, tblsubcategoria c, tblstatus d   $where";
		 }
		 if ($rp!=-1)
		 $sqlRec .= " LIMIT ". $start_from .",".$rp;

	 }
		else {

			$sql = "select a.id, a.preciounit, a.descprod, a.nomprod, b.nomprov, a.capacidad, c.nomsub, d.nomstatus from tblproducto a, tblproveedores b, tblsubcategoria c, tblstatus d where a.idproveedor = b.id and a.idsubcat = c.id  and a.status=d.id";

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
		//print_R($_POST);die;
		$sql = "Update logstock set  stock='".$params["edit_capacidad"]."' WHERE idproducto='".$_POST['edit_cod']."' ";

		echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
	}


}
?>
