<?php
	require_once("../../function/dbconn.php"); 	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?

	if ($mode=="write"){	


	  $firstname=$_POST['firstname']; 
	  $lasttname=$_POST['lasttname'];
	  $affiliation=$_POST['affiliation'];
	  $email=$_POST['email'];

      if(is_array($firstname)){ 
          while (list ($key, $val) = each ($firstname)) { 
                if($firstname_arr == '') $firstname_arr = $val; 
                else $firstname_arr .= '|' . $val; 
          } 
	  }

	  if(is_array($lastname)){ 
          while (list ($key, $val) = each ($lastname)) { 
                if($lastname_arr == '') $lastname_arr = $val; 
                else $lastname_arr .= '|' . $val; 
          } 
	  }

	 if(is_array($affiliation)){ 
          while (list ($key, $val) = each ($affiliation)) { 
                if($affiliation_arr == '') $affiliation_arr = $val; 
                else $affiliation_arr .= '|' . $val; 
          } 

	 }

	 if(is_array($email)){ 
          while (list ($key, $val) = each ($email)) { 
                if($email_arr == '') $email_arr = $val; 
                else $email_arr .= '|' . $val; 
          } 
	 }

		$query = "INSERT INTO abstract (";
		$query = $query."user_id, session, oral, subject, firstname, lastname, affiliation,email, abstract,reg_date";
		$query = $query.") VALUES (";
		$query = $query."'$_SESSION[user_id]','$session', '$oral', '$subject','$firstname_arr', '$lastname_arr', '$affiliation_arr', '$email_arr', '$abstract',now()";
		$query = $query.");";

		

		$msg = "Registration is complete.";


	}else if($mode=="update"){
		

	  $firstname=$_POST['firstname']; 
	  $lasttname=$_POST['lasttname'];
	  $affiliation=$_POST['affiliation'];
	  $email=$_POST['email'];

      if(is_array($firstname)){ 
          while (list ($key, $val) = each ($firstname)) { 
                if($firstname_arr == '') $firstname_arr = $val; 
                else $firstname_arr .= '|' . $val; 
          } 
	  }

	  if(is_array($lastname)){ 
          while (list ($key, $val) = each ($lastname)) { 
                if($lastname_arr == '') $lastname_arr = $val; 
                else $lastname_arr .= '|' . $val; 
          } 
	  }

	 if(is_array($affiliation)){ 
          while (list ($key, $val) = each ($affiliation)) { 
                if($affiliation_arr == '') $affiliation_arr = $val; 
                else $affiliation_arr .= '|' . $val; 
          } 

	 }

	 if(is_array($email)){ 
          while (list ($key, $val) = each ($email)) { 
                if($email_arr == '') $email_arr = $val; 
                else $email_arr .= '|' . $val; 
          } 
	 }




				$query = "UPDATE abstract SET ";
				$query = $query."session = '$session',oral = '$oral', subject = '$subject', firstname = '$firstname_arr', lastname = '$lastname_arr', affiliation = '$affiliation_arr', email = '$email_arr', abstract='$abstract' ";
				$query = $query."WHERE idx=$idx";
		
		
		$msg = "Modify is complete";
		$go_url = "/ggmt2019/";


	}else if ($mode=="delete"){	

		foreach ($abstract_del as $key => $val) {
			
			$query = "DELETE from abstract ";
			$query = $query." WHERE idx='$val'";

	

			mysqli_query($con,$query)or die(mysqli_error($con));//update	

		}

		$msg = "Delete is complete";
		$go_url = "/ggmt2019/";
	
	
	}

	mysqli_query($con, $query) or die(mysqli_error($con));
		

   echo "<script type=text/javascript>alert('".$msg."');parent.location.href='".$go_url."';</script>";



?>

