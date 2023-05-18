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

function get_table($id){
    global $con;
    $sql = "select * from years;";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function get_balance_id($id){
    global $con;
    $sql = "select * from balance where balance_id = '$id';";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function get_activa($id){
    global $con;
    $sql = "Select number, value from balance_activa
    inner join activa using(activa_id) where balance_id = $id;";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}
function get_passiva($id){
    global $con;
    $sql = "Select number, value from balance_passiva
    inner join passiva using(passiva_id) where balance_id = $id;";
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

function add_balance($balanceId, $activa_number, $activa_value, $passiva_number, $passiva_value){
    global $con;
    if($activa_number != NUll and $activa_value != null) {
        $sql = "insert into activa (number, value) Values ($activa_number, $activa_value)";
        mysqli_query($con, $sql);
        $sql = "insert into balance_activa (balance_id, activa_id) Values ($balanceId, (SELECT    activa_id
        FROM      activa
        ORDER BY  activa_id DESC
        LIMIT     1))";
        mysqli_query($con, $sql);
    }
    if($passiva_number != NUll and $passiva_value != null) {
        $sql = "insert into passiva (number, value) Values ($passiva_number, $passiva_value)";
        mysqli_query($con, $sql);
        $sql = "insert into balance_passiva (balance_id, passiva_id) Values ($balanceId, (SELECT    passiva_id
        FROM      passiva
        ORDER BY  passiva_id DESC
        LIMIT     1))";
        mysqli_query($con, $sql);
    }
    
};

function delete_balance($balanceId, $activa_number, $activa_value, $passiva_number, $passiva_value){
    global $con;
    if($activa_number != NUll and $activa_value != null) {
        $sql = "delete from balance_activa where activa_id = (select activa_id from activa where number = $activa_number and value = $activa_value Order by activa_id DESC Limit 1);";
        mysqli_query($con, $sql);
        $sql = "delete from activa where activa_id = (select activa_id from activa where number = $activa_number and value = $activa_value Order by activa_id DESC Limit 1);";
        mysqli_query($con, $sql);
    }
    if($passiva_number != NUll and $passiva_value != null) {
        $sql = "delete from balance_passiva where passiva_id = (select passiva_id from passiva where number = $passiva_number and value = $passiva_value Order by passiva_id DESC Limit 1);";
        mysqli_query($con, $sql);
        $sql = "delete from passiva where passiva_id = (select passiva_id from passiva where number = $passiva_number and value = $passiva_value Order by passiva_id DESC Limit 1 );";
        mysqli_query($con, $sql);
    }
    
};



?>