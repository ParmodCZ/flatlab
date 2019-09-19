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
                  <form class="form-horizontal tasi-form" method="POST">
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
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"for="bid_end_date">Bid Ends Date & Time</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="text" id="bid_end_date" name="bid_end_date" disabled>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="duty_price">Duty Price</label>
                        <div class="col-sm-10">
                           <input class="form-control" type="text" id="duty_price" name="duty_price" placeholder="Amount">
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
                           <input class="form-control" type="text" id="number_of_passenger" name="number_of_passenger">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="city">City</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="city" name="city">
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="duty_type">Duty Type</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="duty_type" name="duty_type">
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="query_from">Query from</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="query_from" name="query_from">
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="select_duty_status">Select Duty Status</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="select_duty_status" name="select_duty_status">
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="roof_rack">Roof Rack</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="roof_rack" name="roof_rack">
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" for="car_type">Car Type</label>
                        <div class="col-sm-10">
                           <select class="form-control m-bot15" id="car_type" name="car_type">
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
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
                           <input class="form-control" type="text" id="start_date" name="start_date" disabled>
                        </div>
                    <!--  </div>
                     <div class="form-group"> -->
                        <label class="col-sm-2 col-sm-2 control-label" for="start_end">Start end</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" id="start_end" name="start_end" disabled>
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
                          <input class="form-control" type="text" id="bid_image" name="bid_image">
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
                            <button class="btn btn-danger" type="submit">Save</button>
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
      