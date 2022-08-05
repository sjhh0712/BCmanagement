<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Reglist extends BaseController {
	protected	$Sql_model;
	protected	$session;

  function __construct()
  {
    $this->Sql_model = model('app\Models\Sql_model');
    $this->session = session();
  }

  function index() {
    $nick = array();
    $senick = $this->session->get('whonick');

    $nick['nickname'] = $senick;
    echo view('view_reglist', $nick);
  }

  public function infouser() {
    $seid = $this->session->get('whouser');

    $data = array();
    $data['return_code'] = 0;
    $data['msg'] = '';

    $sql = "SELECT user.name, bcinfo.bcname, bcinfo.cellphone, bcinfo.officelocation, bcinfo.officenumber 
            FROM bcinfo INNER JOIN user ON user.id='$seid' AND bcinfo.id=user.id";
    $info = $this->Sql_model->run($sql);
    $data['info'] = $info;
    if(count($info) > 0){
      
    }

    if(count($info) <= 0){
      $data['msg'] = '데이터가 존재하지 않습니다.';
      $data['return_code'] = -1;
    }

    echo json_encode($data);
  }

  public function updateinfo() {
    $bcname = $this->request->getPost('bcname');
    $cellphone = $this->request->getPost('cellphone');
    $officenumber = $this->request->getPost('officenumber');
    $officelocation = $this->request->getPost('officelocation');
    $curbcname = $this->request->getPost('curbcname');
    $curbcnum = $this->request->getPost('curbcnum');
    $curbclc = $this->request->getPost('curbclc');
    $seid = $this->session->get('whouser');

    $ardata = array();
    $ardata['return_code'] = 0;
    $ardata['msg'] = '';

    $sql = "UPDATE bcinfo SET id='$seid', bcname='$bcname', cellphone='$cellphone',
             officenumber='$officenumber', officelocation='$officelocation' 
             WHERE bcname='$curbcname' AND officenumber='$curbcnum' AND officelocation='$curbclc'";
    $qry = $this->Sql_model->run($sql);

    if($qry){
      $ardata['msg'] = '수정 완료';
    }
    else 
    {
      $ardata['return_code'] = -1;
      $ardata['msg'] = '수정 오류';
    }

    echo json_encode($ardata);
  }

  public function deleteinfo() {
    $curbcname = $this->request->getPost('bcname');
    $curbcnum = $this->request->getPost('officenumber');
    $curbclc = $this->request->getPost('officelocation');

    $ardata = array();
    $ardata['return_code'] = 0;
    $ardata['msg'] = '';

    $sql = "DELETE FROM bcinfo WHERE bcname='$curbcname' AND officenumber='$curbcnum' AND officelocation='$curbclc'";
    $qry = $this->Sql_model->run($sql);

    if($qry) {
      $ardata['msg'] = '삭제 완료';
    }
    else
    {
      $ardata['return_code'] = -1;
      $ardata['msg'] = '삭제 오류';
    }

    echo json_encode($ardata);
  }
}
?>