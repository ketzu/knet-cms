<?php
$title = "Photography";

$overview = !isset($_GET['gallery']);
$gallery = isset($_GET['gallery']) ? urldecode($_GET['gallery']) : "";

$link_basic = "index.php?page=photography";

/** settings **/
$thumbs_height = 174;
$thumbs_width = $thumbs_height * 2;
// $thumbs_width = 348;
// $thumbs_height = floor(3 * ($thumbs_width / 4));
?>

<?php
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="px-5 col-md-8 text-center mx-auto">
                <h3 class="text-light display-4"><b>Photography</b></h3>
                <h2 class="my-3">
                <?php
                    if($overview) {
                        echo 'You can also find me on <a href="https://www.instagram.com/ketzulite/">Instagram</a>.';
                    }else{
                        echo $gallery;
                    }
                ?>
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <?php
            require_once "util/gallery.php";

            if ($overview) {
                if ($handle = opendir('galleries')) {
                    while (false !== ($entry = readdir($handle))) {
                        if (strpos($entry,'.') === false) {
                            $thumbnail_image = 'galleries/' . $entry . '/thumbs/highlight.jpg';
                            if (!file_exists($thumbnail_image)) {
                                $extension = get_file_extension($thumbnail_image);
                                if ($extension) {
                                    make_thumb('galleries/' . $entry . '/highlight.jpg', $thumbnail_image, $thumbs_width, $thumbs_height);
                                }
                            }
                            echo '<div class="col-md-4 p-3"><a href="', $link_basic, '&gallery=', urlencode($entry), '"><img class="img-fluid d-block" src="',$thumbnail_image,'"></a>
                                     <h2 class="text-center p-2">', $entry ,'</h2>
                                 </div>';
                        }
                    }
                    closedir($handle);

                    echo '</div>';
                }
            }else {
                $images_dir = 'galleries/' . $gallery . "/";
                $thumbs_dir = $images_dir . 'thumbs/';

                /** generate photo gallery **/
                $image_files = get_files($images_dir);
                sort($image_files, SORT_NATURAL | SORT_FLAG_CASE);
                foreach ($image_files as $file) {
                    $thumbnail_image = $thumbs_dir . $file;
                    if (!file_exists($thumbnail_image)) {
                        $extension = get_file_extension($thumbnail_image);
                        if ($extension) {
                            make_thumb($images_dir . $file, $thumbnail_image, $thumbs_width, $thumbs_height);
                        }
                    }
                    echo '<div class="col-md-4 p-3"><a href="#"><img class="img-fluid d-block" src="', $thumbnail_image, '"></a></div>';
                }
            }
            ?>
        </div>
    </div>
</div>