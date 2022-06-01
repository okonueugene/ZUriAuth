<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email,$newpassword){
    $filename = "users.csv";
    $filePath = $_SERVER['DOCUMENT_ROOT'].'/userAuth/storage/'.$filename; 
    $myfile = fopen($filePath, "r");
    $read= fgets($myfile);
    $array=explode(",",$read);
    $res=array_search($email,$array);
    fclose($myfile);
    $user=array_shift($array);
    if($res!=null){
        $concat=[$user,$email,$newpassword];
        $ndata=implode(",", $concat);
        $handle = fopen($filePath, "w");
        fwrite($handle, $ndata);
        fclose($handle);
        echo'sucess';
        header('Location: /userAuth/forms/login.html');
    
    }else{ echo'User does not exist';}
    //if it does, replace the password
}
// echo "HANDLE THIS PAGE";