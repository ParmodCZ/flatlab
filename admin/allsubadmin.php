<?php 
include('header.php'); 
if (!isAdmin()) {
  header('location:login.php');
}
 include('sidebar.php'); 
$role = $_SESSION['user']['user_type'];  
if($role=='sub_admin'){				
	echo "<script>alert('You are Sub-Admin ');window.location.href='allbids.php';</script>";					 
}
$exe=getAllAdmin();
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Sub Admins List
                    </header>
                    <div class="panel-body">
                          <div class="adv-table">
                              <table  class="display table table-bordered table-striped" id="example">
                                <thead>
              										<tr>
              											<th>Name</th>
              											<th>username</th>
              											<th>E-mail</th>
              											<th class="hidden-phone">Mobile</th>
              											<th class="hidden-phone">City</th>
              											<th class="hidden-phone">Action</th>
              										</tr>
                                </thead>
                                <tbody>
              									  <?php while( $fetch=mysqli_fetch_array($exe)){ ?>
                                    <tr class="gradeX">
                                      <td> <?php echo $fetch['name']; ?> </td>
                                      <td> <?php echo $fetch['username']; ?></td>
              									      <td> <?php echo $fetch['email']; ?></td>
                                      <td class="hidden-phone"><?php echo $fetch['contact']; ?></td> 
                                      <td class="center hidden-phone"><?php echo $fetch['city']; ?></td>
                                      <td class="center hidden-phone">
                                        <a href="edit_admin.php?id=<?php echo $fetch['id']; ?>">
                                          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <?php if($fetch['user_type']=='admin'){echo "";}
                                        else{?>
                                          <a href="del.php?id=<?php echo $fetch['id']; ?>"onclick="return confirm('Are you sure you want to delete this Record?');">
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                          </a><?php } ?>
                                          <a href="view_admin.php?id=<?php echo $fetch['id']; ?>">
                                            <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                          </a>
              									      </td>
                                    </tr>
                                  <?php }  ?>    
                              </tbody>
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
      