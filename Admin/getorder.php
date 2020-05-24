<?php
session_start();
//include('./navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>


  <title>Ajker Bazar</title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">



</head>
<body>

<br><br>
  <main>
    <section>

<div class="container">  <div class="row">
<div style="clear:both"></div>


			<div class="table-responsive"><br><h3> ORDER HISTORY  </aside></h3><br>
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="20%">Price</th>
						<th width="20%">Quantity</th>


					</tr>
					<tr>



<?php


$connect = mysqli_connect("localhost", "root", "", "foodbank");
$total = 0;



		 if(!isset($_SESSION['User']))
			 echo '<script>alert("you have to login")</script>';
	     else {
		 $sql="SELECT order_details FROM `users` WHERE r_id='". $_SESSION['resid']."'";
          $result = mysqli_query($connect, $sql);
		    $i = 0;


					while($row = mysqli_fetch_array($result))
					{
					  $obj = json_decode($row[0], true);
					    while($i < sizeof($obj)){


						//echo sizeof($row[0]);

						$obj1 = $obj[$i++];

						$total = $total + ($obj1["item_quantity"] * $obj1["item_price"]);
?>
					    <td><?php echo $obj1['item_name']; ?></td>
						<td><?php echo $obj1['item_price']; ?></td>
						<td><?php echo $obj1['item_quantity']; ?></td>
					</tr>
					<?php  }
					   }?>
					<tr>
					   <td colspan="2" align="right">Total</td>
					   <td align="right"><?php echo number_format($total, 2); ?></td>
		            </tr>
		            <?php   //echo sizeof($obj);
		             }	?>


					</tr>



				</table>
				</div>
			</div> </div>
    </section>
  </main>



</body>
</html>
