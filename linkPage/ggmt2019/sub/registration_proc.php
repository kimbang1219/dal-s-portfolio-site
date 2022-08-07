<?php
	require_once("../../function/dbconn.php"); 	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?
$mode =$_POST['mode'];

if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){

if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){

echo "<script>alert('Entered captcha code does not match! Kindly try again.');history.back(-1);</script>";


} else{

	if ($mode=="write"){	

		$select_query = "SELECT count(user_id) FROM member ";
		$select_query = $select_query." WHERE user_id = '$user_id' ";

		$select_query_result = mysqli_query($con,$select_query);
		$select_query_data = mysqli_fetch_row($select_query_result);

		$data = $select_query_data[0];

		if($data > 0 or $user_id == "admin") {
			echo "<script>";
		echo "alert('This ID cannot be used.');";
			echo "history.back(-1);";
			echo "</script>";
			exit;
		}

		$query = "INSERT INTO member (";
		$query = $query."user_id, user_pass, firstname, lastname, affiliation,country, email,icebreak,banquet,technical,vegetarian,reg_date";
		$query = $query.") VALUES (";
		$query = $query."'$user_id','$pwd', '$firstname', '$lastname', '$affiliation','$country', '$email', '$icebreak', '$banquet', '$technical', '$vegetarian',now()";
		$query = $query.");";

		

		$msg = "Registration is complete.";


	}else if($mode=="update"){
		

				$query = "UPDATE member SET ";
				
				$query = $query."firstname = '$firstname', lastname = '$lastname', affiliation = '$affiliation', country = '$country', email='$email', icebreak='$icebreak', banquet='$banquet', technical='$technical',vegetarian='$vegetarian' ";
				if($pwd!="") { $query = $query.",user_pass='$pwd'";}
				$query = $query."WHERE user_id='$_SESSION[user_id]'";
		
		
		$msg = "Modify is complete";
		$go_url = "/ggmt2019/";


	}else if ($mode=="delete"){	

		foreach ($member_del as $key => $val) {
			
			$query = "DELETE from member ";
			$query = $query." WHERE idx='$val'";

	

			mysqli_query($con,$query)or die(mysqli_error($con));//update	

		}

		$msg = "Delete is complete";
		$go_url = "/ggmt2019/";
	
	
	}

	mysqli_query($con, $query) or die(mysqli_error($con));
		

   echo "<script type=text/javascript>alert('".$msg."');parent.location.href='".$go_url."';</script>";


	}

}

?>
