<?php
	session_start();
    include_once("conn.php");

	if($_SERVER['REQUEST_METHOD']=== 'POST'){
		if(!empty($_POST['login'])){
			$name = $_POST['name'];
			$password = md5($_POST['password']);

			$stmnt = "SELECT * FROM student_info WHERE
									name = '$name' AND password = '$password'";

			$result = mysqli_query($conn,$stmnt);
			$count = mysqli_num_rows($result);
			if($count > 0){
				echo "Login Successful";
				//header("Location:admin_show.php");	
			}else{
				echo "Login not Successful";
			}
		}
	}

		

		//$row = $stmnt->fetch(PDO::FETCH_BOTH);
		/*$row = $stmnt->rowCount();

		if($row == $stmnt->fetch(PDO::FETCH_ASSOC)){
			echo $result['name'];
			$_SESSION['username'] = $name;
			header('location:home.php');
		}
		else{
			header('location:login.php');
		}
	}*/
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
    <title>Log-in</title>

	<style>

        body{
            background-image: url("img2.jpg");
            opacity: 1;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .topnav{
            background-color: burlywood;
        }

        .topnavleft a{
            float: left;
            color:cornsilk;
            text-align:center;
            padding:14px;
            font-size:20px;
        }

        .topnavright a{
            float:right;
            color:cornsilk;
            text-align:center;
            padding:14px;
            font-size:20px;
        }

        .topnav a:hover{
            background-color: rgb(0, 128, 0);
            color: rgb(230, 141, 207);
        }

        .topnav a.active{
            background-color: rgb(182, 182, 12);
            color: rgba(255, 255, 255, 0.315);
        }

        table, th, td{
            border: 1px solid black;
            width: 100%;
            padding: 15px;
            text-align: left;
            
        }
        
    </style>
	
</head>
<body>
	<div class="container">
		<div class="topnav">
				<div class="topnavleft">
					<a class="active" href="index.php">Home</a>
					<a href="contact.html">Contact</a>
					<a href="about.html">About</a>
				</div>

				<div class="topnavright">
					<a href="select-login.php">Login</a>
					<a href="sign-up.php" id="sigh-up">Signup</a>
				</div>
			</div>
	<center>
	<form action="" method="post">
		<fieldset>
			<legend style="text-align: center;">Log-in</legend>
			<label for="uname">User-name</label>
      		<input type = "text" name = "name" id="uname" placeholder="Enter your Email here"><br><br>
      
      		<label for="upasswrd">Password:</label>
      		<input type="password" name="password" id="upasswrd" placeholder="Enter your Password here"><br><br>
			<label for="u_type">Select User type:-</label>
			<select name="user_type" id="u_type">
				<option value="User">User</option>
				<option value="Admin">Admin</option>
			</select><br><br>
			<input type="submit" name="login" value="Login">
      	</fieldset>
	</form>
	</center>
	</div>
</body>
</html>