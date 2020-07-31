<?php

require_once('../model/Conexion.php');

class UserDao{

	public static function getAllUser(){
		$stmt = Connection::connect()->prepare("SELECT usu_id, usu_username, usu_password, usu_email FROM users");
		$stmt-> execute();

		return $stmt-> fetchAll();

		$stmt -> close();
	}

	public static function createUser($user){

		$stmt = Connection::connect()->prepare("INSERT INTO users (usu_username, usu_password, usu_email) VALUES (:username, :password, :email)");

		$stmt -> bindValue(':username', $user->getUsername());
		$stmt -> bindValue(':password', $user->getPassword());
		$stmt -> bindValue(':email', $user->getEmail());

		if($stmt-> execute()){
			return "OK";
		}else{
			return "Error Register.";
		}

		$stmt -> close();
	}

	public static function getOneUser($id){
		$stmt = Connection::connect()->prepare("SELECT usu_id, usu_username, usu_password, usu_email FROM users WHERE usu_id=:id");
		$stmt -> bindValue(':id', $id);
		$stmt-> execute();

		return $stmt-> fetch();

		$stmt -> close();
	}

	public static function updateUser($user){

		var_dump($user);

		$stmt = Connection::connect()->prepare("UPDATE users set usu_username=:username, usu_password=:password, usu_email=:email WHERE usu_id=:id");

		$stmt -> bindValue(':username', $user->getUsername());
		$stmt -> bindValue(':password', $user->getPassword());
		$stmt -> bindValue(':email', $user->getEmail());
		$stmt -> bindValue(':id', $user->getId());

		if($stmt-> execute()){
			return "OK";
		}else{
			return "Error Update.";
		}

		$stmt -> close();
	}

	public static function deleteUser($id){

		$stmt = Connection::connect()->prepare("DELETE FROM  users WHERE usu_id=:id");

		$stmt -> bindValue(':id', $id);

		if($stmt-> execute()){
			return "OK";
		}else{
			return "Error Delete.";
		}

		$stmt -> close();
	}
}
