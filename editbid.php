<?php 
	include('header.php'); 
	if (!isAdmin()) {
		//$_SESSION['msg'] = "You must log in first";
		header('location:login.php');
	}
	include('sidebar.php'); 
	$id=$_GET['id'];
	$_SESSION['sess_user_id'] = $id;
	$row = getEditBid($id);
	//print_r($row);die;
?>
<!--main content start-->
<section id="main-content">
   <section class="wrapper">
      <!-- page start-->
      <div class="row">
         <div class="col-lg-12">
            <section class="panel">
               <header class="panel-heading">
                 Update New Bid
               </header>
               <div class="panel-body">
                  <form class="form-horizontal tasi-form" method="POST" action="">
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="bid_name">Bid Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bid_name" name="bid_name" value="<?php echo  $row['bidname'];  ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="bid_description">Bid Description (required)</label>
                        <div class="col-sm-10">
                           <textarea class="form-control ckeditor" name="bid_description" rows="2" id="bid_description" value="<?php echo  $row['biddescription'];  ?>"><?php echo $row['biddescription'];  ?>
                           </textarea>
                           <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="bid_type">Bid Type</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="bid_type" name="bid_type">
                             <option value="" style="display:none">Bid Type</option>	
								<option value="1" <?php if($row['bidtype'] == '1') {echo "selected";} ?>>Customer Bid</option>
								<option value="2" <?php if($row['bidtype'] == '2') {echo "selected";}?>>Client Bid</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"for="bid_end_date">Bid Ends Date & Time</label>
                        <div class="col-sm-10">
                           <input class="form-control form_datetime" type="text" id="bid_end_date" name="bid_end_date" value="<?php echo  $row['bidenddate'];  ?>" readonly>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="duty_price">Duty Price</label>
                        <div class="col-sm-10">
                          <input class=" form-control"  name="duty_price" value="<?php echo  $row['dutyprice'];  ?>" type="text" placeholder="Amount" pattern="[0-9]+"
    oninvalid="setCustomValidity('Enter Amount Only')"
    onchange="try{setCustomValidity('')}catch(e){}" required/>
                           <!-- <input class="form-control" type="text" id="duty_price" name="duty_price" placeholder="Amount"> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="active_bid">Active Bid</label>
                        <div class="col-sm-10">
                           <input type="checkbox" value="active" id="active_bid" name="active_bid" <?php if($row['activebid']=="1"){ echo "checked";}?> data-toggle="switch">
                        </div>
                     </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="name">Name</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="text" value="<?php echo  $row['name'];  ?>" id="duty_price" name="name">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="number">Number</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="text" id="number" name="number" value="<?php echo  $row['number'];  ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="pick_up_point">Pick up point</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="text" id="pick_up_point" name="pick_up_point" value="<?php echo  $row['pickuppoint'];  ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="drop_off_point">Drop off point</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="text" id="drop_off_point" name="drop_off_point" value="<?php echo  $row['dropoffpoint'];  ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="number_of_passenger">Number of passenger</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="number" id="number_of_passenger" name="number_of_passenger" value="<?php echo  $row['numberofpassenser'];  ?>"> 
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="city">City</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="city" name="city">
                              <option value="">Select City</option>
                              <?php    
                                 $e = getAllCities();  
                                while($city = mysqli_fetch_assoc( $e )) {  
                                  $selected ='';
                                  if($city['id'] == $row['city']){
                                    $selected ='selected';
                                  }       
                                    echo '<option value="'.$city['id'].'"'.$selected.'>' . $city['city'] . '</option>';             
                                }                         
                              ?> 
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="duty_type">Duty Type</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="duty_type" name="duty_type">
                             <option value="">Select Please</option>    
                             <option value="LDD"<?php if($row['dutytype'] == 'LDD') {echo "selected";} ?>>LDD (Long Distance Drop)</option>     
                             <option value="SDD"<?php if($row['dutytype'] == 'SDD') {echo "selected";} ?>>SDD(Short Distance Drop)</option>     
                             <option value="Shimla Drop"<?php if($row['dutytype'] == 'Shimla Drop') {echo "selected";} ?>>Shimla Drop</option>
                             <option value="Shimla Pick"<?php if($row['dutytype'] == 'Shimla Pick') {echo "selected";} ?>>Shimla Pick</option>
                             <option value="Adventure &amp; Sports"<?php if($row['dutytype'] == 'Adventure') {echo "selected";} ?>>Adventure &amp; Sports</option>
                             <option value="Pilgrimrage Tours"<?php if($row['dutytype'] == 'Pilgrimrage Tours') {echo "selected";} ?>>Pilgrimrage Tours</option>
                             <option value="WildLife Sanctuary"<?php if($row['dutytype'] == 'WildLife Sanctuary') {echo "selected";} ?>>WildLife Sanctuary</option>
                             <option value="Heritage &amp; Culture"<?php if($row['dutytype'] == 'Heritage') {echo "selected";} ?>>Heritage &amp; Culture</option>
                             
                             <option value="Manali drop"<?php if($row['dutytype'] == 'Manali drop') {echo "selected";} ?>>Manali Drop</option>
                             <option value="Pick up from manali"<?php if($row['dutytype'] == 'Pick up from manali') {echo "selected";} ?>>Manali Pick</option>
                             <option value="Delhi drop"<?php if($row['dutytype'] == 'Delhi drop') {echo "selected";} ?>>Delhi Drop</option>
                             <option value="Delhi pick"<?php if($row['dutytype'] == 'Delhi pick') {echo "selected";} ?>>Delhi Pick</option>
                             <option value="Sd up down"<?php if($row['dutytype'] == 'Sd up down') {echo "selected";} ?>>Sd up Down</option>
                             <option value="LD up down"<?php if($row['dutytype'] == 'LD up down') {echo "selected";} ?>>LD up Down</option>
                             <option value="Tour"<?php if($row['dutytype'] == 'Tour') {echo "selected";} ?>>Tour</option>
                             <option value="Tour-short"<?php if($row['dutytype'] == 'Tour-short') {echo "selected";} ?>>Tour-Short</option>
                             <option value="Tour-Leh"<?php if($row['dutytype'] == 'Tour-Leh') {echo "selected";} ?>>Tour-Leh</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="query_from">Query from</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="query_from" name="query_from">
                             <option value="">Select Please</option>      
                             <option value="HireCab"<?php if($row['queryfrom'] == 'HireCab') {echo "selected";} ?>>HireCab</option>      
                             <option value="JD"<?php if($row['queryfrom'] == 'JD') {echo "selected";} ?>>JD</option>    
                             <option value="Reference"<?php if($row['queryfrom'] == 'Reference') {echo "selected";} ?>>Reference</option>
                             <option value="Repeat"<?php if($row['queryfrom'] == 'Repeat') {echo "selected";} ?>>Repeat</option>
                             <option value="Combo"<?php if($row['queryfrom'] == 'Combo') {echo "selected";} ?>>Combo</option>
                             <option value="Our Network"<?php if($row['queryfrom'] == 'Our Network') {echo "selected";} ?>>Our Network</option>
                             <option value="Customer Bid"<?php if($row['queryfrom'] == 'Customer Bid') {echo "selected";} ?>>Customer Bid</option>
                             <option value="Dead Lead"<?php if($row['queryfrom'] == 'Dead Lead') {echo "selected";} ?>>Dead Lead</option>
                             <option value="Tour operator"<?php if($row['queryfrom'] == 'Tour operator') {echo "selected";} ?>>Tour operator</option>
                             <option value="Hotel"<?php if($row['queryfrom'] == 'Hotel') {echo "selected";} ?>>Hotel</option>
                             <option value="Repeat-Last Booked from others"<?php if($row['queryfrom'] == 'Repeat-Last Booked from others') {echo "selected";} ?>>Repeat-Last Booked from others</option>
                             <option value="Others"<?php if($row['queryfrom'] == 'Others') {echo "selected";} ?>>Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="select_duty_status">Select Duty Status</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="select_duty_status" name="select_duty_status">
                             <option value="">Select Please</option>    
                             <option value="0"<?php if($row['selectdutystatus'] == '0') {echo "selected";} ?>>Booked</option>    
                             <option value="1"<?php if($row['selectdutystatus'] == '1') {echo "selected";} ?>>In Progress</option>
                             <option value="2"<?php if($row['selectdutystatus'] == '2') {echo "selected";} ?>>Customer Offer</option>
                             <option value="3"<?php if($row['selectdutystatus'] == '3') {echo "selected";} ?>>Dead on Arrival</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="roof_rack">Roof Rack</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="roof_rack" name="roof_rack">
                              <option value="">Select Please</option>      
                             <option value="Yes"<?php if($row['roofrack'] == 'Yes') {echo "selected";} ?>>Yes</option>     
                             <option value="no"<?php if($row['roofrack'] == 'no') {echo "selected";} ?>>no</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="car_type">Car Type</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="car_type" name="car_type">
                              <option value="">Select Car Type</option>    
                             <option value="Indica"<?php if($row['cartype'] == 'Indica') {echo "selected";} ?>>Indica</option>     
                             <option value="Vista"<?php if($row['cartype'] == 'Vista') {echo "selected";} ?>>Vista</option>
                             <option value="Indigo"<?php if($row['cartype'] == 'Indigo') {echo "selected";} ?>>Indigo</option>
                             <option value="Zest"<?php if($row['cartype'] == 'Zest') {echo "selected";} ?>>Zest</option>
                             <option value="Xcent"<?php if($row['cartype'] == 'Xcent') {echo "selected";} ?>>Xcent</option>
                             <option value="Dzire"<?php if($row['cartype'] == 'Dzire') {echo "selected";} ?>>Dzire</option>
                              <option value="Ertiga"<?php if($row['cartype'] == 'Ertiga') {echo "selected";} ?>>Ertiga</option>
                              <option value="Innova7+D"<?php if($row['cartype'] == 'Innova7+D') {echo "selected";} ?>>innova7+D</option>
                              <option value="Xylo7+D"<?php if($row['cartype'] == 'Xylo7+D') {echo "selected";} ?>>Xylo7+D</option>
                             
                             <option value="Etios"<?php if($row['cartype'] == 'Etios') {echo "selected";} ?>>Etios</option>    
                             <option value="Sail"<?php if($row['cartype'] == 'Sail') {echo "selected";} ?>>Sail</option>
                             <option value="Aspire"<?php if($row['cartype'] == 'Aspire') {echo "selected";} ?>>Aspire</option>
                             <option value="Innova"<?php if($row['cartype'] == 'Innova') {echo "selected";} ?>>Innova</option>
                             <option value="Xylo"<?php if($row['cartype'] == 'Xylo') {echo "selected";} ?>>Xylo </option>
                             <option value="Tavera"<?php if($row['cartype'] == 'Tavera') {echo "selected";} ?>>Tavera</option>
                             <option value="Traveller"<?php if($row['cartype'] == 'Traveller') {echo "selected";} ?>>Traveller</option>

                             <option value="Fortuner"<?php if($row['cartype'] == 'Fortuner') {echo "selected";} ?>>Fortuner </option>
                             <option value="Bus"<?php if($row['cartype'] == 'Bus') {echo "selected";} ?>>Bus</option>
                              <option value="Others"<?php if($row['cartype'] == 'Others') {echo "selected";} ?>>Others</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="duty_status_reason">Duty Status Reason</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="duty_status_reason" name="duty_status_reason">
                              <option value="">Select Car Type</option>   
                              <option value="Price High"<?php if($row['dutystatusreason'] == 'Price High') {echo "selected";} ?>>Price High</option>    
                              <option value="Days counting issue"<?php if($row['dutystatusreason'] == 'Days counting issue') {echo "selected";} ?>>Days counting issue</option>
                              <option value="Latest car model expected"<?php if($row['dutystatusreason'] == 'Latest car model expected') {echo "selected";} ?>>Latest car model expected</option>
                              <option value="Too much travelling"<?php if($row['dutystatusreason'] == 'Too much travelling') {echo "selected";} ?>>Too much travelling</option>
                              <option value="Demanding AC in hills"<?php if($row['dutystatusreason'] == 'Demanding AC in hills') {echo "selected";} ?>>Demanding AC in hills</option>
                              <option value="Asking to show them car model"<?php if($row['dutystatusreason'] == 'Asking to show them car model') {echo "selected";} ?>>Asking to show them car model</option>
                               <option value="Instant requirement"<?php if($row['dutystatusreason'] == 'Instant requirement') {echo "selected";} ?>>Instant requirement</option>
                               <option value="Demanding in too low price"<?php if($row['dutystatusreason'] == 'Demanding in too low price') {echo "selected";} ?>>Demanding in too low price</option>
                               <option value="Higher car mode at lower price"<?php if($row['dutystatusreason'] == 'Higher car mode at lower price') {echo "selected";} ?>>Higher car mode at lower price</option>
                              <option value="Wanted to Visit to office"<?php if($row['dutystatusreason'] == 'Wanted to Visit to office') {echo "selected";} ?>>Wanted to Visit to office</option>    
                              <option value="Customer asking for discount"<?php if($row['dutystatusreason'] == 'Customer asking for discount') {echo "selected";} ?>>Customer asking for discount</option>
                              <option value="Issue with Rohtang pass issue"<?php if($row['dutystatusreason'] == 'Issue with Rohtang pass issue') {echo "selected";} ?>>Issue with Rohtang pass issue</option>
                              <option value="Issue with Manikaran"<?php if($row['dutystatusreason'] == 'Issue with Manikaran') {echo "selected";} ?>>Issue with Manikaran</option>
                              <option value="Somebody else offering low price"<?php if($row['dutystatusreason'] == 'Somebody else offering low price') {echo "selected";} ?>>Somebody else offering low price </option>
                              <option value="KM Limit Issue"<?php if($row['dutystatusreason'] == 'KM Limit Issu') {echo "selected";} ?>>KM Limit Issue</option>
                              <option value="Customer will pay once he reaches there"<?php if($row['dutystatusreason'] == 'Customer will pay once he reaches there') {echo "selected";} ?>>Customer will pay once he reaches there</option>
                              <option value="Want to cover up chd sourrounding in local"<?php if($row['dutystatusreason'] == 'Want to cover up chd sourrounding in local') {echo "selected";} ?>>Want to cover up chd sourrounding in local </option>
                              <option value="Don't want to pay for car on hold"<?php if($row['dutystatusreason'] == "Don't want to pay for car on hold") {echo "selected";} ?>>Don't want to pay for car on hold</option>
                               <option value="Manikaran  not covered"<?php if($row['dutystatusreason'] == 'Manikaran  not covered') {echo "selected";} ?>>Manikaran  not covered</option>
                               <option value="Demanding non ac in less price"<?php if($row['dutystatusreason'] == 'emanding non ac in less price') {echo "selected";} ?>>Demanding non ac in less price</option>
                               <option value="Want waver on tolls"<?php if($row['dutystatusreason'] == 'Want waver on tolls') {echo "selected";} ?>>Want waver on tolls</option>
                               <option value="Just want one way drop"<?php if($row['dutystatusreason'] == 'Just want one way drop') {echo "selected";} ?>>Just want one way drop</option>
                               <option value="Demanding Higher brand at lower brand price"<?php if($row['dutystatusreason'] == 'Demanding Higher brand at lower brand price') {echo "selected";} ?>>Demanding Higher brand at lower brand price</option>
                               <option value="Did not follow up Properly"<?php if($row['dutystatusreason'] == 'Did not follow up Properly') {echo "selected";} ?>>Did not follow up Properly</option>
                              
                              <option value="Customer booked before my call back"<?php if($row['dutystatusreason'] == 'Customer booked before my call back') {echo "selected";} ?>>Customer booked before my call back</option>
                              <option value="Booked"<?php if($row['dutystatusreason'] == 'Booked') {echo "selected";} ?>>Booked</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="start_date">Start date</label>
                        <div class="col-sm-4">
                           <input class="form-control form_datetime" type="text" id="start_date" name="start_date" value="<?php echo  $row['startdate'];  ?>" readonly>
                        </div>
                    <!--  </div>
                     <div class="form-group"> -->
                        <label class="col-sm-2 col-sm-2 control-label" for="start_end">Start end</label>
                        <div class="col-sm-4">
                          <input class="form-control form_datetime" type="text" id="start_end" name="start_end" value="<?php echo  $row['startend'];  ?>" readonly>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="number_of_days">Number of Days</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" id="number_of_days" name="number_of_days"value="<?php echo  $row['numberofdays'];  ?>">
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="destination">Destination</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" id="destination" name="destination" value="<?php echo  $row['destination'];  ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="exclusions">Exclusions</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" id="exclusions" name="exclusions" value="<?php echo  $row['exclusions'];  ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="special_demanded">Special Demanded</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" id="special_demanded" name="special_demanded" value="<?php echo  $row['specialdemanded'];  ?>">
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
                          <textarea class="form-control ckeditor" name="bid_secret_detail" rows="2" id="bid_secret_detail" value="<?php echo  $row['bidsecretdetail'];  ?>"><?php echo  $row['bidsecretdetail'];  ?></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-danger" type="submit" name="update_bid">Save</button>
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
      