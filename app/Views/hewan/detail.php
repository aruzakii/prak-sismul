<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail <?= $hewan['nama'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(5, 46, 22, 0.9), rgba(20, 83, 45, 0.8));
            z-index: -1;
        }
        .card-detail {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }
        .card-detail:hover {
            transform: translateY(-5px);
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            border-radius: 10px;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 10px;
        }
        .info-box {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .status-kritis {
            background-color: #e53e3e;
            color: white;
        }
        .status-vulnerable {
            background-color: #ecc94b;
            color: black;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-10">
    <div class="card-detail p-6 max-w-4xl w-full mx-4 text-white">
        <h1 class="text-4xl font-bold text-center text-green-200 mb-6 drop-shadow-[0_0_10px_rgba(255,215,0,0.4)]"><?= $hewan['nama'] ?></h1>
        <img src="/uploads/<?= $hewan['gambar'] ?>" class="w-full h-64 object-cover rounded-lg mb-6 shadow-lg" alt="<?= $hewan['nama'] ?>">
        <div class="space-y-4">
            <div class="info-box">
                <i class="fas fa-map-signs text-green-400"></i>
                <div>
                    <p class="text-sm text-gray-300">Wilayah Biogeografi</p>
                    <p class="text-lg font-medium text-green-200"><?= $hewan['biogeographicRegion'] ?? '-' ?></p>
                </div>
            </div>
            <div class="info-box">
                <i class="fas fa-leaf text-green-400"></i>
                <div>
                    <p class="text-sm text-gray-300">Habitat</p>
                    <p class="text-lg font-medium text-green-200"><?= nl2br(htmlspecialchars($hewan['habitat'] ?? '-')) ?></p>
                </div>
            </div>
            <div class="info-box">
                <i class="fas fa-exclamation-triangle text-green-400"></i>
                <div>
                    <p class="text-sm text-gray-300">Status Konservasi</p>
                    <?php
                        $status = strtolower($hewan['status_konservasi'] ?? '');
                        $statusClass = $status === 'critically endangered' ? 'status-kritis' : ($status === 'vulnerable' ? 'status-vulnerable' : '');
                    ?>
                    <p class="text-lg font-medium text-green-200">
                        <span class="inline-block px-1 py-1 rounded-full <?= $statusClass ?>">
                            <?= $hewan['status_konservasi'] ?? '-' ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="info-box">
                <i class="fas fa-align-left text-green-400"></i>
                <div>
                    <p class="text-sm text-gray-300">Deskripsi</p>
                    <p class="text-lg font-medium text-green-200"><?= nl2br(htmlspecialchars($hewan['deskripsi'] ?? '-')) ?></p>
                </div>
            </div>
            <?php if (isset($hewan['videoUrl']) && !empty($hewan['videoUrl'])): ?>
                <?php
                    // Ekstrak ID video YouTube dari URL
                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/[^\/]+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $hewan['videoUrl'], $matches);
                    $videoId = $matches[1] ?? '';
                ?>
                <div class="video-container mb-6">
                    <iframe src="https://www.youtube.com/embed/<?= htmlspecialchars($videoId) ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            <?php endif; ?>
        </div>
        <a href="/hewan" class="mt-6 inline-block bg-gradient-to-r from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 text-white font-medium py-2 px-4 rounded-md text-base transition-all duration-300">
            Kembali
        </a>
    </div>
</body>
</html>