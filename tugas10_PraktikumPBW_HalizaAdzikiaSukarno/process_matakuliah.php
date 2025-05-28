<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete') {
    // Delete Matakuliah
    $kodemk = $_GET['kodemk'];
    $sql = "DELETE FROM matakuliah WHERE kodemk = '$kodemk'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: matakuliah.php?success=Mata kuliah berhasil dihapus");
    } else {
        header("Location: matakuliah.php?error=Gagal menghapus mata kuliah");
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    
    if ($action == 'add') {
        // Add Matakuliah
        $kodemk = $conn->real_escape_string($_POST['kodemk']);
        $nama = $conn->real_escape_string($_POST['nama']);
        $jumlah_sks = $conn->real_escape_string($_POST['jumlah_sks']);
        
        $sql = "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) 
                VALUES ('$kodemk', '$nama', '$jumlah_sks')";
                
        if ($conn->query($sql) === TRUE) {
            header("Location: matakuliah.php?success=Mata kuliah berhasil ditambahkan");
        } else {
            header("Location: matakuliah.php?error=Gagal menambahkan mata kuliah: " . $conn->error);
        }
    } elseif ($action == 'update') {
        // Update Matakuliah
        $old_kodemk = $conn->real_escape_string($_POST['old_kodemk']);
        $kodemk = $conn->real_escape_string($_POST['kodemk']);
        $nama = $conn->real_escape_string($_POST['nama']);
        $jumlah_sks = $conn->real_escape_string($_POST['jumlah_sks']);
        
        $sql = "UPDATE matakuliah 
                SET kodemk = '$kodemk', nama = '$nama', jumlah_sks = '$jumlah_sks' 
                WHERE kodemk = '$old_kodemk'";
                
        if ($conn->query($sql) === TRUE) {
            header("Location: matakuliah.php?success=Mata kuliah berhasil diperbarui");
        } else {
            header("Location: matakuliah.php?error=Gagal memperbarui mata kuliah: " . $conn->error);
        }
    }
}

$conn->close();
?>