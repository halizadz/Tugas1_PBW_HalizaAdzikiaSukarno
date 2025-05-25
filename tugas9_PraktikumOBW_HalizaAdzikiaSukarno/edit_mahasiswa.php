<?php
include 'config.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $sql = "SELECT * FROM mahasiswa WHERE npm = '$npm'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-blue-800">Edit Data Mahasiswa</h1>
            <a href="mahasiswa.php" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
            <form action="process_mahasiswa.php?action=update" method="POST">
                <input type="hidden" name="old_npm" value="<?php echo $row['npm']; ?>">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="npm" class="block text-sm font-medium text-gray-700">NPM</label>
                        <input type="text" id="npm" name="npm" value="<?php echo $row['npm']; ?>" maxlength="13" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <select id="jurusan" name="jurusan" required 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="Teknik Informatika" <?php echo ($row['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
                            <option value="Sistem Operasi" <?php echo ($row['jurusan'] == 'Sistem Operasi') ? 'selected' : ''; ?>>Sistem Operasi</option>
                        </select>
                    </div>
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="3" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?php echo $row['alamat']; ?></textarea>
                    </div>
                </div>
                
                <div class="mt-6 flex justify-end">
                    <button type="submit" 
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>