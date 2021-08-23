<?php 
if (!session_id()) {
	session_start();
} 
include 'db.php';
include_once 'header.php'; 





?>
<!DOCTYPE html>
<html>
<head>
	<title>Ticket</title>
	<link rel="stylesheet" type="text/css" href="css/customerPanel.css">
	<link href="bootstrap/bootstrap.min.css" rel='stylesheet' type='text/css' />

	<style type="text/css">
		.boxStyle{width: 100%;
			border: 1px solid #ccc;
			background: #FFF;
			margin: 0 0 5px;
			padding: 10px;
			font-style: normal;
			font-variant-ligatures: normal;
			font-variant-caps: normal;
			font-variant-numeric: normal;
			font-weight: 400;
			font-stretch: normal;
			font-size: 12px;
			line-height: 16px;
			font-family: Roboto, Helvetica, Arial, sans-serif;
			
		}
	</style>

</head>
<body>

	<?php 
	$movieId=$_SESSION['movieId'];

	$movieIdentity=$conn->query("select * from movielist where movieId=$movieId;");
	$row=$movieIdentity->fetch_object();







	$movieName=$row->Name;
	$date=$_POST['date'];
	$time=$_POST['timeSlot'];
	$theater=$_POST['theater'];
	
	
	$showOrder="";
	$seatCount="";

	$resourse=$conn->query("select date from showOrder;");
	$dateExists=false;
	while ($rw=$resourse->fetch_object()) {
		if ($rw->date===$date) {
			$dateExists=true;
			break;
		}
	}


	$seatCount="";
	if (!$dateExists) {
		$sql="INSERT INTO showOrder(showOrderId,date,timeslot,theater,movieName,seat)  VALUES ('','".$date."','". $time. "','".$theater."','".$movieName."',".'50'.");";



		if ($conn->query($sql) === TRUE) {
			$result=$conn->query("select showOrderId from showOrder where date='".$date."' and timeslot='".$time."' and theater='".$theater."' and movieName='".$movieName ."' ;");

			$r=$result->fetch_object();

			$showOrder=$r->showOrderId;

			$result=$conn->query("select seat from showOrder where showOrderId='".$showOrder."';");
			
			$r=$result->fetch_object();

			$seatCount=$r->seat;
			
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	else{
		$resourse=$conn->query("select timeslot from showOrder where date='".$date."';");
		$timeExist=false;
		while ($rw=$resourse->fetch_object()) {
			if ($rw->timeslot===$time) {
				$timeExist=true;
				break;
			}
		}
		if (!$timeExist) {
			$sql="INSERT INTO showOrder(showOrderId,date,timeslot,theater,movieName,seat)  VALUES ('','".$date."','". $time. "','".$theater."','".$movieName."',".'50'.");";




			if ($conn->query($sql) === TRUE) {
				$result=$conn->query("select showOrderId from showOrder where date='".$date."' and timeslot='".$time."' and theater='".$theater."' and movieName='".$movieName ."' ;");

				$r=$result->fetch_object();

				$showOrder=$r->showOrderId;//we will use this id to reduce seat

				$result=$conn->query("select seat from showOrder where showOrderId='".$showOrder."';");

				$r=$result->fetch_object();

				$seatCount=$r->seat;
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{

			$resourse=$conn->query("select theater from showOrder where date='".$date."' and timeslot='".$time."';");
			$theaterExist=false;
			while ($rw=$resourse->fetch_object()) {
				if ($rw->theater===$theater) {
					$theaterExist=true;
					break;
				}
			}

			if (!$theaterExist) {
				$sql="INSERT INTO showOrder(showOrderId,date,timeslot,theater,movieName,seat)  VALUES ('','".$date."','". $time. "','".$theater."','".$movieName."',".'50'.");";


				if ($conn->query($sql) === TRUE) {
					$result=$conn->query("select showOrderId from showOrder where date='".$date."' and timeslot='".$time."' and theater='".$theater."' and movieName='".$movieName ."' ;");

					$r=$result->fetch_object();

				$showOrder=$r->showOrderId;

				$result=$conn->query("select seat from showOrder where showOrderId='".$showOrder."';");

				$r=$result->fetch_object();

				$seatCount=$r->seat;
			}

		}
		else{

			$resourse=$conn->query("select movieName from showOrder where date='".$date."' and timeslot='".$time."' and theater='".$theater."';");
			$movieExist=false;
			while ($rw=$resourse->fetch_object()) {
				if ($rw->movieName===$movieName) {
					$movieExist=true;
					break;
				}
			}
			if (!$movieExist) {
				$sql="INSERT INTO showOrder(showOrderId,date,timeslot,theater,movieName,seat)  VALUES ('','".$date."','". $time. "','".$theater."','".$movieName."',".'50'.");";


				if ($conn->query($sql) === TRUE) {
					$result=$conn->query("select showOrderId from showOrder where date='".$date."' and timeslot='".$time."' and theater='".$theater."' and movieName='".$movieName ."' ;");

					$r=$result->fetch_object();

				$showOrder=$r->showOrderId;

				$result=$conn->query("select seat from showOrder where showOrderId='".$showOrder."';");

				$r=$result->fetch_object();

				$seatCount=$r->seat;
			}
		}

		else{

			$result=$conn->query("select showOrderId from showOrder where date='".$date."' and timeslot='".$time."' and theater='".$theater."';");

			$r=$result->fetch_object();

				$showOrder=$r->showOrderId;

				$result=$conn->query("select seat from showOrder where showOrderId='".$showOrder."';");

				$r=$result->fetch_object();

				$seatCount=$r->seat;;
			}
		}

	}
}


?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						<?php 

						echo "".$movieName;
						?>

					</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4 col-lg-4 " align="center">
							<img alt="User Pic" src=<?php echo '"uploadimages/'.$row->image.'"';?> class=" img-responsive"> 
						</div>
						<div class=" col-md-8 col-lg-8 "> 
							<table class="table table-user-information">
								<tbody>

									<tr>
										<td><strong>Date </strong></td>
										<td><?php echo "".$date ?> </td>
									</tr>
									<tr>
										<td><strong>Movie Name </strong></td>
										<td><?php echo "".$row->Name;?> </td>
									</tr>
									<tr>
										<td><strong>Time </strong></td>
										<td><?php echo "". $_POST['timeSlot']?></td>
									</tr>
									<tr>
										<td><strong>Movie Name </strong></td>
										<td><?php echo "". $_POST['theater']?></td>
									</tr>
									<tr>
										<td><strong>Seat Available </strong></td>
										<td><?php echo $seatCount;?> </td>
									</tr>
									<tr>
										<td><strong>Ticket Price </strong></td>
										<td> 500 </td>
									</tr>
							
									<form action="seatReducing.php" method="post">
										<input type="hidden" name="showOrderId" value=<?php echo '"'.$showOrder.'"'; ?>>

										<input type="hidden" name="date" value=<?php echo '"'.$date.'"'; ?>>

										<input type="hidden" name="time" value=<?php echo '"'.$time.'"'; ?>>

										<input type="hidden" name="theater" value=<?php echo '"'.$theater.'"'; ?>>

										<input type="hidden" name="seat" value=<?php echo '"'.$seatCount.'"'; ?>>

										<tr>
											<td colspan="2" width="100%">
												<input class="btn btn-primary btn-xs btn-block" type="submit" name="submit" value="Confim">
											<?php include_once 'PayUMoney_form.php'; ?>
											</td>
										</td>
								
									</form>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

</html>
