<!DOCTYPE html>
<html>
<head>
	<title>Event Booking Form</title>
</head>
<body style="background-image: url(images/phpbg.png);">
	<?php
		
		$user_id=$_POST['User_id'];
		$password=$_POST['Password'];
		$table_name=$_POST['Table_name'];
		$guest=$_POST['Guest'];
		$dine_date=$_POST['Date'];
		$dine_time=$_POST['Time'];
		$request=$_POST['Request'];
		
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
				$query1="SELECT * FROM register WHERE User_Id='$user_id' && Password='$password'";

				$res=$conn->query($query1);//performs a query on database
				$rows=$res->num_rows;//return no of rows present in result set
				// query in $query1 is fired on connection $conn 
				if($rows>0)
				{
				//echo"verification done";

				$query2="INSERT INTO dine_book(User_Id,Table_name,Guest,Event_date,Event_time,Request) VALUES('$user_id','$table_name','$guest','$dine_date','$dine_time','$request')";

					if(mysqli_query($conn,$query2))
					{
					//echo"insertion done";

					$query3="SELECT * FROM dine_book WHERE User_Id='$user_id'";
					$res=$conn->query($query3);//performs a query on database
					$rows=$res->num_rows;//return no of rows present in result set
					$res->data_seek(0);//adjust data pointer to arbitrary row in result
					$row=$res->fetch_array(MYSQLI_NUM);//fetch_array:fetch result row as an array,MYSQLI_NUM: specifies return array should use numeric keys for array(0=>data)
				
	?>
				<center>
				<h1 style=" font-family:mt script; color:#ffffff;"> Holiday Hotels</h1><br/><br/>
				<h2 style=" font-family:mt script; color:#ffffff;"> Congratulations Dear Customer</h4><br/>
				<h3 style=" font-family:mt script; color:#ffffff;"> Your Room Booking Details Are As Follows:</h2><br/>
				<h4>UserId : <?php echo "$user_id"; ?></h4>
				<h4>Table Name : <?php echo "$table_name"; ?></h4>
				<h4>Guest : <?php echo "$guest"; ?></h4>
				<h4>Dine Date : <?php echo "$dine_date"; ?></h4>
				<h4>Dine Time : <?php echo "$dine_time"; ?></h4>
				<h4>Special Requests : <?php echo "$request"; ?></h4>
				<br/><br/>
				</center>
	<?php
					}

				}
				else
				{
	?>
			<center>
			<h1 style=" font-family:mt script; color:white;">Holiday Hotels</h1><br/><br/>
	<?php 
			echo("Unable to Book Dine Table Please check if you provide right details or try again.....<br/><br/>");
		 	die("Connection failed: " . mysqli_connect_error());
	?>
			</center>
	<?php 

				}			
			}	

		mysqli_close($conn);
	?>
	
</body>
</html>	