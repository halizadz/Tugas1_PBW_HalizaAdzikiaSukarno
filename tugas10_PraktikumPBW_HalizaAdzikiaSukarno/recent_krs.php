<?php
include 'config.php';

$sql = "SELECT k.*, m.nama AS nama_mahasiswa, mk.nama AS nama_matakuliah, mk.jumlah_sks 
        FROM krs k
        JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
        JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk
        ORDER BY k.id DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mahasiswa</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">';
    
    $no = 1;
    while($row = $result->fetch_assoc()) {
        $keterangan = $row['nama_mahasiswa'] . " mengambil mata kuliah " . $row['nama_matakuliah'] . " (" . $row['jumlah_sks'] . " SKS)";
        
        echo '<tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . $no++ . '</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . $row['nama_mahasiswa'] . '</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . $row['nama_matakuliah'] . '</td>
                <td class="px-6 py-4 text-sm text-gray-500">' . $keterangan . '</td>
              </tr>';
    }
    
    echo '</tbody>
          </table>
          </div>';
} else {
    echo '<p class="text-sm text-gray-500">Tidak ada data KRS terbaru</p>';
}

$conn->close();
?>