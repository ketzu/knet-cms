<?php

/* function:  generates thumbnail */
function make_thumb($src, $dest, $desired_width, $desired_height)
{
    /* read the source image */
    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);

    $original_aspect = $width / $height;
    $thumb_aspect = $desired_width / $desired_height;

    if ($original_aspect >= $thumb_aspect) {
        // If image is wider than thumbnail (in aspect ratio sense)
        $new_height = $desired_height;
        $new_width = $width / ($height / $desired_height);
    } else {
        // If the thumbnail is wider than the image
        $new_width = $desired_width;
        $new_height = $height / ($width / $desired_width);
    }

    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
    // Resize and crop
    imagecopyresampled($virtual_image,
        $source_image,
        0 - ($new_width - $desired_width) / 2, // Center the image horizontally
        0 - ($new_height - $desired_height) / 2, // Center the image vertically
        0, 0,
        $new_width, $new_height,
        $width, $height);
    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);

    /* free resources */
    imagedestroy($source_image);
    imagedestroy($virtual_image);
}

/* function:  returns files from dir */
function get_files($images_dir, $exts = array('jpg'))
{
    $files = array();
    if ($handle = opendir($images_dir)) {
        while (false !== ($file = readdir($handle))) {
            $extension = strtolower(get_file_extension($file));
            if ($extension && in_array($extension, $exts)) {
                $files[] = $file;
            }
        }
        closedir($handle);
    }
    return $files;
}

/* function:  returns a file's extension */
function get_file_extension($file_name)
{
    return substr(strrchr($file_name, '.'), 1);
}