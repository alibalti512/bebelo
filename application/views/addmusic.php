<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/toplinks.php'); ?>
    
</head>

<body>
    <?php include('includes/navigation.php'); ?>


<!-- Content -->
<div class="main">
    <h1 class="text-center mt-4">Change Password</h1>
<div class="inputfields my-5">
         <?php echo form_open(base_url() . 'site/updaqtepassword/'.$id , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    <div class="row">

       

  
   

    <div class="col-12 col-md-6">
        <!-- Upload image input-->
        <label for="image-upload">Password</label>
        <input type="password" class="form-control" required name="duration" placeholder="Password">

    </div>
   
   


<div class="col-12 col-md-8">
    <br><br>
        <!-- Upload image input-->
                <button type="submit" class="btn btn-info">Save Changes</button>
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