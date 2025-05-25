<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola KRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-purple-800">Kelola Kartu Rencana Studi (KRS)</h1>
            <a href="index.php" class="text-purple-600 hover:text-purple-800">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        <!-- Add KRS Form -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah KRS Baru</h2>
            <form action="process_krs.php?action=add" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="mahasiswa_npm" class="block text-sm font-medium text-gray-700">Mahasiswa</label>
                    <select id="mahasiswa_npm" name="mahasiswa_npm" required 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        <option value="">Pilih Mahasiswa</option>
                        <?php
                        $sql = "SELECT * FROM mahasiswa";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['npm'] . "'>" . $row['npm'] . " - " . $row['nama'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label for="matakuliah_kodemk" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
                    <select id="matakuliah_kodemk" name="matakuliah_kodemk" required 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        <option value="">Pilih Mata Kuliah</option>
                        <?php
                        $sql = "SELECT * FROM matakuliah";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['kodemk'] . "'>" . $row['kodemk'] . " - " . $row['nama'] . " (" . $row['jumlah_sks'] . " SKS)</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" 
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Tambah KRS
                    </button>
                </div>
            </form>
        </div>

        <!-- KRS Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NPM Mahasiswa</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mahasiswa</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        $sql = "SELECT k.*, m.nama AS nama_mahasiswa, mk.nama AS nama_matakuliah, mk.jumlah_sks 
                                FROM krs k
                                JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
                                JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk
                                ORDER BY k.id DESC";
                        $result = $conn->query($sql);
                        $no = 1;
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $keterangan = $row['nama_mahasiswa'] . " mengambil mata kuliah " . $row['nama_matakuliah'] . " (" . $row['jumlah_sks'] . " SKS)";
                                
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $no++ . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . $row['mahasiswa_npm'] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row['nama_mahasiswa'] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row['nama_matakuliah'] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row['jumlah_sks'] . "</td>";
                                echo "<td class='px-6 py-4 text-sm text-gray-500'>" . $keterangan . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>";
                                echo "<a href='process_krs.php?action=delete&id=" . $row['id'] . "' class='text-red-600 hover:text-red-900' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='px-6 py-4 text-center text-sm text-gray-500'>Tidak ada data KRS</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>