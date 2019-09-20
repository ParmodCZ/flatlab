<?php 
	include('header.php'); 
	if (!isAdmin()) {
		//$_SESSION['msg'] = "You must log in first";
		header('location:login.php');
	}
	 include('sidebar.php'); 
?>
<!--main content start-->
<section id="main-content">
   <section class="wrapper">
      <!-- page start-->
      <div class="row">
         <div class="col-lg-12">
            <section class="panel">
               <header class="panel-heading">
                 Add New Bid
               </header>
               <div class="panel-body">
                  <form class="form-horizontal tasi-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="bid_name">Bid Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bid_name" name="bid_name">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="bid_description">Bid Description (required)</label>
                        <div class="col-sm-10">
                           <textarea class="form-control ckeditor" name="bid_description" rows="2" id="bid_description"></textarea>
                           <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="bid_type">Bid Type</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="bid_type" name="bid_type">
                             <option value="">Select Bid Type</option>     
                             <option value="1">customer Bids</option>      
                             <option value="2">client Bids</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"for="bid_end_date">Bid Ends Date & Time</label>
                        <div class="col-sm-10">
                           <input class="form-control form_datetime" type="text" id="bid_end_date" name="bid_end_date" readonly>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="duty_price">Duty Price</label>
                        <div class="col-sm-10">
                          <input class=" form-control"  name="duty_price" value="" type="text" placeholder="Amount" pattern="[0-9]+"
    oninvalid="setCustomValidity('Enter Amount Only')"
    onchange="try{setCustomValidity('')}catch(e){}" required/>
                           <!-- <input class="form-control" type="text" id="duty_price" name="duty_price" placeholder="Amount"> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="active_bid">Active Bid</label>
                        <div class="col-sm-10">
                           <input type="checkbox" value="active" id="active_bid" name="active_bid">
                        </div>
                     </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="name">Name</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="text" id="duty_price" name="name">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="number">Number</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="text" id="number" name="number">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="pick_up_point">Pick up point</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="text" id="pick_up_point" name="pick_up_point">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="drop_off_point">Drop off point</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="text" id="drop_off_point" name="drop_off_point">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="number_of_passenger">Number of passenger</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="number" id="number_of_passenger" name="number_of_passenger">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="city">City</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="city" name="city">
                              <option value="">Select City</option>
                              <?php    
                                 $e = getAllCities();  
                                 while($row = mysqli_fetch_assoc( $e )) {         
                                    echo '<option value="'.$row['id'].'">' . $row['city'] . '</option>';             
                                 }                         
                              ?> 
                              <option>Option 2</option>
                              <option>Option 3</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="duty_type">Duty Type</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="duty_type" name="duty_type">
                             <option value="">Select Please</option>    
                             <option value="LDD">LDD (Long Distance Drop)</option>     
                             <option value="SDD">SDD(Short Distance Drop)</option>     
                             <option value="Shimla Drop">Shimla Drop</option>
                             <option value="Shimla Pick">Shimla Pick</option>
                             <option value="Adventure &amp; Sports">Adventure &amp; Sports</option>
                             <option value="Pilgrimrage Tours">Pilgrimrage Tours</option>
                             <option value="WildLife Sanctuary">WildLife Sanctuary</option>
                             <option value="Heritage &amp; Culture">Heritage &amp; Culture</option>
                             
                             <option value="Manali drop">Manali Drop</option>
                             <option value="Pick up from manali">Manali Pick</option>
                             <option value="Delhi drop">Delhi Drop</option>
                             <option value="Delhi pick">Delhi Pick</option>
                             <option value="Sd up down">Sd up Down</option>
                             <option value="LD up down">LD up Down</option>
                             <option value="Tour">Tour</option>
                             <option value="Tour-short">Tour-Short</option>
                             <option value="Tour-Leh">Tour-Leh</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="query_from">Query from</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="query_from" name="query_from">
                             <option value="">Select Please</option>      
                             <option value="HireCab">HireCab</option>      
                             <option value="JD">JD</option>    
                             <option value="Reference">Reference</option>
                             <option value="Repeat">Repeat</option>
                             <option value="Combo">Combo</option>
                             <option value="Our Network">Our Network</option>
                             <option value="Customer Bid">Customer Bid</option>
                             <option value="Dead Lead">Dead Lead</option>
                             <option value="Tour operator">Tour operator</option>
                             <option value="Hotel">Hotel</option>
                             <option value="Repeat-Last Booked from others">Repeat-Last Booked from others</option>
                             <option value="Others">Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="select_duty_status">Select Duty Status</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="select_duty_status" name="select_duty_status">
                             <option value="">Select Please</option>    
                             <option value="0">Booked</option>    
                             <option value="1">In Progress</option>
                             <option value="2">Customer Offer</option>
                             <option value="3">Dead on Arrival</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="roof_rack">Roof Rack</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="roof_rack" name="roof_rack">
                              <option value="">Select Please</option>      
                             <option value="Yes">Yes</option>     
                             <option value="no">no</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="car_type">Car Type</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="car_type" name="car_type">
                              <option value="">Select Car Type</option>    
                             <option value="Indica">Indica</option>     
                             <option value="Vista">Vista</option>
                             <option value="Indigo">Indigo</option>
                             <option value="Zest">Zest</option>
                             <option value="Xcent">Xcent</option>
                             <option value="Dzire">Dzire</option>
                              <option value="Ertiga">Ertiga</option>
                              <option value="Innova7+D">innova7+D</option>
                              <option value="Xylo7+D">Xylo7+D</option>
                             
                             <option value="Etios">Etios</option>    
                             <option value="Sail">Sail</option>
                             <option value="Aspire">Aspire</option>
                             <option value="Innova">Innova</option>
                             <option value="Xylo">Xylo </option>
                             <option value="Tavera">Tavera</option>
                             <option value="Traveller">Traveller</option>

                             <option value="Fortuner">Fortuner </option>
                             <option value="Bus">Bus</option>
                              <option value="Others">Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="duty_status_reason">Duty Status Reason</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="duty_status_reason" name="duty_status_reason">
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="start_date">Start date</label>
                        <div class="col-sm-4">
                           <input class="form-control" type="text" id="start_date" name="start_date" >
                        </div>
                    <!--  </div>
                     <div class="form-group"> -->
                        <label class="col-sm-2 col-sm-2 control-label" for="start_end">Start end</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" id="start_end" name="start_end" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="number_of_days">Number of Days</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" id="number_of_days" name="number_of_days">
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="destination">Destination</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" id="destination" name="destination">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="exclusions">Exclusions</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" id="exclusions" name="exclusions">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="special_demanded">Special Demanded</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" id="special_demanded" name="special_demanded">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="bid_image">Insert Bid Image</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="file" id="bid_image" name="bid_image">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="bid_secret_detail">Bid Secret Detail (required)</label>
                        <div class="col-sm-10">
                          <textarea class="form-control ckeditor" name="bid_secret_detail" rows="2" id="bid_secret_detail"></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-danger" type="submit" name="insert_bid">Save</button>
                            <button class="btn btn-default" type="button">Cancel</button>
                        </div>
                    </div>
                  </form>
               </div>
            </section>
         </div>
      </div>
      <!-- page end-->
   </section>
</section>
<?php include("footer.php");  ?>
      