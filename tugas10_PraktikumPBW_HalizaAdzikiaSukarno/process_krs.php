<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete') {
    // Delete KRS
    $id = $_GET['id'];
    $sql = "DELETE FROM krs WHERE id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: krs.php?success=KRS berhasil dihapus");
    } else {
        header("Location: krs.php?error=Gagal menghapus KRS");
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'add') {
    // Add KRS
    $mahasiswa_npm = $conn->real_escape_string($_POST['mahasiswa_npm']);
    $matakuliah_kodemk = $conn->real_escape_string($_POST['matakuliah_kodemk']);
    
    // Check if the combination already exists
    $check_sql = "SELECT * FROM krs 
                  WHERE mahasiswa_npm = '$mahasiswa_npm' 
                  AND matakuliah_kodemk = '$matakuliah_kodemk'";
    $check_result = $conn->query($check_sql);
    
    if ($check_result->num_rows > 0) {
        header("Location: krs.php?error=Mahasiswa sudah mengambil mata kuliah ini");
        exit();
    }
    
    $sql = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) 
            VALUES ('$mahasiswa_npm', '$matakuliah_kodemk')";
            
    if ($conn->query($sql) === TRUE) {
        header("Location: krs.php?success=KRS berhasil ditambahkan");
    } else {
        header("Location: krs.php?error=Gagal menambahkan KRS: " . $conn->error);
    }
}

$conn->close();
?>