<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Hewan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .form-input, .form-textarea, .form-select {
            transition: all 0.3s ease;
        }
        .form-input:focus, .form-textarea:focus, .form-select:focus {
            border-color: #00ddeb;
            box-shadow: 0 0 10px rgba(0, 221, 235, 0.5);
            transform: scale(1.01);
        }
        .create-container {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="p-8 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen flex items-center justify-center">
    <div class="create-container bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 shadow-2xl max-w-2xl w-full">
        <h1 class="text-4xl font-extrabold text-center text-cyan-400 drop-shadow-lg mb-8">
            Tambah Hewan
        </h1>
        <form action="/admin/store" method="post" enctype="multipart/form-data">
            <div class="mb-6">
                <label for="nama" class="block text-lg font-semibold text-gray-300 mb-2">Nama Hewan</label>
                <div class="relative">
                    <input type="text" class="form-input w-full bg-gray-700/50 border border-gray-600 rounded-lg p-3 pl-10 text-white focus:outline-none focus:ring-0" id="nama" name="nama" required>
                    <i class="fas fa-paw absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="mb-6">
                <label for="deskripsi" class="block text-lg font-semibold text-gray-300 mb-2">Deskripsi</label>
                <div class="relative">
                    <textarea class="form-textarea w-full bg-gray-700/50 border border-gray-600 rounded-lg p-3 pl-10 text-white focus:outline-none focus:ring-0" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                    <i class="fas fa-info-circle absolute left-3 top-5 text-gray-400"></i>
                </div>
            </div>
            <div class="mb-6">
                <label for="habitat" class="block text-lg font-semibold text-gray-300 mb-2">Habitat</label>
                <div class="relative">
                    <input type="text" class="form-input w-full bg-gray-700/50 border border-gray-600 rounded-lg p-3 pl-10 text-white focus:outline-none focus:ring-0" id="habitat" name="habitat" required>
                    <i class="fas fa-leaf absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="mb-6">
                <label for="status_konservasi" class="block text-lg font-semibold text-gray-300 mb-2">Status Konservasi</label>
                <div class="relative">
                    <select class="form-select w-full bg-gray-700/50 border border-gray-600 rounded-lg p-3 pl-10 text-white focus:outline-none focus:ring-0" id="status_konservasi" name="status_konservasi" required>
                        <option value="" disabled selected>Pilih Status Konservasi</option>
                        <option value="Critically Endangered">Critically Endangered</option>
                        <option value="Endangered">Endangered</option>
                        <option value="Vulnerable">Vulnerable</option>
                        <option value="Near Threatened">Near Threatened</option>
                        <option value="Least Concern">Least Concern</option>
                        <option value="Data Deficient">Data Deficient</option>
                        <option value="Not Evaluated">Not Evaluated</option>
                    </select>
                    <i class="fas fa-shield-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="mb-6">
                <label for="videoUrl" class="block text-lg font-semibold text-gray-300 mb-2">URL Video (YouTube)</label>
                <div class="relative">
                    <input type="url" class="form-input w-full bg-gray-700/50 border border-gray-600 rounded-lg p-3 pl-10 text-white focus:outline-none focus:ring-0" id="videoUrl" name="videoUrl">
                    <i class="fab fa-youtube absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="mb-6">
                <label for="biogeographicRegion" class="block text-lg font-semibold text-gray-300 mb-2">Wilayah Biogeografi</label>
                <div class="relative">
                    <input type="text" class="form-input w-full bg-gray-700/50 border border-gray-600 rounded-lg p-3 pl-10 text-white focus:outline-none focus:ring-0" id="biogeographicRegion" name="biogeographicRegion">
                    <i class="fas fa-globe-asia absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="mb-6">
                <label for="gambar" class="block text-lg font-semibold text-gray-300 mb-2">Gambar</label>
                <div class="relative">
                    <input type="file" class="form-input w-full bg-gray-700/50 border border-gray-600 rounded-lg p-3 pl-10 text-white focus:outline-none focus:ring-0" id="gambar" name="gambar" accept="image/*" required>
                    <i class="fas fa-image absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="flex justify-center space-x-4">
                <button type="submit" class="flex items-center bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <i class="fas fa-save mr-2"></i> Simpan
                </button>
                <a href="/admin/dashboard" class="flex items-center bg-gradient-to-r from-gray-500 to-gray-700 hover:from-gray-600 hover:to-gray-800 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>