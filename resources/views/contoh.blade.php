<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAWI - Jawara Indonesia Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .hero-bg {
            background: linear-gradient(135deg, #000000 0%, #1f1f1f 50%, #dc2626 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
        }
        
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #b91c1c, #991b1b);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(220, 38, 38, 0.3);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #1f1f1f, #000000);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: linear-gradient(135deg, #000000, #1f1f1f);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .status-verified {
            background: linear-gradient(135deg, #10b981, #059669);
        }
        
        .status-pending {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
        
        .status-rejected {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-black shadow-2xl fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <div class="flex-shrink-0 cursor-pointer" onclick="goHome()">
                        <h1 class="text-3xl font-black gradient-text">JAWI</h1>
                        <p class="text-xs text-gray-400 font-medium">Jawara Indonesia</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button onclick="showPage('eventsPage')" class="bg-gradient-to-r from-gray-700 to-gray-800 hover:from-gray-800 hover:to-gray-900 text-white px-6 py-3 rounded-xl font-semibold transition duration-300">
                        Events
                    </button>
                    <div id="authButtons" class="flex items-center space-x-3">
                        <button onclick="showLoginModal()" class="btn-primary text-white px-6 py-3 rounded-xl font-semibold transition duration-300">
                            LOGIN
                        </button>
                    </div>
                    <div id="userMenu" class="hidden flex items-center space-x-4">
                        <span id="userWelcome" class="text-white font-medium"></span>
                        <button onclick="logout()" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-xl font-bold">Logout</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="heroSection" class="hero-bg pt-20 pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
            <div class="text-center">
                <h1 class="text-6xl md:text-8xl font-black text-white mb-8 animate-fade-in">
                    JAWARA<br><span class="gradient-text">INDONESIA</span>
                </h1>
                <p class="text-2xl md:text-3xl text-gray-300 mb-12 animate-fade-in font-light">
                    Platform Digital Turnamen Pencak Silat Modern
                </p>
                <div class="glass-effect rounded-3xl p-10 max-w-5xl mx-auto">
                    <h2 class="text-3xl font-bold text-white mb-6">PT Jawara Indonesia Management</h2>
                    <div class="grid md:grid-cols-2 gap-8 text-gray-200">
                        <div class="text-left">
                            <p class="mb-3"><span class="font-semibold text-red-400">📍 Alamat:</span> Jl. Karah Agung III No 32, Jambangan, Surabaya</p>
                            <p><span class="font-semibold text-red-400">📞 Telepon:</span> 082121613116</p>
                        </div>
                        <div class="text-left">
                            <p><span class="font-semibold text-red-400">✉️ Email:</span> jawaraindonesia@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="aboutSection" class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-5xl font-black text-black mb-8">Tentang <span class="gradient-text">JAWI</span></h2>
                <p class="text-xl text-gray-600 max-w-5xl mx-auto leading-relaxed font-medium">
                    Jawara Indonesia atau disebut JAWI adalah platform digital yang dirancang khusus untuk mendukung penyelenggaraan turnamen Pencak Silat secara modern, efisien, dan profesional.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-10 mb-20">
                <div class="card-hover bg-gradient-to-br from-gray-50 to-gray-100 p-10 rounded-3xl border border-gray-200">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center mb-8">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-black mb-4">Manajemen Peserta</h3>
                    <p class="text-gray-600 font-medium">Sistem pendaftaran dan pengelolaan peserta yang terintegrasi dan mudah digunakan.</p>
                </div>
                
                <div class="card-hover bg-gradient-to-br from-gray-50 to-gray-100 p-10 rounded-3xl border border-gray-200">
                    <div class="w-20 h-20 bg-gradient-to-br from-black to-gray-800 rounded-2xl flex items-center justify-center mb-8">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-black mb-4">Digital Scoring</h3>
                    <p class="text-gray-600 font-medium">Sistem penilaian digital real-time yang akurat dan transparan untuk setiap pertandingan.</p>
                </div>
                
                <div class="card-hover bg-gradient-to-br from-gray-50 to-gray-100 p-10 rounded-3xl border border-gray-200">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center mb-8">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 011-1h1m-1 1v1m0 0H9m-5 0h14"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-black mb-4">Bracket Otomatis</h3>
                    <p class="text-gray-600 font-medium">Pembuatan bracket pertandingan otomatis dengan algoritma yang fair dan efisien.</p>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-black via-gray-900 to-red-900 rounded-3xl p-16 text-center">
                <h3 class="text-4xl font-black text-white mb-8">Visi Kami</h3>
                <p class="text-xl text-gray-200 max-w-5xl mx-auto leading-relaxed font-medium">
                    JAWI bukan hanya software. Kami adalah partner digital Anda dalam menyukseskan setiap pertandingan Pencak Silat. Mari bangun masa depan olahraga Indonesia — dimulai dari sistem yang lebih cerdas.
                </p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="featuresSection" class="py-32 bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-5xl font-black text-white mb-8">Fitur <span class="gradient-text">Unggulan</span></h2>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">
                <div class="text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-red-600 to-red-700 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Multi-Peran</h3>
                    <p class="text-gray-400 font-medium">Operator, juri, dewan, penonton</p>
                </div>
                
                <div class="text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-white to-gray-200 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Transparan</h3>
                    <p class="text-gray-400 font-medium">Sistem penilaian yang adil</p>
                </div>
                
                <div class="text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-red-600 to-red-700 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Real-time</h3>
                    <p class="text-gray-400 font-medium">Update langsung dan akurat</p>
                </div>
                
                <div class="text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-white to-gray-200 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Fleksibel</h3>
                    <p class="text-gray-400 font-medium">Skala lokal hingga nasional</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="bg-white rounded-3xl p-10 max-w-md w-full mx-4 shadow-2xl relative">
            <div class="text-center mb-8">
                <h2 id="modalTitle" class="text-3xl font-black text-black">Login</h2>
                <div class="mt-4 p-4 bg-gray-50 rounded-xl text-sm text-gray-600">
                    <p class="font-semibold mb-2">Akun Demo:</p>
                    <p><strong>Super Admin:</strong> superadmin / super123</p>
                    <p><strong>Admin:</strong> admin1 / admin123</p>
                    <p><strong>Peserta:</strong> email@example.com / peserta123</p>
                </div>
            </div>
            
            <form id="loginForm">
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Username/Email</label>
                    <input type="text" id="username" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Password</label>
                    <input type="password" id="password" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                </div>
                
                <button type="submit" class="w-full btn-primary text-white font-bold py-4 px-6 rounded-xl transition duration-300">
                    Login
                </button>
                
                <div id="registerLink" class="text-center mt-6">
                    <p class="text-gray-600">Belum punya akun? <button type="button" onclick="showRegisterModal()" class="text-red-600 hover:text-red-700 font-bold">Daftar di sini</button></p>
                </div>
            </form>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="bg-white rounded-3xl p-10 max-w-md w-full mx-4 shadow-2xl relative">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black">Daftar Akun Peserta</h2>
            </div>
            
            <form id="registerForm">
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Nama Lengkap</label>
                    <input type="text" id="fullName" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Email</label>
                    <input type="email" id="email" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">No. Telepon</label>
                    <input type="tel" id="phone" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                </div>
                
                <div class="mb-8">
                    <label class="block text-black text-sm font-bold mb-3">Password</label>
                    <input type="password" id="newPassword" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-4 px-6 rounded-xl transition duration-300">
                    Daftar
                </button>
                
                <div class="text-center mt-6">
                    <p class="text-gray-600">Sudah punya akun? <button type="button" onclick="showLoginModal()" class="text-red-600 hover:text-red-700 font-bold">Login di sini</button></p>
                </div>
            </form>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Events Page -->
    <div id="eventsPage" class="hidden min-h-screen bg-gray-50 pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center mb-12">
                <h1 class="text-5xl font-black text-black mb-4">Daftar <span class="gradient-text">Kejuaraan</span></h1>
                <p class="text-xl text-gray-600 font-medium">Pilih kejuaraan yang ingin Anda ikuti dan daftarkan tim Anda</p>
            </div>
            
            <!-- Filter Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8 mb-8">
                <div class="grid md:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Status Event</label>
                        <select id="eventStatusFilter" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" onchange="filterEvents()">
                            <option value="">Semua Status</option>
                            <option value="open">Pendaftaran Dibuka</option>
                            <option value="soon">Segera Dibuka</option>
                            <option value="closed">Pendaftaran Ditutup</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Kategori</label>
                        <select id="eventCategoryFilter" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" onchange="filterEvents()">
                            <option value="">Semua Kategori</option>
                            <option value="nasional">Nasional</option>
                            <option value="regional">Regional</option>
                            <option value="lokal">Lokal</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Bulan</label>
                        <select id="eventMonthFilter" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" onchange="filterEvents()">
                            <option value="">Semua Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button onclick="resetFilters()" class="w-full bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white py-3 px-6 rounded-xl font-bold transition duration-300">
                            Reset Filter
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Events Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="eventsGrid">
                <!-- Events will be populated here -->
            </div>
            
            <!-- No Events Message -->
            <div id="noEventsMessage" class="hidden text-center py-16">
                <div class="text-6xl mb-4">🏆</div>
                <h3 class="text-2xl font-bold text-gray-600 mb-2">Tidak ada event yang sesuai</h3>
                <p class="text-gray-500">Coba ubah filter pencarian Anda</p>
            </div>
        </div>
    </div>

    <!-- Event Detail Modal -->
    <div id="eventDetailModal" class="modal">
        <div class="bg-white rounded-3xl max-w-4xl w-full mx-4 shadow-2xl max-h-[90vh] overflow-y-auto relative">
            <div id="eventDetailContent">
                <!-- Event detail content will be populated here -->
            </div>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Dashboard Page -->
    <div id="dashboardPage" class="hidden min-h-screen bg-gray-50 pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-black text-black">Dashboard <span class="gradient-text">Peserta</span></h1>
                    <p class="text-gray-600 font-medium">Kelola pendaftaran kontingen dan atlet Anda</p>
                </div>
            </div>
            
            <!-- Status Cards -->
            <div class="grid md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Status Kontingen</h3>
                    <p class="text-3xl font-black" id="contingentStatus">Belum Daftar</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Jumlah Atlet</h3>
                    <p class="text-3xl font-black text-red-600" id="athleteCount">0</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Total Biaya</h3>
                    <p class="text-3xl font-black text-green-600" id="totalCost">Rp 0</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Event Aktif</h3>
                    <p class="text-lg font-black text-blue-600" id="activeEvent">-</p>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-bold text-black mb-4">Pendaftaran Kontingen</h3>
                    <p class="text-gray-600 mb-6">Daftarkan kontingen Anda terlebih dahulu sebelum mendaftarkan atlet</p>
                    <button onclick="showContingentRegistration()" class="btn-primary text-white px-6 py-3 rounded-xl font-bold">
                        Daftar Kontingen
                    </button>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-bold text-black mb-4">Pendaftaran Atlet</h3>
                    <p class="text-gray-600 mb-6">Daftarkan atlet setelah kontingen terverifikasi admin</p>
                    <div class="space-y-3">
                        <button onclick="showAthleteRegistration()" id="athleteRegistrationBtn" class="w-full btn-secondary text-white px-6 py-3 rounded-xl font-bold">
                            + Tambah Atlet Baru
                        </button>
                        <button onclick="showMultipleAthleteRegistration()" id="multipleAthleteBtn" class="w-full bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-6 py-3 rounded-xl font-bold">
                            + Daftar Beberapa Atlet
                        </button>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-bold text-black mb-4">Daftar Peserta</h3>
                    <p class="text-gray-600 mb-6">Lihat peserta di event yang sudah Anda daftarkan</p>
                    <button onclick="showMyEventParticipants()" id="participantsBtn" class="bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-6 py-3 rounded-xl font-bold">
                        Lihat Peserta
                    </button>
                </div>
            </div>
            
            <!-- My Registrations -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
                <h2 class="text-2xl font-bold text-black mb-6">Pendaftaran Saya</h2>
                <div id="myRegistrations">
                    <p class="text-gray-500 font-medium">Belum ada pendaftaran.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Selection Modal -->
    <div id="eventSelectionModal" class="modal">
        <div class="bg-white rounded-3xl p-10 max-w-2xl w-full mx-4 shadow-2xl relative">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black" id="eventSelectionTitle">Pilih Event</h2>
                <p class="text-gray-600 mt-2" id="eventSelectionDesc">Pilih event yang ingin Anda ikuti</p>
            </div>
            
            <div class="grid gap-4" id="eventSelectionList">
                <!-- Events will be populated here -->
            </div>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Event Selection After Login Modal -->
    <div id="eventSelectionAfterLoginModal" class="modal">
        <div class="bg-white rounded-3xl p-10 max-w-3xl w-full mx-4 shadow-2xl relative">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black">Selamat Datang!</h2>
                <p class="text-gray-600 mt-2">Pilih event yang ingin Anda ikuti untuk memulai pendaftaran</p>
            </div>
            
            <div class="grid gap-4 max-h-96 overflow-y-auto" id="eventSelectionAfterLoginList">
                <!-- Events will be populated here -->
            </div>
            
            <div class="text-center mt-8">
                <button onclick="skipEventSelection()" class="bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-6 py-3 rounded-xl font-bold">
                    Lewati, Pilih Nanti
                </button>
            </div>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Contingent Registration Modal -->
    <div id="contingentRegistrationModal" class="modal">
        <div class="bg-white rounded-3xl p-10 max-w-2xl w-full mx-4 shadow-2xl relative max-h-[90vh] overflow-y-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black">Daftar Kontingen</h2>
                <p class="text-gray-600 mt-2" id="contingentEventName">Event: -</p>
            </div>
            
            <form id="contingentRegistrationForm">
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Nama Kontingen *</label>
                        <input type="text" id="contingentName" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Asal Daerah *</label>
                        <input type="text" id="contingentRegion" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-black mb-4">Data Manager/Penanggung Jawab</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-black text-sm font-bold mb-3">Nama Lengkap *</label>
                            <input type="text" id="managerName" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                        </div>
                        <div>
                            <label class="block text-black text-sm font-bold mb-3">No. Telepon *</label>
                            <input type="tel" id="managerPhone" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                        </div>
                        <div>
                            <label class="block text-black text-sm font-bold mb-3">Email *</label>
                            <input type="email" id="managerEmail" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                        </div>
                        <div>
                            <label class="block text-black text-sm font-bold mb-3">Jabatan *</label>
                            <select id="managerPosition" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                                <option value="">Pilih Jabatan</option>
                                <option value="Manager">Manager</option>
                                <option value="Pelatih">Pelatih</option>
                                <option value="Official">Official</option>
                                <option value="Ketua Kontingen">Ketua Kontingen</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Alamat Lengkap *</label>
                    <textarea id="contingentAddress" rows="3" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required></textarea>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-black mb-4">Informasi Pembayaran</h3>
                    <div class="bg-gray-50 rounded-xl p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-bold text-lg">Biaya Kontingen:</span>
                            <span class="font-black text-2xl text-red-600" id="contingentFeeDisplay">Rp 0</span>
                        </div>
                        <div class="text-sm text-gray-600">
                            <p class="font-medium mb-2">Transfer ke:</p>
                            <p id="bankAccountInfo">-</p>
                        </div>
                        <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <p class="text-sm text-yellow-800 font-medium">
                                ⚠️ Setelah mendaftar, lakukan pembayaran dan upload bukti transfer. Kontingen akan diverifikasi oleh admin sebelum dapat mendaftarkan atlet.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <button type="button" onclick="closeModal()" class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white py-4 px-6 rounded-xl font-bold">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 btn-primary text-white py-4 px-6 rounded-xl font-bold">
                        Daftar Kontingen
                    </button>
                </div>
            </form>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Athlete Registration Modal -->
    <div id="athleteRegistrationModal" class="modal">
        <div class="bg-white rounded-3xl p-10 max-w-3xl w-full mx-4 shadow-2xl relative max-h-[90vh] overflow-y-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black">Daftar Atlet</h2>
                <p class="text-gray-600 mt-2" id="athleteEventName">Event: -</p>
                <p class="text-gray-600" id="athleteContingentName">Kontingen: -</p>
            </div>
            
            <form id="athleteRegistrationForm">
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Nama Lengkap *</label>
                        <input type="text" id="athleteName" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Jenis Kelamin *</label>
                        <select id="athleteGender" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <!-- Options will be populated based on event gender types -->
                        </select>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Tanggal Lahir *</label>
                        <input type="date" id="athleteBirthDate" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required onchange="updateAthleteCategory()">
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Berat Badan (kg) *</label>
                        <input type="number" id="athleteWeight" min="30" max="150" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Tinggi Badan (cm) *</label>
                        <input type="number" id="athleteHeight" min="120" max="220" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Kategori Umur *</label>
                        <select id="athleteCategory" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required onchange="updateAthleteCategory()">
                            <option value="">Pilih Kategori</option>
                            <option value="Pra Usia Dini">Pra Usia Dini (kurang dari 5 tahun)</option>
                            <option value="Usia Dini 1">Usia Dini 1 (5-8 tahun)</option>
                            <option value="Usia Dini 2">Usia Dini 2 (8-11 tahun)</option>
                            <option value="Pra Remaja">Pra Remaja (11-14 tahun)</option>
                            <option value="Remaja">Remaja (14-17 tahun)</option>
                            <option value="Dewasa">Dewasa (17-35 tahun)</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Kelas Pertandingan *</label>
                    <select id="athleteClass" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                        <option value="">Pilih Kelas</option>
                        <!-- Classes will be populated based on selected event -->
                    </select>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Alamat Lengkap *</label>
                    <textarea id="athleteAddress" rows="3" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required></textarea>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-black mb-4">Informasi Pembayaran</h3>
                    <div class="bg-gray-50 rounded-xl p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-bold text-lg">Biaya Per Atlet:</span>
                            <span class="font-black text-2xl text-red-600" id="athleteFeeDisplay">Rp 0</span>
                        </div>
                        <div class="text-sm text-gray-600">
                            <p class="font-medium mb-2">Transfer ke:</p>
                            <p id="athleteBankAccountInfo">-</p>
                        </div>
                        <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                            <p class="text-sm text-blue-800 font-medium">
                                ℹ️ Setelah mendaftar atlet, lakukan pembayaran dan upload bukti transfer untuk verifikasi admin.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <button type="button" onclick="closeModal()" class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white py-4 px-6 rounded-xl font-bold">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 btn-primary text-white py-4 px-6 rounded-xl font-bold">
                        Daftar Atlet
                    </button>
                </div>
            </form>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Multiple Athlete Registration Modal -->
    <div id="multipleAthleteModal" class="modal">
        <div class="bg-white rounded-3xl p-10 max-w-6xl w-full mx-4 shadow-2xl relative max-h-[90vh] overflow-y-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black">Daftar Beberapa Atlet</h2>
                <p class="text-gray-600 mt-2" id="multipleAthleteEventName">Event: -</p>
                <p class="text-gray-600" id="multipleAthleteContingentName">Kontingen: -</p>
            </div>
            
            <form id="multipleAthleteForm">
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-black">Daftar Atlet</h3>
                        <button type="button" onclick="addAthleteForm()" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-4 py-2 rounded-xl font-bold text-sm">
                            + Tambah Atlet
                        </button>
                    </div>
                    
                    <div id="athleteFormsContainer">
                        <!-- Athlete forms will be added here -->
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-black mb-4">Ringkasan Pembayaran</h3>
                    <div class="bg-gray-50 rounded-xl p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-bold text-lg">Jumlah Atlet:</span>
                            <span class="font-black text-xl text-blue-600" id="totalAthletes">0</span>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-bold text-lg">Biaya Per Atlet:</span>
                            <span class="font-black text-xl text-red-600" id="multipleAthleteFeeDisplay">Rp 0</span>
                        </div>
                        <hr class="border-gray-300 mb-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-bold text-xl">Total Biaya:</span>
                            <span class="font-black text-2xl text-red-600" id="totalFeeDisplay">Rp 0</span>
                        </div>
                        <div class="text-sm text-gray-600">
                            <p class="font-medium mb-2">Transfer ke:</p>
                            <p id="multipleAthleteBankInfo">-</p>
                        </div>
                        <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                            <p class="text-sm text-blue-800 font-medium">
                                ℹ️ Lakukan pembayaran total untuk semua atlet sekaligus dan upload bukti transfer untuk verifikasi admin.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <button type="button" onclick="closeModal()" class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white py-4 px-6 rounded-xl font-bold">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 btn-primary text-white py-4 px-6 rounded-xl font-bold">
                        Daftar Semua Atlet
                    </button>
                </div>
            </form>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- My Event Participants Modal -->
    <div id="myEventParticipantsModal" class="modal">
        <div class="bg-white rounded-3xl p-10 max-w-6xl w-full mx-4 shadow-2xl relative max-h-[90vh] overflow-y-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black">Daftar Peserta</h2>
                <p class="text-gray-600 mt-2" id="participantsEventName">Event: -</p>
            </div>
            
            <div class="mb-6">
                <div class="flex justify-center space-x-4">
                    <button onclick="showParticipantTab('contingents')" id="contingentsTab" class="px-6 py-3 rounded-xl font-bold transition duration-300 bg-red-600 text-white">
                        Kontingen
                    </button>
                    <button onclick="showParticipantTab('athletes')" id="athletesTab" class="px-6 py-3 rounded-xl font-bold transition duration-300 bg-gray-300 text-gray-700 hover:bg-gray-400">
                        Atlet
                    </button>
                </div>
            </div>
            
            <div id="participantsContent">
                <!-- Participants content will be populated here -->
            </div>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Create Event Modal -->
    <div id="createEventModal" class="modal">
        <div class="bg-white rounded-3xl p-10 max-w-4xl w-full mx-4 shadow-2xl relative max-h-[90vh] overflow-y-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black" id="createEventTitle">Buat Event Baru</h2>
                <p class="text-gray-600 mt-2">Lengkapi informasi event yang akan dibuat</p>
            </div>
            
            <form id="createEventForm">
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div class="md:col-span-2">
                        <label class="block text-black text-sm font-bold mb-3">Nama Event *</label>
                        <input type="text" id="eventName" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Tanggal Event *</label>
                        <input type="date" id="eventDate" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Lokasi *</label>
                        <input type="text" id="eventLocation" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Tingkat Event *</label>
                        <select id="eventCategory" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                            <option value="">Pilih Tingkat</option>
                            <option value="nasional">Nasional</option>
                            <option value="regional">Regional</option>
                            <option value="lokal">Lokal</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Jenis Pertandingan *</label>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="checkbox" id="competitionTanding" name="competitionTypes" value="TANDING" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="competitionTanding" class="ml-2 text-sm font-medium text-gray-900">TANDING</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="competitionSeni" name="competitionTypes" value="SENI" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="competitionSeni" class="ml-2 text-sm font-medium text-gray-900">SENI</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="competitionJurusBaku" name="competitionTypes" value="JURUS BAKU" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="competitionJurusBaku" class="ml-2 text-sm font-medium text-gray-900">JURUS BAKU</label>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Status *</label>
                        <select id="eventStatus" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                            <option value="">Pilih Status</option>
                            <option value="open">Pendaftaran Dibuka</option>
                            <option value="soon">Segera Dibuka</option>
                            <option value="closed">Pendaftaran Ditutup</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Batas Pendaftaran *</label>
                        <input type="date" id="eventRegistrationDeadline" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Gender Peserta *</label>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="checkbox" id="genderPutra" name="genderTypes" value="Putra" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="genderPutra" class="ml-2 text-sm font-medium text-gray-900">Putra</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="genderPutri" name="genderTypes" value="Putri" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="genderPutri" class="ml-2 text-sm font-medium text-gray-900">Putri</label>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Maksimal Peserta *</label>
                        <input type="number" id="eventMaxParticipants" min="50" max="1000" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Biaya Kontingen (Rp) *</label>
                        <input type="number" id="eventContingentFee" min="0" step="1000" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Biaya Atlet (Rp) *</label>
                        <input type="number" id="eventAthleteFee" min="0" step="1000" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Total Hadiah (Rp) *</label>
                        <input type="number" id="eventTotalPrize" min="0" step="1000000" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Rekening Bank *</label>
                    <input type="text" id="eventBankAccount" placeholder="Contoh: BCA 1234567890 a.n PT Jawara Indonesia" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Kontak Person *</label>
                    <input type="text" id="eventContactPerson" placeholder="Contoh: 082121613116" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">URL Poster Event</label>
                    <input type="url" id="eventPoster" placeholder="https://example.com/poster.jpg (opsional)" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300">
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Deskripsi Event *</label>
                    <textarea id="eventDescription" rows="4" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required></textarea>
                </div>
                
                <div class="mb-8">
                    <label class="block text-black text-sm font-bold mb-3">Kelas Pertandingan *</label>
                    <div class="space-y-3">
                        <div id="classesContainer">
                            <div class="flex gap-3 mb-3">
                                <input type="text" name="eventClass" placeholder="Contoh: Putra Dewasa -60kg" class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                                <button type="button" onclick="removeClassInput(this)" class="bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl font-bold">
                                    Hapus
                                </button>
                            </div>
                        </div>
                        <button type="button" onclick="addClassInput()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl font-bold text-sm">
                            + Tambah Kelas
                        </button>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <button type="button" onclick="closeModal()" class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white py-4 px-6 rounded-xl font-bold">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 btn-primary text-white py-4 px-6 rounded-xl font-bold" id="createEventSubmitBtn">
                        Buat Event
                    </button>
                </div>
            </form>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div id="editEventModal" class="modal">
        <div class="bg-white rounded-3xl p-10 max-w-4xl w-full mx-4 shadow-2xl relative max-h-[90vh] overflow-y-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black">Edit Event</h2>
                <p class="text-gray-600 mt-2">Ubah informasi event</p>
            </div>
            
            <form id="editEventForm">
                <input type="hidden" id="editEventId">
                
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div class="md:col-span-2">
                        <label class="block text-black text-sm font-bold mb-3">Nama Event *</label>
                        <input type="text" id="editEventName" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Tanggal Event *</label>
                        <input type="date" id="editEventDate" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Lokasi *</label>
                        <input type="text" id="editEventLocation" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Tingkat Event *</label>
                        <select id="editEventCategory" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                            <option value="">Pilih Tingkat</option>
                            <option value="nasional">Nasional</option>
                            <option value="regional">Regional</option>
                            <option value="lokal">Lokal</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Jenis Pertandingan *</label>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="checkbox" id="editCompetitionTanding" name="editCompetitionTypes" value="TANDING" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="editCompetitionTanding" class="ml-2 text-sm font-medium text-gray-900">TANDING</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="editCompetitionSeni" name="editCompetitionTypes" value="SENI" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="editCompetitionSeni" class="ml-2 text-sm font-medium text-gray-900">SENI</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="editCompetitionJurusBaku" name="editCompetitionTypes" value="JURUS BAKU" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="editCompetitionJurusBaku" class="ml-2 text-sm font-medium text-gray-900">JURUS BAKU</label>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Status *</label>
                        <select id="editEventStatus" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                            <option value="">Pilih Status</option>
                            <option value="open">Pendaftaran Dibuka</option>
                            <option value="soon">Segera Dibuka</option>
                            <option value="closed">Pendaftaran Ditutup</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Batas Pendaftaran *</label>
                        <input type="date" id="editEventRegistrationDeadline" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Gender Peserta *</label>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="checkbox" id="editGenderPutra" name="editGenderTypes" value="Putra" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="editGenderPutra" class="ml-2 text-sm font-medium text-gray-900">Putra</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="editGenderPutri" name="editGenderTypes" value="Putri" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="editGenderPutri" class="ml-2 text-sm font-medium text-gray-900">Putri</label>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Maksimal Peserta *</label>
                        <input type="number" id="editEventMaxParticipants" min="50" max="1000" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Biaya Kontingen (Rp) *</label>
                        <input type="number" id="editEventContingentFee" min="0" step="1000" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Biaya Atlet (Rp) *</label>
                        <input type="number" id="editEventAthleteFee" min="0" step="1000" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Total Hadiah (Rp) *</label>
                        <input type="number" id="editEventTotalPrize" min="0" step="1000000" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Rekening Bank *</label>
                    <input type="text" id="editEventBankAccount" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Kontak Person *</label>
                    <input type="text" id="editEventContactPerson" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">URL Poster Event</label>
                    <input type="url" id="editEventPoster" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300">
                </div>
                
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-3">Deskripsi Event *</label>
                    <textarea id="editEventDescription" rows="4" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required></textarea>
                </div>
                
                <div class="mb-8">
                    <label class="block text-black text-sm font-bold mb-3">Kelas Pertandingan *</label>
                    <div class="space-y-3">
                        <div id="editClassesContainer">
                            <!-- Classes will be populated here -->
                        </div>
                        <button type="button" onclick="addEditClassInput()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl font-bold text-sm">
                            + Tambah Kelas
                        </button>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <button type="button" onclick="closeModal()" class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white py-4 px-6 rounded-xl font-bold">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-4 px-6 rounded-xl font-bold">
                        Update Event
                    </button>
                </div>
            </form>
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Super Admin Dashboard -->
    <div id="superAdminPage" class="hidden min-h-screen bg-gray-50 pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-black text-black">Super Admin <span class="gradient-text">Dashboard</span></h1>
                    <p class="text-gray-600 font-medium">Kelola seluruh sistem JAWI</p>
                </div>
            </div>
            
            <!-- Dashboard Stats -->
            <div class="grid md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Total Events</h3>
                    <p class="text-4xl font-black text-red-600" id="totalEvents">3</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Total Peserta</h3>
                    <p class="text-4xl font-black text-blue-600" id="totalParticipants">0</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Terverifikasi</h3>
                    <p class="text-4xl font-black text-green-600" id="verifiedParticipants">0</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Total Admin</h3>
                    <p class="text-4xl font-black text-black" id="totalAdmins">1</p>
                </div>
            </div>
            
            <!-- Event Management -->
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
                    <h3 class="text-2xl font-bold text-black mb-6">Kelola Event</h3>
                    <div class="space-y-4">
                        <button onclick="showCreateEventModal()" class="w-full btn-primary text-white py-3 px-6 rounded-xl font-bold">
                            + Buat Event Baru
                        </button>
                        <button onclick="showAllEventsManagement()" class="w-full btn-secondary text-white py-3 px-6 rounded-xl font-bold">
                            Kelola Semua Event
                        </button>
                        <button onclick="exportAllData()" class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white py-3 px-6 rounded-xl font-bold">
                            Export Data
                        </button>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
                    <h3 class="text-2xl font-bold text-black mb-6">Akses Cepat</h3>
                    <div class="space-y-4">
                        <button onclick="showAllParticipants()" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-3 px-6 rounded-xl font-bold">
                            Semua Peserta
                        </button>
                        <button onclick="showPaymentVerification()" class="w-full bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-700 hover:to-yellow-800 text-white py-3 px-6 rounded-xl font-bold">
                            Verifikasi Pembayaran
                        </button>
                        <button onclick="showSystemSettings()" class="w-full bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white py-3 px-6 rounded-xl font-bold">
                            Pengaturan Sistem
                        </button>
                    </div>
                </div>
            </div>

            <!-- All Events Management -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold text-black">Semua Event</h2>
                    <button onclick="showCreateEventModal()" class="btn-primary text-white py-3 px-6 rounded-xl font-bold">
                        + Tambah Event
                    </button>
                </div>
                <div id="allEventsList">
                    <!-- All events will be populated here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Dashboard -->
    <div id="adminPage" class="hidden min-h-screen bg-gray-50 pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-black text-black">Admin <span class="gradient-text">Dashboard</span></h1>
                    <p class="text-gray-600 font-medium">Verifikasi dan kelola pendaftaran peserta</p>
                </div>
            </div>
            
            <!-- Event Selection -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8 mb-8">
                <h2 class="text-2xl font-bold text-black mb-6">Pilih Event untuk Dikelola</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-black text-sm font-bold mb-3">Event Aktif</label>
                        <select id="adminEventSelect" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300">
                            <option value="">Pilih Event</option>
                            <!-- Events will be populated here -->
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button onclick="selectEventForAdmin()" class="btn-primary text-white py-4 px-8 rounded-xl font-bold">
                            Kelola Event
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Admin Stats -->
            <div class="grid md:grid-cols-4 gap-6 mb-8" id="adminStatsSection" style="display: none;">
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Total Kontingen</h3>
                    <p class="text-3xl font-black text-blue-600" id="adminTotalContingents">0</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Total Atlet</h3>
                    <p class="text-3xl font-black text-green-600" id="adminTotalAthletes">0</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Terverifikasi</h3>
                    <p class="text-3xl font-black text-green-600" id="adminVerifiedCount">0</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-black mb-2">Menunggu</h3>
                    <p class="text-3xl font-black text-yellow-600" id="adminPendingCount">0</p>
                </div>
            </div>
            
            <!-- Management Section -->
            <div class="grid md:grid-cols-2 gap-8" id="adminManagementSection" style="display: none;">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
                    <h2 class="text-3xl font-bold text-black mb-8">Data Kontingen</h2>
                    <div id="contingentList">
                        <p class="text-gray-500">Pilih event terlebih dahulu</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
                    <h2 class="text-3xl font-bold text-black mb-8">Data Atlet</h2>
                    <div id="athleteList">
                        <p class="text-gray-500">Pilih event terlebih dahulu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentUser = null;
        let currentUserType = null;
        let selectedEventId = null;
        let selectedAdminEventId = null;
        let events = [];
        let contingents = [];
        let athletes = [];
        let admins = [];
        let users = [];

        // Initialize app
        document.addEventListener('DOMContentLoaded', function() {
            loadSampleData();
            showHomePage();
        });

        // Load sample data
        function loadSampleData() {
            events = [
                {
                    id: 1,
                    name: "Kejuaraan Pencak Silat Nasional 2024",
                    date: "2024-03-15",
                    location: "GOR Surabaya",
                    poster: "https://via.placeholder.com/400x600/dc2626/ffffff?text=Kejuaraan+Nasional+2024",
                    status: "open",
                    category: "nasional",
                    competitionTypes: ["TANDING", "SENI"],
                    genderTypes: ["Putra", "Putri"],
                    description: "Kejuaraan pencak silat tingkat nasional dengan peserta dari seluruh Indonesia. Event bergengsi yang menampilkan atlet-atlet terbaik dari berbagai daerah.",
                    registrationDeadline: "2024-03-01",
                    contingentFee: 500000,
                    athleteFee: 150000,
                    totalPrize: 50000000,
                    bankAccount: "BCA 1234567890 a.n PT Jawara Indonesia",
                    contactPerson: "082121613116",
                    classes: ["Putra Dewasa TANDING -60kg", "Putri Dewasa TANDING -55kg", "Putra Remaja SENI Tunggal", "Putri Remaja SENI Tunggal"],
                    maxParticipants: 500,
                    currentParticipants: 127
                },
                {
                    id: 2,
                    name: "Piala Gubernur Jawa Timur 2024",
                    date: "2024-04-20",
                    location: "GOR Pancasila Surabaya",
                    poster: "https://via.placeholder.com/400x600/059669/ffffff?text=Piala+Gubernur+Jatim",
                    status: "open",
                    category: "regional",
                    competitionTypes: ["SENI"],
                    genderTypes: ["Putra", "Putri"],
                    description: "Kejuaraan pencak silat tingkat regional Jawa Timur. Kompetisi bergengsi untuk atlet-atlet terbaik se-Jawa Timur dengan hadiah jutaan rupiah.",
                    registrationDeadline: "2024-04-05",
                    contingentFee: 300000,
                    athleteFee: 100000,
                    totalPrize: 25000000,
                    bankAccount: "BNI 9876543210 a.n Pengprov IPSI Jatim",
                    contactPerson: "081234567890",
                    classes: ["Putra Dewasa SENI Tunggal", "Putri Dewasa SENI Tunggal", "Putra Remaja SENI Ganda", "Putri Remaja SENI Ganda"],
                    maxParticipants: 300,
                    currentParticipants: 89
                },
                {
                    id: 3,
                    name: "Kejuaraan Pelajar Se-Indonesia 2024",
                    date: "2024-05-10",
                    location: "GOR Gelora Bung Karno Jakarta",
                    poster: "https://via.placeholder.com/400x600/7c3aed/ffffff?text=Kejuaraan+Pelajar",
                    status: "soon",
                    category: "nasional",
                    competitionTypes: ["TANDING", "SENI", "JURUS BAKU"],
                    genderTypes: ["Putra", "Putri"],
                    description: "Kompetisi khusus untuk pelajar SMP dan SMA se-Indonesia. Ajang pencarian bibit-bibit atlet muda berbakat di bidang pencak silat dengan semua kategori pertandingan.",
                    registrationDeadline: "2024-04-25",
                    contingentFee: 400000,
                    athleteFee: 120000,
                    totalPrize: 30000000,
                    bankAccount: "Mandiri 5555666677 a.n Kemendikbud RI",
                    contactPerson: "021-12345678",
                    classes: ["Putra Pra Remaja TANDING -45kg", "Putri Pra Remaja TANDING -40kg", "Putra Remaja SENI Tunggal", "Putri Remaja SENI Tunggal", "Putra Pra Remaja JURUS BAKU", "Putri Pra Remaja JURUS BAKU"],
                    maxParticipants: 400,
                    currentParticipants: 0
                }
            ];

            admins = [
                {
                    id: 1,
                    name: "Admin Kejuaraan 1",
                    email: "admin1@jawi.com",
                    username: "admin1",
                    password: "admin123",
                    status: "active"
                }
            ];

            populateEventsGrid();
            populateAdminEventSelect();
        }

        // Show home page
        function showHomePage() {
            // Hide all pages
            document.querySelectorAll('[id$="Page"], #superAdminPage, #adminPage').forEach(page => {
                page.classList.add('hidden');
            });
            
            // Show home sections
            document.getElementById('heroSection').classList.remove('hidden');
            document.getElementById('aboutSection').classList.remove('hidden');
            document.getElementById('featuresSection').classList.remove('hidden');
        }

        // Go home
        function goHome() {
            showHomePage();
        }

        // Show login modal
        function showLoginModal() {
            document.getElementById('loginModal').classList.add('active');
        }

        // Show register modal
        function showRegisterModal() {
            closeModal();
            document.getElementById('registerModal').classList.add('active');
        }

        // Close modal
        function closeModal() {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.classList.remove('active');
            });
        }

        // Handle login form
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();

            if (!username || !password) {
                alert('Mohon isi username dan password!');
                return;
            }

            // Check for super admin
            if (username === 'superadmin' && password === 'super123') {
                currentUser = { username: 'superadmin', type: 'superadmin', name: 'Super Admin' };
                currentUserType = 'superadmin';
                closeModal();
                updateNavigation();
                showPage('superAdminPage');
                return;
            }
            // Check for regular admin
            else if (username === 'admin1' && password === 'admin123') {
                currentUser = { username: 'admin1', type: 'admin', name: 'Admin Kejuaraan' };
                currentUserType = 'admin';
                closeModal();
                updateNavigation();
                showPage('adminPage');
                return;
            }
            // Check for participants (any email with password peserta123)
            else if (password === 'peserta123') {
                // Find existing user or create new one
                let user = users.find(u => u.email === username || u.username === username);
                if (!user) {
                    // Create new participant user
                    user = {
                        id: users.length + 1,
                        username: username,
                        email: username,
                        fullName: username.includes('@') ? username.split('@')[0] : username,
                        type: 'participant'
                    };
                    users.push(user);
                }
                
                currentUser = { 
                    username: user.email, 
                    type: 'participant', 
                    id: user.id, 
                    name: user.fullName 
                };
                currentUserType = 'participant';
                closeModal();
                updateNavigation();
                
                // Show event selection modal for participants
                showEventSelectionAfterLogin();
                return;
            }
            else {
                alert('Username atau password salah!\n\nGunakan akun demo:\n- Super Admin: superadmin / super123\n- Admin: admin1 / admin123\n- Peserta: email@example.com / peserta123');
                return;
            }
        });

        // Handle register form
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const newUser = {
                id: users.length + 1,
                fullName: document.getElementById('fullName').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                username: document.getElementById('email').value,
                type: 'participant'
            };
            
            users.push(newUser);
            alert('Pendaftaran berhasil! Silakan login dengan email yang baru didaftarkan dan password: peserta123');
            showLoginModal();
        });

        // Update navigation
        function updateNavigation() {
            const authButtons = document.getElementById('authButtons');
            const userMenu = document.getElementById('userMenu');
            const userWelcome = document.getElementById('userWelcome');

            if (currentUser) {
                authButtons.classList.add('hidden');
                userMenu.classList.remove('hidden');
                userWelcome.textContent = `Halo, ${currentUser.name || currentUser.username}`;
            } else {
                authButtons.classList.remove('hidden');
                userMenu.classList.add('hidden');
            }
        }

        // Logout function
        function logout() {
            currentUser = null;
            currentUserType = null;
            selectedEventId = null;
            selectedAdminEventId = null;
            updateNavigation();
            showHomePage();
        }

        // Show page
        function showPage(pageId) {
            // Hide home sections
            document.getElementById('heroSection').classList.add('hidden');
            document.getElementById('aboutSection').classList.add('hidden');
            document.getElementById('featuresSection').classList.add('hidden');
            
            // Hide all pages
            document.querySelectorAll('[id$="Page"], #superAdminPage, #adminPage').forEach(page => {
                page.classList.add('hidden');
            });
            
            // Show selected page
            document.getElementById(pageId).classList.remove('hidden');
            
            // Update page content based on page
            if (pageId === 'eventsPage') {
                populateEventsGrid();
            } else if (pageId === 'superAdminPage') {
                populateRecentEvents();
                populateAllEventsList();
            } else if (pageId === 'adminPage') {
                populateAdminEventSelect();
            } else if (pageId === 'dashboardPage') {
                updateParticipantDashboard();
            }
        }

        // Update participant dashboard
        function updateParticipantDashboard() {
            if (!currentUser) return;

            const userContingents = contingents.filter(c => c.userId === currentUser.id);
            const userAthletes = athletes.filter(a => a.userId === currentUser.id);

            // Update status cards
            const contingentStatusEl = document.getElementById('contingentStatus');
            const athleteCountEl = document.getElementById('athleteCount');
            const totalCostEl = document.getElementById('totalCost');
            const activeEventEl = document.getElementById('activeEvent');
            const athleteBtn = document.getElementById('athleteRegistrationBtn');

            // Update contingent status and athlete button state
            const multipleAthleteBtn = document.getElementById('multipleAthleteBtn');
            
            if (userContingents.length > 0) {
                const contingent = userContingents[0];
                if (contingent.verified && contingent.paymentVerified) {
                    contingentStatusEl.textContent = 'Terverifikasi';
                    contingentStatusEl.className = 'text-3xl font-black text-green-600';
                    // Enable athlete registration
                    athleteBtn.disabled = false;
                    athleteBtn.className = 'w-full btn-secondary text-white px-6 py-3 rounded-xl font-bold';
                    athleteBtn.textContent = '+ Tambah Atlet Baru';
                    multipleAthleteBtn.disabled = false;
                    multipleAthleteBtn.className = 'w-full bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-6 py-3 rounded-xl font-bold';
                } else if (contingent.paymentVerified) {
                    contingentStatusEl.textContent = 'Pembayaran Terverifikasi';
                    contingentStatusEl.className = 'text-3xl font-black text-blue-600';
                    // Disable athlete registration
                    athleteBtn.disabled = true;
                    athleteBtn.className = 'w-full bg-gray-400 text-white px-6 py-3 rounded-xl font-bold cursor-not-allowed';
                    athleteBtn.textContent = 'Menunggu Verifikasi Admin';
                    multipleAthleteBtn.disabled = true;
                    multipleAthleteBtn.className = 'w-full bg-gray-400 text-white px-6 py-3 rounded-xl font-bold cursor-not-allowed';
                } else {
                    contingentStatusEl.textContent = 'Menunggu Verifikasi';
                    contingentStatusEl.className = 'text-3xl font-black text-yellow-600';
                    // Disable athlete registration
                    athleteBtn.disabled = true;
                    athleteBtn.className = 'w-full bg-gray-400 text-white px-6 py-3 rounded-xl font-bold cursor-not-allowed';
                    athleteBtn.textContent = 'Menunggu Verifikasi';
                    multipleAthleteBtn.disabled = true;
                    multipleAthleteBtn.className = 'w-full bg-gray-400 text-white px-6 py-3 rounded-xl font-bold cursor-not-allowed';
                }
            } else {
                contingentStatusEl.textContent = 'Belum Daftar';
                contingentStatusEl.className = 'text-3xl font-black text-gray-600';
                // Disable athlete registration
                athleteBtn.disabled = true;
                athleteBtn.className = 'w-full bg-gray-400 text-white px-6 py-3 rounded-xl font-bold cursor-not-allowed';
                athleteBtn.textContent = 'Daftar Kontingen Dulu';
                multipleAthleteBtn.disabled = true;
                multipleAthleteBtn.className = 'w-full bg-gray-400 text-white px-6 py-3 rounded-xl font-bold cursor-not-allowed';
            }

            athleteCountEl.textContent = userAthletes.length;

            // Calculate total cost based on user's registrations
            let totalCost = 0;
            userContingents.forEach(c => {
                const event = events.find(e => e.id === c.eventId);
                if (event) totalCost += event.contingentFee;
            });
            userAthletes.forEach(a => {
                const event = events.find(e => e.id === a.eventId);
                if (event) totalCost += event.athleteFee;
            });
            totalCostEl.textContent = `Rp ${totalCost.toLocaleString('id-ID')}`;

            // Show active event
            if (selectedEventId) {
                const event = events.find(e => e.id === selectedEventId);
                activeEventEl.textContent = event ? event.name : '-';
            } else {
                activeEventEl.textContent = '-';
            }

            // Populate my registrations
            populateMyRegistrations();
        }

        // Populate my registrations
        function populateMyRegistrations() {
            if (!currentUser) return;

            const myRegistrationsEl = document.getElementById('myRegistrations');
            const userContingents = contingents.filter(c => c.userId === currentUser.id);
            const userAthletes = athletes.filter(a => a.userId === currentUser.id);

            let html = '';

            if (userContingents.length === 0 && userAthletes.length === 0) {
                html = '<p class="text-gray-500 font-medium">Belum ada pendaftaran.</p>';
            } else {
                // Show contingents
                userContingents.forEach(contingent => {
                    const event = events.find(e => e.id === contingent.eventId);
                    const statusClass = contingent.verified && contingent.paymentVerified ? 'status-verified' : 
                                       contingent.paymentVerified ? 'bg-blue-600' : 'status-pending';
                    const statusText = contingent.verified && contingent.paymentVerified ? 'Terverifikasi' : 
                                      contingent.paymentVerified ? 'Pembayaran Terverifikasi' : 'Menunggu Verifikasi';

                    html += `
                        <div class="border-2 border-gray-200 rounded-xl p-6 mb-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-black mb-2">Kontingen: ${contingent.name}</h3>
                                    <p class="text-gray-600 mb-1">Event: ${event ? event.name : 'Event tidak ditemukan'}</p>
                                    <p class="text-gray-600 mb-1">Manager: ${contingent.managerName}</p>
                                    <p class="text-gray-600 mb-1">Email: ${contingent.managerEmail}</p>
                                    <p class="text-gray-600">Telepon: ${contingent.managerPhone}</p>
                                </div>
                                <span class="px-4 py-2 text-sm font-bold text-white rounded-xl ${statusClass}">
                                    ${statusText}
                                </span>
                            </div>
                        </div>
                    `;
                });

                // Show athletes
                userAthletes.forEach(athlete => {
                    const event = events.find(e => e.id === athlete.eventId);
                    const statusClass = athlete.verified && athlete.paymentVerified ? 'status-verified' : 
                                       athlete.paymentVerified ? 'bg-blue-600' : 'status-pending';
                    const statusText = athlete.verified && athlete.paymentVerified ? 'Terverifikasi' : 
                                      athlete.paymentVerified ? 'Pembayaran Terverifikasi' : 'Menunggu Verifikasi';

                    html += `
                        <div class="border-2 border-gray-200 rounded-xl p-6 mb-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-black mb-2">Atlet: ${athlete.name}</h3>
                                    <p class="text-gray-600 mb-1">Event: ${event ? event.name : 'Event tidak ditemukan'}</p>
                                    <p class="text-gray-600 mb-1">Kontingen: ${athlete.contingent}</p>
                                    <p class="text-gray-600 mb-1">Kategori: ${athlete.category}</p>
                                    <p class="text-gray-600 mb-1">Kelas: ${athlete.class}</p>
                                    <p class="text-gray-600">Umur: ${athlete.age} tahun</p>
                                </div>
                                <span class="px-4 py-2 text-sm font-bold text-white rounded-xl ${statusClass}">
                                    ${statusText}
                                </span>
                            </div>
                        </div>
                    `;
                });
            }

            myRegistrationsEl.innerHTML = html;
        }

        // Show event selection modal
        function showEventSelectionModal(type) {
            const modal = document.getElementById('eventSelectionModal');
            const title = document.getElementById('eventSelectionTitle');
            const desc = document.getElementById('eventSelectionDesc');
            const list = document.getElementById('eventSelectionList');

            let titleText = '';
            let descText = '';

            switch(type) {
                case 'contingent':
                    titleText = 'Pilih Event untuk Kontingen';
                    descText = 'Pilih event yang ingin didaftarkan kontingen Anda';
                    break;
                case 'athlete':
                    titleText = 'Pilih Event untuk Atlet';
                    descText = 'Pilih event yang ingin didaftarkan atlet Anda';
                    break;
                case 'participants':
                    titleText = 'Pilih Event';
                    descText = 'Pilih event untuk melihat daftar peserta';
                    break;
            }

            title.textContent = titleText;
            desc.textContent = descText;

            // Populate events
            let html = '';
            events.filter(e => e.status === 'open').forEach(event => {
                html += `
                    <div class="border-2 border-gray-200 rounded-xl p-6 hover:border-red-500 cursor-pointer transition duration-300" onclick="selectEvent(${event.id}, '${type}')">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-black mb-2">${event.name}</h3>
                                <p class="text-gray-600 mb-1">📅 ${formatDate(event.date)}</p>
                                <p class="text-gray-600 mb-1">📍 ${event.location}</p>
                                <p class="text-gray-600">💰 Kontingen: Rp ${event.contingentFee.toLocaleString('id-ID')} | Atlet: Rp ${event.athleteFee.toLocaleString('id-ID')}</p>
                            </div>
                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-800">Dibuka</span>
                        </div>
                    </div>
                `;
            });

            if (html === '') {
                html = '<p class="text-gray-500 text-center py-8">Tidak ada event yang tersedia saat ini.</p>';
            }

            list.innerHTML = html;
            modal.classList.add('active');
        }

        // Select event
        function selectEvent(eventId, type) {
            selectedEventId = eventId;
            closeModal();

            switch(type) {
                case 'contingent':
                    alert('Fitur pendaftaran kontingen akan segera hadir!');
                    break;
                case 'athlete':
                    alert('Fitur pendaftaran atlet akan segera hadir!');
                    break;
                case 'participants':
                    alert('Fitur daftar peserta akan segera hadir!');
                    break;
            }
        }

        // Populate events grid
        function populateEventsGrid() {
            const eventsGrid = document.getElementById('eventsGrid');
            const noEventsMessage = document.getElementById('noEventsMessage');
            
            if (!eventsGrid) return;
            
            // Get filter values
            const statusFilter = document.getElementById('eventStatusFilter')?.value || '';
            const categoryFilter = document.getElementById('eventCategoryFilter')?.value || '';
            const monthFilter = document.getElementById('eventMonthFilter')?.value || '';
            
            // Filter events
            let filteredEvents = events.filter(event => {
                const statusMatch = !statusFilter || event.status === statusFilter;
                const categoryMatch = !categoryFilter || event.category === categoryFilter;
                const monthMatch = !monthFilter || event.date.split('-')[1] === monthFilter;
                
                return statusMatch && categoryMatch && monthMatch;
            });
            
            eventsGrid.innerHTML = '';
            
            if (filteredEvents.length === 0) {
                eventsGrid.classList.add('hidden');
                noEventsMessage.classList.remove('hidden');
                return;
            }
            
            eventsGrid.classList.remove('hidden');
            noEventsMessage.classList.add('hidden');
            
            filteredEvents.forEach(event => {
                const statusBadge = getStatusBadge(event.status);
                const categoryBadge = getCategoryBadge(event.category);
                const progressPercentage = Math.round((event.currentParticipants / event.maxParticipants) * 100);
                
                const eventCard = document.createElement('div');
                eventCard.className = 'bg-white rounded-2xl shadow-lg card-hover border border-gray-200 overflow-hidden';
                eventCard.innerHTML = `
                    <div class="relative">
                        <img src="${event.poster}" alt="${event.name}" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            ${statusBadge}
                        </div>
                        <div class="absolute top-4 right-4">
                            ${categoryBadge}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-black mb-3 line-clamp-2">${event.name}</h3>
                        <div class="space-y-2 mb-4">
                            <p class="text-gray-600 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                ${formatDate(event.date)}
                            </p>
                            <p class="text-gray-600 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                ${event.location}
                            </p>
                            <p class="text-gray-600 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                Rp ${event.totalPrize.toLocaleString('id-ID')}
                            </p>
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="mb-4">
                            <div class="flex justify-between text-sm font-medium text-gray-600 mb-1">
                                <span>Peserta</span>
                                <span>${event.currentParticipants}/${event.maxParticipants}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-red-600 to-red-700 h-2 rounded-full transition-all duration-300" style="width: ${progressPercentage}%"></div>
                            </div>
                        </div>
                        
                        <div class="flex gap-3">
                            <button onclick="showEventDetail(${event.id})" class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white py-2 px-4 rounded-xl font-bold text-sm transition duration-300">
                                Detail
                            </button>
                            ${event.status === 'open' ? 
                                `<button onclick="registerForEvent(${event.id})" class="flex-1 btn-primary text-white py-2 px-4 rounded-xl font-bold text-sm transition duration-300">
                                    Daftar
                                </button>` :
                                `<button disabled class="flex-1 bg-gray-400 text-white py-2 px-4 rounded-xl font-bold text-sm cursor-not-allowed">
                                    ${event.status === 'closed' ? 'Ditutup' : 'Segera'}
                                </button>`
                            }
                        </div>
                    </div>
                `;
                eventsGrid.appendChild(eventCard);
            });
        }

        // Get status badge
        function getStatusBadge(status) {
            const badges = {
                'open': '<span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-800">Dibuka</span>',
                'soon': '<span class="px-3 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-800">Segera</span>',
                'closed': '<span class="px-3 py-1 text-xs font-bold rounded-full bg-gray-100 text-gray-800">Ditutup</span>'
            };
            return badges[status] || badges['closed'];
        }

        // Get category badge
        function getCategoryBadge(category) {
            const badges = {
                'nasional': '<span class="px-3 py-1 text-xs font-bold rounded-full bg-red-100 text-red-800">Nasional</span>',
                'regional': '<span class="px-3 py-1 text-xs font-bold rounded-full bg-blue-100 text-blue-800">Regional</span>',
                'lokal': '<span class="px-3 py-1 text-xs font-bold rounded-full bg-purple-100 text-purple-800">Lokal</span>'
            };
            return badges[category] || badges['lokal'];
        }

        // Format date
        function formatDate(dateString) {
            const date = new Date(dateString);
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
        }

        // Filter events
        function filterEvents() {
            populateEventsGrid();
        }

        // Reset filters
        function resetFilters() {
            document.getElementById('eventStatusFilter').value = '';
            document.getElementById('eventCategoryFilter').value = '';
            document.getElementById('eventMonthFilter').value = '';
            populateEventsGrid();
        }

        // Show event detail
        function showEventDetail(eventId) {
            const event = events.find(e => e.id === eventId);
            if (!event) return;
            
            const modal = document.getElementById('eventDetailModal');
            const content = document.getElementById('eventDetailContent');
            
            const statusBadge = getStatusBadge(event.status);
            const categoryBadge = getCategoryBadge(event.category);
            const progressPercentage = Math.round((event.currentParticipants / event.maxParticipants) * 100);
            
            content.innerHTML = `
                <div class="p-10">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <h2 class="text-4xl font-black text-black mb-4">${event.name}</h2>
                            <div class="flex gap-3 mb-4">
                                ${statusBadge}
                                ${categoryBadge}
                            </div>
                        </div>
                        <img src="${event.poster}" alt="${event.name}" class="w-32 h-48 object-cover rounded-xl shadow-lg">
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <h3 class="text-2xl font-bold text-black mb-4">Informasi Event</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="font-medium">${formatDate(event.date)}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="font-medium">${event.location}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    <span class="font-medium">Total Hadiah: Rp ${event.totalPrize.toLocaleString('id-ID')}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="font-medium">Batas Pendaftaran: ${formatDate(event.registrationDeadline)}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span class="font-medium">Kontak: ${event.contactPerson}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-2xl font-bold text-black mb-4">Biaya Pendaftaran</h3>
                            <div class="bg-gray-50 rounded-xl p-6 space-y-3">
                                <div class="flex justify-between">
                                    <span class="font-medium">Kontingen:</span>
                                    <span class="font-bold text-red-600">Rp ${event.contingentFee.toLocaleString('id-ID')}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-medium">Per Atlet:</span>
                                    <span class="font-bold text-red-600">Rp ${event.athleteFee.toLocaleString('id-ID')}</span>
                                </div>
                                <hr class="border-gray-300">
                                <div class="text-sm text-gray-600">
                                    <p class="font-medium mb-2">Transfer ke:</p>
                                    <p>${event.bankAccount}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-black mb-4">Deskripsi</h3>
                        <p class="text-gray-600 leading-relaxed">${event.description}</p>
                    </div>
                    
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-black mb-4">Kelas Pertandingan</h3>
                        <div class="grid md:grid-cols-2 gap-3">
                            ${event.classes.map(className => 
                                `<div class="bg-gray-50 rounded-xl p-4 text-center font-medium">${className}</div>`
                            ).join('')}
                        </div>
                    </div>
                    
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-black mb-4">Status Pendaftaran</h3>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <div class="flex justify-between text-lg font-bold text-gray-700 mb-2">
                                <span>Peserta Terdaftar</span>
                                <span>${event.currentParticipants}/${event.maxParticipants}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-red-600 to-red-700 h-3 rounded-full transition-all duration-300" style="width: ${progressPercentage}%"></div>
                            </div>
                        </div>
                    </div>
                    
                    ${event.status === 'open' ? 
                        `<div class="text-center">
                            <button onclick="registerForEvent(${event.id})" class="btn-primary text-white font-bold py-4 px-8 rounded-xl text-lg transition duration-300">
                                Daftar Sekarang
                            </button>
                        </div>` : ''
                    }
                </div>
            `;
            
            modal.classList.add('active');
        }

        // Register for event
        function registerForEvent(eventId) {
            if (!currentUser) {
                alert('Silakan login terlebih dahulu untuk mendaftar!');
                showLoginModal();
                return;
            }

            if (currentUser.type !== 'participant') {
                alert('Hanya peserta yang dapat mendaftar event!');
                return;
            }

            selectedEventId = eventId;
            closeModal();
            showEventSelectionModal('contingent');
        }

        // Populate admin event select
        function populateAdminEventSelect() {
            const select = document.getElementById('adminEventSelect');
            if (!select) return;

            select.innerHTML = '<option value="">Pilih Event</option>';
            events.forEach(event => {
                select.innerHTML += `<option value="${event.id}">${event.name}</option>`;
            });
        }

        // Select event for admin
        function selectEventForAdmin() {
            const select = document.getElementById('adminEventSelect');
            const eventId = parseInt(select.value);
            
            if (!eventId) {
                alert('Pilih event terlebih dahulu!');
                return;
            }

            selectedAdminEventId = eventId;
            
            // Show admin stats and management sections
            document.getElementById('adminStatsSection').style.display = 'grid';
            document.getElementById('adminManagementSection').style.display = 'grid';
            
            // Update stats and lists
            updateAdminStats();
            updateContingentList();
            updateAthleteList();
        }

        // Update admin stats
        function updateAdminStats() {
            if (!selectedAdminEventId) return;
            
            const eventContingents = contingents.filter(c => c.eventId === selectedAdminEventId);
            const eventAthletes = athletes.filter(a => a.eventId === selectedAdminEventId);
            const verifiedContingents = eventContingents.filter(c => c.verified && c.paymentVerified);
            const verifiedAthletes = eventAthletes.filter(a => a.verified && a.paymentVerified);
            const pendingContingents = eventContingents.filter(c => !c.verified || !c.paymentVerified);
            const pendingAthletes = eventAthletes.filter(a => !a.verified || !a.paymentVerified);
            
            document.getElementById('adminTotalContingents').textContent = eventContingents.length;
            document.getElementById('adminTotalAthletes').textContent = eventAthletes.length;
            document.getElementById('adminVerifiedCount').textContent = verifiedContingents.length + verifiedAthletes.length;
            document.getElementById('adminPendingCount').textContent = pendingContingents.length + pendingAthletes.length;
        }

        // Update contingent list
        function updateContingentList() {
            if (!selectedAdminEventId) return;
            
            const contingentListEl = document.getElementById('contingentList');
            const eventContingents = contingents.filter(c => c.eventId === selectedAdminEventId);
            
            if (eventContingents.length === 0) {
                contingentListEl.innerHTML = '<p class="text-gray-500">Belum ada kontingen yang terdaftar.</p>';
                return;
            }
            
            let html = '';
            eventContingents.forEach(contingent => {
                const statusClass = contingent.verified && contingent.paymentVerified ? 'status-verified' : 
                                   contingent.paymentVerified ? 'bg-blue-600' : 'status-pending';
                const statusText = contingent.verified && contingent.paymentVerified ? 'Terverifikasi' : 
                                  contingent.paymentVerified ? 'Pembayaran OK' : 'Menunggu Verifikasi';
                
                html += `
                    <div class="border-2 border-gray-200 rounded-xl p-4 mb-4">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h4 class="text-lg font-bold text-black">${contingent.name}</h4>
                                <p class="text-sm text-gray-600">${contingent.region}</p>
                                <p class="text-sm text-gray-600">Manager: ${contingent.managerName}</p>
                            </div>
                            <span class="px-3 py-1 text-xs font-bold text-white rounded-full ${statusClass}">
                                ${statusText}
                            </span>
                        </div>
                        <div class="flex gap-2">
                            ${!contingent.paymentVerified ? 
                                `<button onclick="verifyPayment('contingent', ${contingent.id})" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-xs font-bold">
                                    Verifikasi Pembayaran
                                </button>` : ''
                            }
                            ${contingent.paymentVerified && !contingent.verified ? 
                                `<button onclick="verifyRegistration('contingent', ${contingent.id})" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-xs font-bold">
                                    Verifikasi Kontingen
                                </button>` : ''
                            }
                            ${contingent.verified && contingent.paymentVerified ? 
                                `<button onclick="rejectRegistration('contingent', ${contingent.id})" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-xs font-bold">
                                    Batalkan Verifikasi
                                </button>` : ''
                            }
                        </div>
                    </div>
                `;
            });
            
            contingentListEl.innerHTML = html;
        }

        // Update athlete list
        function updateAthleteList() {
            if (!selectedAdminEventId) return;
            
            const athleteListEl = document.getElementById('athleteList');
            const eventAthletes = athletes.filter(a => a.eventId === selectedAdminEventId);
            
            if (eventAthletes.length === 0) {
                athleteListEl.innerHTML = '<p class="text-gray-500">Belum ada atlet yang terdaftar.</p>';
                return;
            }
            
            let html = '';
            eventAthletes.forEach(athlete => {
                const statusClass = athlete.verified && athlete.paymentVerified ? 'status-verified' : 
                                   athlete.paymentVerified ? 'bg-blue-600' : 'status-pending';
                const statusText = athlete.verified && athlete.paymentVerified ? 'Terverifikasi' : 
                                  athlete.paymentVerified ? 'Pembayaran OK' : 'Menunggu Verifikasi';
                
                html += `
                    <div class="border-2 border-gray-200 rounded-xl p-4 mb-4">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h4 class="text-lg font-bold text-black">${athlete.name}</h4>
                                <p class="text-sm text-gray-600">${athlete.gender} - ${athlete.age} tahun</p>
                                <p class="text-sm text-gray-600">Kontingen: ${athlete.contingent}</p>
                                <p class="text-sm text-gray-600">Kelas: ${athlete.class}</p>
                            </div>
                            <span class="px-3 py-1 text-xs font-bold text-white rounded-full ${statusClass}">
                                ${statusText}
                            </span>
                        </div>
                        <div class="flex gap-2">
                            ${!athlete.paymentVerified ? 
                                `<button onclick="verifyPayment('athlete', ${athlete.id})" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-xs font-bold">
                                    Verifikasi Pembayaran
                                </button>` : ''
                            }
                            ${athlete.paymentVerified && !athlete.verified ? 
                                `<button onclick="verifyRegistration('athlete', ${athlete.id})" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-xs font-bold">
                                    Verifikasi Atlet
                                </button>` : ''
                            }
                            ${athlete.verified && athlete.paymentVerified ? 
                                `<button onclick="rejectRegistration('athlete', ${athlete.id})" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-xs font-bold">
                                    Batalkan Verifikasi
                                </button>` : ''
                            }
                        </div>
                    </div>
                `;
            });
            
            athleteListEl.innerHTML = html;
        }

        // Verify payment
        function verifyPayment(type, id) {
            if (type === 'contingent') {
                const contingent = contingents.find(c => c.id === id);
                if (contingent) {
                    contingent.paymentVerified = true;
                    contingent.status = 'payment_verified';
                    alert('Pembayaran kontingen berhasil diverifikasi!');
                }
            } else if (type === 'athlete') {
                const athlete = athletes.find(a => a.id === id);
                if (athlete) {
                    athlete.paymentVerified = true;
                    athlete.status = 'payment_verified';
                    alert('Pembayaran atlet berhasil diverifikasi!');
                }
            }
            
            updateAdminStats();
            updateContingentList();
            updateAthleteList();
        }

        // Verify registration
        function verifyRegistration(type, id) {
            if (type === 'contingent') {
                const contingent = contingents.find(c => c.id === id);
                if (contingent) {
                    contingent.verified = true;
                    contingent.status = 'verified';
                    alert('Kontingen berhasil diverifikasi! Peserta sekarang dapat mendaftarkan atlet.');
                }
            } else if (type === 'athlete') {
                const athlete = athletes.find(a => a.id === id);
                if (athlete) {
                    athlete.verified = true;
                    athlete.status = 'verified';
                    alert('Atlet berhasil diverifikasi!');
                }
            }
            
            updateAdminStats();
            updateContingentList();
            updateAthleteList();
        }

        // Reject registration
        function rejectRegistration(type, id) {
            if (!confirm('Apakah Anda yakin ingin membatalkan verifikasi ini?')) {
                return;
            }
            
            if (type === 'contingent') {
                const contingent = contingents.find(c => c.id === id);
                if (contingent) {
                    contingent.verified = false;
                    contingent.paymentVerified = false;
                    contingent.status = 'rejected';
                    alert('Verifikasi kontingen dibatalkan.');
                }
            } else if (type === 'athlete') {
                const athlete = athletes.find(a => a.id === id);
                if (athlete) {
                    athlete.verified = false;
                    athlete.paymentVerified = false;
                    athlete.status = 'rejected';
                    alert('Verifikasi atlet dibatalkan.');
                }
            }
            
            updateAdminStats();
            updateContingentList();
            updateAthleteList();
        }

        // Populate recent events
        function populateRecentEvents() {
            const recentEventsList = document.getElementById('recentEventsList');
            if (!recentEventsList) return;

            let html = '';
            events.slice(0, 3).forEach(event => {
                const statusBadge = getStatusBadge(event.status);
                html += `
                    <div class="border-2 border-gray-200 rounded-xl p-6 mb-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-black mb-2">${event.name}</h3>
                                <p class="text-gray-600 mb-1">📅 ${formatDate(event.date)}</p>
                                <p class="text-gray-600 mb-1">📍 ${event.location}</p>
                                <p class="text-gray-600">👥 ${event.currentParticipants}/${event.maxParticipants} peserta</p>
                            </div>
                            ${statusBadge}
                        </div>
                    </div>
                `;
            });

            if (html === '') {
                html = '<p class="text-gray-500 font-medium">Belum ada event.</p>';
            }

            recentEventsList.innerHTML = html;
        }

        // Populate all events list for super admin
        function populateAllEventsList() {
            const allEventsList = document.getElementById('allEventsList');
            if (!allEventsList) return;

            let html = '';
            events.forEach(event => {
                const statusBadge = getStatusBadge(event.status);
                const categoryBadge = getCategoryBadge(event.category);
                const eventContingents = contingents.filter(c => c.eventId === event.id);
                const eventAthletes = athletes.filter(a => a.eventId === event.id);
                
                html += `
                    <div class="border-2 border-gray-200 rounded-xl p-6 mb-4">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex-1">
                                <div class="flex gap-3 mb-3">
                                    ${statusBadge}
                                    ${categoryBadge}
                                </div>
                                <h3 class="text-2xl font-bold text-black mb-2">${event.name}</h3>
                                <div class="grid md:grid-cols-2 gap-4 text-sm text-gray-600">
                                    <div>
                                        <p class="mb-1">📅 ${formatDate(event.date)}</p>
                                        <p class="mb-1">📍 ${event.location}</p>
                                        <p class="mb-1">📞 ${event.contactPerson}</p>
                                        <p class="mb-1">💰 Total Hadiah: Rp ${event.totalPrize.toLocaleString('id-ID')}</p>
                                        <p class="mb-1">🥋 Jenis: ${event.competitionTypes ? event.competitionTypes.join(', ') : 'Tidak tersedia'}</p>
                                    </div>
                                    <div>
                                        <p class="mb-1">🏆 Kontingen: Rp ${event.contingentFee.toLocaleString('id-ID')}</p>
                                        <p class="mb-1">👤 Atlet: Rp ${event.athleteFee.toLocaleString('id-ID')}</p>
                                        <p class="mb-1">👥 Peserta: ${event.currentParticipants}/${event.maxParticipants}</p>
                                        <p class="mb-1">📊 Kontingen: ${eventContingents.length} | Atlet: ${eventAthletes.length}</p>
                                        <p class="mb-1">⚖️ Gender: ${event.genderTypes ? event.genderTypes.join(', ') : 'Tidak tersedia'}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex gap-3 flex-wrap">
                            <button onclick="editEvent(${event.id})" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl font-bold text-sm">
                                ✏️ Edit
                            </button>
                            <button onclick="viewEventParticipants(${event.id})" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl font-bold text-sm">
                                👥 Peserta
                            </button>
                            <button onclick="exportEventData(${event.id})" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-xl font-bold text-sm">
                                📊 Export
                            </button>
                            <button onclick="deleteEvent(${event.id})" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl font-bold text-sm">
                                🗑️ Hapus
                            </button>
                        </div>
                    </div>
                `;
            });

            if (html === '') {
                html = '<p class="text-gray-500 font-medium text-center py-8">Belum ada event yang dibuat.</p>';
            }

            allEventsList.innerHTML = html;
        }

        // Show create event modal
        function showCreateEventModal() {
            const modal = document.getElementById('createEventModal');
            
            // Reset form
            document.getElementById('createEventForm').reset();
            
            // Reset classes container
            const classesContainer = document.getElementById('classesContainer');
            classesContainer.innerHTML = `
                <div class="flex gap-3 mb-3">
                    <input type="text" name="eventClass" placeholder="Contoh: Putra Dewasa -60kg" class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    <button type="button" onclick="removeClassInput(this)" class="bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl font-bold">
                        Hapus
                    </button>
                </div>
            `;
            
            modal.classList.add('active');
        }

        // Add class input
        function addClassInput() {
            const classesContainer = document.getElementById('classesContainer');
            const newClassDiv = document.createElement('div');
            newClassDiv.className = 'flex gap-3 mb-3';
            newClassDiv.innerHTML = `
                <input type="text" name="eventClass" placeholder="Contoh: Putra Dewasa -60kg" class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                <button type="button" onclick="removeClassInput(this)" class="bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl font-bold">
                    Hapus
                </button>
            `;
            classesContainer.appendChild(newClassDiv);
        }

        // Remove class input
        function removeClassInput(button) {
            const classesContainer = document.getElementById('classesContainer');
            if (classesContainer.children.length > 1) {
                button.parentElement.remove();
            } else {
                alert('Minimal harus ada satu kelas pertandingan!');
            }
        }

        // Add edit class input
        function addEditClassInput() {
            const classesContainer = document.getElementById('editClassesContainer');
            const newClassDiv = document.createElement('div');
            newClassDiv.className = 'flex gap-3 mb-3';
            newClassDiv.innerHTML = `
                <input type="text" name="editEventClass" placeholder="Contoh: Putra Dewasa -60kg" class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                <button type="button" onclick="removeEditClassInput(this)" class="bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl font-bold">
                    Hapus
                </button>
            `;
            classesContainer.appendChild(newClassDiv);
        }

        // Remove edit class input
        function removeEditClassInput(button) {
            const classesContainer = document.getElementById('editClassesContainer');
            if (classesContainer.children.length > 1) {
                button.parentElement.remove();
            } else {
                alert('Minimal harus ada satu kelas pertandingan!');
            }
        }

        // Handle create event form
        document.getElementById('createEventForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get selected competition types
            const competitionCheckboxes = document.querySelectorAll('input[name="competitionTypes"]:checked');
            const competitionTypes = Array.from(competitionCheckboxes).map(cb => cb.value);
            
            if (competitionTypes.length === 0) {
                alert('Pilih minimal satu jenis pertandingan!');
                return;
            }
            
            // Get selected gender types
            const genderCheckboxes = document.querySelectorAll('input[name="genderTypes"]:checked');
            const genderTypes = Array.from(genderCheckboxes).map(cb => cb.value);
            
            if (genderTypes.length === 0) {
                alert('Pilih minimal satu gender peserta!');
                return;
            }
            
            // Get all class inputs
            const classInputs = document.querySelectorAll('input[name="eventClass"]');
            const classes = [];
            classInputs.forEach(input => {
                if (input.value.trim()) {
                    classes.push(input.value.trim());
                }
            });
            
            if (classes.length === 0) {
                alert('Tambahkan minimal satu kelas pertandingan!');
                return;
            }
            
            const newEvent = {
                id: events.length + 1,
                name: document.getElementById('eventName').value,
                date: document.getElementById('eventDate').value,
                location: document.getElementById('eventLocation').value,
                category: document.getElementById('eventCategory').value,
                competitionTypes: competitionTypes,
                genderTypes: genderTypes,
                status: document.getElementById('eventStatus').value,
                registrationDeadline: document.getElementById('eventRegistrationDeadline').value,
                maxParticipants: parseInt(document.getElementById('eventMaxParticipants').value),
                contingentFee: parseInt(document.getElementById('eventContingentFee').value),
                athleteFee: parseInt(document.getElementById('eventAthleteFee').value),
                totalPrize: parseInt(document.getElementById('eventTotalPrize').value),
                bankAccount: document.getElementById('eventBankAccount').value,
                contactPerson: document.getElementById('eventContactPerson').value,
                poster: document.getElementById('eventPoster').value || `https://via.placeholder.com/400x600/dc2626/ffffff?text=${encodeURIComponent(document.getElementById('eventName').value)}`,
                description: document.getElementById('eventDescription').value,
                classes: classes,
                currentParticipants: 0
            };
            
            events.push(newEvent);
            
            closeModal();
            populateAllEventsList();
            populateEventsGrid();
            populateAdminEventSelect();
            
            // Update stats
            document.getElementById('totalEvents').textContent = events.length;
            
            alert('Event berhasil dibuat!');
        });

        // Edit event
        function editEvent(eventId) {
            const event = events.find(e => e.id === eventId);
            if (!event) return;
            
            const modal = document.getElementById('editEventModal');
            
            // Fill form with event data
            document.getElementById('editEventId').value = event.id;
            document.getElementById('editEventName').value = event.name;
            document.getElementById('editEventDate').value = event.date;
            document.getElementById('editEventLocation').value = event.location;
            document.getElementById('editEventCategory').value = event.category;
            document.getElementById('editEventStatus').value = event.status;
            document.getElementById('editEventRegistrationDeadline').value = event.registrationDeadline;
            document.getElementById('editEventMaxParticipants').value = event.maxParticipants;
            document.getElementById('editEventContingentFee').value = event.contingentFee;
            document.getElementById('editEventAthleteFee').value = event.athleteFee;
            document.getElementById('editEventTotalPrize').value = event.totalPrize;
            document.getElementById('editEventBankAccount').value = event.bankAccount;
            document.getElementById('editEventContactPerson').value = event.contactPerson;
            document.getElementById('editEventPoster').value = event.poster;
            document.getElementById('editEventDescription').value = event.description;
            
            // Set competition types checkboxes
            document.getElementById('editCompetitionTanding').checked = false;
            document.getElementById('editCompetitionSeni').checked = false;
            document.getElementById('editCompetitionJurusBaku').checked = false;
            
            if (event.competitionTypes) {
                event.competitionTypes.forEach(type => {
                    if (type === 'TANDING') document.getElementById('editCompetitionTanding').checked = true;
                    if (type === 'SENI') document.getElementById('editCompetitionSeni').checked = true;
                    if (type === 'JURUS BAKU') document.getElementById('editCompetitionJurusBaku').checked = true;
                });
            }
            
            // Set gender types checkboxes
            document.getElementById('editGenderPutra').checked = false;
            document.getElementById('editGenderPutri').checked = false;
            
            if (event.genderTypes) {
                event.genderTypes.forEach(gender => {
                    if (gender === 'Putra') document.getElementById('editGenderPutra').checked = true;
                    if (gender === 'Putri') document.getElementById('editGenderPutri').checked = true;
                });
            }
            
            // Populate classes
            const classesContainer = document.getElementById('editClassesContainer');
            classesContainer.innerHTML = '';
            event.classes.forEach(className => {
                const classDiv = document.createElement('div');
                classDiv.className = 'flex gap-3 mb-3';
                classDiv.innerHTML = `
                    <input type="text" name="editEventClass" value="${className}" class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    <button type="button" onclick="removeEditClassInput(this)" class="bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl font-bold">
                        Hapus
                    </button>
                `;
                classesContainer.appendChild(classDiv);
            });
            
            modal.classList.add('active');
        }

        // Handle edit event form
        document.getElementById('editEventForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const eventId = parseInt(document.getElementById('editEventId').value);
            const eventIndex = events.findIndex(e => e.id === eventId);
            
            if (eventIndex === -1) {
                alert('Event tidak ditemukan!');
                return;
            }
            
            // Get selected competition types
            const editCompetitionCheckboxes = document.querySelectorAll('input[name="editCompetitionTypes"]:checked');
            const competitionTypes = Array.from(editCompetitionCheckboxes).map(cb => cb.value);
            
            if (competitionTypes.length === 0) {
                alert('Pilih minimal satu jenis pertandingan!');
                return;
            }
            
            // Get selected gender types
            const editGenderCheckboxes = document.querySelectorAll('input[name="editGenderTypes"]:checked');
            const genderTypes = Array.from(editGenderCheckboxes).map(cb => cb.value);
            
            if (genderTypes.length === 0) {
                alert('Pilih minimal satu gender peserta!');
                return;
            }
            
            // Get all class inputs
            const classInputs = document.querySelectorAll('input[name="editEventClass"]');
            const classes = [];
            classInputs.forEach(input => {
                if (input.value.trim()) {
                    classes.push(input.value.trim());
                }
            });
            
            if (classes.length === 0) {
                alert('Tambahkan minimal satu kelas pertandingan!');
                return;
            }
            
            // Update event
            events[eventIndex] = {
                ...events[eventIndex],
                name: document.getElementById('editEventName').value,
                date: document.getElementById('editEventDate').value,
                location: document.getElementById('editEventLocation').value,
                category: document.getElementById('editEventCategory').value,
                competitionTypes: competitionTypes,
                genderTypes: genderTypes,
                status: document.getElementById('editEventStatus').value,
                registrationDeadline: document.getElementById('editEventRegistrationDeadline').value,
                maxParticipants: parseInt(document.getElementById('editEventMaxParticipants').value),
                contingentFee: parseInt(document.getElementById('editEventContingentFee').value),
                athleteFee: parseInt(document.getElementById('editEventAthleteFee').value),
                totalPrize: parseInt(document.getElementById('editEventTotalPrize').value),
                bankAccount: document.getElementById('editEventBankAccount').value,
                contactPerson: document.getElementById('editEventContactPerson').value,
                poster: document.getElementById('editEventPoster').value || events[eventIndex].poster,
                description: document.getElementById('editEventDescription').value,
                classes: classes
            };
            
            closeModal();
            populateAllEventsList();
            populateEventsGrid();
            populateAdminEventSelect();
            
            alert('Event berhasil diupdate!');
        });

        // Delete event
        function deleteEvent(eventId) {
            if (!confirm('Apakah Anda yakin ingin menghapus event ini?\n\nSemua data peserta yang terkait akan ikut terhapus!')) {
                return;
            }
            
            // Remove event
            const eventIndex = events.findIndex(e => e.id === eventId);
            if (eventIndex !== -1) {
                events.splice(eventIndex, 1);
                
                // Remove related contingents and athletes
                contingents = contingents.filter(c => c.eventId !== eventId);
                athletes = athletes.filter(a => a.eventId !== eventId);
                
                populateAllEventsList();
                populateEventsGrid();
                populateAdminEventSelect();
                
                // Update stats
                document.getElementById('totalEvents').textContent = events.length;
                
                alert('Event berhasil dihapus!');
            }
        }

        // View event participants
        function viewEventParticipants(eventId) {
            const event = events.find(e => e.id === eventId);
            if (!event) return;
            
            showMyEventParticipantsModal(eventId);
        }

        // Export event data
        function exportEventData(eventId) {
            const event = events.find(e => e.id === eventId);
            if (!event) return;
            
            const eventContingents = contingents.filter(c => c.eventId === eventId);
            const eventAthletes = athletes.filter(a => a.eventId === eventId);
            
            let csvContent = "data:text/csv;charset=utf-8,";
            
            // Event info
            csvContent += "INFORMASI EVENT\n";
            csvContent += `Nama Event,${event.name}\n`;
            csvContent += `Tanggal,${formatDate(event.date)}\n`;
            csvContent += `Lokasi,${event.location}\n`;
            csvContent += `Kategori,${event.category}\n`;
            csvContent += `Status,${event.status}\n`;
            csvContent += `Total Peserta,${event.currentParticipants}\n\n`;
            
            // Contingents
            csvContent += "DATA KONTINGEN\n";
            csvContent += "Nama Kontingen,Daerah,Manager,Telepon,Email,Status\n";
            eventContingents.forEach(contingent => {
                const status = contingent.verified && contingent.paymentVerified ? 'Terverifikasi' : 
                              contingent.paymentVerified ? 'Pembayaran OK' : 'Menunggu Verifikasi';
                csvContent += `${contingent.name},${contingent.region},${contingent.managerName},${contingent.managerPhone},${contingent.managerEmail},${status}\n`;
            });
            
            csvContent += "\nDATA ATLET\n";
            csvContent += "Nama Atlet,Kontingen,Jenis Kelamin,Umur,Berat,Tinggi,Kategori,Kelas,Status\n";
            eventAthletes.forEach(athlete => {
                const status = athlete.verified && athlete.paymentVerified ? 'Terverifikasi' : 
                              athlete.paymentVerified ? 'Pembayaran OK' : 'Menunggu Verifikasi';
                csvContent += `${athlete.name},${athlete.contingent},${athlete.gender},${athlete.age},${athlete.weight},${athlete.height},${athlete.category},${athlete.class},${status}\n`;
            });
            
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", `${event.name.replace(/[^a-z0-9]/gi, '_').toLowerCase()}_data.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            alert('Data event berhasil diexport!');
        }

        // Show all events management
        function showAllEventsManagement() {
            populateAllEventsList();
        }

        // Export all data
        function exportAllData() {
            let csvContent = "data:text/csv;charset=utf-8,";
            
            // Summary
            csvContent += "RINGKASAN SISTEM JAWI\n";
            csvContent += `Total Events,${events.length}\n`;
            csvContent += `Total Kontingen,${contingents.length}\n`;
            csvContent += `Total Atlet,${athletes.length}\n`;
            csvContent += `Total Admin,${admins.length}\n\n`;
            
            // All events
            csvContent += "SEMUA EVENT\n";
            csvContent += "ID,Nama Event,Tanggal,Lokasi,Kategori,Status,Peserta,Max Peserta\n";
            events.forEach(event => {
                csvContent += `${event.id},${event.name},${event.date},${event.location},${event.category},${event.status},${event.currentParticipants},${event.maxParticipants}\n`;
            });
            
            csvContent += "\nSEMUA KONTINGEN\n";
            csvContent += "ID,Event,Nama Kontingen,Daerah,Manager,Status\n";
            contingents.forEach(contingent => {
                const event = events.find(e => e.id === contingent.eventId);
                const status = contingent.verified && contingent.paymentVerified ? 'Terverifikasi' : 
                              contingent.paymentVerified ? 'Pembayaran OK' : 'Menunggu Verifikasi';
                csvContent += `${contingent.id},${event ? event.name : 'Event Tidak Ditemukan'},${contingent.name},${contingent.region},${contingent.managerName},${status}\n`;
            });
            
            csvContent += "\nSEMUA ATLET\n";
            csvContent += "ID,Event,Kontingen,Nama Atlet,Jenis Kelamin,Umur,Kategori,Kelas,Status\n";
            athletes.forEach(athlete => {
                const event = events.find(e => e.id === athlete.eventId);
                const status = athlete.verified && athlete.paymentVerified ? 'Terverifikasi' : 
                              athlete.paymentVerified ? 'Pembayaran OK' : 'Menunggu Verifikasi';
                csvContent += `${athlete.id},${event ? event.name : 'Event Tidak Ditemukan'},${athlete.contingent},${athlete.name},${athlete.gender},${athlete.age},${athlete.category},${athlete.class},${status}\n`;
            });
            
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", `jawi_all_data_${new Date().toISOString().split('T')[0]}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            alert('Semua data berhasil diexport!');
        }

        // Show all participants
        function showAllParticipants() {
            alert('Fitur akan segera hadir! Saat ini Anda dapat melihat peserta per event atau menggunakan fitur export data.');
        }

        // Show payment verification
        function showPaymentVerification() {
            alert('Fitur akan segera hadir! Saat ini verifikasi pembayaran dapat dilakukan melalui dashboard admin per event.');
        }

        // Show system settings
        function showSystemSettings() {
            alert('Fitur pengaturan sistem akan segera hadir!');
        }

        // Show event selection after login
        function showEventSelectionAfterLogin() {
            const modal = document.getElementById('eventSelectionAfterLoginModal');
            const list = document.getElementById('eventSelectionAfterLoginList');

            // Populate events
            let html = '';
            events.filter(e => e.status === 'open').forEach(event => {
                const progressPercentage = Math.round((event.currentParticipants / event.maxParticipants) * 100);
                html += `
                    <div class="border-2 border-gray-200 rounded-xl p-6 hover:border-red-500 cursor-pointer transition duration-300" onclick="selectEventAfterLogin(${event.id})">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-black mb-2">${event.name}</h3>
                                <div class="grid md:grid-cols-2 gap-4 text-sm text-gray-600">
                                    <div>
                                        <p class="mb-1">📅 ${formatDate(event.date)}</p>
                                        <p class="mb-1">📍 ${event.location}</p>
                                        <p class="mb-1">💰 Total Hadiah: Rp ${event.totalPrize.toLocaleString('id-ID')}</p>
                                    </div>
                                    <div>
                                        <p class="mb-1">🏆 Kontingen: Rp ${event.contingentFee.toLocaleString('id-ID')}</p>
                                        <p class="mb-1">👤 Atlet: Rp ${event.athleteFee.toLocaleString('id-ID')}</p>
                                        <p class="mb-1">📞 ${event.contactPerson}</p>
                                    </div>
                                </div>
                            </div>
                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-800 ml-4">Dibuka</span>
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="mb-4">
                            <div class="flex justify-between text-sm font-medium text-gray-600 mb-1">
                                <span>Peserta Terdaftar</span>
                                <span>${event.currentParticipants}/${event.maxParticipants}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-red-600 to-red-700 h-2 rounded-full transition-all duration-300" style="width: ${progressPercentage}%"></div>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <span class="text-red-600 font-bold">Klik untuk memilih event ini</span>
                        </div>
                    </div>
                `;
            });

            if (html === '') {
                html = '<p class="text-gray-500 text-center py-8">Tidak ada event yang tersedia saat ini.</p>';
            }

            list.innerHTML = html;
            modal.classList.add('active');
        }

        // Select event after login
        function selectEventAfterLogin(eventId) {
            selectedEventId = eventId;
            const event = events.find(e => e.id === eventId);
            
            closeModal();
            
            // Show contingent registration directly
            showContingentRegistrationModal(eventId);
        }

        // Skip event selection
        function skipEventSelection() {
            closeModal();
            updateParticipantDashboard();
            showPage('dashboardPage');
        }

        // Show contingent registration
        function showContingentRegistration() {
            if (!selectedEventId) {
                alert('Pilih event terlebih dahulu!');
                showEventSelectionModal('contingent');
                return;
            }
            
            // Check if user already has contingent for this event
            const userContingent = contingents.find(c => c.userId === currentUser.id && c.eventId === selectedEventId);
            if (userContingent) {
                alert('Anda sudah mendaftarkan kontingen untuk event ini!');
                return;
            }
            
            showContingentRegistrationModal(selectedEventId);
        }

        // Show contingent registration modal
        function showContingentRegistrationModal(eventId) {
            const event = events.find(e => e.id === eventId);
            if (!event) return;
            
            const modal = document.getElementById('contingentRegistrationModal');
            
            // Update event info
            document.getElementById('contingentEventName').textContent = `Event: ${event.name}`;
            document.getElementById('contingentFeeDisplay').textContent = `Rp ${event.contingentFee.toLocaleString('id-ID')}`;
            document.getElementById('bankAccountInfo').textContent = event.bankAccount;
            
            // Pre-fill manager data with current user info
            if (currentUser.name) {
                document.getElementById('managerName').value = currentUser.name;
            }
            if (currentUser.email) {
                document.getElementById('managerEmail').value = currentUser.email;
            }
            
            modal.classList.add('active');
        }

        // Handle contingent registration form
        document.getElementById('contingentRegistrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!currentUser || !selectedEventId) {
                alert('Terjadi kesalahan. Silakan login ulang.');
                return;
            }
            
            const contingentData = {
                id: contingents.length + 1,
                userId: currentUser.id,
                eventId: selectedEventId,
                name: document.getElementById('contingentName').value,
                region: document.getElementById('contingentRegion').value,
                managerName: document.getElementById('managerName').value,
                managerPhone: document.getElementById('managerPhone').value,
                managerEmail: document.getElementById('managerEmail').value,
                managerPosition: document.getElementById('managerPosition').value,
                address: document.getElementById('contingentAddress').value,
                registrationDate: new Date().toISOString(),
                verified: false,
                paymentVerified: false,
                status: 'pending'
            };
            
            contingents.push(contingentData);
            
            closeModal();
            updateParticipantDashboard();
            showPage('dashboardPage');
            
            alert('Kontingen berhasil didaftarkan!\n\nSilakan lakukan pembayaran dan tunggu verifikasi dari admin. Setelah kontingen terverifikasi, Anda dapat mendaftarkan atlet.');
        });

        // Show athlete registration
        function showAthleteRegistration() {
            if (!selectedEventId) {
                alert('Pilih event terlebih dahulu!');
                showEventSelectionModal('athlete');
                return;
            }
            
            // Check if user has verified contingent for this event
            const userContingent = contingents.find(c => c.userId === currentUser.id && c.eventId === selectedEventId);
            if (!userContingent) {
                alert('Anda harus mendaftarkan kontingen terlebih dahulu!');
                return;
            }
            
            if (!userContingent.verified || !userContingent.paymentVerified) {
                alert('Kontingen Anda belum terverifikasi oleh admin. Silakan tunggu verifikasi terlebih dahulu sebelum mendaftarkan atlet.');
                return;
            }
            
            showAthleteRegistrationModal(selectedEventId, userContingent);
        }

        // Show athlete registration modal
        function showAthleteRegistrationModal(eventId, contingent) {
            const event = events.find(e => e.id === eventId);
            if (!event) return;
            
            const modal = document.getElementById('athleteRegistrationModal');
            
            // Update event info
            document.getElementById('athleteEventName').textContent = `Event: ${event.name}`;
            document.getElementById('athleteContingentName').textContent = `Kontingen: ${contingent.name}`;
            document.getElementById('athleteFeeDisplay').textContent = `Rp ${event.athleteFee.toLocaleString('id-ID')}`;
            document.getElementById('athleteBankAccountInfo').textContent = event.bankAccount;
            
            // Populate gender options based on event
            const genderSelect = document.getElementById('athleteGender');
            genderSelect.innerHTML = '<option value="">Pilih Jenis Kelamin</option>';
            if (event.genderTypes) {
                event.genderTypes.forEach(gender => {
                    genderSelect.innerHTML += `<option value="${gender}">${gender}</option>`;
                });
            } else {
                // Fallback for old events
                genderSelect.innerHTML += `<option value="Putra">Putra</option>`;
                genderSelect.innerHTML += `<option value="Putri">Putri</option>`;
            }
            
            // Populate classes
            const classSelect = document.getElementById('athleteClass');
            classSelect.innerHTML = '<option value="">Pilih Kelas</option>';
            event.classes.forEach(className => {
                classSelect.innerHTML += `<option value="${className}">${className}</option>`;
            });
            
            modal.classList.add('active');
        }

        // Handle athlete registration form
        document.getElementById('athleteRegistrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!currentUser || !selectedEventId) {
                alert('Terjadi kesalahan. Silakan login ulang.');
                return;
            }
            
            const userContingent = contingents.find(c => c.userId === currentUser.id && c.eventId === selectedEventId);
            if (!userContingent) {
                alert('Kontingen tidak ditemukan!');
                return;
            }
            
            // Calculate age from birth date
            const birthDate = new Date(document.getElementById('athleteBirthDate').value);
            const today = new Date();
            const age = today.getFullYear() - birthDate.getFullYear();
            
            const athleteData = {
                id: athletes.length + 1,
                userId: currentUser.id,
                eventId: selectedEventId,
                contingentId: userContingent.id,
                contingent: userContingent.name,
                name: document.getElementById('athleteName').value,
                gender: document.getElementById('athleteGender').value,
                birthDate: document.getElementById('athleteBirthDate').value,
                age: age,
                weight: parseInt(document.getElementById('athleteWeight').value),
                height: parseInt(document.getElementById('athleteHeight').value),
                category: document.getElementById('athleteCategory').value,
                class: document.getElementById('athleteClass').value,
                address: document.getElementById('athleteAddress').value,
                registrationDate: new Date().toISOString(),
                verified: false,
                paymentVerified: false,
                status: 'pending'
            };
            
            athletes.push(athleteData);
            
            closeModal();
            updateParticipantDashboard();
            showPage('dashboardPage');
            
            alert('Atlet berhasil didaftarkan!\n\nSilakan lakukan pembayaran dan tunggu verifikasi dari admin.');
        });

        // Global variable for athlete form counter
        let athleteFormCounter = 0;

        // Show multiple athlete registration
        function showMultipleAthleteRegistration() {
            if (!selectedEventId) {
                alert('Pilih event terlebih dahulu!');
                showEventSelectionModal('athlete');
                return;
            }
            
            // Check if user has verified contingent for this event
            const userContingent = contingents.find(c => c.userId === currentUser.id && c.eventId === selectedEventId);
            if (!userContingent) {
                alert('Anda harus mendaftarkan kontingen terlebih dahulu!');
                return;
            }
            
            if (!userContingent.verified || !userContingent.paymentVerified) {
                alert('Kontingen Anda belum terverifikasi oleh admin. Silakan tunggu verifikasi terlebih dahulu sebelum mendaftarkan atlet.');
                return;
            }
            
            showMultipleAthleteModal(selectedEventId, userContingent);
        }

        // Show multiple athlete modal
        function showMultipleAthleteModal(eventId, contingent) {
            const event = events.find(e => e.id === eventId);
            if (!event) return;
            
            const modal = document.getElementById('multipleAthleteModal');
            
            // Update event info
            document.getElementById('multipleAthleteEventName').textContent = `Event: ${event.name}`;
            document.getElementById('multipleAthleteContingentName').textContent = `Kontingen: ${contingent.name}`;
            document.getElementById('multipleAthleteFeeDisplay').textContent = `Rp ${event.athleteFee.toLocaleString('id-ID')}`;
            document.getElementById('multipleAthleteBankInfo').textContent = event.bankAccount;
            
            // Reset form counter and container
            athleteFormCounter = 0;
            const container = document.getElementById('athleteFormsContainer');
            container.innerHTML = '';
            
            // Add first athlete form
            addAthleteForm();
            
            modal.classList.add('active');
        }

        // Add athlete form
        function addAthleteForm() {
            const event = events.find(e => e.id === selectedEventId);
            if (!event) return;
            
            athleteFormCounter++;
            const container = document.getElementById('athleteFormsContainer');
            
            const formDiv = document.createElement('div');
            formDiv.className = 'border-2 border-gray-200 rounded-xl p-6 mb-4';
            formDiv.id = `athleteForm${athleteFormCounter}`;
            
            formDiv.innerHTML = `
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg font-bold text-black">Atlet #${athleteFormCounter}</h4>
                    ${athleteFormCounter > 1 ? 
                        `<button type="button" onclick="removeAthleteForm(${athleteFormCounter})" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm font-bold">
                            Hapus
                        </button>` : ''
                    }
                </div>
                
                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-black text-sm font-bold mb-2">Nama Lengkap *</label>
                        <input type="text" name="athleteName${athleteFormCounter}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-2">Jenis Kelamin *</label>
                        <select name="athleteGender${athleteFormCounter}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            ${event.genderTypes ? event.genderTypes.map(gender => `<option value="${gender}">${gender}</option>`).join('') : '<option value="Putra">Putra</option><option value="Putri">Putri</option>'}
                        </select>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-2">Tanggal Lahir *</label>
                        <input type="date" name="athleteBirthDate${athleteFormCounter}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required onchange="updateMultipleAthleteCategory(${athleteFormCounter})">
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-2">Berat Badan (kg) *</label>
                        <input type="number" name="athleteWeight${athleteFormCounter}" min="30" max="150" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-2">Tinggi Badan (cm) *</label>
                        <input type="number" name="athleteHeight${athleteFormCounter}" min="120" max="220" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-2">Kategori Umur *</label>
                        <select name="athleteCategory${athleteFormCounter}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required onchange="updateMultipleAthleteCategory(${athleteFormCounter})">
                            <option value="">Pilih Kategori</option>
                            <option value="Pra Usia Dini">Pra Usia Dini (kurang dari 5 tahun)</option>
                            <option value="Usia Dini 1">Usia Dini 1 (5-8 tahun)</option>
                            <option value="Usia Dini 2">Usia Dini 2 (8-11 tahun)</option>
                            <option value="Pra Remaja">Pra Remaja (11-14 tahun)</option>
                            <option value="Remaja">Remaja (14-17 tahun)</option>
                            <option value="Dewasa">Dewasa (17-35 tahun)</option>
                        </select>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-black text-sm font-bold mb-2">Kelas Pertandingan *</label>
                        <select name="athleteClass${athleteFormCounter}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required>
                            <option value="">Pilih Kelas</option>
                            ${event.classes.map(className => `<option value="${className}">${className}</option>`).join('')}
                        </select>
                    </div>
                    <div>
                        <label class="block text-black text-sm font-bold mb-2">Alamat Lengkap *</label>
                        <textarea name="athleteAddress${athleteFormCounter}" rows="2" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300" required></textarea>
                    </div>
                </div>
            `;
            
            container.appendChild(formDiv);
            updateMultipleAthleteTotal();
        }

        // Remove athlete form
        function removeAthleteForm(formNumber) {
            const form = document.getElementById(`athleteForm${formNumber}`);
            if (form) {
                form.remove();
                updateMultipleAthleteTotal();
            }
        }

        // Update multiple athlete total
        function updateMultipleAthleteTotal() {
            const event = events.find(e => e.id === selectedEventId);
            if (!event) return;
            
            const container = document.getElementById('athleteFormsContainer');
            const athleteForms = container.querySelectorAll('[id^="athleteForm"]');
            const totalAthletes = athleteForms.length;
            const totalFee = totalAthletes * event.athleteFee;
            
            document.getElementById('totalAthletes').textContent = totalAthletes;
            document.getElementById('totalFeeDisplay').textContent = `Rp ${totalFee.toLocaleString('id-ID')}`;
        }

        // Handle multiple athlete form submission
        document.getElementById('multipleAthleteForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!currentUser || !selectedEventId) {
                alert('Terjadi kesalahan. Silakan login ulang.');
                return;
            }
            
            const userContingent = contingents.find(c => c.userId === currentUser.id && c.eventId === selectedEventId);
            if (!userContingent) {
                alert('Kontingen tidak ditemukan!');
                return;
            }
            
            const container = document.getElementById('athleteFormsContainer');
            const athleteForms = container.querySelectorAll('[id^="athleteForm"]');
            
            if (athleteForms.length === 0) {
                alert('Tambahkan minimal satu atlet!');
                return;
            }
            
            let registeredAthletes = 0;
            
            athleteForms.forEach((form, index) => {
                const formData = new FormData(form.querySelector('form') || form);
                const formNumber = form.id.replace('athleteForm', '');
                
                // Get form values
                const name = form.querySelector(`[name="athleteName${formNumber}"]`).value;
                const gender = form.querySelector(`[name="athleteGender${formNumber}"]`).value;
                const birthDate = form.querySelector(`[name="athleteBirthDate${formNumber}"]`).value;
                const weight = form.querySelector(`[name="athleteWeight${formNumber}"]`).value;
                const height = form.querySelector(`[name="athleteHeight${formNumber}"]`).value;
                const category = form.querySelector(`[name="athleteCategory${formNumber}"]`).value;
                const athleteClass = form.querySelector(`[name="athleteClass${formNumber}"]`).value;
                const address = form.querySelector(`[name="athleteAddress${formNumber}"]`).value;
                
                // Validate required fields
                if (!name || !gender || !birthDate || !weight || !height || !category || !athleteClass || !address) {
                    alert(`Lengkapi semua data untuk Atlet #${formNumber}!`);
                    return;
                }
                
                // Calculate age
                const birthDateObj = new Date(birthDate);
                const today = new Date();
                const age = today.getFullYear() - birthDateObj.getFullYear();
                
                const athleteData = {
                    id: athletes.length + 1,
                    userId: currentUser.id,
                    eventId: selectedEventId,
                    contingentId: userContingent.id,
                    contingent: userContingent.name,
                    name: name,
                    gender: gender,
                    birthDate: birthDate,
                    age: age,
                    weight: parseInt(weight),
                    height: parseInt(height),
                    category: category,
                    class: athleteClass,
                    address: address,
                    registrationDate: new Date().toISOString(),
                    verified: false,
                    paymentVerified: false,
                    status: 'pending'
                };
                
                athletes.push(athleteData);
                registeredAthletes++;
            });
            
            closeModal();
            updateParticipantDashboard();
            showPage('dashboardPage');
            
            alert(`${registeredAthletes} atlet berhasil didaftarkan!\n\nSilakan lakukan pembayaran total dan tunggu verifikasi dari admin.`);
        });

        // Show my event participants
        function showMyEventParticipants() {
            if (!currentUser) {
                alert('Silakan login terlebih dahulu!');
                return;
            }
            
            // Get user's registered events
            const userContingents = contingents.filter(c => c.userId === currentUser.id);
            
            if (userContingents.length === 0) {
                alert('Anda belum mendaftarkan kontingen di event manapun!');
                return;
            }
            
            // If user has only one event, show it directly
            if (userContingents.length === 1) {
                const eventId = userContingents[0].eventId;
                showMyEventParticipantsModal(eventId);
                return;
            }
            
            // If user has multiple events, show selection
            showMyEventSelectionModal();
        }

        // Show my event selection modal
        function showMyEventSelectionModal() {
            const modal = document.getElementById('eventSelectionModal');
            const title = document.getElementById('eventSelectionTitle');
            const desc = document.getElementById('eventSelectionDesc');
            const list = document.getElementById('eventSelectionList');
            
            title.textContent = 'Pilih Event';
            desc.textContent = 'Pilih event untuk melihat daftar peserta';
            
            // Get user's registered events
            const userContingents = contingents.filter(c => c.userId === currentUser.id);
            const userEventIds = userContingents.map(c => c.eventId);
            const userEvents = events.filter(e => userEventIds.includes(e.id));
            
            let html = '';
            userEvents.forEach(event => {
                html += `
                    <div class="border-2 border-gray-200 rounded-xl p-6 hover:border-red-500 cursor-pointer transition duration-300" onclick="showMyEventParticipantsModal(${event.id})">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-black mb-2">${event.name}</h3>
                                <p class="text-gray-600 mb-1">📅 ${formatDate(event.date)}</p>
                                <p class="text-gray-600">📍 ${event.location}</p>
                            </div>
                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-blue-100 text-blue-800">Terdaftar</span>
                        </div>
                    </div>
                `;
            });
            
            list.innerHTML = html;
            modal.classList.add('active');
        }

        // Show my event participants modal
        function showMyEventParticipantsModal(eventId) {
            const event = events.find(e => e.id === eventId);
            if (!event) return;
            
            closeModal(); // Close any existing modal
            
            const modal = document.getElementById('myEventParticipantsModal');
            document.getElementById('participantsEventName').textContent = `Event: ${event.name}`;
            
            // Show contingents tab by default
            showParticipantTab('contingents');
            
            modal.classList.add('active');
        }

        // Update athlete category based on birth date
        function updateAthleteCategory() {
            const birthDateInput = document.getElementById('athleteBirthDate');
            const categorySelect = document.getElementById('athleteCategory');
            
            if (!birthDateInput.value) return;
            
            const birthDate = new Date(birthDateInput.value);
            const today = new Date();
            const age = today.getFullYear() - birthDate.getFullYear();
            
            // Clear previous selection
            categorySelect.value = '';
            
            // Auto-select category based on age
            if (age < 5) {
                categorySelect.value = 'Pra Usia Dini';
            } else if (age >= 5 && age <= 8) {
                categorySelect.value = 'Usia Dini 1';
            } else if (age > 8 && age <= 11) {
                categorySelect.value = 'Usia Dini 2';
            } else if (age > 11 && age <= 14) {
                categorySelect.value = 'Pra Remaja';
            } else if (age > 14 && age <= 17) {
                categorySelect.value = 'Remaja';
            } else if (age > 17 && age <= 35) {
                categorySelect.value = 'Dewasa';
            }
            
            // Disable other options that don't match the age
            const options = categorySelect.querySelectorAll('option');
            options.forEach(option => {
                if (option.value === '' || option.value === categorySelect.value) {
                    option.disabled = false;
                    option.style.color = '';
                } else {
                    option.disabled = true;
                    option.style.color = '#ccc';
                }
            });
        }

        // Update multiple athlete category based on birth date
        function updateMultipleAthleteCategory(formNumber) {
            const birthDateInput = document.querySelector(`[name="athleteBirthDate${formNumber}"]`);
            const categorySelect = document.querySelector(`[name="athleteCategory${formNumber}"]`);
            
            if (!birthDateInput.value) return;
            
            const birthDate = new Date(birthDateInput.value);
            const today = new Date();
            const age = today.getFullYear() - birthDate.getFullYear();
            
            // Clear previous selection
            categorySelect.value = '';
            
            // Auto-select category based on age
            if (age < 5) {
                categorySelect.value = 'Pra Usia Dini';
            } else if (age >= 5 && age <= 8) {
                categorySelect.value = 'Usia Dini 1';
            } else if (age > 8 && age <= 11) {
                categorySelect.value = 'Usia Dini 2';
            } else if (age > 11 && age <= 14) {
                categorySelect.value = 'Pra Remaja';
            } else if (age > 14 && age <= 17) {
                categorySelect.value = 'Remaja';
            } else if (age > 17 && age <= 35) {
                categorySelect.value = 'Dewasa';
            }
            
            // Disable other options that don't match the age
            const options = categorySelect.querySelectorAll('option');
            options.forEach(option => {
                if (option.value === '' || option.value === categorySelect.value) {
                    option.disabled = false;
                    option.style.color = '';
                } else {
                    option.disabled = true;
                    option.style.color = '#ccc';
                }
            });
        }

        // Show participant tab
        function showParticipantTab(tab) {
            const contingentsTab = document.getElementById('contingentsTab');
            const athletesTab = document.getElementById('athletesTab');
            const content = document.getElementById('participantsContent');
            
            // Update tab styles
            if (tab === 'contingents') {
                contingentsTab.className = 'px-6 py-3 rounded-xl font-bold transition duration-300 bg-red-600 text-white';
                athletesTab.className = 'px-6 py-3 rounded-xl font-bold transition duration-300 bg-gray-300 text-gray-700 hover:bg-gray-400';
                showContingentsParticipants();
            } else {
                contingentsTab.className = 'px-6 py-3 rounded-xl font-bold transition duration-300 bg-gray-300 text-gray-700 hover:bg-gray-400';
                athletesTab.className = 'px-6 py-3 rounded-xl font-bold transition duration-300 bg-red-600 text-white';
                showAthletesParticipants();
            }
        }

        // Show contingents participants
        function showContingentsParticipants() {
            const content = document.getElementById('participantsContent');
            const eventName = document.getElementById('participantsEventName').textContent.replace('Event: ', '');
            const event = events.find(e => e.name === eventName);
            
            if (!event) return;
            
            const eventContingents = contingents.filter(c => c.eventId === event.id);
            
            let html = '<div class="grid md:grid-cols-2 gap-6">';
            
            if (eventContingents.length === 0) {
                html += '<div class="col-span-2 text-center py-8"><p class="text-gray-500">Belum ada kontingen yang terdaftar.</p></div>';
            } else {
                eventContingents.forEach(contingent => {
                    const statusClass = contingent.verified && contingent.paymentVerified ? 'bg-green-600' : 
                                       contingent.paymentVerified ? 'bg-blue-600' : 'bg-yellow-600';
                    const statusText = contingent.verified && contingent.paymentVerified ? 'Terverifikasi' : 
                                      contingent.paymentVerified ? 'Pembayaran OK' : 'Menunggu Verifikasi';
                    
                    html += `
                        <div class="bg-white border-2 border-gray-200 rounded-xl p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-black mb-2">${contingent.name}</h3>
                                    <p class="text-gray-600 mb-1">📍 ${contingent.region}</p>
                                    <p class="text-gray-600 mb-1">👤 Manager: ${contingent.managerName}</p>
                                    <p class="text-gray-600 mb-1">📞 ${contingent.managerPhone}</p>
                                    <p class="text-gray-600">✉️ ${contingent.managerEmail}</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-bold text-white rounded-full ${statusClass}">
                                    ${statusText}
                                </span>
                            </div>
                        </div>
                    `;
                });
            }
            
            html += '</div>';
            content.innerHTML = html;
        }

        // Show athletes participants
        function showAthletesParticipants() {
            const content = document.getElementById('participantsContent');
            const eventName = document.getElementById('participantsEventName').textContent.replace('Event: ', '');
            const event = events.find(e => e.name === eventName);
            
            if (!event) return;
            
            const eventAthletes = athletes.filter(a => a.eventId === event.id);
            
            let html = '<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">';
            
            if (eventAthletes.length === 0) {
                html += '<div class="col-span-3 text-center py-8"><p class="text-gray-500">Belum ada atlet yang terdaftar.</p></div>';
            } else {
                eventAthletes.forEach(athlete => {
                    const statusClass = athlete.verified && athlete.paymentVerified ? 'bg-green-600' : 
                                       athlete.paymentVerified ? 'bg-blue-600' : 'bg-yellow-600';
                    const statusText = athlete.verified && athlete.paymentVerified ? 'Terverifikasi' : 
                                      athlete.paymentVerified ? 'Pembayaran OK' : 'Menunggu Verifikasi';
                    
                    html += `
                        <div class="bg-white border-2 border-gray-200 rounded-xl p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-black mb-2">${athlete.name}</h3>
                                    <p class="text-sm text-gray-600 mb-1">🏆 Kontingen: ${athlete.contingent}</p>
                                    <p class="text-sm text-gray-600 mb-1">⚖️ ${athlete.gender} - ${athlete.age} tahun</p>
                                    <p class="text-sm text-gray-600 mb-1">📏 ${athlete.height}cm / ${athlete.weight}kg</p>
                                    <p class="text-sm text-gray-600 mb-1">🥋 ${athlete.category}</p>
                                    <p class="text-sm text-gray-600">🏅 ${athlete.class}</p>
                                </div>
                                <span class="px-2 py-1 text-xs font-bold text-white rounded-full ${statusClass}">
                                    ${statusText}
                                </span>
                            </div>
                        </div>
                    `;
                });
            }
            
            html += '</div>';
            content.innerHTML = html;
        }
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96db95b640c2fdeb',t:'MTc1NDk1NTY5OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
