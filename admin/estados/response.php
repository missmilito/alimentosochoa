
<?php
	//include connection file
	include_once("connection.php");


	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;

	$action = isset($params['action']) != '' ? $params['action'] : '';
	$pendientes = new Pendientes($connString);

	switch($action) {

	 case 'edit':
		$pendientes->updatePendientes($params);
	 break;

	 default:
	 $pendientes->getPendientes($params);
	 return;
	}

	class Pendientes {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}

	public function getPendientes($params) {

		$this->data = $this->getRecords($params);

		echo json_encode($this->data);
	}



	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;

		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
        $start_from = ($page-1) * $rp;

		$sql = $sqlRec = $sqlTot = $where = "";

		if( $params['searchPhrase'] !="" ) {
			$where.="WHERE ";
			$where .=" b.id='1' and b.id=a.idestadoped and d.id = a.idcliente and (nomcliente LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR EstadoPed LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.id LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.fechaped LIKE '".$params['searchPhrase']."%' )";

	   if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";

			$sql = "select a.num, a.id as idPedido, a.fechaped, CONCAT(d.nomcliente, ' ', d.apellidocli) as cliente, b.EstadoPed from tblpedido a, tblestadoped b, tblcliente d ";

			$sqlTot = $sql;
			$sqlRec = $sql;
		 }
		 if(isset($where) && $where != '') {

			 $sqlTot= "select a.num, a.id as idPedido, a.fechaped, CONCAT(d.nomcliente, ' ', d.apellidocli) as cliente, b.EstadoPed from tblpedido a, tblestadoped b, tblcliente d  $where";
			 $sqlRec= "select a.num, a.id as idPedido, a.fechaped, CONCAT(d.nomcliente, ' ', d.apellidocli) as cliente, b.EstadoPed from tblpedido a, tblestadoped b, tblcliente d  $where";
		 }
		 if ($rp!=-1)
		 $sqlRec .= " LIMIT ". $start_from .",".$rp;

	 }
		else {

			$sql = "select a.num, a.id as idPedido, a.fechaped, CONCAT(d.nomcliente, ' ', d.apellidocli) as cliente, b.EstadoPed from tblpedido a, tblestadoped b, tblcliente d  where  b.id='1' and b.id=a.idestadoped and d.id = a.idcliente group by a.id";

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
	function updatePendientes($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "Update `tblpedido` set idestadoped = '2' WHERE id='".$_POST["pendientes_id"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
	}


}
?>
