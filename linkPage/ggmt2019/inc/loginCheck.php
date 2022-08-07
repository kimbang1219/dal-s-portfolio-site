<?


	session_cache_limiter('private'); 
	ini_set("session.cookie_lifetime", "86400"); 
	ini_set("session.cache_expire", "86400"); 
	ini_set("session.gc_maxlifetime", "86400"); 
	session_start();
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?

	if($_SESSION['user_id']=="" || $_SESSION['check_yn']!="Y"){
	echo "<script>alert('No member information.'); document.location.href='/ggmt2019/sub/login.html';</script>";

	exit;
	}

?>