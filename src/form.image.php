<?php

use Intervention\Image\Mananger;


$uploadMemberDirectory = __DIR__ . '/public/images/members';
$uploadChildDirecoty = __DIR__ . '/public/images/children';


/**
 * upload a file on the server
 *
 * @param string $file
 * @param string $destination
 * @return bool
 */
function upload($file = [], $destination) 
{
    global $uploadDirectory;

    try {
        $manager = new Manager();

        $manager
            ->make($file['tmp_name'])
            ->save($uploadDirectory . $file['name'])
            ->destroy();
    } catch (Exception $e) {
        return false;
    }
}
