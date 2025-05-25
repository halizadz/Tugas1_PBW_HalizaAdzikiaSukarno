<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-green-800">Kelola Data Mata Kuliah</h1>
            <a href="index.php" class="text-green-600 hover:text-green-800">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        <!-- Add Matakuliah Form -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Mata Kuliah Baru</h2>
            <form action="process_matakuliah.php?action=add" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="kodemk" class="block text-sm font-medium text-gray-700">Kode MK</label>
                    <input type="text" id="kodemk" name="kodemk" maxlength="6" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
                <div class="md:col-span-2">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Mata Kuliah</label>
                    <input type="text" id="nama" name="nama" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
                <div>
                    <label for="jumlah_sks" class="block text-sm font-medium text-gray-700">Jumlah SKS</label>
                    <input type="number" id="jumlah_sks" name="jumlah_sks" min="1" max="10" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
                <div class="md:col-span-4 flex justify-end">
                    <button type="submit" 
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Tambah Mata Kuliah
                    </button>
                </div>
            </form>
        </div>

        <!-- Matakuliah Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode MK</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mata Kuliah</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah SKS</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        $sql = "SELECT * FROM matakuliah";
                        $result = $conn->query($sql);
                        $no = 1;
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $no++ . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . $row['kodemk'] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row['nama'] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row['jumlah_sks'] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>";
                                echo "<a href='edit_matakuliah.php?kodemk=" . $row['kodemk'] . "' class='text-green-600 hover:text-green-900 mr-3'>Edit</a>";
                                echo "<a href='process_matakuliah.php?action=delete&kodemk=" . $row['kodemk'] . "' class='text-red-600 hover:text-red-900' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='px-6 py-4 text-center text-sm text-gray-500'>Tidak ada data mata kuliah</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>