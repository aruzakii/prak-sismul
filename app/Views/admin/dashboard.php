<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .table-row {
            transition: all 0.3s ease;
        }
        .table-row:hover {
            transform: scale(1.02);
            background: rgba(255, 255, 255, 0.1);
        }
        .table-img {
            transition: all 0.3s ease;
        }
        .table-img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-5xl font-extrabold text-center text-cyan-400 drop-shadow-lg mb-10">
            Admin Dashboard
        </h1>
        <div class="flex justify-center space-x-4 mb-8">
            <a href="/admin/create" class="flex items-center bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-plus-circle mr-2"></i> Tambah Hewan
            </a>
            <a href="/admin/logout" class="flex items-center bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
        </div>
        <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white">
                            <th class="py-4 px-6 font-semibold text-lg rounded-tl-2xl">Nama</th>
                            <th class="py-4 px-6 font-semibold text-lg">Gambar</th>
                            <th class="py-4 px-6 font-semibold text-lg rounded-tr-2xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hewan as $h): ?>
                            <tr class="table-row border-b border-gray-700/50">
                                <td class="py-4 px-6"><?= $h['nama'] ?></td>
                                <td class="py-4 px-6">
                                    <img src="/uploads/<?= $h['gambar'] ?>" class="table-img w-24 h-24 object-cover rounded-lg" alt="<?= $h['nama'] ?>">
                                </td>
                                <td class="py-4 px-6 flex space-x-3">
                                    <a href="/admin/edit/<?= $h['id'] ?>" class="flex items-center bg-gradient-to-r from-yellow-400 to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-gray-900 font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                        <i class="fas fa-edit mr-2"></i> Edit
                                    </a>
                                    <a href="/admin/delete/<?= $h['id'] ?>" onclick="return confirm('Yakin hapus?')" class="flex items-center bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                        <i class="fas fa-trash-alt mr-2"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>