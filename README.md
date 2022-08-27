# 명함관리시스템

> xampp와 php 코드이그나이터를 사용한 명함 관리 시스템

+ Model
+ Controller
+ View


  - < Model >

     Model에서는 sql문을 실행시키기 위한 기본적인 함수들이 들어가있다.
    
  - < Controller >
     
     Controller에서는 클라이언트의 요청을 처리하는 함수들이 들어가있다.
     
  - < View >

     View는 기본적으로 HTML과 JavaScript로 이루어진 파일들의 집합으로 브라우저 부분을 표시한다.
     
    
    
1. Model
  ```c
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

```

> Sql_model클래스는 run함수를 통해 Controller에서 호출되는 query문을 실행한다.
