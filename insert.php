
<body>
<form name="register" method="post" action="insert.php" onsubmit="return validate()">
	<h1>Register Page</h1>
	<br><br>
	
	UserName:<input type="text" name="uname"  required /><br>
	Password:<input type="password" name="pwd"  /><br>
	Confirm	Password:<input type="password" name="cpwd" required /><br>
	Name:<input type="text" name="name" required /><br>
	Id No:<input type="text" name="idno" required /><br>
	gender:<input type="radio" name="gender" value="M"checked="">:MALE <input type="radio" name="gender" value="F" checked="">:FEMALE <br>
	Hobbies	:<input type="checkbox" name="hobbies[]" value="cricket"/>:Cricket
			<input type="checkbox" name="hobbies[]" value="kabbadi"/>:Kabbadi
			<input type="checkbox" name="hobbies[]" value="volleyball"/>:VolleyBall
			<input type="checkbox" name="hobbies[]" value="football"/>:FootBall<br>
	Branch:<select name="brn">
			<option name="bca">BCA</option>
			<option name="mca">MCA</option>
			<option name="mscit">MSCIT</option>
			</select><br>
	Contact No:<input type="text" name="mno" required /><br>
	<input type="submit"  name="reg" value="Register"/>
</form>
</body>
<?php

	
	include "dbcon.php";
	if(isset($_POST['reg']))
	{
		$hob=implode(',',$_POST['hobbies']);
		$q="insert into register(username,password,cpassword,name,idno,gender,hobbies,branch,mno) values(:username,:password,:cpassword,:name,:idno,:gen,:hob,:brn,:mno)";
		$stmt=$con->prepare($q);
		$stmt->bindparam(':username',$_POST['uname']);
		$stmt->bindparam(':password',$_POST['pwd']);
		$stmt->bindparam(':cpassword',$_POST['cpwd']);
		$stmt->bindparam(':name',$_POST['name']);
		$stmt->bindparam(':idno',$_POST['idno']);
		$stmt->bindparam(':gen',$_POST['gender']);
		$stmt->bindparam(':hob',$hob);
		$stmt->bindparam(':brn',$_POST['brn']);
		$stmt->bindparam(':mno',$_POST['mno']);
        $stmt->execute();
		
		header ('location:login.php');
		
	}
	


?>