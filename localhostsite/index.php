<?php
//phpinfo();
$first_name = null;
$last_name = null;
$middle_name = null;

if(isset($_POST["firstname"])){$first_name = strip_tags($_POST["firstname"]);}
if(isset($_POST["lastname"])){$last_name = strip_tags($_POST["lastname"]);}
if(isset($_POST["middlename"])){$middle_name = strip_tags($_POST["middlename"]);}

echo "Имя: $first_name <br> Фамилия: $last_name";
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
    
    echo '<pre>';
        print_r($_SERVER);
    echo '</pre>';
    /*
    echo '<pre>';
        print_r($_SESSION);
    echo '</pre>';
    */
}
require 'index.html';

exit;
?>