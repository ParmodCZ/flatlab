<?php
date_default_timezone_set("Asia/Kolkata");
include 'header.php'; 
include 'sidebar.php';
$exe = getVendorBids();
?>
  <!--<section id="main-content"> -->
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                                 Client Bids
                          </header>
								<table  class="display table table-bordered table-striped" id="example">
                                     <thead>
                                      <tr>
                                        <th>Bid Name</th>
                                          <th class="hidden-phone"><i class="fa fa-question-circle"></i> Bid Discription</th>
                                  <th><i class="fa fa-bookmark"></i> Date &amp; Time</th>
                                  <th> Status</th>
                                      </tr>
                                      </thead>
                                      <tbody>
								<?php while($row = mysqli_fetch_assoc( $exe )) { ?>										  
                                      <tr>
                                  <td><a href="bid_details.php?id=<?php echo $id=$row['id']; ?>"><?php echo  $row['bidname'];  ?> </a></td>
                                  <td class="hidden-phone"><?php  echo substr($row['biddescription'], 0, 60)."...";
								 // echo $row['biddescription'];  ?></td>
                                  <td><?php echo $row['bidenddate'];  ?></td>
                                   <td>
                                 <?php 
								 $cu=date("Y-m-d H:i:s");
									    if (strtotime($cu) < strtotime($row['bidenddate']) ){
											 $st="Active";
											echo '<span class="label label-info label-mini">Open</span>';
										}else
										{
											 $st="Closed";
											echo '<span class="label label-warning label-mini">Closed</span>';
											}
									  ?></td>	
                              </tr>
								<?php } ?>  
                             </tbody>
                          </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
    <!--  </section> -->
      <!--main content end-->
      <!--footer start-->
<?php include("footer.php");  ?>