<?php
//datenbankzugriff + alle funktionen der website

$host = 'localhost';
$user = 'admin';
$pwd = '1234';
$db = 'buchfuerung';

$con = mysqli_connect($host, $user, $pwd, $db);
if (!$con) {
    echo "Error, something went wrong!";
}


function get_id($name, $password)
{
    global $con;
    $sql = "select user_id from users where name = '$name' and password = '$password'";
    $result = mysqli_query($con, $sql);
    $id = mysqli_fetch_all($result);
    return $id[0][0];
}

function get_user_data($id)
{
    global $con;
    $sql = "select * from users where user_id = '$id';";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function get_tables($id)
{
    global $con;
    $sql = "select year_id, y.year, y.start_balance, y.end_balance from user_years uy
    inner join years y using(year_id)
    where user_id = $id;";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function get_table($id)
{
    global $con;
    $sql = "select * from years where year_id = $id;";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function get_balance_id($id)
{
    global $con;
    $sql = "select * from balance where balance_id = '$id';";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function get_accounts($yearId)
{
    global $con;
    $sql = "select account_id from years_accounts where year_id = '$yearId';";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}
function get_account_nr($id)
{
    global $con;
    $sql = "select * from accounts where account_id = '$id';";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function get_activa($id)
{
    global $con;
    $sql = "Select number, value from activa where balance_id = $id;";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function get_passiva($id)
{
    global $con;
    $sql = "Select number, value from passiva where balance_id = $id;";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}


function get_account_activa($id)
{
    global $con;
    $sql = "Select number, value from activa where account_id = $id;";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}

function get_account_passiva($id)
{
    global $con;
    $sql = "Select number, value from passiva where account_id = $id;";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}


function check_username($name)
{
    global $con;
    $sql = "select name from users where name = '$name'";
    $result = mysqli_query($con, $sql);
    return (mysqli_fetch_array($result) != NULL);
}
function create_user($name, $password)
{
    global $con;
    $sql = "select * from users where name = '$name'";
    $result = mysqli_query($con, $sql);
    if (mysqli_fetch_all($result) == NULL) {
        $sql = "insert into users(name, password) Values ('$name', '$password')";
        $result = mysqli_query($con, $sql);
        return "account created, please login";
    } else
        return "name is allready taken";
}

function add_balance($balanceId, $activa_number, $activa_value, $passiva_number, $passiva_value)
{
    global $con;
    if ($activa_number != NUll and $activa_value != NULL) {
        $sql = "insert into activa (number, value, balance_id) Values ($activa_number, $activa_value, $balanceId)";
        mysqli_query($con, $sql);
    }
    if ($passiva_number != NUll and $passiva_value != null) {
        $sql = "insert into passiva (number, value, balance_id) Values ($passiva_number, $passiva_value, $balanceId)";
        mysqli_query($con, $sql);
    }

}
;

function delete_balance($balanceId, $activa_number, $activa_value, $passiva_number, $passiva_value)
{
    global $con;
    if ($activa_number != NUll and $activa_value != null) {
        $sql = "delete from activa where activa_id = (select activa_id from activa where number = $activa_number and value = $activa_value and balance_id = $balanceId);";
        mysqli_query($con, $sql);
    }
    if ($passiva_number != NUll and $passiva_value != null) {
        $sql = "delete from passiva where passiva_id = (select passiva_id from passiva where number = $passiva_number and value = $passiva_value and balance_id = $balanceId);";
        mysqli_query($con, $sql);
    }

}
;


function add_account($accountId, $activa_number, $activa_value, $passiva_number, $passiva_value)
{
    global $con;
    if ($activa_number != NUll and $activa_value != NULL) {
        $sql = "insert into activa (number, value, account_id) Values ($activa_number, $activa_value, $accountId)";
        mysqli_query($con, $sql);
    }
    if ($passiva_number != NUll and $passiva_value != null) {
        $sql = "insert into passiva (number, value, account_id) Values ($passiva_number, $passiva_value, $accountId)";
        mysqli_query($con, $sql);
    }

}
;

function delete_account($accountId, $activa_number, $activa_value, $passiva_number, $passiva_value)
{
    global $con;
    if ($activa_number != NUll and $activa_value != null) {
        $sql = "delete from activa where activa_id = (select activa_id from activa where number = $activa_number and value = $activa_value and account_id = $accountId);";
        mysqli_query($con, $sql);
    }
    if ($passiva_number != NUll and $passiva_value != null) {
        $sql = "delete from passiva where passiva_id = (select passiva_id from passiva where number = $passiva_number and value = $passiva_value and account_id = $accountId);";
        mysqli_query($con, $sql);
    }

}
;

function create_new_account($number, $yearId)
{
    global $con;
    $sql = "insert into accounts (number) Values ($number);";
    mysqli_query($con, $sql);
    $sql = "insert into years_accounts (year_id, account_id) Values ($yearId, (Select account_id from accounts where number = $number order by account_id DESC Limit 1))";
    mysqli_query($con, $sql);
}


function create_new_year($date, $id)
{
    global $con;
    $sql = "insert into balance (type) Values ('start');";
    mysqli_query($con, $sql);
    $sql = "insert into balance (type) Values ('end');";
    mysqli_query($con, $sql);
    $sql = "insert into years (year, start_balance, end_balance) Values ('$date', (Select balance_id from balance where type = 'start' order by balance_id DESC Limit 1),(Select balance_id from balance where type = 'end' order by balance_id DESC Limit 1));";
    mysqli_query($con, $sql);
    $sql = "insert into user_years (user_id, year_id) Values ($id, (Select year_id from years where year = '$date' order by year_id desc limit 1));";
    mysqli_query($con, $sql);
}

function get_items()
{
    global $con;
    $sql = "select * from items;";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result);
}
?>