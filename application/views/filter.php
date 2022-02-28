<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/toplinks.php'); ?>
    
</head>

<body>
    <?php include('includes/navigation.php'); ?>


<!-- Content -->
<div class="main">
    <h1 class="text-center mt-4">Filter 
    <?php 
    if($startdate != "" &&  $end_date !=""){
    echo $startdate ." - ". $end_date;
    
    }else{
    echo "Record Till ".date("Y-m-d");
    }?>
    
    
    </h1>
<div class="inputfields my-5">
    
    <form action ="<?php echo  base_url().'site/filter/' ?>" method="get">
    
    <div class="row">

       

  
   

    <div class="col-12 col-md-4">
        <!-- Upload image input-->
        <label for="image-upload">Start Date</label>
        <input type="date" class="form-control" required name="startdate" placeholder="start date" value="<?php if($startdate != '') { echo $startdate;  } ?>">

    </div>
     <div class="col-12 col-md-4">
        <!-- Upload image input-->
        <label for="image-upload">End Date</label>
        <input type="date" class="form-control" required name="end_date" placeholder="End Date" value="<?php if($end_date != '') { echo $end_date;  } ?>">

    </div>
   
   


<div class="col-12 col-md-4">
    <br><br>
        <!-- Upload image input-->
                <button type="submit" class="btn btn-info">Filter</button>
    </div>

        
    </div>
</form>
</div>



  <table class="table table-fluid" id="myTable">
        <thead>
        <tr><th></th><th>Date Of Birth</th><th>Sex</th><th>View Date</th></tr>
        <tbody>    
        </thead>        
            <?php
            $i=1;
            
            foreach($userdata as $m){      ?>
    <tr>
            <td><?php  echo $i++;?></td>
    <td><?php  echo $m["dob"];?></td>
      <td><?php  echo $m["sex"];?></td>
        <td><?php  echo $m["ldate"];?></td>
</tr>
        </tbody>
           <?php } ?>
        </table>
</div>








<?php include('includes/bottom_links.php'); ?>

  <script>
        $(document).ready( function () {
        $('#myTable').DataTable({
             "paging":   false,
        });
    } );
    
    
        </script>



</body>

</html>