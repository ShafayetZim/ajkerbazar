
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"foodbank");
$id=$_GET["id"];

$res=mysqli_query($link,"select * from menu where id=$id");
while($row=mysqli_fetch_array($res))
{
  $img=$row["product_image"];
}
unlink($img);

mysqli_query($link,"delete from menu where id=$id");

?>

<script type="text/javascript">
    window.location="displayitem.php";
</script>
