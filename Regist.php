<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Regist extends BaseController {
  protected	$Sql_model;
	protected	$session;

  function __construct()
  {
    $this->Sql_model = model('app\Models\Sql_model');
		$this->session = session();
  }

  public function index(){
    echo view('view_regist');
  }

  public function regist_check() {
    $bcname = $this->request->getPost('bcname');
    $officelocation = $this->request->getPost('officelocation');
    $officenumber = $this->request->getPost('officenumber');
    $cellphone = $this->request->getPost('cellphone');
    $seid = $this->session->get('whouser');

    $ardata = array();
    $ardata['return_code'] = 0;
    $ardata['msg'] = '';
     
    $sql = "INSERT INTO bcinfo (id, bcname, officenumber, officelocation, cellphone) 
              VALUES('$seid', '$bcname', '$officenumber', '$officelocation', '$cellphone')";
    $qry = $this->Sql_model->run($sql);

    if($qry == FALSE){
      $ardata['msg'] = '등록에 실패하였습니다.';
      $ardata['return_code'] = -1;
    }
    else
    {
      $ardata['msg'] = '등록이 성공적으로 완료되었습니다.';
    }
    echo json_encode($ardata);
    
  }
}
?>