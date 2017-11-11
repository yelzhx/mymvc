<?php

class User extends Model{
	protected $id;
	protected $username;
	protected $amount;
	
	public function getList($is_active=true){
		$sql="select * from users where 1";
		if($is_active){
			$sql.=" and is_active=1";
		}
		return $this->db->query($sql);
	}
	
	public function getByID($id){
		$id=(int)$id;
		$sql="select * from users where id='{$id}' limit 1";
		$result= $this->db->query($sql);
		return isset($result[0]) ? $result[0] : null;
	}
	
	public function getByUsername($username){
		$username =$this->db->escape($username);
		$sql="select * from users where username='{$username}' limit 1";
		$result=$this->db->query($sql);
		if(isset($result[0])){
			return $result[0];
		}
		return false;
	}
	
	public function login(){
		$username=(isset($_POST['username'])) ? trim($_POST['username']) : null;
		$password=(isset($_POST['password'])) ? ($_POST['password']) : null;
		if($username && $password){
			$user=$this->getByUsername($username);
			$hash=md5($password);
			if($user && $user['is_active'] && $hash==$user['password']){
				Session::set('id',$user['id']);
				Session::set('username',$user['username']);
				//Router::redirect('/');
				return true;
			}
		}
		return false;
	}
	
	public function add_money($id,$money){
		$id=(int)$id;
		$money=(int)$money;
		if(($mondey>0)&&($id>0)){
			$sql="update users set amount=amount+$money where id=$id";
			$result=$this->db->query($sql);
			return $result;
		}
		return false;
	}
	
	public function del_money($id,$money){
		$id=(int)$id;
		$money=(int)$money;
		if(($money>0)&&($id>0)){
			$user=self::getByID($id);
			if($user["amount"]>$money){
				$sql="update users set amount=amount-$money where id=$id";
				$result=$this->db->query($sql);
				return $result;
			}
		}
		return false;
	}
	
}

?>
