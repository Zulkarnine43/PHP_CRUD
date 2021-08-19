<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '','ct_crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$location = '';

// code to display data
$select_query = "SELECT * FROM data";
$results = $mysqli->query($select_query) or die($mysqli->error);
//pre_r($results);

// insert data
if (isset($_POST['save'])) {
    if(!empty($_POST['name']) && !empty($_POST['location'])) {
        $name = $_POST['name'];
        $location = $_POST['location'];

        $insert_query = "INSERT INTO data (name, location) VALUES ('$name','$location')";
        $mysqli->query($insert_query) or die($mysqli->error);
        
        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg_type'] = "success";
    }
    header("location: index.php");
}
// delete one of data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete_query = "DELETE FROM data WHERE id=$id";
    $mysqli->query($delete_query) or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}
// select one of data to update
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $update = true;

    $select_id_query = "SELECT * FROM data WHERE id=$id";
    $result = $mysqli->query($select_id_query) or die($mysqli->error);
    if($result->num_rows){
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
    }
}
// update one of data
if(isset($_POST['update'])) {
    $id = $_POST['id'];  // hidden input field
    $name = $_POST['name'];
    $location = $_POST['location'];

    $update_query= "UPDATE data SET name='$name', location='$location' WHERE id=$id";
    $mysqli->query($update_query) or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: index.php");
}