<?php
include 'config.php';

if (isset($_GET['kodemk'])) {
    $kodemk = $_GET['kodemk'];
    $sql = "SELECT * FROM matakuliah WHERE kodemk = '$kodemk'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-green-800">Edit Data Mata Kuliah</h1>
            <a href="matakuliah.php" class="text-green-600 hover:text-green-800">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
            <form action="process_matakuliah.php?action=update" method="POST">
                <input type="hidden" name="old_kodemk" value="<?php echo $row['kodemk']; ?>">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="kodemk" class="block text-sm font-medium text-gray-700">Kode MK</label>
                        <input type="text" id="kodemk" name="kodemk" value="<?php echo $row['kodemk']; ?>" maxlength="6" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Mata Kuliah</label>
                        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="jumlah_sks" class="block text-sm font-medium text-gray-700">Jumlah SKS</label>
                        <input type="number" id="jumlah_sks" name="jumlah_sks" min="1" max="10" value="<?php echo $row['jumlah_sks']; ?>" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                </div>
                
                <div class="mt-6 flex justify-end">
                    <button type="submit" 
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>