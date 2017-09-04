
<?php
	//include connection file
	include_once("connection.php");

	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;

	$action = isset($params['action']) != '' ? $params['action'] : '';
	$clients = new Clients($connString);

	switch($action) {
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
	function getRecords($params) {
		session_start();

		$params["id"]=$_SESSION['idusuario'];
		$idusuario=$_SESSION['idusuario'];

		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;

		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
        $start_from = ($page-1) * $rp;

		$sql = $sqlRec = $sqlTot = $where = '';

		if( !empty($params['searchPhrase']) ) {
			$where .=" WHERE ";
			$where .=" ( id LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR nomcliente LIKE '".$params['searchPhrase']."%' ";

			$where .=" OR apellidocli LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR emailcli LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "select a.num as num, a.id as idPedido, a.fechaped, b.nomestado, a.fechapag, c.EstadoPed from tblpedido a, tblestadopag b, tblestadoped c, tblcliente d where c.id = a.idestadoped and a.idcliente='".$idusuario."' and d.id = a.idcliente and a.idestadopag = b.id";

		$sqlTot .= $sql;
		$sqlRec .= $sql;


		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		if ($rp!=-1)
		$sqlRec .= " LIMIT ". $start_from .",".$rp;


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


}
?>
