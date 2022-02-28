<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/toplinks.php'); ?>
</head>

<body>
    <?php include('includes/navigation.php'); ?>

<?php 
$my=$this->db->get('users')->result_array(); ?>
<!-- Content -->
<div class="main">
  
    <div class="containe mb-5">
        <h2 class="mb-4">User's List</h2>
        <table class="table table-fluid" id="myTable">
        <thead>
            
            
        <tr><th>id</th><th>BAR NAME</th><th>Customer Name </th><th>Email</th><th>Password</th> <th>Phone Number</th><th>Reported</th><th>Action</th></tr>
        </thead>
        <tbody>
<?php foreach($my as $m){
// echo "<pre>";
// print_r($m);
// echo "</pre>";



?>
        <tr><th><?php echo $m["id"] ?></th><td><?php echo $m['bname']; ?></td><td><?php echo $m['cname']; ?></td><td><?php echo $m['cemail']; ?></td><td><?php echo $m['cpassword']; ?></td><td><?php echo $m['cphone']; ?></td>
        <td><?php 
        echo $this->db->select('bar_report_id')->where('bar_id',$m['id'])->where('status',"1")->from('bar_report')->count_all_results();
        ?>
        
        </td>
        
        <td><a href="<?php echo base_url().'site/changepassword/'.$m['id']; ?>">Change Password</a>/<a href="<?php echo base_url().'site/viewbar/'.$m['id']; ?>">View</a>/<a data-id="<?php echo base_url().'site/deleteuser/'.$m['id']; ?>" href="#"  data-toggle="modal" class="lorude" data-target="#myModal">Delete</a></td></tr>
    <?php } ?>
    
    
        </tbody>
        </table>
    </div>
    
   


</div>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Bar</h4>
    
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      Are you you want to delete ?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
              <a href="" class="btn btn-info" id="confirmurl">Yes Sure</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>










    <?php include('includes/footer.php'); ?>
    <?php include('includes/bottom_links.php'); ?>
    <script>
        $(document).ready( function () {
         $('#myTable').DataTable({
             "paging":   false,
        });
    } );
    
    //
    
    $( ".lorude" ).click(function() {
    var link=$(this).data('id');
    $('#confirmurl').attr('href', link);

});
        </script>

</body>

</html>