<?php

require_once('../dao/UsuarioDao.php');
require_once('../model/User.php');

class UserController{


	public function getAllUser(){
		$rpt = UserDao::getAllUser();
		
		$json = array();

		foreach ($rpt as $key => $value) {
			$json[] = array(
				'id' => $value{"usu_id"},
				'username' => $value{"usu_username"},
				'password' => $value{"usu_password"},
				'email' => $value{"usu_email"},
			);
		}

		return json_encode($json);
	}

	public function createUser($user){
		
		$userjson = json_decode($user, TRUE);
		var_dump("insert", $userjson);

		$user = new User(null,$userjson["username"], $userjson["password"], $userjson["email"]);
		$rpt = UserDao::createUser($user);

		if($rpt == "OK"){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getOneUser($id){
		$rpt = UserDao::getOneUser($id);
	
		$json = array();

		$json[] = array(
				'id' => $rpt["usu_id"],
				'username' => $rpt["usu_username"],
				'password' => $rpt["usu_password"],
				'email' => $rpt["usu_email"],
		);
		return json_encode($json);
	}

	public function updateUser($user){
		$userjson = json_decode($user, TRUE);
		$user = new User($userjson["id"], $userjson["username"], $userjson["password"], $userjson["email"]);

		$rpt = UserDao::updateUser($user);

		if($rpt == "OK"){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function deleteUser($id){
		$rpt = UserDao::deleteUser($id);

		if($rpt == "OK"){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
