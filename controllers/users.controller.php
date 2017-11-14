<?php

class UsersController extends Controller{
	
	
	public function indexAction(){
		$this->params=App::getRouter()->getParams();
		if(Session::get('username')!=''){
			$id=strtolower(Session::get('id'));
			$this->data['user']= $this->model->getByID($id);
			if(isset($_POST['delmoney'])){
				$delmoney=(int)$_POST["delmoney"];
				$result=$this->model->del_money($id,$delmoney);
				Session::set('message',"$delmoney тенге были успешно выведены");
				Router::redirect("/");
			}
		}
		else{
			$this->data['user']=null;
		}
	}
	
	public function __construct($data=array()){
		parent::__construct($data);
		$this->model=new User();
	}
	
	public function loginAction(){
		if($_POST && isset($_POST['username']) && isset($_POST['password'])){
				$user=new User();
				if($user->login()){
					Router::redirect('/');
				}
				else{
					
				}
		}
	}
	
	public function logoutAction(){
		Session::destroy();
		Router::redirect('/');
	}
	
	
}


