<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
    $db="able-choice";
    $host="localhost";
    $user_name="root";
    $password="";
}else{
    $db="cyberns2_able_choice";
    $host="localhost";
    $user_name="cyberns2_able_choice_user";
    $password="b2582003@";

}

$con=mysqli_connect($host,$user_name,$password,$db) or die("Something went wrong! Connection Failed!");

?>