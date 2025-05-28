<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuliah Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-blue-800 mb-8">Sistem Informasi Kuliah Mahasiswa</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Mahasiswa Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <h2 class="text-xl font-semibold text-blue-700 mb-4">Mahasiswa</h2>
                <p class="text-gray-600 mb-4">Kelola data mahasiswa</p>
                <a href="mahasiswa.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors">
                    Kelola Mahasiswa
                </a>
            </div>
            
            <!-- Matakuliah Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <h2 class="text-xl font-semibold text-green-700 mb-4">Mata Kuliah</h2>
                <p class="text-gray-600 mb-4">Kelola data mata kuliah</p>
                <a href="matakuliah.php" class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition-colors">
                    Kelola Matakuliah
                </a>
            </div>
            
            <!-- KRS Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <h2 class="text-xl font-semibold text-purple-700 mb-4">KRS</h2>
                <p class="text-gray-600 mb-4">Kelola Kartu Rencana Studi</p>
                <a href="krs.php" class="inline-block bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md transition-colors">
                    Kelola KRS
                </a>
            </div>
        </div>
        
        <!-- Recent KRS Table -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Daftar KRS Terbaru</h2>
            <?php include 'recent_krs.php'; ?>
        </div>
    </div>
</body>
</html>