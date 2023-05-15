<?php
//datenbankzugriff + alle funktionen der website

 $host = 'localhost';
 $user = 'admin';
 $pwd = '1234';
 $db = 'buchfuerung';

 $con = mysqli_connect($host, $user, $pwd, $db);
 if(!$con) {
     echo "Error, something went wrong!";
 }
 

function get_id($name, $password){
    global $con;
    $sql = "select user_id from users where name = '$name' and password = '$password'";
    $result = mysqli_query($con, $sql);
    $id =  mysqli_fetch_all($result);
    return $id[0][0];
}

function get_user_data($id){
    global $con;
    $sql = "select * from users where user_id = '$id';";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function get_tables($id){
    global $con;
    $sql = "select year_id, y.year, y.start_balance, y.end_balance from user_years uy
    inner join years y using(year_id)
    where user_id = $id;";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function create_user($name, $password){
    global $con;
    $sql = "select * from users where name = '$name'";
    $result = mysqli_query($con, $sql);
    if (mysqli_fetch_all($result) == NULL){
        $sql = "insert into users(name, password) Values ('$name', '$password')";
        $result = mysqli_query($con, $sql);
        return "account created, please login";
    }
    else return "name is allready taken";
}

?>