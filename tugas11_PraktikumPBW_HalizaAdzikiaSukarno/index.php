<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="bg-pink-600 py-4 px-6">
                <h1 class="text-2xl font-bold text-white">Book Management System</h1>
                <p class="text-blue-100">Implementasi OOP dengan Validasi</p>
            </div>

            <div class="p-6">
                <form id="bookForm" class="space-y-4">
                    <div>
                        <label for="code_book" class="block text-sm font-medium text-gray-700">Kode Buku</label>
                        <input type="text" id="code_book" name="code_book" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2"
                               placeholder="Contoh: BB12" required>
                        <p class="mt-1 text-sm text-gray-500">Format: 2 huruf besar diikuti 2 angka (BB00)</p>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Buku</label>
                        <input type="text" id="name" name="name" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2"
                               required>
                    </div>

                    <div>
                        <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
                        <input type="number" id="qty" name="qty" min="1" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2"
                               required>
                        <p class="mt-1 text-sm text-gray-500">Harus bilangan bulat positif</p>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="reset" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Reset
                        </button>
                        <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Buat Objek Buku
                        </button>
                    </div>
                </form>

                <div id="resultContainer" class="mt-8 hidden">
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Hasil Pembuatan Objek Buku</h2>
                    <div class="bg-gray-50 p-4 rounded-md">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Kode Buku</p>
                                <p id="resultCode" class="mt-1 text-sm text-gray-900"></p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nama Buku</p>
                                <p id="resultName" class="mt-1 text-sm text-gray-900"></p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Quantity</p>
                                <p id="resultQty" class="mt-1 text-sm text-gray-900"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="errorContainer" class="mt-4 hidden">
                    <div class="bg-red-50 border-l-4 border-red-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle h-5 w-5 text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <p id="errorMessage" class="text-sm text-red-700"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('bookForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Hide previous results/errors
            document.getElementById('resultContainer').classList.add('hidden');
            document.getElementById('errorContainer').classList.add('hidden');
            
            // Get form values
            const codeBook = document.getElementById('code_book').value;
            const name = document.getElementById('name').value;
            const qty = parseInt(document.getElementById('qty').value);
            
            try {
                // Create book object (this would be done via PHP in a real app)
                // For demo purposes, we'll simulate the PHP class behavior in JS
                if (!/^[A-Z]{2}\d{2}$/.test(codeBook)) {
                    throw new Error("Kode buku harus berupa 2 huruf besar diikuti 2 angka (contoh: BB00)");
                }
                
                if (!Number.isInteger(qty) || qty <= 0) {
                    throw new Error("Quantity harus bilangan integer positif");
                }
                
                // If validation passes, show results
                document.getElementById('resultCode').textContent = codeBook;
                document.getElementById('resultName').textContent = name;
                document.getElementById('resultQty').textContent = qty;
                document.getElementById('resultContainer').classList.remove('hidden');
                
            } catch (error) {
                // Show error message
                document.getElementById('errorMessage').textContent = error.message;
                document.getElementById('errorContainer').classList.remove('hidden');
            }
        });
    </script>
</body>
</html>