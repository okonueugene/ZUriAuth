<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){ 
    //save data into the file
    $details= [$username,$email,$password];
    $data = implode(",", $details);
 $filename = "users.csv";
 $filePath = $_SERVER['DOCUMENT_ROOT'].'/userAuth/storage/'.$filename;
 $handle = fopen($filePath, "w");
 fwrite($handle, $data);
 fclose($handle);
    // echo "OKAY";
    echo "User Successfully registered";
}
// echo "HANDLE THIS PAGE";


