<?php

include 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$result = mysqli_query($conn,
"SELECT * FROM users WHERE email='$email' AND password='$password'");

if(mysqli_num_rows($result) > 0){

    echo "<script>
    alert('Login Successful');
    window.location='index.html';
    </script>";

}else{

    echo "<script>
    alert('Invalid Login');
    window.location='login.html';
    </script>";
}

?>