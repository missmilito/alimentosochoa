
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
			$where .=" c.id = a.idestadoped and d.id = a.idcliente and a.idestadopag = '1' and (d.nomcliente LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR c.EstadoPed LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.id LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.fechaped LIKE '".$params['searchPhrase']."%' )";
		 if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";

			$sql = "select a.id as idPedido, CONCAT(d.nomcliente, ' ', d.apellidocli) as cliente, DATE_FORMAT(a.fechaped, '%Y/%m/%d') as fechanew, a.fechapag, datediff(a.fechapag, CURDATE()) dias, c.EstadoPed from tblpedido a,  tblestadopag b, tblestadoped c, tblcliente d";

			$sqlTot = $sql;
			$sqlRec = $sql;
		 }
		 if(isset($where) && $where != '') {

			 $sqlTot= "select a.id as idPedido, CONCAT(d.nomcliente, ' ', d.apellidocli) as cliente, DATE_FORMAT(a.fechaped, '%Y/%m/%d') as fechanew, a.fechapag, datediff(a.fechapag, CURDATE()) dias, c.EstadoPed from tblpedido a,  tblestadopag b, tblestadoped c, tblcliente d $where group by a.id";
			 $sqlRec= "select a.id as idPedido, CONCAT(d.nomcliente, ' ', d.apellidocli) as cliente, DATE_FORMAT(a.fechaped, '%Y/%m/%d') as fechanew, a.fechapag, datediff(a.fechapag, CURDATE()) dias, c.EstadoPed from tblpedido a,  tblestadopag b, tblestadoped c, tblcliente d  $where group by a.id";
		 }
		 if ($rp!=-1)
		 $sqlRec .= " LIMIT ". $start_from .",".$rp;

	 }
		else {

			$sql = "select a.id as idPedido, CONCAT(d.nomcliente, ' ', d.apellidocli) as cliente, DATE_FORMAT(a.fechaped, '%Y/%m/%d') as fechanew, a.fechapag, datediff(a.fechapag, CURDATE()) dias, c.EstadoPed from tblpedido a,  tblestadopag b, tblestadoped c, tblcliente d  where  c.id = a.idestadoped and d.id = a.idcliente and a.idestadopag = '1' group by a.id";

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
