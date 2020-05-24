<?php
$resto = $_SESSION['resid'];
$res=mysqli_query($link,"select * from menu where r_id='$resto'");
//$res=mysqli_query($link,"select * from product");
echo "<table border='1'>";
echo "<tr>";
echo "<th>"; echo "Product Image"; echo "</th>";
echo "<th>"; echo "Product Name"; echo "</th>";
echo "<th>"; echo "Product Price"; echo "</th>";
echo "<th>"; echo "Quantity"; echo "</th>";
echo "<th>"; echo "Catagory"; echo "</th>";
echo "<th>"; echo "Edit"; echo "</th>";
echo "</tr>";
while ($row=mysqli_fetch_array($res))
{
  //echo "<tr";
  echo "<td>"; ?> <img src="<?php echo $row["product_image"]; ?>" height="100" width="100"<?php echo "</td>";
  echo "<td>"; echo $row["items"]; echo "</td>";
  echo "<td>"; echo $row["price"]; echo "</td>";
  echo "<td>"; echo $row["product_qty"]; echo "</td>";
  echo "<td>"; echo $row["product_catagory"]; echo "</td>";
  echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>">edit</a> <?php echo "</td>";
  echo "</tr>";
}
echo "</table>";
 ?>
