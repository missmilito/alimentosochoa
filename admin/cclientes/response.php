
<?php
	//include connection file
	include_once("connection.php");

	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;

	$action = isset($params['action']) != '' ? $params['action'] : '';
	$empCls = new Employee($connString);

	switch($action) {
	 case 'add':
		$empCls->insertEmployee($params);
	 break;
	 case 'edit':
		$empCls->updateEmployee($params);
	 break;
	 case 'delete':
		$empCls->deleteEmployee($params);
	 break;
	 default:
	 $empCls->getEmployees($params);
	 return;
	}

	class Employee {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}

	public function getEmployees($params) {

		$this->data = $this->getRecords($params);

		echo json_encode($this->data);
	}
	function insertEmployee($params) {
		$data = array();
		$sql = "INSERT INTO `tblcliente` (apellidocli, emailcli, nomcli) VALUES('" . $params["name"] . "', '" . $params["salary"] . "','" . $params["age"] . "');  ";

		echo $result = mysqli_query($this->conn, $sql) or die("error to insert employee data");

	}


	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;

		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
        $start_from = ($page-1) * $rp;

		$sql = $sqlRec = $sqlTot = $where = '';
$sql2 = $sqlRec2 = $sqlTot2 = $where = '';
		if( !empty($params['searchPhrase']) ) {
			$where .=" WHERE ";
			$where .=" ( a.nomcliente LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR a.apellidocli LIKE '".$params['searchPhrase']."%' ";

			$where .=" OR a.emailcli LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT a.id, a.nomcliente, a.apellidocli, a.telefcli, a.emailcli, c.nomstatus FROM tblcliente a, tblusuario b, tblstatus c where a.id=b.id and b.idstatus=c.id";
$sql2 = "SELECT nomcliente from tblcliente";
		$sqlTot .= $sql;
		$sqlRec .= $sql;
		$sqlTot2 .= $sql2;
		$sqlRec2 .= $sql2;

		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot2 .= $where;
			$sqlRec2 .= $where;
		}
		if ($rp!=-1)
		$sqlRec2 .= " LIMIT ". $start_from .",".$rp;


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


	function updateEmployee($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "Update `tblcliente` set nomcliente = '" . $params["edit_name"] . "', apellidocli='" . $params["edit_salary"]."', emailcli='" . $params["edit_age"] . "' WHERE id='".$_POST["edit_id"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
	}

	function deleteEmployee($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `employee` WHERE id='".$params["id"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error to delete employee data");
	}
}
?>
