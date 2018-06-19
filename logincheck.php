<?php

	$password=$_REQUEST["password"];
	$username=$_REQUEST["username"];

	$db=new PDO('mysql:host=localhost;dbname=login','root' ,'');
        $statement=$db->query("select * from logininfo where uname='$username' and pass='$password'");
        $statement->rowCount();
		
        if($statement->rowCount()>0)
        {
			$result = $statement->fetch();
			$role = $result[3];
			$name = $result[1];
			//echo $role;
			session_start();
			$_SESSION["username"] = $name;
			$_SESSION["id"] = $statement->fetchColumn(0);			
			
			
			
			if($role == 'Admin')
				header('location: adminPage.php');
			else
				header('location: hotelDetail.php');
			
			
			//include 'hotelDetail.php';
        }
        else 
        {
            echo "invalid login";
            //header ("Location: ../product.php");
        }
	
?>