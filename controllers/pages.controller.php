<?php

class PagesController extends Controller{
	
	public function __construct($data=array()){
		parent::__construct($data);
		$this->model=new User();
	}
	
	public function index(){
		
		$this->data['users']= $this->model->getList();
	}
	
	public function view(){
		$params=App::getRouter()->getParams();
		if(isset($params[0])){
			$id=strtolower($params[0]);
			$this->data['user']= $this->model->getByID($id);
		}
		else{
			$this->data['user']="";
		}
	}
	
}

?>