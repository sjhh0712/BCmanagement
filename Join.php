<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Join extends BaseController{
  protected $Sql_model;
  protected $session;

  function __construct()
  {
    $this->Sql_model = model('app\Models\Sql_model');
    $this->session = session();
  }

  public function index(){
    echo view('view_join');
  }

  public function join_check(){
		$name = $this->request->getPost('name');
		$id = $this->request->getPost('id');
    $nick = $this->request->getPost('nick');
		$password = $this->request->getPost('password');
		
		$ar_return = array();
		$ar_return['return_code'] = 0;
		$ar_return['msg'] = '';
		
		$sql = 
			"INSERT INTO user (name, nickname, id, password) VALUES
				('$name', '$nick', '$id', PASSWORD('$password'))";
		
		$qry = $this->Sql_model->run($sql);
		if ($qry === FALSE) {
			$ar_return['msg'] = '회원데이터를 추가할 수 없습니다';
			$ar_return['return_code'] = -1;
		}
    else
    {
      $ar_return['msg'] = '회원가입이 성공적으로 완료되었습니다.';
    }
		
		echo json_encode($ar_return);
  }
}
?>