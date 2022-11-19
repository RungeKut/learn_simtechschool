<?php
$photo_input = null;
$firstname_input = null;
$lastname_input = null;
$middlename_input = null;
$email_input = null;
$birthday_input = null;
$tel_input = null;
$gender_input = null;
$advertising_input = null;
$message_input = null;
$country_input = null;
$customerReviews = null;
$servername = "localhost";
$username = "root";
$db_password = "root";
$db = 'feedbackForm';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pathPhoto = "userPhoto/".$_FILES['upload-photo']['name'];
    echo $pathPhoto;
    if ($_FILES && $_FILES["upload-photo"]["error"] == UPLOAD_ERR_OK)
    {
        $name = $_FILES["upload-photo"]["name"];
        move_uploaded_file($_FILES["upload-photo"]["tmp_name"], $pathPhoto);
    }
    if(isset($_POST["firstname"])){$firstname_input = strip_tags($_POST["firstname"]);}
    if(isset($_POST["lastname"])){$lastname_input = strip_tags($_POST["lastname"]);}
    if(isset($_POST["middlename"])){$middlename_input = strip_tags($_POST["middlename"]);}
    if(isset($_POST["email"])){$email_input = strip_tags($_POST["email"]);}
    if(isset($_POST["birthday"])){$birthday_input = strip_tags($_POST["birthday"]);}
    if(isset($_POST["tel"])){$tel_input = strip_tags($_POST["tel"]);}
    if(isset($_POST["gender"])){$gender_input = strip_tags($_POST["gender"]);}
    if(isset($_POST["advertising"])){$advertising_input = strip_tags($_POST["advertising"]);}
    if(isset($_POST["message"])){$message_input = strip_tags($_POST["message"]);}
    if(isset($_POST["country"])){$country_input = strip_tags($_POST["country"]);}

    $mysqli = mysqli_connect($servername, $username, $db_password, $db);

    if (!$mysqli) {
        die("Connection to DB is failed!" . mysqli_connect_error());
    } else {
        try {
            $inputsIsWrited = $mysqli->query( query: "INSERT INTO customer_reviews (photo, firstname, lastname, middlename, email, birthday, tel, gender, advertising, message, country) VALUES ('$pathPhoto','$firstname_input','$lastname_input','$middlename_input','$email_input','$birthday_input','$tel_input','$gender_input','$advertising_input','$message_input','$country_input')");
        } catch (Exception $e) {
            $mesg = $e->getMessage();
            echo '<div class="alert alert-warning" role="alert">
            <?php echo $mesg; ?>
            </div>';
        }
    }
    if (isset($inputsIsWrited)) {
        echo '<div class="alert alert-success" role="alert">
              Ваш отзыв принят. Благодарим за сотрудничество!
              </div>';
    } elseif (!isset($e)) {
        echo '<div class="alert alert-danger" role="alert">
              Ошибка! Ваш отзыв не записан. Пожалуйста повторите еще раз.
              </div>';
    }
}
require 'index.html';
exit;
?>