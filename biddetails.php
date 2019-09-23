<?php 
date_default_timezone_set("Asia/Kolkata");
include('header.php'); 
if (!isAdmin()) {
  header('location:login.php');
}
include('sidebar.php');
$id=$_GET['id'];
$_SESSION['bid_id'] = $id;
$row =bidDetails($id);
global $db; 
$userid = $_SESSION['user']['id'];
?>  
  <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              
              <div class="row">
                  <div class="col-lg-12">
                      <!--latest product info start-->
                      <section class="panel post-wrap pro-box">
                          <aside>
                              <div class="post-info">
                                  <span class="arrow-pro right"></span>
                                  <div class="panel-body">
                                      <h1><strong>
									  <?php echo  $row['bidname']; 
									             $by=$row['bidby'];  
									  ?>         
                    </strong><br> 
                    Bid ID: <?php
									  echo  "#".$row['id'];  ?></h1>
                    <div class="desk yellow">
                        <h3><?php echo $row['bidname'];  ?></h3>
                        <p><?php echo  $row['biddescription'];  ?></p>
	  
                      </div></br>
										<h2 id="biddo">Bid Expiry: <?php  echo  $b_exp=$row['bidenddate'];
									   
									   $cu=date("Y-m-d h:i:s");
									   ?></h2>
										</br>Time Left:<div id="time"><time datetime="<?php echo $b_exp ?>+0530"></time></div>
											
<?php									   																		
  if($row['selectdutystatus']=='3'){
  		 $st="Closed";
  	echo '<button class="btn btn-danger" type="button">Closed</button>';
  		 
  	 }
  else if (strtotime($cu) < strtotime($b_exp) ){
  	$st="Active";
  	echo '<button class="btn btn-success" type="button">Active</button>';
  	
  }
  else
  {
  	$st="Closed";
  	echo '<button class="btn btn-danger" type="button">Closed</button>';

  	}
?>						 
									 
            </div>
        </div>
    </aside>
<aside>
  <div class="post-info">
      <span class="arrow-pro right"></span>
      <div class="panel-body">
       <h1><strong>Booking Details</strong></h1>
      	<ul id="book-det">
           <li><span>Name:</span> <?php echo  $row['name'];  ?></li>
           <li><span>Mobile:</span> <?php if($role=='1'){ echo  $row['number']; }else{ echo "XXXXXX";} ?></li>
           <li><span>Pick up Point:</span> <?php echo  $row['pickuppoint'];  ?></li>
           <li><span>Drop off Point:</span> <?php echo  $row['dropoffpoint'];  ?></li>
           <li><span>Passengers:</span> <?php echo  $row['numberofpassenser'];  ?></li>
           <li><span>Duty Type:</span> <?php echo  $row['dutytype'];  ?></li>
           <li><span>Roof Rack:</span> <?php echo  $row['roofrack'];  ?></li>
           <li><span>Car Type:</span> <?php echo  $row['cartype'];  ?></li>
           <li><span>Start Date:</span> <?php echo  $row['startdate'];  ?></li>
           <li><span>End Date:</span> <?php echo  $row['startend'];  ?></li>
           <li><span>No. of Days:</span> <?php echo  $row['numberofdays'];  ?></li>
           <li><span>Destination:</span> <?php echo  $row['destination'];  ?></li>
           <li><span>Exclusion:</span> <?php echo  $row['exclusions'];  ?></li>  
          <li><span>Special Demands:</span> <?php echo  $row['specialdemanded'];  ?></li> 
          <?php if($role=='1'){  ?>
          <li><span>Duty Status:<?php   $r=$row['selectdutystatus']; if($r==1){ echo "In Progress"; }else if($r==0){ echo "Booked";}else{ echo "";}  ?></li>
          <li>Duty Price:<?php  echo  $r=$row['dutyprice'];  ?></li>
          <?php } ?> 
                  </ul>
                   <h1><strong>Bid Secret Details</strong></h1>
                   <p><?php echo  $row['bidsecretdetail'];  ?></p>
            </div>
</aside>
</section>
                      <!--latest product info end-->                 
      </div>
  </div>    
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Bidding List</header>
            <table class="table table-striped table-advance table-hover">
                <thead>
                <tr>
                    <th>Bidder Name</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Bider Contact</th>
                    <th><i class="fa fa-bookmark"></i> Date &amp; Time</th>
                    <th><i class=" fa fa-edit"></i> Bid Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>                             
                <?php 
                	$sql2="select * from bidders_bids where bidid='$id' ORDER BY amount ASC";
                	$exe2=mysqli_query($db,$sql2);
                	while($row2 = mysqli_fetch_assoc( $exe2 )){
                ?> 
							 <tr><td>
										<a href="#"><?php 
												if($role=='1'){ 
																	echo  $row2['name'];
																}else
																{ 
																	echo "XXXX";
																} 
																?>
										</a>
								 </td>
                                 
								 <td class="hidden-phone">
									 <?php if($role=='1'){
														echo  $row2['contact'];
														}
											else
														{ 
															echo "XXXX";
														}  
										?>
								</td>
                                
								<td>
										<?php echo  $row2['date_time'];  ?> 
								</td>
                                 <td><span class="label label-info label-mini">
								 <?php if($role=='1'){ 
													echo  $row2['amount'];
													}
													else
													{ 
														echo "XXXX";
													} 
									?> </span></td>
                                  <?php 
								  
if($row2['status']=='0'){  $act="Shortlist"; $span="label label-danger label-mini"; } else {  $act="finalist"; $span="label label-success label-mini"; } 
								  
					if($role=='1'){ 	?>		  
								  <td><a href="bid_final.php?ubid=<?php echo $ubid=$row2['users_bid_id'];?> && bid_id=<?php echo $id;?>"><span class="<?php echo $span; ?>"><?php echo $act; ?></span></a></td>
                          <?php  }else
							  {
										echo "";				
							  }?>					
						</tr>
							<?php } 			
                            

							if($st=="Closed"){
												echo " ";
											}else{   
								?>
							  <tr>
                   <form action="action.php" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <td>
                 <input type="text" name="name" class="form-control"   placeholder="Name"  pattern="[a-zA-Z]+"
    oninvalid="setCustomValidity('Plz enter  valid name ')"
    onchange="try{setCustomValidity('')}catch(e){}" required>
                                  </td>
								  <td><input type="text" name="contact" class="form-control" value="" placeholder="Contact" pattern="[0-9]+"
    oninvalid="setCustomValidity('Plz enter  valid mobile Number ')"
    onchange="try{setCustomValidity('')}catch(e){}" required></td>
                                  <td><?php  echo date("d/m/Y h:i:s");?></td>
                                  <td><input type="text" name="amount" class="form-control"  value="" placeholder="Amount" pattern="[0-9]+"
    oninvalid="setCustomValidity('Enter Amount Only')"
    onchange="try{setCustomValidity('')}catch(e){}" required></td>
                                  <td><button type="submit" name="admin_bid" class="btn btn-success">Submit</button></td>                                  
                             </form>   
							 </tr>
											<?php  } ?>							 
                              </tbody>
                          </table>
                      </section>
                  </div>
              </div>
              
              <!-- Finalist Bidder Table Starts-->
			  
			<?php  $sql3="select * from bidders_bids where bidid='$id' && status='1'";
							$exe3=mysqli_query($db,$sql3);
							$row3 = mysqli_fetch_assoc( $exe3 );
			  ?>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Bidding List</header>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>Finalist Bidder Details</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Bider Contact</th>
                                  <th><i class="fa fa-bookmark"></i> Date &amp; Time</th>
                                  <th><i class=" fa fa-edit"></i> Bid Amount</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                             <?php  
							 $num = mysqli_num_rows( $exe3 ); 
							 if($num=='1'){
							 ?>
							  <tr>
                              
							  <td><a href="#"><?php  if($role=='1'){ echo  $row3['name'];}else{ echo 'XXXX';}  ?></a></td>
                                  <td class="hidden-phone"><?php if($role=='1'){ echo  $row3['contact']; }else{ echo 'XXXX'; }  ?></td>
                                  <td><?php echo  $row3['date_time'];  ?> </td>
                                  <td><span class="label label-info label-mini"><?php if($role=='1'){ echo  $row3['amount']; }else{ echo "XXXX";} ?> </span></td>
								  <td>
                                      <span class="label label-success label-mini">Finalist</span>
                             <?php  if($role=='1'){  ?>
							 <a href="del_final.php?ubid=<?php echo $ubid=$row3['users_bid_id'];?> && bid_id=<?php echo $id;?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
							 <?php }else{
							 echo "";
							 }?> </td>
                              </tr>
							 <?php }else{ ?>
							 <tr>
                              
							  <td colspan="5">No finalist  </td>
                              </tr>
							 <?php } ?>
                                                                                  
                              </tbody>
                          </table>
                      </section>
                  </div>
              </div>
              <!-- Finalist Bidder Table Ends -->

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
	  <script src="https://code.jquery.com/jquery-1.12.2.min.js"></script>
        <script>document.write('<script src="jquery.countdown.js"><\/script>')</script>
        <script>
        window.jQuery(function ($) {

            "use strict";

            $("#toDateString").text(new Date("December 20, 2016 10:24:00").toDateString());
            $("#toGMTString").text(new Date("December 20, 2016 10:24:00").toGMTString());
            $("#toUTCString").text(new Date("December 20, 2016 10:24:00").toUTCString());
            if (Date.prototype.toISOString) {
                $("#toISOString").text(new Date("December 20, 2016 10:24:00").toISOString());
            }

            $('div, time').countDown();

        });
        </script>
<?php include("footer.php");  ?>
