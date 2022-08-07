<?php
	session_start();
	session_destroy();//session소멸

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$random_str =generateRandomString(20);
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?
	require_once("../../function/dbconn.php"); 


		$query = "select idx, user_id, user_pass,firstname,lastname,checkyn from member where user_id='$user_id' and user_pass='$user_pass' and checkyn='Y'";
		
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);


		if ($row['user_id'] != "") 
		{
				$_SESSION['first_name'] =  $row['firstname'];
				$_SESSION['last_name'] =  $row['lastname'];
				$_SESSION['check_yn'] =  $row['checkyn'];

				$_SESSION['user_id'] =  $row['user_id'];
			 
				setcookie("cid",$row['user_id'],0,"/");
				setcookie("cname",$row['user_name'],0,"/");



			$query_cnt = "SELECT count(*) from abstract WHERE user_id='$_SESSION[user_id]'";
			$result_cnt=mysqli_query($con,$query_cnt) or die (mysqli_error($con));

			$data_cnt=mysqli_fetch_row($result_cnt); //위 결과 값을 하나하나 배열로 저장
			$total_no=$data_cnt[0];//배열 첫번째 요소값, 테이블의 전체 글수 저장


			if ($total_no > 0){ $go_url="abstract_modify.html"; }else{ $go_url="abstract.html"; }

			echo "<script type='text/javascript'>window.location.replace('./".$go_url."?code=".$random_str."');</script>";	
				
		}
		else 
		{

		$query = "select idx, user_id, user_pass from member where user_id='$user_id' and user_pass='$user_pass' and checkyn='N'";
		
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);


		if ($row['user_id'] != "")  {


		
			echo "<script type='text/javascript'> alert('Unapproved member.'); location.href='/ggmt2019/index.html';</script>";

		


		}else{

  		   echo "<script type='text/javascript'> alert('No matching member information'); parent.history.back();</script>";

			}


		}


?>