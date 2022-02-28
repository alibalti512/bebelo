<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/toplinks.php'); ?>
  <style>
    .card {
      margin: 1rem 0 !important;
    }

    .card-body {
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

      <h2 class="text-center my-4">Categories</h2>

      <!-- Card deck -->
      <div class="card-deck row">

      <?php 
      $cat=$this->db->where('cat_parrent_id',0)->get('categories')->result_array();
    //   echo "<pre>";
    //   print_r($cat);
    //   echo "</pre>";
      
      foreach($cat as $c) { ?>

        <div class="col-xs-12 col-sm-6 col-md-4">
          <!-- Card -->
          <div class="card">

            <!--Card image-->
            <div class="view overlay">
              <a href="#">
                <img class="card-img-top" src="<?php echo $c['cat_imgurl']; ?>"
                  alt="Card image cap">

              </a>
            </div>

            <!--Card content-->
            <div class="card-body d-flex">

              <!--Title-->
              <h4 class="card-title"><?php echo $c['cat_name']; ?></h4>

              <div class="d-flex ml-auto">
                <a href="<?php echo base_url() . 'site/editcat/'.$c['id']; ?>">
                  <button class="btn btn-info m-1" type="button">Edit</button>
                </a>
    <a href="<?php echo base_url() . 'site/deletecat/'.$c['id']; ?>">

                <button class="btn btn-danger m-1" type="button">Delete</button>
</a>
              </div>

            </div>



          </div>
          <!-- Card -->
        </div>

          <?php }?>

      </div>
      <!-- Card deck -->

    </div>


  </div>


  <div class="modal fade" id="listsongs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="scroll-follow">
          <p class="text-center">When Legends Rise</p>
          <div class="p-1 followers-section">
            <a href="<?php echo base_url() . 'site/lyrics'; ?>" class="text-decoration-none">
              <div class="d-flex flex-row justify-content-around border-bottom-follow user-info pb-2">

                <div class="d-flex">
                  <div class="my-auto mr-4">
                    <span class="border-bottom-dark text-dark">0</span>
                  </div>
                  <div class="d-block mr-2">
                    <img class="rounded-circle" src="<?php echo base_url() . 'assets/'; ?>images/25.png" height="50px"
                      width="50px">
                  </div>
                  <div class="d-flex flex-column justify-content-start">
                    <span class="d-block font-weight-bold text-dark">
                      Butter Place </span>
                    <span class="song-name">Saint Astonia- <span>3:35</span> </span>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa fa-ellipsis-v text-dark" aria-hidden="true"></i>
                </div>
              </div>
            </a>

            <a href="<?php echo base_url() . 'site/lyrics'; ?>" class="text-decoration-none">
              <div class="d-flex flex-row justify-content-around border-bottom-follow user-info pb-2">

                <div class="d-flex">
                  <div class="my-auto mr-4">
                    <span class="border-bottom-dark text-dark">0</span>
                  </div>
                  <div class="d-block mr-2">
                    <img class="rounded-circle" src="<?php echo base_url() . 'assets/'; ?>images/25.png" height="50px"
                      width="50px">
                  </div>
                  <div class="d-flex flex-column justify-content-start">
                    <span class="d-block font-weight-bold text-dark">
                      Butter Place </span>
                    <span class="song-name">Saint Astonia- <span>3:35</span> </span>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa fa-ellipsis-v text-dark" aria-hidden="true"></i>
                </div>
              </div>
            </a>

            <a href="<?php echo base_url() . 'site/lyrics'; ?>" class="text-decoration-none">
              <div class="d-flex flex-row justify-content-around border-bottom-follow user-info pb-2">

                <div class="d-flex">
                  <div class="my-auto mr-4">
                    <span class="border-bottom-dark text-dark">0</span>
                  </div>
                  <div class="d-block mr-2">
                    <img class="rounded-circle" src="<?php echo base_url() . 'assets/'; ?>images/25.png" height="50px"
                      width="50px">
                  </div>
                  <div class="d-flex flex-column justify-content-start">
                    <span class="d-block font-weight-bold text-dark">
                      Butter Place </span>
                    <span class="song-name">Saint Astonia- <span>3:35</span> </span>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa fa-ellipsis-v text-dark" aria-hidden="true"></i>
                </div>
              </div>
            </a>

            <a href="<?php echo base_url() . 'site/lyrics'; ?>" class="text-decoration-none">
              <div class="d-flex flex-row justify-content-around border-bottom-follow user-info pb-2">

                <div class="d-flex">
                  <div class="my-auto mr-4">
                    <span class="border-bottom-dark text-dark">0</span>
                  </div>
                  <div class="d-block mr-2">
                    <img class="rounded-circle" src="<?php echo base_url() . 'assets/'; ?>images/25.png" height="50px"
                      width="50px">
                  </div>
                  <div class="d-flex flex-column justify-content-start">
                    <span class="d-block font-weight-bold text-dark">
                      Butter Place </span>
                    <span class="song-name">Saint Astonia- <span>3:35</span> </span>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa fa-ellipsis-v text-dark" aria-hidden="true"></i>
                </div>
              </div>
            </a>

            <a href="<?php echo base_url() . 'site/lyrics'; ?>" class="text-decoration-none">
              <div class="d-flex flex-row justify-content-around border-bottom-follow user-info pb-2">

                <div class="d-flex">
                  <div class="my-auto mr-4">
                    <span class="border-bottom-dark text-dark">0</span>
                  </div>
                  <div class="d-block mr-2">
                    <img class="rounded-circle" src="<?php echo base_url() . 'assets/'; ?>images/25.png" height="50px"
                      width="50px">
                  </div>
                  <div class="d-flex flex-column justify-content-start">
                    <span class="d-block font-weight-bold text-dark">
                      Butter Place </span>
                    <span class="song-name">Saint Astonia- <span>3:35</span> </span>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa fa-ellipsis-v text-dark" aria-hidden="true"></i>
                </div>
              </div>
            </a>

            <a href="<?php echo base_url() . 'site/lyrics'; ?>" class="text-decoration-none">
              <div class="d-flex flex-row justify-content-around border-bottom-follow user-info pb-2">

                <div class="d-flex">
                  <div class="my-auto mr-4">
                    <span class="border-bottom-dark text-dark">0</span>
                  </div>
                  <div class="d-block mr-2">
                    <img class="rounded-circle" src="<?php echo base_url() . 'assets/'; ?>images/25.png" height="50px"
                      width="50px">
                  </div>
                  <div class="d-flex flex-column justify-content-start">
                    <span class="d-block font-weight-bold text-dark">
                      Butter Place </span>
                    <span class="song-name">Saint Astonia- <span>3:35</span> </span>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa fa-ellipsis-v text-dark" aria-hidden="true"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>











  <?php include('includes/footer.php'); ?>
  <?php include('includes/bottom_links.php'); ?>

  <script>
//        for (var i = 0; i < 6; i++) {

//         var html = '<div class="col-xs-12 col-sm-6 col-md-4"> <div class="card mb-4">  <a href="#" data-toggle="modal" data-target="#listsongs"> <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap"> </a>  <div class="card-body d-flex">  <h4 class="card-title">Epitaph</h4>  <div class="d-flex ml-auto">  <a href="<?php echo base_url() . 'site/editcat'; ?>">  <button class="btn btn-info m-1" type="button">Edit</button> </a>  <button class="btn btn-danger m-1" type="button">Delete</button> </div> </div>  <div class="view overlay"> </div>  </div>   </div>';

//        $(".card-deck").append(html);
// }
  </script>

</body>

</html>