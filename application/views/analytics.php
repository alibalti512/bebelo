<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/toplinks.php'); ?>
        <style>
       .number-font {
           font-size: 1.5rem;
       }

       .bg-market {
        background-image: linear-gradient(-20deg, #2b5876 0%, #4e4376 100%) !important;
        }
       

       .bg-vendors {
        background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%) !important;
        }
       
       .bg-org {
        background-image: linear-gradient(to top, #0ba360 0%, #3cba92 100%) !important;
        }
       

    </style>
</head>

<body>
    <?php include('includes/navigation.php'); ?>


<!-- Content -->
<div class="main">
    <h1 class="text-center mt-4">Analytics</h1>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="d-flex text-white py-4 px-2 rounded bg-market">
                        <div class="left-div">
                            <p class="mb-0 font-weight-bolder">Today User</p>
                        </div>

                        <div class="ml-auto">
                            <p class="mb-0 number-font font-weight-bolder"><?php echo $today; ?></p>
                        </div>
                </div>
                <br><br>
            </div>
            <br><br>
            <div class="col-12 col-md-4">
                <div class="d-flex text-white py-4 px-2 rounded bg-vendors">
                        <div class="left-div">
                            <p class="mb-0 font-weight-bolder">Last Week</p>
                        </div>

                        <div class="ml-auto">
                            <p class="mb-0 number-font font-weight-bolder"><?php echo $sday; ?></p>
                        </div>
                </div>
            </div>
            <br><br>
            <div class="col-12 col-md-4" style="">
                <div class="d-flex text-white py-4 px-2 rounded bg-org">
                        <div class="left-div">
                            <p class="mb-0 font-weight-bolder">Last Month</p>
                        </div>

                        <div class="ml-auto">
                            <p class="mb-0 number-font font-weight-bolder"><?php echo $monthday; ?></p>
                        </div>
                </div>
            </div>
            <br><br>
            <div class="col-12 col-md-4">
                <div class="d-flex text-white py-4 px-2 rounded bg-market">
                        <div class="left-div">
                            <p class="mb-0 font-weight-bolder">Male</p>
                        </div>

                        <div class="ml-auto">
                            <p class="mb-0 number-font font-weight-bolder"><?php echo $male; ?></p>
                        </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="d-flex text-white py-4 px-2 rounded bg-vendors">
                        <div class="left-div">
                            <p class="mb-0 font-weight-bolder">Female</p>
                        </div>

                        <div class="ml-auto">
                            <p class="mb-0 number-font font-weight-bolder"><?php echo $female; ?></p>
                        </div>
                </div>
            </div>
 <div class="col-12 col-md-4" style="">
                <div class="d-flex text-white py-4 px-2 rounded bg-org">
                        <div class="left-div">
                            <p class="mb-0 font-weight-bolder">None</p>
                        </div>

                        <div class="ml-auto">
                            <p class="mb-0 number-font font-weight-bolder"><?php echo $none; ?></p>
                        </div>
                </div>
            </div>
  <br><br>
  <br><br>
  <br><br>
            <div class="col-12 col-md-4">
                <div class="d-flex text-white py-4 px-2 rounded bg-market">
                        <div class="left-div">
                            <p class="mb-0 font-weight-bolder">Today Views</p>
                        </div>

                        <div class="ml-auto">
                            <p class="mb-0 number-font font-weight-bolder"><?php if(!empty($todayview)){
                            echo $todayview['view'];
                            }else{
                            echo "0";
                            } ?></p>
                        </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="d-flex text-white py-4 px-2 rounded bg-vendors">
                        <div class="left-div">
                            <p class="mb-0 font-weight-bolder">Weekly Views</p>
                        </div>

                        <div class="ml-auto">
                            <p class="mb-0 number-font font-weight-bolder"><?php if(!empty($sdayview)){
                            echo $sdayview['view'];
                            }else{
                            echo "0";
                            } ?></p>
                        </div>
                </div>
            </div>
 <div class="col-12 col-md-4" style="">
                <div class="d-flex text-white py-4 px-2 rounded bg-org">
                        <div class="left-div">
                            <p class="mb-0 font-weight-bolder">Monthly Views</p>
                        </div>

                        <div class="ml-auto">
                            <p class="mb-0 number-font font-weight-bolder"><?php if(!empty($monthdayview)){
                            echo $monthdayview['view'];
                            }else{
                            echo "0";
                            } ?></p>
                        </div>
                </div>
            </div>
        </div>
        
        <br><br>
        
        
   <table class="table table-fluid" id="myTable">
        <thead>
        <tr><th></th><th>Date Of Birth</th><th>Sex</th><th>Joing Date</th></tr>
        <tbody>    
        </thead>        
            <?php
            $i=1;
            
            foreach($userdata as $m){      ?>
    <tr>
            <td><?php  echo $i++;?></td>
    <td><?php  echo $m["dob"];?></td>
      <td><?php  echo $m["sex"];?></td>
        <td><?php  echo $m["date"];?></td>
</tr>
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