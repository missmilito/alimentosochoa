
<?php

	//include connection file
	include_once("connection.php");

	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;

	$action = isset($params['action']) != '' ? $params['action'] : '';
	$admin = new Admin($connString);

	switch($action) {
	 case 'add':
		$admin->insertAdmin($params);
	 break;
	 default:
	 $admin->getAdmin($params);
	 return;
	}

	class Admin {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}

	public function getAdmin($params) {

		$this->data = $this->getRecords($params);

		echo json_encode($this->data);
	}
	function insertAdmin($params) {
		$reg_password = utf8_decode($params['password']);
		$password = sha1($reg_password);
		$data = array();
		$sql = "INSERT INTO tblusuario (`id`, `password`, `idnivel`, `idstatus`) VALUES('" . $params["idadmin"] . "', '" . $password . "', '" . $params["nivel"] . "','1');  ";

		echo $result = mysqli_query($this->conn, $sql) or die("error to insert client data");

	}


	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;

		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
        $start_from = ($page-1) * $rp;

		$sql = $sqlRec = $sqlTot = $where = '';

		if( !empty($params['searchPhrase']) ) {
			$where .=" WHERE ";
			$where .=" ( id LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR nomprov LIKE '".$params['searchPhrase']."%' ";

			$where .=" OR direcprov LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR telefprov LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT * FROM tbladmin";
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
