<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"ogs_exp");

session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ogs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

     <!-- <link rel="stylesheet" href="{{asset('css/style.css') }}"> -->
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body style="background-color:powderblue;>

     <div class="wrapper">
       <!-- nav starts -->
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <!-- For the gap on border -->
         <div class="container">

         <a class="navbar-brand" href="#">Dashboard</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
               <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#">About</a>
             </li>
             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Actions
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="orderaddress.php">See Orders</a>
                 <a class="dropdown-item" href="#">Cancelled Orders</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="displaying.php">Display Items</a>
               </div>
             </li>

           </ul

           <form class="form-inline my-2 my-lg-0">
             <div class="input-group mb-3">
             <input type="text" class="form-control" placeholder="Search">
             <div class="input-group-append">
             <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
             </div>
             </div>
             <!-- search button ends -->

           </form>
         </div>
         </div>
         <!-- container div ends -->
         <?php
         if(isset($_SESSION['User']))
          {
               // echo ' Well Come ' . $_SESSION['User'].'<br/>';
               echo '<a href="logout.php?logout">Logout</a>';
          }
          else
          {
              header("location:index.php");
          }
          ?>
       </nav>
       <!-- nav ends -->

       <!-- side bar and content starts -->
       <div class="container">
         <!-- side bar starts -->
         <div class="row">
           <div class="col-md-4">
             <div class="list-group">
             <a href="addproduct.php" class="list-group-item list-group-item-action">Add Item</a>
             <a href="displayitem.php" class="list-group-item list-group-item-action">Delete Item</a>
             <a href="displayedit.php" class="list-group-item list-group-item-action">Update Item</a>
             </div>
           </div>

         <!-- </div> -->
         <!-- side bar ends -->
         <!-- content starts -->
         <!-- <div class="col-md-8">
           <div class="widget"> -->
           <div class="grid_10">
               <div class="box round first">

                 <h2>Order Details</h2>
                 <div class="block">
                   <?php
                   $id=$_GET["id"];
                   $res=mysqli_query($link,"select * from orderhistory where order_id=$id");
                   echo "<table border='1'>";
                   echo "<tr>";
                   echo "<th>"; echo "product image"; echo "</th>";
                   echo "<th>"; echo "product name"; echo "</th>";
                   echo "<th>"; echo "product price"; echo "</th>";
                   echo "<th>"; echo "product qty"; echo "</th>";
                   echo "<th>"; echo "product total"; echo "</th>";
                   //echo "<th>"; echo "delete"; echo "</th>";
                   echo "</tr>";
                   while ($row=mysqli_fetch_array($res))
                   {
                     //echo "<tr";
                     echo "<td>"; ?> <img src="<?php echo $row["product_image"]; ?>" height="100" width="100"<?php echo "</td>";
                     echo "<td>"; echo $row["product_name"]; echo "</td>";
                     echo "<td>"; echo $row["product_price"]; echo "</td>";
                     echo "<td>"; echo $row["product_qty"]; echo "</td>";
                     echo "<td>"; echo $row["product_tot"]; echo "</td>";
                     echo "</tr>";
                   }
                   echo "</table>";
                    ?>


                   </div>

                 </div>


           </div>

         </div>
<!-- content ends -->
       </div>

       <!-- side bar and content ends -->
       <footer class="footer-bottom">
         <p class="text-center">&copy; Rights reserved by CSE482 project team</p>
       </footer>


     </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
