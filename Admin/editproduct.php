<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"foodbank");

session_start();

$id=$_GET["id"];
$res=mysqli_query($link,"select * from menu where id=$id");
while ($row=mysqli_fetch_array($res))
{
  $pro_name=$row["items"];
  $pro_price=$row["price"];
  $pro_qty=$row["product_qty"];
  $pro_img=$row["product_image"];
  $pro_cat=$row["product_catagory"];
  $pro_des=$row["product_desc"];
}
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
           </ul>

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

                 <h2>Editing</h2>
                 <div class="block">
                   <form name="form1" action="" method="post" enctype="multipart/form-data">
         					<table border="1">
                    <tr>
           					<td colspan="2" align="center">
           					<img src="<?php echo $pro_img ?>" height="100" width="100">
                    </td>
           					</tr>
         					<tr>
         					<td>Product Name</td>
         					<td><input type="text" name="pnm" value="<?php echo $pro_name; ?>"></td>
         					</tr>
         					<tr>
         					<td>Product Price</td>
         					<td><input type="text" name="pprice" value="<?php echo $pro_price; ?>"></td>
         					</tr>
         					<tr>
         					<td>Product Quantity</td>
         					<td><input type="text" name="pqty" value="<?php echo $pro_qty; ?>"></td>
         					</tr>
         					<tr>
         					<td>Product Image</td>
         					<td><input type="file" name="pimage"></td>
         					</tr>
         					<tr>
         					<td>Product Categoty</td>
         					<td>
                    <select name="pcategory" value="<?php echo $pro_cat; ?>">
           					<option value="fol_fruits">Fruits</option>
           					<option value="chal_dal">Rice</option>
           					<option value="sobji_vegetables">Vegitables</option>
           					<option value="tel_oils">Oil</option>
                    <option value="fish_meat">Meat</option>
           					</select>
                  </td>
         					</tr>
         					<tr>
         					<td>Product Description</td>
         					<td>
         					<textarea cols="22" rows="10" name="pdesc" value="<?php echo $pro_des; ?>"></textarea>
         			        </td>
         					</tr>
         					<tr>
         					<td colspan="2" align="center"><input type="submit" name="submit1" value="Edit"></td>
         				</tr>


         					</table>


         					</form>
                  <?php
                  if(isset($_POST["submit1"]))
                  {
                    $fnm=$_FILES["pimage"]["name"];
                    if($fnm=="")
                    {
                      //mysqli_query($link,"update menu set product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]',product_catagory='$_POST[pcategory]', product_desc='$_POST[pdesc]' where id=$id");
                      mysqli_query($link,"update menu set product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]',product_catagory='$_POST[pcategory]', product_desc='$_POST[pdesc]' where id=$id");
                    }

                    else {
                     $v1=rand(1111,9999);
                     $v2=rand(1111,9999);

                     $v3=$v1.$v2;

                     $v3=md5($v3);

                     $dst="./product_image/".$v3.$fnm;
                     $dst1="product_image/".$v3.$fnm;
                     move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

                     mysqli_query($link,"update menu set product_image='$dst1',product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]',product_catagory='$_POST[pcategory]', product_desc='$_POST[pdesc]' where id=$id");

                //  mysqli_query($link,"insert into product values('','$_POST[pnm]',$_POST[pprice],$_POST[pqty],'$dst1','$_POST[pcategory]','$_POST[pdesc]')");
                  }
                  ?>
                  <script type="text/javascript">
                    window.location="displaying.php";
                  </script>
                  <?php

                  }

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
