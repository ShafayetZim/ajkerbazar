<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"ogs_exp");


//

<?php
$con = mysqli_connect('localhost', 'root', '');
if(!$con)
{
echo 'not connected';
}
if(!mysqli_select_db($con, 'ogs_exp'))
{
echo 'db not selected';
}
?>


//delete without deleting image from folder

<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"ogs_exp");
$id=$_GET["id"];
mysqli_query($link,"delete from product where id=$id");

?>

<script type="text/javascript">
    window.location="displayitem.php";
</script>
