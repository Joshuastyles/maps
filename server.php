<?php

class Polygon{
	static $_dbhost = 'localhost';
	static $_dbname = 'data';
	static $_dbusername = 'root';
	static $_dbpwd = '';


	//gets all points in the database
	static public function getCordinates(){
		return self::getCordinates();
	}

	//wrapper function to save all coordicates of the polygon in the database
	static public function saveCordinates($rawData){
		return self::saveCordinates($rawData);
	}

	//function to save data about polygon in the database
	static public function save ($data){
		$con = mysqli_connect(self::$_dbhost, self::$_dbusername, self::$_dbpwd);

		if(!$con){
			die('Could not connect:' .mysqli_error());
		}

		mysqli_select_db(self::$_dbname, $con);

		mysql_query("DELETE * FROM data");

		mysql_query("INSERT INTO data (data) VALUES ($data)");

		mysql_close($con);

	}

	//function to get all the polygon geopoints 
	static public function getLatLog(){
		$con = mysqli_connect(self::$_dbhost, self::$_dbusername, self::$_dbpwd);

		if (!$con){
			die('Could not connnect to database:'.mysqli_error());
		}

		mysql_select_db(self::$_dbname, $con);

		$result = mysqli_quer("SELECT * FROM data");

		$data = false;

		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$data = $row['data'];
		}

		mysql_close($con);

	return $data;

	}

	
}
?>