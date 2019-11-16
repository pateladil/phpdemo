<?php
	session_start();
	echo "Welcome:-".$_SESSION['nm'];
	if(!isset($_SESSION['nm']))
	{
    header('location:login.php');
	}
?>	

<?php 
									include "dbcon.php";
									$q="select * from register where id=:id";
									$stmt=$con->prepare($q);
									$stmt->bindparam(':id',$_GET['id']);
									$stmt->execute();
									while($r=$stmt->fetch()):
					?>


		
			<body>
					<form method="post">
					
					<input type="hidden" name="id"  value="<?php echo $r['id'];?>" /><br>
					<input type="text" name="name"  value="<?php echo $r['name'];?>" /><br>
					<input type="text" name="idno"   value="<?php echo $r['idno'];?>"/><br>
					gender:<input type="radio" name="gender" value="M"<?php echo $r['gender'] == "M" ? "checked" : ""; ?>>:MALE <input type="radio" name="gender" value="F"<?php echo $r['gender'] == "F" ? "checked" : ""; ?>>:FEMALE <br>
					Hobbies	:<input type="checkbox" name="hobbies[]" value="cricket"<?php echo($r['hobbies']?"checked" : "cricket"  )?>/>:Cricket
							 <input type="checkbox" name="hobbies[]" value="kabbadi"<?php echo($r['hobbies'])?"checked" : "kabbadi" ?>/>:Kabbadi
							 <input type="checkbox" name="hobbies[]" value="volleyball" <?php echo($r['hobbies']?"checked" : "volleyball" ) ?>/>:VolleyBall
							 <input type="checkbox" name="hobbies[]" value="football"<?php echo($r['hobbies'] ?"checked" : "football" )?>/>:FootBall<br>
				     Branch:<select name="brn"   value="<?php echo $r['branch'];?>">
							<option name="bca">BCA</option>
							<option name="mca">MCA</option>
							<option name="mscit">MSCIT</option>
							</select><br>
					
					<input type="text" name="mno" value="<?php echo $r['mno'];?>" /><br>
					<input type="submit"  name="update"   />
					<a href="logout.php">logout</a>
			
		

<?php	
	if(isset($_POST['update']))
	{
	include "dbcon.php";
	/*$name=$_POST['name'];
	$idno=$_POST['idno'];
	$branch=$_POST['brn'];
	$cno=$_POST['mno'];
	$id=$_POST['id'];
	*/
	$hob=implode(',',$_POST['hobbies']);
	$q="update register set name=:nm,idno=:idno,gender=:gen,hobbies=:hob,branch=:brn,mno=:mno where id=:id";
	$stmt=$con->prepare($q);
	$stmt->bindparam(':nm',$_POST['name']);
	$stmt->bindparam(':idno',$_POST['idno']);
	$stmt->bindparam(':gen',$_POST['gender']);
	$stmt->bindparam(':hob',$hob);
	$stmt->bindparam(':brn',$_POST['brn']);
	$stmt->bindparam(':mno',$_POST['mno']);
	$stmt->bindparam(':id',$_POST['id']);
	$pdores=$stmt->execute();
	//$pdores=$stmt->execute(array(":nm"=>$name,":idno"=>$idno,":brn"=>$branch,":mno"=>$cno,":id"=>$id));
	if($pdores=1){
		header ("Location:view.php");
	}
	else{
		header('Location:update.php');
	}
	}
	
?>
<?php endwhile; ?>


</form>
</body>