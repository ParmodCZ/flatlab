<?php
  include('header.php');
  global $db;
  if(isset($_GET['id'])!="")
  {
  $delete=$_GET['id'];
  $delete=mysqli_query($db,"DELETE FROM bids WHERE id='$delete'");
  if($delete)
  {
	  header("Location:allbids.php?status=delete successfully");
  }
  else
  {
	  header("Location:allbids.php?status=deletion failed");
  }
  }
  
?>