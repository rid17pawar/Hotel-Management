<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
</head>
<body style="background-image: url(images/phpbg.png);">

	<?php

		$name=$_POST['Name'];
		$gender=$_POST['Gender'];
		$mob_no=$_POST['Phone'];
		$email=$_POST['Email_id'];
		$password=$_POST['Password'];
		$age=$_POST['Age'];
		$bdate=$_POST['Birthdate'];
		$country=$_POST['Country'];
		$state=$_POST['State'];
		$city=$_POST['City'];
		$locality=$_POST['Locality'];

		// to make connection
		$conn=mysqli_connect("localhost","root","","hotel");

		//check if connection is done
		if(!$conn)  
			{
				echo"connection failed";
			}
		else
			{
				//echo"connection done";
				
				//query stored in $query variable 
				$query1="INSERT INTO Register(User_Id,Name,Gender,Mob_no,Email,Password,Age,Country,State,City,Locality,Birth_date) VALUES('','$name','$gender','$mob_no','$email','$password','$age','$country','$state','$city','$locality','$bdate')";
				//print_r($_POST); //to print all elements in post array
			}

			// query in $query1 is fired on connection $conn 
		if(mysqli_query($conn,$query1))
			{
				//echo"insertion done";

				$query2="SELECT * FROM register WHERE Password='$password'&& Email='$email'";
				$res=$conn->query($query2);//performs a query on database
				$rows=$res->num_rows;//return no of rows present in result set
				$res->data_seek(0);//adjust data pointer to arbitrary row in result
				$row=$res->fetch_array(MYSQLI_NUM);//fetch_array:fetch result row as an array,MYSQLI_NUM: specifies return array should use numeric keys for array(0=>data)
				$val=$row[0];//copying first value from row array
	?>
				<center>
				<h1 style=" font-family:mt script; color:#white;"> Holiday Hotels</h1>
				<h2 style=" font-family:mt script; color:#white;"> Congratulations Dear Customer <?php echo "$name"; ?></h4>
				<h3 style=" font-family:mt script; color:#white;"> Your Details Are As Follows:</h2><br/>
				<h4>UserId : <?php echo "$val"; ?></h4>
				<h4>Name : <?php echo "$name"; ?></h4>
				<h4>Gender : <?php echo "$gender"; ?></h4>
				<h4>Mobile No : <?php echo "$mob_no"; ?></h4>
				<h4>Email Id : <?php echo "$email"; ?></h4>
				<h4>Birth date : <?php echo "$bdate"; ?></h4>
				<h4>Age : <?php echo "$age"; ?></h4>
				<h4>Country : <?php echo "$country"; ?></h4>
				<h4>State : <?php echo "$state"; ?></h4>
				<h4>City : <?php echo "$city"; ?></h4>
				<h4>Locality : <?php echo "$locality"; ?></h4>
				<br/><br/>
				</center>

	<?php			
			}
		else
			{
	?>
		<center>
		<h1 style=" font-family:mt script; color:white;">Holiday Hotels</h1><br/><br/>
		<?php echo("Unable to Register Please check if are aldready a member or try using another Email Id....<br/><br/>");
		 die("Connection failed: " . mysqli_connect_error());
		?>
		</center>
	<?php 
			}		
				
		mysqli_close($conn);
	?>

</body>
</html>