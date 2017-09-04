
<?php
	//include connection file//
	include_once("connection.php");

	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;

	$action = isset($params['action']) != '' ? $params['action'] : '';
	$pagados = new Pagados($connString);

	switch($action) {
	 default:
	 $pagados->getPagados($params);
	 return;
	}

	class Pagados {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}

	public function getPagados($params) {

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
			$where .="a.idcli= b.id and a.fechapagado > 0000-00-00 and (b.nomcliente LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.fechacredito LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.fechapagado LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.idcli LIKE '".$params['searchPhrase']."%' )";
		 if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";

			$sql = "select b.nomcliente, a.id, a.idcli, a.fechacredito, a.fechapagado, datediff(a.fechacredito, a.fechapagado) dias from logpagos a, tblcliente b";

			$sqlTot = $sql;
			$sqlRec = $sql;
		 }
		 if(isset($where) && $where != '') {

			 $sqlTot= "select b.nomcliente, a.id, a.idcli, a.fechacredito, a.fechapagado, datediff(a.fechacredito, a.fechapagado) dias from logpagos a, tblcliente b where a.idcli= b.id $where";
			 $sqlRec= "select b.nomcliente, a.id, a.idcli, a.fechacredito, a.fechapagado, datediff(a.fechacredito, a.fechapagado) dias from logpagos a, tblcliente b where a.idcli= b.id  $where";
		 }
		 if ($rp!=-1)
		 $sqlRec .= " LIMIT ". $start_from .",".$rp;

	 }
		else {

			$sql = "select b.nomcliente, a.idp, a.idcli, a.fechacredito, a.fechapagado, datediff(a.fechacredito, a.fechapagado) dias from logpagos a, tblcliente b where a.idcli= b.id and a.fechapagado > 0000-00-00";

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

			$sql = "Update `tblpedido` set idestadoped = '" . $params["edit_name"] . "'  WHERE id='".$_POST["edit_id"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");

	}


}
?>
