<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Mainhome extends BaseController {
  public	$sql_model;
	public	$session;

  public function __construct()
  {
    $this->sql_model = model('app\Models\sql_model');
		$this->session = session();
  }

  public function index(){
    echo view('view_mainhome');
  }
}