<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemesanan Tiket Pesawat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header with Animation -->
        <div class="text-center mb-10 animate-fade-in">
            <h1 class="text-4xl font-bold text-blue-800 mb-3">
                <i class="fas fa-plane-departure mr-2 text-blue-600"></i>
                Sistem Pemesanan Tiket Pesawat
            </h1>
            <p class="text-lg text-gray-600">Pesan tiket Anda dengan mudah dan cepat</p>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-indigo-500 mx-auto mt-4 rounded-full"></div>
        </div>
        
        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
            <div class="md:flex">
                <!-- Form Section -->
                <div class="md:w-1/2 p-8">
                    <form method="post" class="space-y-6">
                        <!-- Name Input -->
                        <div class="relative group">
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Pemesan</label>
                            <div class="relative">
                                <input type="text" id="nama" name="nama" required 
                                       class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                       placeholder="Masukkan nama lengkap">
                                <i class="fas fa-user absolute left-3 top-3.5 text-gray-400 group-focus-within:text-blue-500"></i>
                            </div>
                        </div>
                        
                        <!-- Origin Airport -->
                        <div class="relative group">
                            <label for="bandara_asal" class="block text-sm font-medium text-gray-700 mb-1">Bandara Asal</label>
                            <div class="relative">
                                <select id="bandara_asal" name="bandara_asal" required
                                        class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none transition-all duration-300">
                                    <option value="">-- Pilih Bandara Asal --</option>
                                    <?php
                                    $bandara_data = [
                                        'CGK' => ['nama' => 'Soekarno-Hatta (CGK)', 'pajak' => 50000, 'kota' => 'Jakarta'],
                                        'SUB' => ['nama' => 'Juanda (SUB)', 'pajak' => 40000, 'kota' => 'Surabaya'],
                                        'DPS' => ['nama' => 'Ngurah Rai (DPS)', 'pajak' => 80000, 'kota' => 'Bali'],
                                        'UPG' => ['nama' => 'Hasanuddin (UPG)', 'pajak' => 70000, 'kota' => 'Makassar'],
                                        'KNO' => ['nama' => 'Kualanamu (KNO)', 'pajak' => 40000, 'kota' => 'Medan'],
                                        'BDO' => ['nama' => 'Husein Sastranegara (BDO)', 'pajak' => 30000, 'kota' => 'Bandung'],
                                    ];
                                    
                                    ksort($bandara_data);
                                    
                                    foreach ($bandara_data as $kode => $bandara) {
                                        $selected = isset($_POST['bandara_asal']) && $_POST['bandara_asal'] == $kode ? 'selected' : '';
                                        echo "<option value='$kode' $selected data-kota='{$bandara['kota']}'>{$bandara['nama']}</option>";
                                    }
                                    ?>
                                </select>
                                <i class="fas fa-plane-departure absolute left-3 top-3.5 text-gray-400 group-focus-within:text-blue-500"></i>
                                <i class="fas fa-chevron-down absolute right-3 top-3.5 text-gray-400 pointer-events-none"></i>
                            </div>
                            <div id="kota-asal" class="text-xs text-gray-500 mt-1"></div>
                        </div>
                        
                        <!-- Destination Airport -->
                        <div class="relative group">
                            <label for="bandara_tujuan" class="block text-sm font-medium text-gray-700 mb-1">Bandara Tujuan</label>
                            <div class="relative">
                                <select id="bandara_tujuan" name="bandara_tujuan" required
                                        class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none transition-all duration-300">
                                    <option value="">-- Pilih Bandara Tujuan --</option>
                                    <?php
                                    $bandara_tujuan_data = $bandara_data;
                                    ksort($bandara_tujuan_data);
                                    
                                    foreach ($bandara_tujuan_data as $kode => $bandara) {
                                        $selected = isset($_POST['bandara_tujuan']) && $_POST['bandara_tujuan'] == $kode ? 'selected' : '';
                                        echo "<option value='$kode' $selected data-kota='{$bandara['kota']}'>{$bandara['nama']}</option>";
                                    }
                                    ?>
                                </select>
                                <i class="fas fa-plane-arrival absolute left-3 top-3.5 text-gray-400 group-focus-within:text-blue-500"></i>
                                <i class="fas fa-chevron-down absolute right-3 top-3.5 text-gray-400 pointer-events-none"></i>
                            </div>
                            <div id="kota-tujuan" class="text-xs text-gray-500 mt-1"></div>
                        </div>
                        
                        <!-- Ticket Price -->
                        <div class="relative group">
                            <label for="harga_tiket" class="block text-sm font-medium text-gray-700 mb-1">Harga Tiket (Rp)</label>
                            <div class="relative">
                                <input type="number" id="harga_tiket" name="harga_tiket" required min="0"
                                       class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                       value="<?= isset($_POST['harga_tiket']) ? $_POST['harga_tiket'] : '' ?>"
                                       placeholder="Masukkan harga tiket">
                                <i class="fas fa-tag absolute left-3 top-3.5 text-gray-400 group-focus-within:text-blue-500"></i>
                            </div>
                        </div>
                        
                        <button type="submit" name="hitung" 
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl flex items-center justify-center">
                            <i class="fas fa-calculator mr-2"></i> Hitung Total Harga
                        </button>
                    </form>
                </div>
                
                <!-- Image/Info Section -->
                <div class="md:w-1/2 bg-gradient-to-br from-blue-500 to-indigo-600 p-8 text-white hidden md:block">
                    <div class="h-full flex flex-col justify-center">
                        <div class="text-center mb-6">
                            <i class="fas fa-plane text-5xl mb-4 opacity-80"></i>
                            <h2 class="text-2xl font-bold mb-2">Informasi Penerbangan</h2>
                            <p class="opacity-90">Pesan tiket Anda dengan mudah dan dapatkan penawaran terbaik</p>
                        </div>
                        
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 mt-6">
                            <h3 class="font-semibold mb-3 flex items-center">
                                <i class="fas fa-info-circle mr-2"></i> Ketentuan Pajak
                            </h3>
                            <ul class="text-sm space-y-2 opacity-90">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle mr-2 mt-0.5 text-green-300"></i>
                                    <span>Pajak bandara bervariasi tergantung lokasi</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle mr-2 mt-0.5 text-green-300"></i>
                                    <span>Total pajak = pajak asal + pajak tujuan</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle mr-2 mt-0.5 text-green-300"></i>
                                    <span>Harga tiket belum termasuk pajak</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        if (isset($_POST['hitung'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $bandara_asal_kode = $_POST['bandara_asal'];
            $bandara_tujuan_kode = $_POST['bandara_tujuan'];
            $harga_tiket = (int)$_POST['harga_tiket'];
            
            // Format rupiah function
            function formatRupiah($angka) {
                return 'Rp ' . number_format($angka, 0, ',', '.');
            }
            
            if ($bandara_asal_kode == $bandara_tujuan_kode) {
                echo "<div class='mt-6 p-4 bg-red-100 text-red-700 rounded-lg border-l-4 border-red-500 flex items-start animate-slide-up'>
                        <i class='fas fa-exclamation-triangle mr-3 mt-0.5'></i>
                        <div>
                            <h3 class='font-semibold'>Peringatan</h3>
                            <p>Bandara asal dan tujuan tidak boleh sama!</p>
                        </div>
                      </div>";
            } else {
                $bandara_asal = $bandara_data[$bandara_asal_kode];
                $bandara_tujuan = $bandara_data[$bandara_tujuan_kode];
                $pajak = $bandara_asal['pajak'] + $bandara_tujuan['pajak'];
                $total_harga = $harga_tiket + $pajak;
                
                // Determine ticket class
                $ticket_class = '';
                $class_color = '';
                if ($total_harga > 2500000) {
                    $ticket_class = 'Bisnis';
                    $class_color = 'from-purple-600 to-indigo-600';
                } elseif ($total_harga > 1000000) {
                    $ticket_class = 'Premium Economy';
                    $class_color = 'from-blue-500 to-teal-500';
                } else {
                    $ticket_class = 'Ekonomi';
                    $class_color = 'from-green-500 to-emerald-500';
                }
                
                // Flight duration estimation (just for display)
                $duration = rand(1, 6) . ' jam ' . rand(10, 55) . ' menit';
                ?>
                
                <!-- Results Card -->
                <div class="mt-8 bg-white rounded-xl shadow-xl overflow-hidden animate-slide-up">
                    <div class="bg-gradient-to-r <?= $class_color ?> text-white p-4">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold">
                                <i class="fas fa-receipt mr-2"></i> Detail Pemesanan
                            </h2>
                            <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-medium">
                                <?= $ticket_class ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Flight Info -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-user-tie mr-2 text-blue-600"></i> Informasi Pemesan
                                </h3>
                                <div class="space-y-3">
                                    <p><span class="font-medium text-gray-700">Nama:</span> <?= $nama ?></p>
                                    <p><span class="font-medium text-gray-700">Tanggal:</span> <?= date('d F Y') ?></p>
                                    <p><span class="font-medium text-gray-700">Kode Booking:</span> <?= strtoupper(substr(md5(uniqid()), 0, 8)) ?></p>
                                </div>
                                
                                <h3 class="text-lg font-semibold text-gray-800 mt-6 mb-4 flex items-center">
                                    <i class="fas fa-plane mr-2 text-blue-600"></i> Rute Penerbangan
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                                            <i class="fas fa-plane-departure text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium"><?= $bandara_asal['nama'] ?></p>
                                            <p class="text-sm text-gray-600"><?= $bandara_asal['kota'] ?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-center text-gray-400 my-1">
                                        <i class="fas fa-long-arrow-alt-down"></i>
                                    </div>
                                    
                                    <div class="flex items-center">
                                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                                            <i class="fas fa-plane-arrival text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium"><?= $bandara_tujuan['nama'] ?></p>
                                            <p class="text-sm text-gray-600"><?= $bandara_tujuan['kota'] ?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="bg-gray-50 p-3 rounded-lg mt-3">
                                        <p class="text-sm text-gray-700"><i class="fas fa-clock mr-2 text-blue-500"></i> Perkiraan durasi penerbangan: <?= $duration ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Payment Info -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-money-bill-wave mr-2 text-blue-600"></i> Detail Pembayaran
                                </h3>
                                
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-gray-700">Harga Tiket:</span>
                                        <span class="font-medium"><?= formatRupiah($harga_tiket) ?></span>
                                    </div>
                                    
                                    <div class="border-t border-gray-200 pt-3">
                                        <p class="font-medium text-gray-700 mb-2">Detail Pajak:</p>
                                        <div class="pl-2 space-y-2">
                                            <div class="flex justify-between text-sm">
                                                <span class="text-gray-600"><?= $bandara_asal['nama'] ?>:</span>
                                                <span><?= formatRupiah($bandara_asal['pajak']) ?></span>
                                            </div>
                                            <div class="flex justify-between text-sm">
                                                <span class="text-gray-600"><?= $bandara_tujuan['nama'] ?>:</span>
                                                <span><?= formatRupiah($bandara_tujuan['pajak']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-between border-t border-gray-200 pt-3">
                                        <span class="text-gray-700">Total Pajak:</span>
                                        <span class="font-medium"><?= formatRupiah($pajak) ?></span>
                                    </div>
                                    
                                    <div class="flex justify-between border-t border-gray-200 pt-3 font-semibold text-lg">
                                        <span class="text-gray-800">Total Harga:</span>
                                        <span class="text-blue-600"><?= formatRupiah($total_harga) ?></span>
                                    </div>
                                </div>
                                
                                <div class="mt-6 bg-blue-50 p-4 rounded-lg border border-blue-100">
                                    <h4 class="font-medium text-blue-800 mb-2 flex items-center">
                                        <i class="fas fa-lightbulb mr-2 text-yellow-500"></i> Tips
                                    </h4>
                                    <p class="text-sm text-blue-700">
                                        Pembelian tiket lebih awal biasanya mendapatkan harga yang lebih murah. Pesan sekarang untuk mendapatkan penawaran terbaik!
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex flex-col sm:flex-row justify-between gap-3">
                            <button class="px-6 py-2 bg-white border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition duration-300 flex items-center justify-center">
                                <i class="fas fa-print mr-2"></i> Cetak Tiket
                            </button>
                            <button class="px-6 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 transition duration-300 flex items-center justify-center">
                                <i class="fas fa-credit-card mr-2"></i> Lanjutkan Pembayaran
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <script>
        // Update city information when airport is selected
        document.getElementById('bandara_asal').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const kota = selectedOption.getAttribute('data-kota');
            document.getElementById('kota-asal').textContent = kota ? `Kota: ${kota}` : '';
        });
        
        document.getElementById('bandara_tujuan').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const kota = selectedOption.getAttribute('data-kota');
            document.getElementById('kota-tujuan').textContent = kota ? `Kota: ${kota}` : '';
        });
        
        // Trigger change event if there are already selected values
        document.addEventListener('DOMContentLoaded', function() {
            const asalSelect = document.getElementById('bandara_asal');
            const tujuanSelect = document.getElementById('bandara_tujuan');
            
            if (asalSelect.value) {
                asalSelect.dispatchEvent(new Event('change'));
            }
            
            if (tujuanSelect.value) {
                tujuanSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
</body>
</html>