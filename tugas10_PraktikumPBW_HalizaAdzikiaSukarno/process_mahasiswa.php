<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete') {
    // Delete Mahasiswa
    $npm = $_GET['npm'];
    $sql = "DELETE FROM mahasiswa WHERE npm = '$npm'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: mahasiswa.php?success=Mahasiswa berhasil dihapus");
    } else {
        header("Location: mahasiswa.php?error=Gagal menghapus mahasiswa");
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    
    if ($action == 'add') {
        // Add Mahasiswa
        $npm = $conn->real_escape_string($_POST['npm']);
        $nama = $conn->real_escape_string($_POST['nama']);
        $jurusan = $conn->real_escape_string($_POST['jurusan']);
        $alamat = isset($_POST['alamat']) ? $conn->real_escape_string($_POST['alamat']) : '';
        
        $sql = "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) 
                VALUES ('$npm', '$nama', '$jurusan', '$alamat')";
                
        if ($conn->query($sql) === TRUE) {
            header("Location: mahasiswa.php?success=Mahasiswa berhasil ditambahkan");
        } else {
            header("Location: mahasiswa.php?error=Gagal menambahkan mahasiswa: " . $conn->error);
        }
    } elseif ($action == 'update') {
        // Update Mahasiswa
        $old_npm = $conn->real_escape_string($_POST['old_npm']);
        $npm = $conn->real_escape_string($_POST['npm']);
        $nama = $conn->real_escape_string($_POST['nama']);
        $jurusan = $conn->real_escape_string($_POST['jurusan']);
        $alamat = isset($_POST['alamat']) ? $conn->real_escape_string($_POST['alamat']) : '';
        
        $sql = "UPDATE mahasiswa 
                SET npm = '$npm', nama = '$nama', jurusan = '$jurusan', alamat = '$alamat' 
                WHERE npm = '$old_npm'";
                
        if ($conn->query($sql) === TRUE) {
            header("Location: mahasiswa.php?success=Mahasiswa berhasil diperbarui");
        } else {
            header("Location: mahasiswa.php?error=Gagal memperbarui mahasiswa: " . $conn->error);
        }
    }
}

$conn->close();
?>