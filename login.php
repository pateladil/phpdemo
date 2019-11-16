<?php
 session_start();
?>
<script type="text/javascript">
function validate()
{
var pwd = /^[0-9a-zA-Z]*$/ ; 
var uname = /^[a-zA-Z]*$/ ;
      if(!document.doc.pwd.value.match(pwd))  
      	{  
			alert('Please input only numeric and characters'); 
	   		document.doc.pwd.focus();
	   		return false;
	   }
	    if(!document.doc.uname.value.match(uname))  
      	{  
			alert('Please input only characters'); 
	   		document.doc.uname.focus();
	   		return false;
	   }
	   return true;
	   

}
</script>

<form method="post" onsubmit="return validate()" name="doc">
User Name:<input type="text" name="uname"  onfocus="this.value=''" required="username is required"/><br>
Password:<input type="password" name="pwd" onfocus="this.value=''" required="password is required"/><br>
<input type="submit" name="login" value="Login" />
</form>
<?php
include "dbcon.php";

if(isset($_POST['login']) && $_POST['uname'] && $_POST['pwd'])
{
	$q="Select *  from register where username=:unm and password=:pwd";
	$stmt=$con->prepare($q);
	$stmt->bindparam(':unm',$_POST['uname']);
	$stmt->bindparam(':pwd',$_POST['pwd']);
	$r=$stmt->execute();
	while($r=$stmt->fetch())
	{
		$_SESSION['nm']=$_POST['uname'];
		header ('location:view.php');
	}
	
	
}

if(isset($_POST['login']))
{
	$un=$_POST['uname'];
	$pw=$_POST['pwd'];
	
	if($un=='admin'  && $pw=='admin')
	{
		$_SESSION['unm']=$_POST['uname'];
		header('location:update.php');
	}
	
}
	
?>