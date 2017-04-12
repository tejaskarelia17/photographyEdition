<?php
if ($_GET['randomId'] != "zNUAXkFHat3m4x0ffLo6YFOi9KImBS5_As6aXcSATTEE6rWhBrZcc6e6wMC5p7TI") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
