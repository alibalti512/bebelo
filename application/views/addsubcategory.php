<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/toplinks.php'); ?>
    
</head>

<body>
    <?php include('includes/navigation.php'); ?>


<!-- Content -->
<div class="main">
    <h1 class="text-center mt-4">Add Sub Category</h1>
<div class="inputfields my-5">
     <?php echo form_open(base_url() . 'site/adddatasubcategory/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    <div class="row">

       

    <div class="col-12 col-md-3">
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

    <div class="col-12 col-md-3">
        <!-- Upload image input-->
        <label for="image-upload">Sub Category Title</label>
               <input type="text" name="cat_name" class="form-control" placeholder="Sub Category Title">

    </div>

    <div class="col-12 col-md-3">
        <!-- Upload image input-->
        <label for="image-upload">Select Category</label>
        
        <select name="cat_parrent_id" class="form-control" id="">
    <?php       
    $cat=$this->db->get('categories')->result_array();
    foreach($cat as $c){
    ?>
            <option value="<?php echo $c['id'] ?>"><?php echo $c['cat_name'] ?></option>
    
    <?php }    ?>
        </select>

    </div>
    <div class="col-12 col-md-3">
        <button type="submit" class="btn btn-info">Add Sub Category</button>
    </div>


        
    </div>
</form>
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