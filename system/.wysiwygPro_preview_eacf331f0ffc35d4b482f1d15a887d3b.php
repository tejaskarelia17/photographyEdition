<?php
if ($_GET['randomId'] != "Z0v0DDblWi5T6KmCbDdS3n3QIBBaC0SwOdK4NVLULuye2WnvkdLcRPbbyLUtOsi8") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
