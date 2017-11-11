<?php

class App{
	
	protected static $router;
	
	public static $db;
	
	public static $user;
	
	public static $is_redirect;
	
	public static function getRouter(){
		return self::$router;
	}
	
	public static function run($uri){
		
		$is_redirect=false;
		
		self::$router = new Router($uri);
		
		self::$db=new DB(Config::get('db.host'),Config::get('db.user'),Config::get('db.password'),Config::get('db.db_name'));
		
		$controller_class=ucfirst(self::$router->getController()).'Controller';
		$controller_method=strtolower(self::$router->getMethodPrefix().self::$router->getAction()).'Action'; 
		
		$layout=self::$router->getRoute();
		
		if(($controller_class!="UsersController" || $controller_method!="loginAction")&& Session::get('username')==''){
			//echo "$controller_class $controller_method ";
			Router::redirect("/users/login");
		}
		
		$controller_object=new $controller_class();
		if(method_exists($controller_object,$controller_method)){
			
			$view_path=$controller_object->$controller_method();
			$view_object=new View($controller_object->getData(),$view_path);
			$content=$view_object->render();
		}
		else{
			echo 'Method '.$controller_method.' of class '.$controller_class.' does not exist.';
			//throw new Exception('Method '.$controller_method.' of class '.$controller_class.' does not exist.');
		}
		
		$layout_path=VIEWS_PATH.DS.$layout.'.html';
		$layout_view_object=new View(compact('content'),$layout_path);
		echo $layout_view_object->render();
	}
	
}

?>