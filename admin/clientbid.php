<?php
date_default_timezone_set("Asia/Kolkata"); 
include('header.php'); 
if (!isAdmin()) {
	header('location:login.php');
}
include('sidebar.php');
$return =getAllBids('customer');
global $db;	
$userid = $_SESSION['user']['id'];		
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Client Bid List
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>Bid Name</th>
                                          <th>Contact</th>
                                          <th>Date &amp; Time</th>
                                          <th class="hidden-phone">Status</th>
                                          <th class="hidden-phone">Posted_by</th>
										  <th class="hidden-phone">Car Type</th>
										   <th class="hidden-phone">Price</th>
										  <th class="hidden-phone">Duty Status</th>
										  <th class="hidden-phone">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
									  <?php while($row = mysqli_fetch_assoc($return)) { ?>	
                                      <tr class="gradeX">
                                          <td><a href="bid_details_admin.php?id=<?php echo $id=$row['id']; ?>"><?php echo substr($row['bidname'], 0, 30)."...";  ?> </a></td>
                                          <td><?php echo $row['number']; ?></td>
                                          <td><?php echo $row['bidenddate'];  ?></td>
                                          <td class="center hidden-phone"><?php 
								 $cu=date("Y-m-d H:i:s");
									    if (strtotime($cu) < strtotime($row['bidenddate']) ){
											 $st="Active";
											echo '<span class="label label-info label-mini">Open</span>';
										}else
										{
											 $st="Closed";
											echo '<span class="label label-warning label-mini">Closed</span>';
											}
									 
											$sql2="select * from bidders_bids where bidid='$id'";
											$exe2=mysqli_query($db,$sql2);
											$bidcount=mysqli_num_rows($exe2);
									   ?> <span class="badge bg-warning"><?php echo $bidcount; ?></span>
									  </td>
                                          
										   <td class="center hidden-phone"> <?php
									  $bid_by= $row['bidby']; 
									  
									  	$sql2="select * from user where id='$bid_by'";
										$exe2=mysqli_query($db,$sql2);
										$row2= mysqli_fetch_array($exe2);
									  echo $row2['username']; 
									  ?></td>
									  <td class="center hidden-phone"><?php echo  $row['cartype'];
									   ?></td>
									   <td class="center hidden-phone"><?php echo  $row['dutyprice'];
									   ?></td>
                                          <td class="center hidden-phone"><?php $d_status=$row['selectdutystatus'];
									  if($d_status=='0'){echo "Booked";}elseif($d_status=='1'){echo "In Progress";}elseif($d_status=='2'){echo "Customer Offer";}elseif($d_status=='3'){echo "Dead On Arrival";}else{ echo " ";}
									  ?></td>
										   
                                        
									<td><?php
                                 if($bid_by==$userid){ ?>    <a href="biddetails.php?id=<?php echo $id=$row['id']; ?>"> <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                                      <a href="editbid.php?id=<?php echo $id=$row['id']; ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     <a href="delete_bid.php?delete_bid=<?php echo $id=$row['id']; ?>"onclick="return confirm('Are you sure you want to delete this Record?');"" ><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
								 <?php } else{
									 echo  "No Access";
								 } ?>  </td>
										  
                                      </tr>
                                      
<?php } ?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
		 </section>
      <!--main content end-->
      <!--footer start-->
<?php include("footer.php");  ?>
      