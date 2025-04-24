<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel - Threads Style</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700&display=swap" rel="stylesheet" />
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: #fafafa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Header styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .logo {
            height: 40px;
            width: auto;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            margin-left: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            background-color: #f0f0f0;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: #e0e0e0;
        }

        /* Threads-style layout */
        .threads-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .left-column {
            background-color: #e0e0e0;
            border-radius: 12px;
            box-shadow: 4px 4px 0 rgba(0, 0, 0, 0.1);
            height: calc(100vh - 150px);
            overflow: hidden;
            position: relative;
        }

        .right-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            background-color: #e0e0e0;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 4px 4px 0 rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: calc((100vh - 150px - 40px) / 3);
            display: flex;
            align-items: center;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-content {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .icon-container {
            background-color: #f8f8f8;
            border-radius: 12px;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon {
            width: 30px;
            height: 30px;
            color: #FF2D20;
        }

        h2 {
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .card-text {
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .accent-text {
            color: #FF2D20;
            font-weight: 500;
        }

        /* Quote box for the left column - ENHANCED */
        .quote-box {
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
            perspective: 1000px;
        }

        .quote-scroll {
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 20px;
            padding-bottom: 70px; /* Space for add button */
            position: relative;
            height: 100%;
            overflow-y: auto; /* Changed to auto for better control */
            overflow-x: hidden;
            /* Hide scrollbar for Chrome, Safari and Opera */
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .quote-scroll::-webkit-scrollbar {
            display: none;
        }

        .quote-card {
            background-color: #f8f8f8;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            transform-origin: center left;
            opacity: 0.9;
            cursor: pointer;
            border-left: 4px solid transparent;
            will-change: transform, box-shadow, opacity;
        }

        .quote-card:hover {
            transform: scale(1.03) translateX(3px);
            box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.15);
            background-color: white;
            z-index: 2;
            opacity: 1;
        }

        /* Add button styles - ENHANCED */
        .add-quote-btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 56px;
            height: 56px;
            background-color: #FF2D20;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            cursor: pointer;
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 10;
            border: none;
        }

        .add-quote-btn:hover {
            transform: translateY(-5px) rotate(90deg);
            box-shadow: 5px 8px 12px rgba(0, 0, 0, 0.2);
        }

        .add-quote-btn:active {
            transform: translateY(0) scale(0.95);
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        /* Quote modal styles - ENHANCED */
        .quote-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 20;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 16px;
            width: 90%;
            max-width: 550px;
            box-shadow: 8px 8px 0 rgba(255, 45, 32, 0.2);
            animation: modalFadeIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-left: 5px solid #FF2D20;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-40px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.8rem;
            cursor: pointer;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .close-modal:hover {
            transform: rotate(90deg);
            background-color: #f0f0f0;
        }

        .quote-input {
            width: 100%;
            padding: 1.2rem;
            margin-bottom: 1.5rem;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-family: 'Space Grotesk', sans-serif;
            resize: vertical;
            min-height: 120px;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .quote-input:focus {
            outline: none;
            border-color: #FF2D20;
            box-shadow: 0 0 0 4px rgba(255, 45, 32, 0.2);
        }

        .submit-quote {
            background-color: #FF2D20;
            color: white;
            border: none;
            padding: 0.9rem 1.8rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 4px 4px 0 rgba(0, 0, 0, 0.15);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .submit-quote:hover {
            transform: translateY(-5px);
            box-shadow: 6px 8px 0 rgba(0, 0, 0, 0.15);
        }

        .submit-quote:active {
            transform: translateY(0);
            box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.15);
        }

        /* Footer styles */
        footer {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.8rem;
            color: #666;
        }

        /* Animation classes - ENHANCED */
        .quote-card.new-quote {
            animation: newQuote 1s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes newQuote {
            0% {
                background-color: #FF2D20;
                color: white;
                transform: translateX(-100%) scale(0.9);
                opacity: 0;
            }
            40% {
                background-color: #FF2D20;
                color: white;
                transform: translateX(5%) scale(1.02);
            }
            60% {
                background-color: #FF2D20;
                color: white;
            }
            100% {
                background-color: #f8f8f8;
                color: #333;
                transform: translateX(0) scale(1);
                opacity: 1;
            }
        }

        /* 3D tilt effect for cards */
        .quote-card-wrapper {
            transform-style: preserve-3d;
            transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        /* Highlight effect */
        .quote-highlight {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.25) 0%, rgba(255,255,255,0) 50%);
            border-radius: 8px;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .quote-card:hover .quote-highlight {
            opacity: 1;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .threads-layout {
                grid-template-columns: 1fr;
            }
            
            .left-column, .card {
                height: auto;
            }
            
            .left-column {
                min-height: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo-container">
                <svg class="logo" viewBox="0 0 62 65" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8378 24.5145 63.8114 24.4684 63.7802L0.508455 49.9873C0.199313 49.8078 0.00982153 49.4788 0.00982153 49.1222V14.8858C0.00982153 14.7978 0.0214991 14.7102 0.0445133 14.6253C0.0675275 14.5404 0.103434 14.4601 0.150485 14.3882L11.6288 0.595278C11.781 0.361767 12.0156 0.19411 12.2865 0.114791C12.5573 0.0354719 12.8481 0.0499857 13.1155 0.156072L24.5938 4.95929C24.7788 5.03517 24.9445 5.15689 25.0721 5.31211C25.1996 5.46733 25.2842 5.6503 25.3172 5.84562L25.4519 6.66406V19.7627C25.4519 20.1192 25.6414 20.4482 25.9505 20.6277L37.4288 27.2363V14.1377C37.4288 13.7811 37.6183 13.4521 37.9274 13.2726L49.4057 6.66406L49.5366 5.84562C49.5696 5.6503 49.6542 5.46733 49.7817 5.31211C49.9093 5.15689 50.075 5.03517 50.26 4.95929L61.7383 0.156072C62.0057 0.0499857 62.2965 0.0354719 62.5673 0.114791C62.8382 0.19411 63.0728 0.361767 63.225 0.595278L61.8548 14.6253ZM50.4881 29.4986L38.995 36.1072L25.4519 43.2233V30.1247L37.4288 23.0086V36.1072L49.9104 29.0487L50.4881 29.4986ZM49.3909 14.8858L38.995 20.8088L27.5991 14.8858L38.995 8.96275L49.3909 14.8858ZM24.4684 7.26329L13.0726 13.1863L1.67676 7.26329L13.0726 1.34025L24.4684 7.26329ZM1.11931 14.8858L12.5151 20.8088L23.911 14.8858L12.5151 8.96275L1.11931 14.8858ZM12.5151 43.2233L14.0033 42.3202L24.4684 36.1072V23.0086L12.5151 30.1247V43.2233ZM38.4123 43.2233L48.8774 37.0103V23.9117L37.4288 30.1247V43.2233H38.4123Z"/></svg>
            </div>
            
            <nav>
                <a href="#" class="nav-link">Admin</a>
            </nav>
        </header>

        <div class="threads-layout">
            <!-- Left column (larger) -->
            <div class="left-column">
                <div class="quote-box">
                    <div class="quote-scroll" id="quoteContainer">
                        <!-- Quote cards will be generated dynamically -->
                    </div>
                    <!-- Add Quote Button -->
                    <button class="add-quote-btn" id="addQuoteBtn">+</button>
                </div>
            </div>
            
            <!-- Right column (three stacked cards) -->
            <div class="right-column">
                <div class="card">
                    <div class="card-content">
                        <div class="icon-container">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path fill="currentColor" d="M23 4a1 1 0 0 0-1.447-.894L12.224 7.77a.5.5 0 0 1-.448 0L2.447 3.106A1 1 0 0 0 1 4v13.382a1.99 1.99 0 0 0 1.105 1.79l9.448 4.728c.14.065.293.1.447.1.154-.005.306-.04.447-.105l9.453-4.724a1.99 1.99 0 0 0 1.1-1.789V4ZM3 6.023a.25.25 0 0 1 .362-.223l7.5 3.75a.251.251 0 0 1 .138.223v11.2a.25.25 0 0 1-.362.224l-7.5-3.75a.25.25 0 0 1-.138-.22V6.023Zm18 11.2a.25.25 0 0 1-.138.224l-7.5 3.75a.249.249 0 0 1-.329-.099.249.249 0 0 1-.033-.12V9.772a.251.251 0 0 1 .138-.224l7.5-3.75a.25.25 0 0 1 .362.224v11.2Z"/><path fill="currentColor" d="m3.55 1.893 8 4.048a1.008 1.008 0 0 0 .9 0l8-4.048a1 1 0 0 0-.9-1.785l-7.322 3.706a.506.506 0 0 1-.452 0L4.454.108a1 1 0 0 0-.9 1.785H3.55Z"/></svg>
                        </div>
                        <div class="text-container">
                            <h2>Documentation</h2>
                            <p class="card-text">
                                Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-content">
                        <div class="icon-container">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="currentColor"><path d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z"/></g></svg>
                        </div>
                        <div class="text-container">
                            <h2>Laracasts</h2>
                            <p class="card-text">
                                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-content">
                        <div class="icon-container">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="currentColor"><path d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z"/><path d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z"/><path d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z"/></g></svg>
                        </div>
                        <div class="text-container">
                            <h2>Laravel News</h2>
                            <p class="card-text">
                                Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </div>

    <!-- Quote Modal -->
    <div class="quote-modal" id="quoteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add a New Quote</h2>
                <button class="close-modal" id="closeModal">&times;</button>
            </div>
            <textarea class="quote-input" id="quoteInput" placeholder="Enter your quote here..."></textarea>
            <button class="submit-quote" id="submitQuote">Add Quote</button>
        </div>
    </div>

    <script>
        // Get DOM elements
        const addQuoteBtn = document.getElementById('addQuoteBtn');
        const quoteModal = document.getElementById('quoteModal');
        const closeModal = document.getElementById('closeModal');
        const quoteInput = document.getElementById('quoteInput');
        const submitQuote = document.getElementById('submitQuote');
        const quoteContainer = document.getElementById('quoteContainer');

        // Initial quotes data
        const initialQuotes = [
            "Ketekunan adalah kunci kesuksesan.",
            "Laravel memudahkan developer membangun aplikasi modern.",
            "Konsistensi lebih penting daripada motivasi sementara.",
            "Jangan takut untuk mencoba hal baru dalam pengembangan.",
            "Clean code adalah kode yang mudah dibaca oleh manusia.",
            "Belajar dari kesalahan adalah bagian dari proses pengembangan.",
            "Framework Laravel mempercepat pengembangan web secara signifikan.",
            "Debugging adalah seni menemukan dan memperbaiki kesalahan.",
            "Refactoring kode adalah investasi untuk masa depan."
        ];

        // IntersectionObserver for quote animations
        const observerOptions = {
            root: quoteContainer,
            rootMargin: '0px',
            threshold: 0.1
        };

        const quoteObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = `translateX(0) rotate(${entry.target.dataset.rotation}deg)`;
                } else {
                    entry.target.style.opacity = '0.5';
                    entry.target.style.transform = `translateX(-10px) rotate(${entry.target.dataset.rotation}deg)`;
                }
            });
        }, observerOptions);

        // Enhanced smooth scrolling with smooth animations
        class EnhancedSmoothScroll {
            constructor(element, speed = 0.5, pauseDuration = 2000) {
                this.container = element;
                this.scrollSpeed = speed;
                this.pauseDuration = pauseDuration; // Pause duration in ms at each position
                this.scrollHeight = element.scrollHeight;
                this.containerHeight = element.clientHeight;
                this.isPaused = false;
                this.userPaused = false;
                this.lastTimestamp = 0;
                this.scrollPosition = 0;
                this.isScrolling = false;
                this.pauseTimer = null;
                this.pauseAt = 0;
                this.setupEventListeners();
                this.isScrollingDown = true; // Direction control
                this.setupScrollTriggers();
            }

            setupEventListeners() {
                // Pause on mouse enter
                this.container.addEventListener('mouseenter', () => {
                    this.userPaused = true;
                });

                // Resume on mouse leave
                this.container.addEventListener('mouseleave', () => {
                    this.userPaused = false;
                });

                // Handle window resize
                window.addEventListener('resize', () => {
                    this.scrollHeight = this.container.scrollHeight;
                    this.containerHeight = this.container.clientHeight;
                });
            }

            setupScrollTriggers() {
                // Create indicator elements for scroll trigger points
                const topTrigger = document.createElement('div');
                topTrigger.classList.add('scroll-trigger', 'top-trigger');
                topTrigger.style.position = 'absolute';
                topTrigger.style.top = '20px';
                topTrigger.style.left = '0';
                topTrigger.style.width = '100%';
                topTrigger.style.height = '5px';
                topTrigger.style.zIndex = '-1';
                this.container.appendChild(topTrigger);

                const bottomTrigger = document.createElement('div');
                bottomTrigger.classList.add('scroll-trigger', 'bottom-trigger');
                bottomTrigger.style.position = 'absolute';
                bottomTrigger.style.bottom = '20px';
                bottomTrigger.style.left = '0';
                bottomTrigger.style.width = '100%';
                bottomTrigger.style.height = '5px';
                bottomTrigger.style.zIndex = '-1';
                this.container.appendChild(bottomTrigger);
            }

            start() {
                if (!this.isScrolling) {
                    this.isScrolling = true;
                    requestAnimationFrame(this.scroll.bind(this));
                }
            }

            stop() {
                this.isScrolling = false;
                if (this.pauseTimer) {
                    clearTimeout(this.pauseTimer);
                    this.pauseTimer = null;
                }
            }

            scroll(timestamp) {
                if (!this.isScrolling) return;
                if (!this.lastTimestamp) this.lastTimestamp = timestamp;

                // Don't scroll if user manually paused or system pause is active
                if (this.userPaused || this.isPaused) {
                    this.lastTimestamp = timestamp;
                    requestAnimationFrame(this.scroll.bind(this));
                    return;
                }

                const elapsed = timestamp - this.lastTimestamp;
                const maxScroll = this.scrollHeight - this.containerHeight;

                // Direction logic: change direction at boundaries
                if (this.scrollPosition >= maxScroll - 5) {
                    this.isScrollingDown = false;
                    this.pauseAndContinue();
                } else if (this.scrollPosition <= 5) {
                    this.isScrollingDown = true;
                    this.pauseAndContinue();
                }
                
                // Calculate new position based on direction
                const delta = elapsed * this.scrollSpeed * (this.isScrollingDown ? 0.06 : -0.06);
                this.scrollPosition = Math.max(0, Math.min(maxScroll, this.scrollPosition + delta));
                
                // Apply the scroll position
                this.container.scrollTop = this.scrollPosition;
                this.lastTimestamp = timestamp;
                
                requestAnimationFrame(this.scroll.bind(this));
            }

            pauseAndContinue() {
                if (!this.isPaused) {
                    this.isPaused = true;
                    this.pauseTimer = setTimeout(() => {
                        this.isPaused = false;
                    }, this.pauseDuration);
                }
            }
        }

        // Function to create quote cards
        function createQuoteCard(quoteText, isNew = false) {
            const quoteCard = document.createElement('div');
            quoteCard.className = 'quote-card';
            if (isNew) quoteCard.classList.add('new-quote');
            
            // Generate slight random rotation for natural feel
            const rotation = Math.random() * 1 - 0.5; // Between -0.5 and 0.5 degrees
            quoteCard.dataset.rotation = rotation;
            quoteCard.style.borderLeftColor = getRandomColor(0.7);
            
            // Add quote content
            quoteCard.innerHTML = `
                <p>${quoteText}</p>
                <div class="quote-highlight"></div>
            `;
            
            // Add 3D effect on mousemove
            quoteCard.addEventListener('mousemove', (e) => {
                const cardRect = quoteCard.getBoundingClientRect();
                const centerX = cardRect.left + cardRect.width / 2;
                const centerY = cardRect.top + cardRect.height / 2;
                const angleX = (e.clientY - centerY) / 15;
                const angleY = (centerX - e.clientX) / 15;
                
                quoteCard.style.transform = `perspective(1000px) rotateX(${angleX}deg) rotateY(${angleY}deg) scale(1.02)`;
            });
            
            // Reset on mouseout
            quoteCard.addEventListener('mouseleave', () => {
                quoteCard.style.transform = `rotate(${rotation}deg)`;
            });
            
            // Add to container and observe for animation
            quoteContainer.prepend(quoteCard);
            quoteObserver.observe(quoteCard);
            
            return quoteCard;
        }
        
        // Function to get random pastel color
        function getRandomColor(opacity = 1) {
            const hue = Math.floor(Math.random() * 360);
            return `hsla(${hue}, 70%, 60%, ${opacity})`;
        }
        
        // Initialize quote display
        function initializeQuotes() {
            initialQuotes.forEach(quote => {
                createQuoteCard(quote);
            });
            
            // Initialize smooth scrolling
            const smoothScroller = new EnhancedSmoothScroll(quoteContainer);
            setTimeout(() => smoothScroller.start(), 1000);
        }
        
        // Modal functionality
        addQuoteBtn.addEventListener('click', () => {
            quoteModal.style.display = 'flex';
            quoteInput.focus();
        });
        
        closeModal.addEventListener('click', () => {
            quoteModal.style.display = 'none';
        });
        
        // Close modal if clicking outside
        quoteModal.addEventListener('click', (e) => {
            if (e.target === quoteModal) {
                quoteModal.style.display = 'none';
            }
        });
        
        // Submit quote
        submitQuote.addEventListener('click', () => {
            const quoteText = quoteInput.value.trim();
            if (quoteText) {
                // Create and add the new quote card
                const newCard = createQuoteCard(quoteText, true);
                
                // Scroll to the new quote
                setTimeout(() => {
                    quoteContainer.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }, 100);
                
                // Clear input and close modal
                quoteInput.value = '';
                quoteModal.style.display = 'none';
            }
        });
        
        // Submit on Enter key (with Shift+Enter for new lines)
        quoteInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                submitQuote.click();
            }
        });
        
        // Initialize quotes when the document is loaded
        document.addEventListener('DOMContentLoaded', initializeQuotes);
    </script>
</body>
</html>