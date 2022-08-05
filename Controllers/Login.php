<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Login extends BaseController {
	protected	$Sql_model;
	protected	$session;

  function __construct()
  {
    $this->Sql_model = model('app\Models\Sql_model');
    $this->session = session();
  }

  public function index(){
    echo view('view_login');
  }

  public function login_check(){
		$id = $this->request->getPost('id');
		$password = $this->request->getPost('password');
		
		$ar_return = array();
		$ar_return['return_code'] = 0;
		$ar_return['msg'] = '';

		$user = array();
		$sql = "SELECT * FROM user WHERE id = '" . $id . "' ";
		$user = $this->Sql_model->run($sql);

    $sql1 = "SELECT nickname FROM user WHERE id = '$id'";
    $nick = $this->Sql_model->run($sql1);
		$arni = array();
		$arni['nickname'] = $nick;
		
		if (count($user) <= 0) {
			$ar_return['msg'] = '존재하지 않는 아이디입니다';
			$ar_return['return_code'] = -1;
		}

		if ($ar_return['return_code'] == 0) {
			$pw = '';
			$sql = "SELECT PASSWORD('$password') as pw FROM user WHERE id = '" . $id . "' ";
			$row = $this->Sql_model->run($sql);
			if (count($row) > 0) {
				$pw = $row[0]->pw;
			}
			
			if ($pw != $user[0]->password) {
				$ar_return['msg'] = '비밀번호가 틀립니다';
				$ar_return['return_code'] = -1;
			}
			else {
        $this->session->set('whouser', $id);
        $this->session->set('whonick', $nick[0]->nickname);
				
				$ar_return['msg'] = '로그인 되었습니다';
			}
		}

		echo json_encode($ar_return);
	}
}
?>