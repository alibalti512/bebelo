<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/toplinks.php'); ?>
    
</head>

<body>
    <?php include('includes/navigation.php'); ?>
<?php
$q=$this->db->where('id',$id)->get('lyrics')->row_array();
//print_r($q);
// echo $id;
// exit;
?>


<!-- Content -->
<div class="main">

    <h2 class="text-center my-4">Lyrics</h2>

    <div class="scroll-lyrics">
    <div class="row bg-dark">
        <div class="col-12 col-md-4">
                <div class="english-lyrics text-white">
                    <p>
                        <?php echo $q['lyricseng']; ?>
                        <!--
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Quam delectus sunt voluptate. Corrupti, dicta? Nemo dolor hic 
                        sunt tenetur quia, fugit reprehenderit qui nam voluptate laboriosam 
                        facilis perspiciatis consectetur esse.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Quam delectus sunt voluptate. Corrupti, dicta? Nemo dolor hic 
                        sunt tenetur quia, fugit reprehenderit qui nam voluptate laboriosam 
                        facilis perspiciatis consectetur esse.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Quam delectus sunt voluptate. Corrupti, dicta? Nemo dolor hic 
                        sunt tenetur quia, fugit reprehenderit qui nam voluptate laboriosam 
                        facilis perspiciatis consectetur esse.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Quam delectus sunt voluptate. Corrupti, dicta? Nemo dolor hic 
                        sunt tenetur quia, fugit reprehenderit qui nam voluptate laboriosam 
                        facilis perspiciatis consectetur esse.
                        -->
                        </p>
                </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="english-lyrics text-white">
                <p  dir="rtl">
                        <?php echo $q['lyricesc']; ?>
                                            <!--
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Quam delectus sunt voluptate. Corrupti, dicta? Nemo dolor hic 
                    sunt tenetur quia, fugit reprehenderit qui nam voluptate laboriosam 
                    facilis perspiciatis consectetur esse.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Quam delectus sunt voluptate. Corrupti, dicta? Nemo dolor hic 
                    sunt tenetur quia, fugit reprehenderit qui nam voluptate laboriosam 
                    facilis perspiciatis consectetur esse.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Quam delectus sunt voluptate. Corrupti, dicta? Nemo dolor hic 
                    sunt tenetur quia, fugit reprehenderit qui nam voluptate laboriosam 
                    facilis perspiciatis consectetur esse.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Quam delectus sunt voluptate. Corrupti, dicta? Nemo dolor hic 
                    sunt tenetur quia, fugit reprehenderit qui nam voluptate laboriosam 
                    facilis perspiciatis consectetur esse.
                    -->
                    </p>
            </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="english-lyrics text-white">
           <!-- Arabic text align right to left -->
            <p dir="rtl">
                        <?php echo $q['lyricsa']; ?>
                                        <!--
                العديد من برامح النشر المكتبي وبرامح تحرير صفحات 
                 الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا
                 العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا
                 العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا
                 العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا
                 العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا
                 العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا
                 العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا
                 العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا
                 العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا
                 العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا
                                     -->
                </p>
        </div>
</div>
    </div>
     </div>

<div class="row my-4">
    <div class="col-md-4  offset-md-4 col-6">
        <div class="d-flex">
            <p><?php echo $q['title']; ?> <br> <span class="song-name"><?php echo $q['artist_name']; ?>- <span><?php echo $q['duration']; ?></span> </span> </p>
            <span class="ml-auto text-center"> <i class="fa fa-music" aria-hidden="true"></i> 
            <!--
            <br> Add to playlist <br> <i class="fa fa-download" aria-hidden="true"></i>
            -->
            </span>
        </div>
        <div class="text-center mt-2">
            
                <input type="file" class="mb-2" id="upload" />
                <audio id="audio" controls>
                     <source src="<?php echo $q['media_file']; ?>" type="audio/mpeg" id="src" />
                </audio>

        </div>



    </div>
</div>

</div>

















    <?php include('includes/footer.php'); ?>
    <?php include('includes/bottom_links.php'); ?>
    

</body>

</html>