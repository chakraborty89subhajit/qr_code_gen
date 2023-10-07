<?php

include 'db.php';


if(isset($_POST['submit'])){

	$user_name = $_POST['user_name'];
	$password= $_POST['password'];

    $form = false;

	//echo $user_name."<br>";
	//echo $password."<br>";

if((empty($user_name))||(empty($password))){
	if(empty($user_name)){
		echo"pls. enter user name...<br>";
		$form=true;
	}

	if(empty($password)){
		echo"pls. enter password...<br>";
		$form=true;
	}

	if(empty($user_name) && empty($password)){
		echo"pls. enter user name and password ....<br>";
		$form=true;
	}
}
    if(!(empty($user_name)) && !(empty($password))){
        $stmt=$db->prepare("select * from login where email='$user_name' and password='$password'");
        $result=$stmt->execute();
        $row_num=$stmt->rowcount();

        if($row_num>=1){
        	header("Location: profile_page.php");
        	exit();

        }else{
        	//header("Location: profile_page.php");
        	//exit();
        	echo"pls. provide correct credentials<br>";
        	$form=true;
        }


    }
        }


else{
	echo"no data is comming, pls. fill the form...<br>";
	$form=true;
}
if($form){
	?>

<div class="contanair">
			<form method="post" action="<?php  echo $_SERVER['PHP_SELF'];?>">
		<table border="1">
		<tr>
			<td>
			user_name:
		</td>

		<td>
			<input type = "text" name="user_name" value="<?php echo $user_name;?>">
		</td>
		</tr>
          <tr>
			<td>
			password:
		</td>

		<td>
			<input type="password" name="password" value="<?php echo $password;?>">
		</td>
		</tr>
			
		<tr><td><input type="submit" name="submit" value="submit"></td></tr>
	</table>
</form>

         </div>

	<?php
}
?>