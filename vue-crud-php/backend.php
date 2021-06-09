<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
$conn = new mysqli("localhost", "root", "", "vue2");
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connection_error);
}
$result = array('error' => false);
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $menu = array_push($result, ['action' => 'read,create,delete,update']);
}
if ($action == 'read') {
    $sql = $conn->query("SELECT * from users ");
    $users = array();
    while ($row = $sql->fetch_assoc()) {
        array_push($users, $row);
    }
    $result['users'] = $users;
}

if ($action == 'create') {
    $data = json_decode(file_get_contents("php://input"));
    if($data){
        $sql = $conn->query("INSERT INTO `users` (`full_name`, `email`) VALUES ('$data->full_name','$data->email')");
    }
    if ($sql) {
        $result['message'] = "user added a bro";
    } else {
        $result['error'] = true;
        $result['message'] = "failed a sat";
    }
}
if ($action == 'update') {
    $data = json_decode(file_get_contents("php://input"));
    print_r($data);
    $sql = $conn->query("UPDATE `users` SET `full_name`='$data->full_name',`email`='$data->email' WHERE id='$data->id'");

    if ($sql) {
        $result['message'] = "user with id = $data->id has been updated a bro";
    } else {
        $result['error'] = true;
        $result['message'] = "failed a sat";
    }
}
if ($action == 'delete') {
    $data = json_decode(file_get_contents("php://input"));
    $sql2 = $conn->query("SELECT * from users where id='$data->id'");
    $sql = $conn->query("DELETE  FROM users WHERE id='$data->id'");
    $users = array();
    while ($row = $sql2->fetch_assoc()) {
        array_push($users, $row);
    }
    $result['users'] = $users;
    $his_name = $users[0]['full_name'];
    if ($sql) {
        $result['message'] = "the user $his_name with id = $id has been deleted 🎁 a bro";
    } else {
        $result['error'] = true;
        $result['message'] = "failed to delete the user with id = $id a sat";
    }
}


echo json_encode($result, JSON_PRETTY_PRINT);
