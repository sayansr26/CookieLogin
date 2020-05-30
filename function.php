<?php 

function login() {
    if(isset($_COOKIE['username'])){
        return true;
    }else{
        return false;
    }
}

?>