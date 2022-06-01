<?php
session_start();
if(isset($_POST['submit'])){
    $email =  $_POST['email'];
    $password = $_POST['password'];
loginUser($email, $password);

}

function loginUser($email, $password){

    $data = [$email,$password];
    $filename = "users.csv";
    $filePath = $_SERVER['DOCUMENT_ROOT'].'/userAuth/storage/'.$filename;
    $myfile = fopen($filePath, "r");
    $read= fgets($myfile);
    $array=explode(",",$read);
    $user=array_shift($array);
    $comp=array_slice(explode(",",$read),1);

     if($comp==$data){
        session_regenerate_id();
        $_SESSION['loggedin']= TRUE;
        $_SESSION['username'] = $user;
        header('Location: /userAuth/dashboard.php');
 
     }else{
        header('Location: /userAuth/forms/login.html');
     }
}

// echo "HANDLE THIS PAGE";

