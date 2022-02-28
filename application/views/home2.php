<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/toplinks.php'); ?>
</head>

<body>
    <?php include('includes/navigation.php'); ?>

<?php 
$my=$this->db->where('id',$id)->get('users')->result_array(); ?>
<!-- Content -->
<div class="main">
  
    <div class="containe mb-5">
        <h2 class="mb-4">User's List</h2>
        <table class="table table-fluid" id="myTable">
        <thead>
        <tr><th>Drink Price</th><th>Drink Name </th><th>Drink Image</th></tr>
        <tbody>    
        </thead>        
            <?php foreach($my as $m){  
                $cdetail=$m['bdetail'];
             //   echo "<pre>";
              //  print_r($m);
                  $x =json_decode($cdetail,true);
                
                $fdata=$x['barBottle'];
            //    echo "</pre>";
            for($i=0;$i<count($fdata);$i++){
                if($fdata[$i]['drinkPrice'] !="-"){
            ?>
    




        <tr><td><?php echo $fdata[$i]['drinkPrice']; ?></td><td><?php echo $fdata[$i]['drinkName']; ?></td>
        <td><img height="50" src="<?php echo base_url().'/assets/images/'.$fdata[$i]['drinkImage'].".png"; ?>"/></td>
       </tr>
 
    <?php } } ?>    
    
        </tbody>
           <?php } ?>
        </table>
    </div>
    
   


</div>













    <?php include('includes/footer.php'); ?>
    <?php include('includes/bottom_links.php'); ?>
    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
    } );
        </script>

</body>

</html>