<?php   include 'header.php';
include 'sidebar.php';
date_default_timezone_set("Asia/Kolkata");
$id=$_GET['id'];
$_SESSION['bid_id'] = $id;
$_SESSION['ur']= 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
	//$_SESSION['u_i']; login user Id 
global $db;
$row = FbidDetails($id);
?>
   <section>
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <!--latest product info start-->
                      <section class="panel post-wrap pro-box minaside">
                          <aside>
                              <div class="post-info">
                                  <span class="arrow-pro right"></span>
                                  <div class="panel-body">
                                     <h1><strong><?php echo  $row['bidname'];  ?></strong><br>  
                                     Bid ID: <?php echo  "#".$row['id'];  ?></h1>
                                      <div class="desk yellow">
                                          <h3><?php echo  $row['bidname'];  ?></h3>
                                          <p><?php echo  $row['biddescription'];  ?></p>
                                        </div>
  									 Bid Expiry: <?php  echo  $b_exp=$row['bidenddate']; $cu=date('Y-m-d H:i:s');?>
  									</br> Bid End:<div id="time"><time datetime="<?php echo $b_exp ?>+0530"></time></div>
  									   <?php 
  									if($row['selectdutystatus']=='3'){
  												$st="Closed";
  											echo '<button class="btn btn-danger" type="button">Closed</button>';
  											} 
  									   else if (strtotime($cu) < strtotime($b_exp) ){
  											$st="Active";
  											echo '<button class="btn btn-success" type="button">Active</button>';
  										}else
  										{
  											$st="Closed";
  											echo '<button class="btn btn-danger" type="button">Closed</button>';
  											}
  									  ?>	
                              </div>
                          </aside>
                            <aside>
                              <div class="post-info">
                                  <span class="arrow-pro right"></span>
                                  <div class="panel-body">
                                   <h1><strong>Booking Details</strong></h1>
                                  	<ul id="book-det">
                                       <li><span>Name:</span> <?php echo  $row['name'];  ?></li>
                                        <li><span>Mobile:</span> <?php echo  "XXXXXX"; ?></li>
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
                                    </ul>
                                     
                              </div>
                          </aside>
                         <!-- <aside class="post-highlight yellow v-align">
                              <div class="panel-body text-center">
                                  <div class="pro-thumb">
                                      <img src="<?php /*?><?php  echo $row['avatar']?><?php */?>" alt="">
                                  </div>
                              </div>
                          </aside>-->
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
                                  <th><i class="fa fa-question-circle"></i> Bider Contact</th>
                                  <th class="hidden-phone"><i class="fa fa-bookmark"></i> Date &amp; Time</th>
                                  <th><i class=" fa fa-edit"></i> Bid Amount</th>
                                  <th class="hidden-phone"></th>
                              </tr>
                              </thead>
                              <tbody>
            							<?php 
              							$sql2="select * from bidders_bids where bidid='$id' ORDER BY amount ASC";
              							$exe2=mysqli_query($db,$sql2);
              							while($row2 = mysqli_fetch_assoc( $exe2 )){
            							?> 
          							  <tr>
                            <td><a href="#">XXXX</a></td>
                            <td >XXXX</td>
                            <td class="hidden-phone"><?php echo  $row2['date_time'];  ?></td>
                            <td><span class="label label-info label-mini"><?php echo  $row2['amount'];  ?></span></td>
                            <td class="hidden-phone">&nbsp;</td>
                          </tr>
                  						<?php } 
                  		if($st=="Closed"){ echo " "; } else{	?>
                        <tr>
          							  <form action="" method="POST">
                            <td>
                               <input type="text" name="name" class="form-control"   placeholder="Name"  pattern="[a-zA-Z][a-zA-Z0-9\s]*"oninvalid="setCustomValidity('Plz enter  valid name ')"onchange="try{setCustomValidity('')}catch(e){}" required >
                            </td><td><input type="text" name="contact" class="form-control" value="" placeholder="Contact" placeholder="Contact" pattern="[0-9]+" oninvalid="setCustomValidity('Plz enter  valid mobile Number ')" onchange="try{setCustomValidity('')}catch(e){}" required></td>
                            <td class="hidden-phone"><?php  echo date("d/m/Y h:i:s");?></td>
                            <td><input type="text" name="amount" class="form-control"  value="" placeholder="Amount" pattern="[0-9]+"oninvalid="setCustomValidity('Enter Amount Only')" onchange="try{setCustomValidity('')}catch(e){}" required></td>
                            <td><button type="submit" name="add_bids" class="btn btn-success">Submit</button></td>                      
                        </form>
        							 </tr> 
        							<?php } ?>							 
                          </tbody>
                      </table>
                  </section>
              </div>
          </div>
  </section>
</section>
	   <script src="https://code.jquery.com/jquery-1.12.2.min.js"></script>
        <script>document.write('<script src="js/jquery.countdown.js"><\/script>')</script>
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
<?php include 'footer.php'; ?>