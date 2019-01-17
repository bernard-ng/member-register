<?php

use Intervention\Image\ImageManager;


// directories that will store images
$uploadDirectory = [
    'adults' => WEBROOT . '/images/adults/',
    'children' => WEBROOT . '/images/children/'
];



/**
 * whether an image is an image
 *
 * @param string $file
 * @param string $type
 * @return boolean
 */
function isValidExt($file, $type)
{
    $excepted_ext = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = explode('.', $file);
    $ext = strtolower(end($ext));
    $expected_type = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

    if (in_array($ext, $excepted_ext) && in_array($type, $expected_type)) {
        return true;
    }
    return false;
}


/**
 * upload a file on the server
 *
 * @param string $file
 * @param string $destination
 * @return bool
 */
function upload($file = [], $destination, $name)
{
    global $uploadDirectory;

    if (!empty($file) && isValidExt($file['name'], $file['type'])) {
        if ($file['size'] < 15728640) {
            try {
                $manager = new ImageManager();
                $manager
                    ->make($file['tmp_name'])
                    ->fit(640, 640)
                    ->save($uploadDirectory[$destination] . $name . ".jpg", 100)
                    ->destroy();
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
        return false;
    } else {
        return false;
    }
}
