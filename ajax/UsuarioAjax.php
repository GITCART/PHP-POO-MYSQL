<?php

require_once('../controller/UserController.php');

class UsuarioAjax{

	public function getAllUser(){
		$resp = UserController::getAllUser();
		echo $resp;
	}

	public function createUser($user){
		$resp = UserController::createUser($user);
		echo $resp;
	}

	public function getOneUser($id){
		$resp = UserController::getOneUser($id);
		echo $resp;
	}

	public function updateUser($user){
		$resp = UserController::updateUser($user);

		echo $resp;
	}

	public function deleteUser($id){
		$resp = UserController::deleteUser($id);

		echo $resp;
	}

}

$userAjax = new UsuarioAjax();

if(isset($_GET["action"]) && $_GET["action"] == "listUser"){
	$userAjax -> getAllUser();
}

if(isset($_POST["action"]) && $_POST["action"] == "insertUser"){
	if(isset($_POST["user"])){
		$userAjax -> createUser($_POST["user"]);
	}
}

if(isset($_GET["action"]) && $_GET["action"] == "oneUser"){
	if(isset($_GET["id"])){
		$userAjax -> getOneUser($_GET["id"]);
	}
}

if(isset($_POST["action"]) && $_POST["action"] == "updateUser"){
	if(isset($_POST["user"])){
		$userAjax -> updateUser($_POST["user"]);
	}
}

if(isset($_POST["action"]) && $_POST["action"] == "deleteUser"){
	if(isset($_POST["id"])){
		$userAjax -> deleteUser($_POST["id"]);
	}
}
