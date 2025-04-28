<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .quote-container {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            overflow: hidden;
            position: relative;
            height: 300px;
        }
        
        .quote-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .quotes-wrapper {
            position: relative;
            height: 250px;
            overflow: hidden;
        }
        
        .quote-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
            padding: 0.75rem;
            border-radius: 0.375rem;
            background-color: #f9f9f9;
            position: absolute;
            width: calc(100% - 1.5rem);
            animation: moveUpLoop 20s infinite linear;
            opacity: 0;
        }
        
        .quote-icon {
            background-color: #f3f4f6;
            border-radius: 50%;
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            flex-shrink: 0;
        }

        .quote-text {
            font-style: italic;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }
        
        /* .quote-author {
            font-size: 0.75rem;
            color: #6b7280;
        } */
        
        @keyframes moveUpLoop {
            0% {
                transform: translateY(300px);
                opacity: 0;
            }
            5% {
                transform: translateY(240px);
                opacity: 1;
            }
            20% {
                transform: translateY(180px);
                opacity: 1;
            }
            35% {
                transform: translateY(120px);
                opacity: 1;
            }
            50% {
                transform: translateY(60px);
                opacity: 1;
            }
            65% {
                transform: translateY(0);
                opacity: 1;
            }
            80% {
                transform: translateY(-60px);
                opacity: 1;
            }
            95% {
                transform: translateY(-120px);
                opacity: 0;
            }
            100% {
                transform: translateY(-180px);
                opacity: 0;
            }
        }
        
        .quote-item:nth-child(1) {
            animation-delay: 0s;
        }
        
        .quote-item:nth-child(2) {
            animation-delay: 4s;
        }
        
        .quote-item:nth-child(3) {
            animation-delay: 8s;
        }
        
        .quote-item:nth-child(4) {
            animation-delay: 12s;
        }
        
        .quote-item:nth-child(5) {
            animation-delay: 16s;
        }
        
        /* Improved Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: -280px; /* Start off-screen */
            width: 280px;
            height: 100vh;
            background: #2c3e50;
            color: #ecf0f1;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 3px 0 10px rgba(0,0,0,0.2);
            overflow-y: auto;
        }

        .sidebar.active {
            left: 0; /* Move into view when active */
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem;
            border-bottom: 1px solid #34495e;
        }

        .sidebar-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0;
        }

        .close-sidebar {
            background: none;
            border: none;
            color: #ecf0f1;
            cursor: pointer;
            font-size: 1.25rem;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-menu-item {
            padding: 0.75rem 1.25rem;
            display: flex;
            align-items: center;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .sidebar-menu-item:hover {
            background-color: #34495e;
        }

        .sidebar-menu-item i {
            margin-right: 0.75rem;
            width: 1.25rem;
            text-align: center;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
            transition: all 0.3s ease;
        }

        .overlay.active {
            display: block;
        }

        /* Adjust main content when sidebar is open */
        .content-wrapper {
            transition: margin-left 0.3s ease;
        }

        .content-wrapper.shifted {
            margin-left: 280px;
        }
        
        /* Search input styles */
        .search-input {
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            padding-left: 2.5rem;
            width: 250px;
            background-color: white;
            transition: all 0.2s;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }
        
        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }
        
        .search-container {
            position: relative;
        }
    </style>
</head>

<body class="bg-blue-100">
    <!-- Overlay for sidebar -->
    <div class="overlay" id="overlay"></div>

    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="flex-1 p-6">
        <!-- Ini isi konten utama -->
        @yield('content')
    </div>
    
    <div class="content-wrapper" id="content-wrapper">
        <div class="container mx-auto p-6">
            <!-- Header - Redesigned with hamburger on left, title center, search on right -->
            
            @include('components.navbar')
            @yield('content')
            

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <a href="{{ route('users.index') }}" >
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center mb-2 cursor-pointer">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>Total Users</div>
                    </div>
                    <div class="text-3xl font-bold">{{ number_format($totalUsers) }}</div>
                </div>
                </a>

                <a href="{{ route('quotes.index') }}" >
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center mb-2 cursor-pointer">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>Quotes</div>
                    </div>
                    <div class="text-3xl font-bold">{{ number_format($totalQuotes) }}</div>
                </div>
                </a>

                <a  href="{{ route('moods.index') }}">
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center mb-2">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div>Bounce Rate</div>
                    </div>
                    <div class="text-3xl font-bold">27.5%</div>
                </div>
            </a>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center mb-2">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>Revenue</div>
                    </div>
                    <div class="text-3xl font-bold">$45,678</div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-8">
                <!-- Line Chart -->
                <div class="bg-white rounded-lg shadow p-6 col-span-2">
                    <h2 class="text-lg font-semibold mb-4">Overview</h2>
                    <canvas id="lineChart" width="400" height="200"></canvas>
                </div>

                <!-- Quotes -->
                <div class="quote-container">
                    <h2 class="quote-title">Inspirational Quotes</h2>
                    <div class="quotes-wrapper">
                        @foreach($quotes as $index => $quote)
                            <div class="quote-item" style="animation-delay: {{ $index * 4 }}s;">
                                <div class="quote-icon">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" ...></svg>
                                </div>
                                <div>
                                    <p class="quote-text">"{{ $quote->quote }}"</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('javascript/script.js')}}"></script>
</body>
</html>