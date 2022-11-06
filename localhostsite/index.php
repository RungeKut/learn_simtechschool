<?php
//phpinfo();
if( isset( $_POST['debug'] ) )
{
    /*
    echo '<pre>';
        print_r($_COOKIE);
    echo '</pre>';
    
    echo '<pre>';
        print_r($_ENV);
    echo '</pre>';
    
    echo '<pre>';
        print_r($_FILES);
    echo '</pre>';
    
    echo '<pre>';
        print_r($_GET);
    echo '</pre>';
    
    echo '<pre>';
        print_r($_POST);
    echo '</pre>';
    */
    echo '<pre>';
        print_r($_REQUEST);
    echo '</pre>';
    /*
    echo '<pre>';
        print_r($_SERVER);
    echo '</pre>';
    
    echo '<pre>';
        print_r($_SESSION);
    echo '</pre>';
    */
}
require 'index.html';

exit;
?>