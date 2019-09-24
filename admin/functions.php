<?php 
include('config.php'); 
// variable declaration
$username = "";
$email    = "";
$errors   = array(); 
// print_r($row);die;
// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}
// call the logout() function if register_btn is clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
// call the login() function if login_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}
// call the insert_bid() function if submit is clicked
if (isset($_POST['insert_bid'])) {
    echo  insert_bid();
   }
// call the update_bid() function if submit is clicked
if (isset($_POST['update_bid'])) {
    echo  update_bid($_GET['id']);
   }
// call the delete_bid() function if submit is clicked
if(isset($_GET['delete_bid'])!=""){
 	echo delete_bid($_GET['delete_bid']);
}
// call the add_bids() function if submit is clicked
if (isset($_POST['add_bids'])) {
    echo add_bids($_GET['id']);
}
// call the delete_bid() function if submit is clicked
if(isset($_GET['shortlist_ubid'])!=""){
	$formdta = array();
	$formdta['ubid']= $_GET['shortlist_ubid'];
	$formdta['bidid']= $_GET['bidid'];
 	echo shortlist_bid($formdta);
}
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		//array_push($errors, "Username is required"); 
		$errors['username'] ="Username is required";
	}
	if (empty($email)) { 
		//array_push($errors, "Email is required"); 
		$errors['email'] ="Email is required";
	}
	if (empty($password_1)) { 
		//array_push($errors, "Password is required"); 
		$errors['password'] ="Password is required";
	}
	if ($password_1 != $password_2) {
		//array_push($errors, "The two passwords do not match");
		$errors['password_2'] ="The two passwords do not match";
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO user (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);
	// make sure form is filled properly
	if (empty($username)) {
		//array_push($errors, "Username is required");
		$errors['username'] ="Username is required";
	}
	if (empty($password)) {
		//array_push($errors, "Password is required");
		$errors['password'] ="Password is required";
	}
	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin.php');		  
			}else if ($logged_in_user['user_type'] == 'sub_admin') {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: index.php');
			}
		}else {
			//array_push($errors, "Wrong username/password combination");
			$errors['auth'] ="Wrong username/password combination";
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error($er) {
	global $errors;
	if (count($errors) > 0){
		if(isset($errors[$er])){
			echo '<div class="error">'.$errors[$er].'<br> </div>';
		}
		// echo '<div class="error">';
			// foreach ($errors as $error){
				// echo $error .'<br>';
			// }
		// echo '</div>';
	}
}
// 
function getAllCities() {
	global $db;
	$q="select * from city";
	$cy = mysqli_query($db,$q);
	return $cy;
}
// insert bid function
function insert_bid(){
	global $db;

	$bidname          =  e($_POST['bid_name']);
	$biddescription   =  e($_POST['bid_description']);
	$bidtype          =  e($_POST['bid_type']);
	$dutyprice  	  =  e($_POST['duty_price']);

	$name             =  e($_POST['name']);
	$number           =  e($_POST['number']);
	$pickuppoint      =  e($_POST['pick_up_point']);
	$dropoffpoint     =  e($_POST['drop_off_point']);
	$numberofpassenser=  e($_POST['number_of_passenger']);
	$city             =  e($_POST['city']);
	$dutytype         =  e($_POST['duty_type']);
	$queryfrom        =  e($_POST['query_from']);
	$selectdutystatus =  e($_POST['select_duty_status']);
	$roofrack         =  e($_POST['roof_rack']);
	$cartype          =  e($_POST['car_type']);
	$dutystatusreason =  e($_POST['duty_status_reason']);
	$numberofdays     =  e($_POST['number_of_days']);
	$destination      =  e($_POST['destination']);
	$exclusions       =  e($_POST['exclusions']);
	$specialdemanded  =  e($_POST['special_demanded']);

	$bidsecretdetail  =  e($_POST['bid_secret_detail']);
	$startend         =  e($_POST['start_end']);
	$startdate        =  e($_POST['start_date']);
	$bidenddate       =  e($_POST['bid_end_date']);

	if (isset($_POST['active_bid']) && $_POST['active_bid'] == 'active'){ 
		$activebid   ='1';	 
	}
	else{
		$activebid  ='0';
	 }
	//image upload				
	$file     = isset($_FILES['bid_image'])?$_FILES['bid_image']['tmp_name']:'';
	
    if($file!=""){
		$image     = addslashes(file_get_contents($_FILES['bid_image']['tmp_name']));
        $image_name= addslashes($_FILES['bid_image']['name']);
        move_uploaded_file($_FILES["bid_image"]["tmp_name"],"uploads/" .$_FILES["bid_image"]["name"]);
		copy("../uploads/" .$_FILES["bid_image"]["name"],"../uploads/" .$_FILES["bid_image"]["name"]);
       $bidimage="uploads/". $_FILES["bid_image"]["name"];
	}else{
		$bidimage = '';
	}
	$query="INSERT into bids (bidname,biddescription,bidtype,dutyprice,name,number,pickuppoint,dropoffpoint,numberofpassenser,city,dutytype,queryfrom,selectdutystatus,roofrack,cartype,dutystatusreason,numberofdays,destination,exclusions,specialdemanded,bidsecretdetail,startend,startdate,bidenddate,activebid,bidimage) VALUES ('$bidname','$biddescription','$bidtype','$dutyprice','$name','$number','$pickuppoint','$dropoffpoint','$numberofpassenser','$city','$dutytype','$queryfrom','$selectdutystatus','$roofrack','$cartype','$dutystatusreason','$numberofdays','$destination','$exclusions','$specialdemanded','$bidsecretdetail','$startend','$startdate','$bidenddate','$activebid','$bidimage')";
	$result = mysqli_query($db, $query);
	
	if ($result) {
    	return "<div class='alert alert-success' role='alert'>New record created successfully!</div>";
	} else {
	    return  "<div class='alert alert-warning' role='alert'>Something Wrong!</div>";
	}
}

// update bid function
function update_bid($id){
	global $db;

	$bidname          =  e($_POST['bid_name']);
	$biddescription   =  e($_POST['bid_description']);
	$bidtype          =  e($_POST['bid_type']);
	$dutyprice  	  =  e($_POST['duty_price']);

	$name             =  e($_POST['name']);
	$number           =  e($_POST['number']);
	$pickuppoint      =  e($_POST['pick_up_point']);
	$dropoffpoint     =  e($_POST['drop_off_point']);
	$numberofpassenser=  e($_POST['number_of_passenger']);
	$city             =  e($_POST['city']);
	$dutytype         =  e($_POST['duty_type']);
	$queryfrom        =  e($_POST['query_from']);
	$selectdutystatus =  e($_POST['select_duty_status']);
	$roofrack         =  e($_POST['roof_rack']);
	$cartype          =  e($_POST['car_type']);
	$dutystatusreason =  e($_POST['duty_status_reason']);
	$numberofdays     =  e($_POST['number_of_days']);
	$destination      =  e($_POST['destination']);
	$exclusions       =  e($_POST['exclusions']);
	$specialdemanded  =  e($_POST['special_demanded']);

	$bidsecretdetail  =  e($_POST['bid_secret_detail']);
	$startend         =  e($_POST['start_end']);
	$startdate        =  e($_POST['start_date']);
	$bidenddate       =  e($_POST['bid_end_date']);

	if (isset($_POST['active_bid']) && $_POST['active_bid'] == 'active'){ 
		$activebid   ='1';	 
	}
	else{
		$activebid  ='0';
	 }
	//image upload				
	$file     = isset($_FILES['bid_image'])?$_FILES['bid_image']['tmp_name']:'';
	
    if($file!=""){
		$image     = addslashes(file_get_contents($_FILES['bid_image']['tmp_name']));
        $image_name= addslashes($_FILES['bid_image']['name']);
        move_uploaded_file($_FILES["bid_image"]["tmp_name"],"uploads/" .$_FILES["bid_image"]["name"]);
		copy("../uploads/" .$_FILES["bid_image"]["name"],"../uploads/" .$_FILES["bid_image"]["name"]);
       $bidimage="uploads/". $_FILES["bid_image"]["name"];
	}else{
		$bidimage = '';
	}
	$query="UPDATE bids SET bidname ='$bidname',biddescription ='$biddescription',bidtype ='$bidtype',dutyprice ='$dutyprice',name ='$name',number ='$number',pickuppoint ='$pickuppoint',dropoffpoint='$dropoffpoint',numberofpassenser ='$numberofpassenser',city ='$city',dutytype ='$dutytype',queryfrom ='$queryfrom',selectdutystatus='$selectdutystatus',roofrack ='$roofrack',cartype ='$cartype',dutystatusreason ='$dutystatusreason',numberofdays='$numberofdays',destination='$destination',exclusions='$exclusions',specialdemanded='$specialdemanded',bidsecretdetail='$bidsecretdetail',startend='$startend',startdate='$startdate',bidenddate='$bidenddate',activebid='$activebid',bidimage='$bidimage' WHERE id='$id'";
	$result = mysqli_query($db, $query);
	
	if ($result) {
    	return "<div class='alert alert-success' role='alert'>record successfully Updated!</div>";
	} else {
	    return  "<div class='alert alert-warning' role='alert'>Something Wrong!</div>";
	}
}

// add bids function
function add_bids($id){
	global $db;
	//$id	= $_SESSION['bid_id'] ;	
	$name  	  = e($_POST['name']);
	$contact  = e($_POST['contact']);
	$amount   = e($_POST['amount']);
	$query="INSERT into bidders_bids (bidid,name,contact,amount) VALUES ( '$id','$name','$contact','$amount' )";
	$result = mysqli_query($db, $query);
	if ($result) {
    	return "<div class='alert alert-success' role='alert'>Bid successfully Add!</div>";
	} else {
	    return  "<div class='alert alert-warning' role='alert'>Something Wrong!</div>";
	} 
}

//get bid by id
function getEditBid($id){
	global $db;
	$query="select * from bids where id='$id'";
	$exe=mysqli_query($db, $query);
	$row = mysqli_fetch_assoc( $exe );
	return $row;

}

//get all bid
function getVendorBids(){
	global $db;
	$query="select * from bids where bidtype='2' AND now() < `bidenddate` AND selectdutystatus!='3' ORDER BY bidenddate ASC";
	$exe=mysqli_query($db, $query);
	return $exe;
}

//get all bid
function getAllBids($type){
	global $db;
	if($type =='customer'){
		$query="select * from bids where  bidtype='1' AND  now() < `bidenddate`  AND selectdutystatus!='3' ORDER BY bidenddate ASC";
	}else if($type =='client'){
		$query="select * from bids where  bidtype='2' AND  now() < `bidenddate` AND  selectdutystatus!='3' ORDER BY bidenddate ASC";	
	}else{
		$query="select * from bids where bidtype='2' AND selectdutystatus!='3' ORDER BY bidenddate ASC ";		
	}
	
	$exe=mysqli_query($db, $query);
	//$row = mysqli_fetch_assoc( $exe );
	return $exe;
}
// //get customer bid 
// function getCustomerBids(){
// 	global $db;
// 	$query="select * from bids where  bidtype='1' AND  now() < `bidenddate`  AND selectdutystatus!='3' ORDER BY bidenddate ASC" ;
// 	$exe=mysqli_query($db, $query);
// 	//$row = mysqli_fetch_assoc( $exe );
// 	return $exe;
// }
// //get client bid 
// function getClientBids(){
// 	global $db;
// 	$query="select * from bids where  bidtype='2' AND  now() < `bidenddate` AND  selectdutystatus!='3' ORDER BY bidenddate ASC" ;
// 	$exe=mysqli_query($db, $query);
// 	//$row = mysqli_fetch_assoc( $exe );
// 	return $exe;
// }
//get bid details
function bidDetails($id){
	global $db;
	$query="select * from bids where id='$id'";
	$exe=mysqli_query($db, $query);
	$row = mysqli_fetch_assoc( $exe );
	return $row;
}

function shortlist_bid($value){
	global $db;
	$bidid = $value['bidid'];
	$ubid = $value['ubid'];
	$updated=mysqli_query($db,"UPDATE bidders_bids SET status='0'  WHERE bidid='$bidid'");
	if($updated){
	$updated2=mysqli_query($db,"UPDATE bidders_bids SET status='1'  WHERE bidid='$bidid' && users_bid_id=' $ubid'");
		if($updated2){
			return "<div class='alert alert-success' role='alert'>This One Shortlist successfully!</div>";
		}else {
			return "<div class='alert alert-warning' role='alert'>Something Wrong!</div>";
		}
	}
}

function delete_bid($id){
	global $db;
	$delete=mysqli_query($db,"DELETE FROM bids WHERE id='$id'");
	if($delete){
		return "<div class='alert alert-success' role='alert'>record successfully Deleted!</div>";
	} else {
		return "<div class='alert alert-warning' role='alert'>Something Wrong!</div>";
	}
}