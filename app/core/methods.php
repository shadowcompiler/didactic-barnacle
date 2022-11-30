<?php
// this file contains some utils function

function file_upload($dir, $file)
{
   // upload and return the uploaded file link
    if ($_FILES[$file]['name']) 
    {
        if (!$_FILES[$file]['error'])
        {
            $temp_name = $_FILES[$file]['tmp_name']; 
            $type = $_FILES[$file]['type']; 
            // $size = $_FILES[$file]['size']; 


            if (!strstr($type, 'pdf'))
            {
               
                echo "<script>alert(\"Error ! Wrong file format ! Try Again\")</script>";

                exit();
            } else 
            {
                $name = $_FILES[$file]['name']; 
                $urlf = $dir . $name;
                move_uploaded_file($temp_name, $dir . $name); 
            }
        }
    }
    return $urlf;
}

function is_authenticated(){
    // check user session
    session_start();
    if(empty($_SESSION['id']))
    {
        return false;
    }
    else{
        return true;
    }
}
// author : @henrid3v
?>