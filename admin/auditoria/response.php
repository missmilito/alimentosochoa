
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
		$data = array();;
		$sql = "INSERT INTO tblcliente (id, nomcliente, apellidocli, emailcli) VALUES('" . $params["id"] . "', '" . $params["name"] . "', '" . $params["apellido"] . "','" . $params["email"] . "');  ";

		echo $result = mysqli_query($this->conn, $sql) or die("error to insert client data");

	}


	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;

		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
				$start_from = ($page-1) * $rp;

		$sql = $sqlRec = $sqlTot = $where = "";

		if( $params['searchPhrase'] !="" ) {
			$where.="WHERE ";
			$where .=" (iduser LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR seccion LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR idseccion LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR operacion LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR fecha LIKE '".$params['searchPhrase']."%' )";
		 if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";

			$sql = "SELECT * FROM `tbl_auditoria`";
			$sqlTot = $sql;
			$sqlRec = $sql;
		 }
		 if(isset($where) && $where != '') {

			 $sqlTot= "SELECT * FROM `tbl_auditoria` $where";
			 $sqlRec= "SELECT * FROM `tbl_auditoria`  $where ";
		 }
		 if ($rp!=-1)
		 $sqlRec .= " LIMIT ". $start_from .",".$rp;

	 }
		else {

			$sql = "SELECT `id`, `iduser`, `seccion`, `idseccion`, `operacion`, `fecha` FROM tbl_auditoria group by fecha";

			$sqlTot .= $sql;
			$sqlRec .= $sql;
			//concatenate search sql if value exist
			if ($rp!=-1)
			$sqlRec .= " LIMIT ". $start_from .",".$rp;
		}
		 // getting total number records without any search
		 //concatenate search sql if value exist


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
		$sql = "Update `tblpedido` set idestadopag = '2' WHERE id='".$_POST["edit_id"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
	}


}
?>
