<?php

class Connection{

	public static function connect(){
		$connect = new PDO("mysql:host=localhost;dbname=crud", "root", "");

		$connect-> exec("set names utf8");

		return $connect;
	}

}