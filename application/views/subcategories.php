<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/toplinks.php'); ?>
    <style>
        .card{
  margin: 1rem 0 !important;
}

.card-body{
  margin: 0% 0% 0% 3%;
  padding: 0.5rem;
}
.card-title {
    margin: 0;
}

    </style>
</head>

<body>
    <?php include('includes/navigation.php'); ?>


<!-- Content -->
<div class="main">
  
   
    <div class="categoriess">

        <h2 class="text-center my-4">Sub Categories</h2>

<!-- Card deck -->
<div class="card-deck row">

  
  <!-- Card -->
  <?php 
      $cat=$this->db->where('cat_parrent_id<>',0)->get('categories')->result_array();
    //   echo "<pre>";
    //   print_r($cat);
    //   echo "</pre>";
      
      foreach($cat as $c) { ?>
  <div class="col-xs-12 col-sm-6 col-md-4">
  <div class="card">

    <!--Card image-->
    <div class="view overlay">
        <a href="#" >
                     <img class="card-img-top" src="<?php echo $c['cat_imgurl']; ?>"
                  alt="Card image cap">

    
      </a>
    </div>

    <!--Card content-->
    <div class="card-body d-flex">

      <!--Title-->
      <h4 class="card-title"><?php echo $c['cat_name']; ?></h4>
      
      <div class="d-flex ml-auto">
        <a href="<?php echo base_url() . 'site/editsubcat/'.$c['id']; ?>">
        <button class="btn btn-info m-1" type="button">Edit</button>
        </a>
            <a href="<?php echo base_url() . 'site/deletesubcat/'.$c['id']; ?>">
        <button class="btn btn-danger m-1" type="button">Delete</button>
        </a>
       </div>

    </div>

   

  </div>
  <!-- Card -->
  </div>
  <?php } ?>


  
  
</div>
<!-- Card deck -->
  
</div>


</div>













    <?php include('includes/footer.php'); ?>
    <?php include('includes/bottom_links.php'); ?>
    


</body>

</html>