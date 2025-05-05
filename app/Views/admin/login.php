<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Ensiklopedia Hewan Langka</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .form-input {
            transition: all 0.3s ease;
        }
        .form-input:focus {
            border-color: #00ddeb;
            box-shadow: 0 0 10px rgba(0, 221, 235, 0.5);
            transform: scale(1.01);
        }
        .login-container {
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
        .btn-login {
            position: relative;
            overflow: hidden;
        }
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        .btn-login:hover::before {
            left: 100%;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen flex items-center justify-center">
    <div class="login-container bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 shadow-2xl max-w-md w-full">
        <h1 class="text-4xl font-extrabold text-center text-cyan-400 drop-shadow-lg mb-8">
            Login Admin
        </h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-500/20 border border-red-500 text-red-200 rounded-lg p-3 mb-6 animate-pulse">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-500/20 border border-green-500 text-green-200 rounded-lg p-3 mb-6 animate-pulse">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <form action="/admin/auth" method="post">
            <div class="mb-6">
                <label for="username" class="block text-lg font-semibold text-gray-300 mb-2">Username</label>
                <div class="relative">
                    <input type="text" class="form-input w-full bg-gray-700/50 border border-gray-600 rounded-lg p-3 pl-10 text-white focus:outline-none focus:ring-0" id="username" name="username" required>
                    <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-lg font-semibold text-gray-300 mb-2">Password</label>
                <div class="relative">
                    <input type="password" class="form-input w-full bg-gray-700/50 border border-gray-600 rounded-lg p-3 pl-10 text-white focus:outline-none focus:ring-0" id="password" name="password" required>
                    <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <button type="submit" class="btn-login flex items-center justify-center w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-sign-in-alt mr-2"></i> Login
            </button>
        </form>
    </div>
</body>
</html>