<?php
namespace App\Models;

use CodeIgniter\Model;

class Sql_model extends Model {
	public	$db;
	
	function __construct() {
		parent::__construct();
		$this->db = db_connect();
	}
	
	function run($sql, $param = NULL)
	{
		$qry = NULL;
		if ($param == NULL) {
			$qry = $this->db->query($sql); 
		}
		else {
			$qry = $this->db->query($sql, $param);
		}

		if (!is_bool($qry)) {
			$result = array();
			if ($qry != NULL) {
				$result = $qry->getResult(); 
				$qry->freeResult(); 
			}
			return $result;
		}
		else return $qry;
	}
}
?>