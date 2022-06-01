<?php
session_start();

function logout(){
    if(isset($_SESSION)){
       session_destroy();
       header('Location: /userAuth/forms/login.html');
    }else{echo'exit';}
}
logout();
