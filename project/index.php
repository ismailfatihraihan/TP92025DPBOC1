<?php

include_once(__DIR__ . "/model/Template.class.php");
include_once(__DIR__ . "/model/DB.class.php");
include_once(__DIR__ . "/model/Mahasiswa.class.php");
include_once(__DIR__ . "/model/TabelMahasiswa.class.php");
include_once(__DIR__ . "/view/TampilMahasiswa.php");
include_once(__DIR__ . "/presenter/ProsesMahasiswa.php");

$tp = new TampilMahasiswa();
$mahasiswa = new Mahasiswa();
$proses = new ProsesMahasiswa();

if (isset($_GET['add'])) {
    // Display add form
    $tp->tampilForm("add");
} else if (isset($_GET['add_process'])) {
    // Process add data
    $mahasiswa->setNim($_POST['nim']);
    $mahasiswa->setNama($_POST['nama']);
    $mahasiswa->setGender($_POST['gender']);
    $mahasiswa->setTempat($_POST['tempat']);
    $mahasiswa->setTl($_POST['tl']);
    $mahasiswa->setEmail($_POST['email']);
    $mahasiswa->setTelp($_POST['telp']);
    
    $result = $proses->prosesAddMahasiswa($mahasiswa);
    
    if ($result) {
        // Set success message in session
        session_start();
        $_SESSION['message'] = $tp->tampilMessage("Student added successfully!", "success");
    } else {
        // Set error message in session
        session_start();
        $_SESSION['message'] = $tp->tampilMessage("Failed to add student. Please try again.", "error");
    }
    
    // Redirect to main page
    header("Location: index.php");
} else if (isset($_GET['edit'])) {
    // Get data by ID for edit form
    $id = $_GET['edit'];
    $data = $proses->getId($id);
    
    // Display edit form with data
    $tp->tampilForm("edit", $data);
} else if (isset($_GET['edit_process'])) {
    // Process update data
    $mahasiswa->setNim($_POST['nim']);
    $mahasiswa->setNama($_POST['nama']);
    $mahasiswa->setGender($_POST['gender']);
    $mahasiswa->setTempat($_POST['tempat']);
    $mahasiswa->setTl($_POST['tl']);
    $mahasiswa->setEmail($_POST['email']);
    $mahasiswa->setTelp($_POST['telp']);
    
    $result = $proses->prosesUpdateMahasiswa($mahasiswa);
    
    if ($result) {
        // Set success message in session
        session_start();
        $_SESSION['message'] = $tp->tampilMessage("Student updated successfully!", "success");
    } else {
        // Set error message in session
        session_start();
        $_SESSION['message'] = $tp->tampilMessage("Failed to update student. Please try again.", "error");
    }
    
    // Redirect to main page
    header("Location: index.php");
} else if (isset($_GET['delete'])) {
    // Process delete data
    $id = $_GET['delete'];
    $result = $proses->prosesDeleteMahasiswa($id);
    
    if ($result) {
        // Set success message in session
        session_start();
        $_SESSION['message'] = $tp->tampilMessage("Student deleted successfully!", "success");
    } else {
        // Set error message in session
        session_start();
        $_SESSION['message'] = $tp->tampilMessage("Failed to delete student. Please try again.", "error");
    }
    
    // Redirect to main page
    header("Location: index.php");
} else {
    // Display main page with data
    session_start();
    if (isset($_SESSION['message'])) {
        // Use the new method to display message with data
        $tp->tampilWithMessage($_SESSION['message']);
        
        // Clear message from session
        unset($_SESSION['message']);
    } else {
        $tp->tampil();
    }
}