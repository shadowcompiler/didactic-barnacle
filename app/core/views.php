<?php
// This file manage our web app logic 



function download_pdf($file)
{
    // download pdf
    
    header('Content-Type: application/pdf');
    readfile($file);
    
}
 

//author: @henrid3v
