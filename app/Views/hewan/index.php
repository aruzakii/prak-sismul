<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ensiklopedia Hewan Langka</title>
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
        .card-hewan {
            position: relative;
            overflow: hidden;
            transition: all 0.5s ease;
        }
        .card-hewan:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
        }
        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            opacity: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease;
            pointer-events: none; /* Memungkinkan klik menembus overlay */
        }
        .card-hewan:hover .card-overlay {
            opacity: 1;
        }
        .card-overlay p {
            transform: translateY(10px);
            transition: transform 0.5s ease;
        }
        .card-hewan:hover .card-overlay p {
            transform: translateY(0);
        }
        .region-btn {
            transition: all 0.3s ease;
        }
        .region-btn:hover {
            background-color: #2f855a;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
            transform: translateY(-2px);
        }
        .region-btn.active {
            background-color: #2f855a;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.8);
            transform: translateY(-2px);
        }
        .status-critically {
            background-color: #e53e3e;
        }
        .status-vulnerable {
            background-color: #ecc94b;
        }
        .container {
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
<body class="text-white min-h-screen">
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-bold text-center text-green-200 drop-shadow-[0_0_10px_rgba(255,215,0,0.4)] mb-4">
            Ensiklopedia Hewan Langka Indonesia
        </h1>
        <div class="text-center mb-6">
            <span class="text-xl font-semibold text-green-200" id="current-region">Region: Sundaland</span>
        </div>
        <div class="flex justify-center space-x-4 mb-6">
            <button class="region-btn bg-green-700 text-white font-medium py-2 px-4 rounded-lg border border-green-500 hover:border-gold-500 text-base" data-region="Sundaland">Sundaland</button>
            <button class="region-btn bg-green-700 text-white font-medium py-2 px-4 rounded-lg border border-green-500 hover:border-gold-500 text-base" data-region="Wallacea">Wallacea</button>
            <button class="region-btn bg-green-700 text-white font-medium py-2 px-4 rounded-lg border border-green-500 hover:border-gold-500 text-base" data-region="Sahul">Sahul</button>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($hewan as $h): ?>
                <div class="card-hewan bg-white/5 backdrop-blur-sm rounded-lg p-4 shadow-md">
                    <img src="/Uploads/<?= $h['gambar'] ?>" class="w-full h-48 object-cover rounded-t-lg" alt="<?= $h['nama'] ?>">
                    <div class="p-4">
                        <h5 class="text-xl font-medium mb-2 text-green-200"><?= $h['nama'] ?></h5>
                        <?php
                            $status = strtolower($h['status_konservasi']);
                            $statusClass = $status === 'critically endangered' ? 'status-critically' : ($status === 'vulnerable' ? 'status-vulnerable' : '');
                        ?>
                        <span class="inline-block  py-1 text-sm font-medium rounded-full text-white <?= $statusClass ?>">
                            <?= $h['status_konservasi'] ?>
                        </span>
                        <p class="text-sm text-gray-300 mt-2">Region: <?= $h['biogeographicRegion'] ?></p>
                        <a href="<?php echo htmlspecialchars('/hewan/detail/' . (isset($h['id']) ? $h['id'] : '0')); ?>" class="mt-3 inline-block bg-gradient-to-r from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 text-white font-medium py-2 px-4 rounded-md text-base transition-all duration-300" target="_self">
                            <i class="fas fa-eye mr-1"></i>Lihat Detail
                        </a>
                    </div>
                    <div class="card-overlay">
                        <p class="text-base text-green-300 font-medium"><?= $h['nama'] ?></p>
                        <p class="text-sm text-gray-300">Region: <?= $h['biogeographicRegion'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        const regionButtons = document.querySelectorAll('.region-btn');
        const currentRegion = document.getElementById('current-region');

        regionButtons.forEach(button => {
            button.addEventListener('click', () => {
                const region = button.getAttribute('data-region');
                currentRegion.textContent = `Region: ${region}`;
                regionButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                document.querySelectorAll('.card-hewan').forEach(card => {
                    const cardRegion = card.querySelector('p').textContent.split(': ')[1];
                    if (region === 'All' || cardRegion === region) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Set region default
        regionButtons[0].click();
    </script>
</body>
</html>