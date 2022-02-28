<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/toplinks.php'); ?>
    
</head>

<body>
    <?php include('includes/navigation.php'); ?>


<!-- Content -->
<div class="main">
    <h1 class="text-center mt-4">Add Category</h1>
<div class="inputfields my-5">
           <?php echo form_open(base_url() . 'site/adddatacategory/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    <div class="row">

       

    <div class="col-12 col-md-4">
        <!-- Upload image input-->
        <label for="image-upload">Upload Image</label>
        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
           
                <input id="upload" type="file" name="userfile" onchange="readURL(this);" class="form-control border-0">
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                </div>
            </div>

            <!-- Uploaded image area-->
            <div class="image-area"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
    </div>

    <div class="col-12 col-md-4">
        <!-- Upload image input-->
        <label for="image-upload">Category</label>
        <input type="text" name="cat_name" class="form-control" placeholder="Category Title">

    </div>

    <div class="col-12 col-md-4">
        <!-- Upload image input-->
        <!--
        <label for="image-upload">Select Category</label>
        <select name="" class="form-control" id="">
            <option value="">Epitah</option>
            <option value="">Epitah</option>
            <option value="">Epitah</option>
        </select>
        -->
        
<button type="submit" class="btn btn-info">Add Category</button>
    </div>



        
    </div>
   <?php echo form_close();?>
</div>
</div>








<?php include('includes/bottom_links.php'); ?>

<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}
</script>


</body>

</html>