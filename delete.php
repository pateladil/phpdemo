<body>
<form action="view.php" >
<?php

include "dbcon.php";

		$q="delete from register where id=:id";
		$stmt=$con->prepare($q);
		$stmt->bindparam(':id',$_GET['id']);
		$r=$stmt->execute();
		if($r)
		{
			header('location:view.php');
		}
		
		
	
?>
</form>
</body>