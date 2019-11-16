<?php
	session_start();
	if(!isset($_SESSION['nm']))
	{
    header('location:login.php');
	}
	
?>
<?php
echo "Welcome:-".$_SESSION['nm'];
?>
<body>
<table border="1">
<tr>
		<th>ID</th>
		<th>name</th>
		<th>Id No</th>
		<th>Gender</th>
		<th>Hobbies</th>
		<th>Branch</th>
		<th>Contact No</th>

</tr>


<?php
	include 'dbcon.php';
	$q="select * from register";
	$stmt=$con->query($q);
	while($r=$stmt->fetch()):
?>
	<tr>
			<td><?php echo ($r['id']); ?></td>
			<td><?php echo ($r['name']); ?></td>
			<td><?php echo ($r['idno']); ?></td>
			<td><?php echo ($r['gender']); ?></td>
			<td><?php echo ($r['hobbies']); ?></td>
			<td><?php echo ($r['branch']); ?></td>
			<td><?php echo ($r['mno']); ?></td>
			<td><a href="update.php?id=<?php echo ($r['id']);?>">Edit</a></td>
			<td><a href="delete.php?id=<?php echo ($r['id']);?>">Delete</a></td>
	</tr>
	<?php endwhile; ?>
	</table>
	<a href="logout.php">logout</a>
	
</body>