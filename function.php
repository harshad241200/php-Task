<?php

class Login{

    function saveToDb($u,$p){

    $conn = mysqli_connect("localhost","root","","harshadp");

    $sql = "INSERT INTO users(username,password)VALUES('$u','$p')";
    
    if($conn->query($sql)){
        return "succesfully inserted";
    }
    return "Insertion failed";
}
static function getAllBlogs(){
    $conn = mysqli_connect("localhost","root","","harshadp");
    $sql = "SELECT * FROM users";
    $results = $conn->query($sql);
    $arr = [];
    if ($results->num_rows >0){
        while($row = mysqli_fetch_assoc($results)){
            array_push($arr,$row);
        }
    }
    return $arr;
}




static function getSingleBlog($id){

    $conn = mysqli_connect("localhost","root","","harshadp");
    $sql = "SELECT * FROM users WHERE id=$id";
    $results = $conn->query($sql);
    if ($results->num_rows >0){
        $blog = mysqli_fetch_assoc($results);
        return $blog;
        }
        else{
            return null;
        }    
}
}
?>