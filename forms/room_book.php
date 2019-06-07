<!DOCTYPE html>
<html>
<head>
	<title>Room Booking Form</title>
</head>
<body style="background-image: url(images/phpbg.png);">
	<?php
		
		$user_id=$_POST['User_id'];
		$password=$_POST['Password'];
		$room_name=$_POST['Room_name'];
		$arrival=$_POST['Arrival'];
		$departure=$_POST['Departure'];
		$rooms=$_POST['Rooms'];
		$adults=$_POST['Adults'];
		$children=$_POST['Children'];

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

				$query2="INSERT INTO room_book(User_Id,Room_name,Arrival,Departure,Rooms,Adults,Children) VALUES('$user_id','$room_name','$arrival','$departure','$rooms','$adults','$children')";

					if(mysqli_query($conn,$query2))
					{
					//echo"insertion done";

					$query3="SELECT * FROM room_book WHERE User_Id='$user_id'";
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
				<h4>Room_name : <?php echo "$room_name"; ?></h4>
				<h4>Arrival Date : <?php echo "$arrival"; ?></h4>
				<h4>Departure Date: <?php echo "$departure"; ?></h4>
				<h4>Rooms : <?php echo "$rooms"; ?></h4>
				<h4>Adults : <?php echo "$adults"; ?></h4>
				<h4>Children : <?php echo "$children"; ?></h4>
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
			echo("Unable to Book Room Please check if you provide right details or try again.....<br/><br/>");
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