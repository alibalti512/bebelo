<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/toplinks.php'); ?>
    
</head>

<body>
    <?php include('includes/navigation.php'); ?>


<!-- Content -->
<div class="main">
    <h1 class="text-center mt-4">All Music</h1>
<div class="inputfields my-5">
    <form action="">
    <div class="row">

    <div class="col-12 col-md-8 offset-md-1">
        <div class="scroll-follow">
         <!--
            <p class="text-center">When Legends Rise</p>
         -->
          <div class="p-1 followers-section">
              <?php
              $jani=$this->db->get('lyrics')->result_array();
              foreach($jani as $j){
              
              ?>
              
              
              
            <a href="<?php echo base_url() . 'site/lyrics/'.$j['id']; ?>" class="text-decoration-none">
            <div class="d-flex flex-row justify-content-around border-bottom-follow user-info pb-2">
                
                <div class="d-flex">
                  <div class="my-auto mr-4">
                    <span class="border-bottom-dark text-dark">0</span>
                  </div>
                  <div class="d-block mr-2">
                  <img class="rounded-circle" src="<?php echo $j['lyrics_image_url'] ?>" height="50px" width="50px">
                </div>
                <div class="d-flex flex-column justify-content-start">
                  <span class="d-block font-weight-bold text-dark">
                    <?php echo $j['title'] ;?>   Category:</span>
                
                  <span class="song-name"><?php echo $j['artist_name'] ;?>- <span><?php echo $j['duration'] ;?></span> </span>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                     <a href="<?php echo base_url() . 'site/editlyrics/'.$j['id']; ?>">
                 <button class="btn btn-info m-1" type="button">Edit</button>
                 </a>
            <a href="<?php echo base_url() . 'site/deletelyrics/'.$j['id']; ?>">
                 <button class="btn btn-danger m-1" type="button">Delete</button>
            </a>
                </div>
              </div>
            </a>
    <?php } ?>
          
        </div>
      </div>

    </div>



        
    </div>
</form>
</div>
</div>








<?php include('includes/bottom_links.php'); ?>

</body>
</html>