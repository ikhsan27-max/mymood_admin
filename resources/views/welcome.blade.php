<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - Neobrutalism</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700&display=swap" rel="stylesheet" />

        <style>
            /* Neobrutalism styling */
            :root {
                --primary-color: #FF2D20;
                --bg-color: #fffca8;
                --text-color: #121212;
                --secondary-bg: #fff;
                --border-color: #000;
                --shadow-color: rgba(0, 0, 0, 0.7);
            }
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Space Grotesk', sans-serif;
            }

            body {
                background-color: var(--bg-color);
                color: var(--text-color);
                font-family: 'Space Grotesk', sans-serif;
            }

            .container {
                position: relative;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 1.5rem;
                z-index: 1;
            }

            .content-wrapper {
                width: 100%;
                max-width: 80rem;
                position: relative;
            }

            header {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                align-items: center;
                gap: 0.5rem;
                padding: 2.5rem 0;
            }

            @media (min-width: 1024px) {
                header {
                    grid-template-columns: repeat(3, 1fr);
                }
                .logo-container {
                    grid-column-start: 2;
                    justify-content: center;
                    display: flex;
                }
            }

            .logo {
                height: 3rem;
                width: auto;
                color: var(--primary-color);
            }

            @media (min-width: 1024px) {
                .logo {
                    height: 4rem;
                }
            }

            nav {
                display: flex;
                flex: 1;
                justify-content: flex-end;
                margin: 0 -0.75rem;
            }

            .nav-link {
                display: inline-block;
                padding: 0.625rem 1rem;
                font-weight: 600;
                text-decoration: none;
                color: var(--text-color);
                background-color: var(--secondary-bg);
                border: 3px solid var(--border-color);
                box-shadow: 4px 4px 0 var(--shadow-color);
                margin: 0 0.375rem;
                transition: transform 0.2s, box-shadow 0.2s;
                position: relative;
                transform: translate(-2px, -2px);
            }

            .nav-link:hover {
                transform: translate(0, 0);
                box-shadow: 2px 2px 0 var(--shadow-color);
            }

            main {
                margin-top: 1.5rem;
            }

            .grid {
                display: grid;
                gap: 1.5rem;
            }

            @media (min-width: 1024px) {
                .grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 2rem;
                }
            }

            .card {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
                background-color: var(--secondary-bg);
                padding: 1.5rem;
                border: 3px solid var(--border-color);
                box-shadow: 8px 8px 0 var(--shadow-color);
                border-radius: 0;
                position: relative;
                overflow: hidden;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .card:hover {
                transform: translate(-4px, -4px);
                box-shadow: 12px 12px 0 var(--shadow-color);
            }

            @media (min-width: 1024px) {
                .card {
                    padding: 2rem;
                }
                .docs-card {
                    grid-row: span 3;
                }
            }

            @media (min-width: 768px) {
                .docs-card {
                    grid-row: span 3;
                }
            }

            .screenshot-container {
                position: relative;
                display: flex;
                width: 100%;
                flex: 1;
                align-items: stretch;
            }

            .screenshot {
                aspect-ratio: 16 / 9;
                height: 100%;
                width: 100%;
                flex: 1;
                object-fit: cover;
                object-position: top;
                border: 3px solid var(--border-color);
            }

            .screenshot-overlay {
                position: absolute;
                bottom: -4rem;
                left: -4rem;
                height: 10rem;
                width: calc(100% + 8rem);
                background-image: linear-gradient(to bottom, transparent, var(--secondary-bg) 50%, var(--secondary-bg));
            }

            .icon-container {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 3.5rem;
                height: 3.5rem;
                border-radius: 0;
                background-color: var(--primary-color);
                border: 3px solid var(--border-color);
                flex-shrink: 0;
            }

            @media (min-width: 640px) {
                .icon-container {
                    width: 4rem;
                    height: 4rem;
                }
            }

            .icon {
                color: white;
                width: 1.5rem;
                height: 1.5rem;
            }

            @media (min-width: 640px) {
                .icon {
                    width: 1.75rem;
                    height: 1.75rem;
                }
            }

            .card-content {
                display: flex;
                align-items: start;
                gap: 1.5rem;
            }

            @media (min-width: 1024px) {
                .docs-content {
                    flex-direction: column;
                    align-items: end;
                }
            }

            .text-container {
                padding-top: 0.75rem;
                flex: 1;
            }

            @media (min-width: 640px) {
                .text-container {
                    padding-top: 1.25rem;
                }
            }

            @media (min-width: 1024px) {
                .text-container {
                    padding-top: 0;
                }
            }

            h2 {
                font-size: 1.25rem;
                font-weight: 700;
                color: var(--text-color);
            }

            .card-text {
                margin-top: 1rem;
                font-size: 0.875rem;
                line-height: 1.625;
                color: var(--text-color);
            }

            .accent-text {
                text-decoration: underline;
                font-weight: 600;
                color: var(--primary-color);
            }

            footer {
                padding: 4rem 0;
                text-align: center;
                font-size: 0.875rem;
                color: rgba(0, 0, 0, 0.6);
            }

            /* Dark mode */
            @media (prefers-color-scheme: dark) {
                :root {
                    --bg-color: #2e2e2e;
                    --secondary-bg: #1a1a1a;
                    --text-color: #fff;
                    --border-color: #f5f5f5;
                    --shadow-color: rgba(255, 45, 32, 0.6);
                }
                
                .accent-text {
                    color: #FF6B5E;
                }
                
                footer {
                    color: rgba(255, 255, 255, 0.6);
                }
            }
            .quote-box {
    position: relative;
    height: 500px;
    overflow: hidden;
    border-radius: 8px;
    background-color: #f3f4f6; /* abu terang */
    /* padding: 0.5rem; */
    margin-top: 1rem;
}

.quote-scroll {
    position: absolute;
    width: 100%;
    animation: scroll-quotes 25s linear infinite;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.quote-card {
    background-color: #ffffff;
    /* border-left: 4px solid #e3342f; merah Laravel */
    padding: 0.75rem;
    border-radius: 6px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.25);
    color: #374151;
    font-style: italic;
    transition: transform 0.1s ease;
}

/* .quote-box:hover .quote-scroll {
    animation-play-state: paused;
} */

/* Auto-scroll keyframes */
@keyframes scroll-quotes {
  0% {
    transform: translateY(0%);
  }
  100% {
    transform: translateY(-50%);
  }
}

@media (max-width: 600px) {
    .quote-card {
        font-size: 0.9rem;
        padding: 0.5rem 0.75rem;
    }
}


            
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content-wrapper">
                <header>
                    <div class="logo-container">
                        <svg class="logo" viewBox="0 0 62 65" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8378 24.5145 63.8114 24.4684 63.7802L0.508455 49.9873C0.199313 49.8078 0.00982153 49.4788 0.00982153 49.1222V14.8858C0.00982153 14.7978 0.0214991 14.7102 0.0445133 14.6253C0.0675275 14.5404 0.103434 14.4601 0.150485 14.3882L11.6288 0.595278C11.781 0.361767 12.0156 0.19411 12.2865 0.114791C12.5573 0.0354719 12.8481 0.0499857 13.1155 0.156072L24.5938 4.95929C24.7788 5.03517 24.9445 5.15689 25.0721 5.31211C25.1996 5.46733 25.2842 5.6503 25.3172 5.84562L25.4519 6.66406V19.7627C25.4519 20.1192 25.6414 20.4482 25.9505 20.6277L37.4288 27.2363V14.1377C37.4288 13.7811 37.6183 13.4521 37.9274 13.2726L49.4057 6.66406L49.5366 5.84562C49.5696 5.6503 49.6542 5.46733 49.7817 5.31211C49.9093 5.15689 50.075 5.03517 50.26 4.95929L61.7383 0.156072C62.0057 0.0499857 62.2965 0.0354719 62.5673 0.114791C62.8382 0.19411 63.0728 0.361767 63.225 0.595278L61.8548 14.6253ZM50.4881 29.4986L38.995 36.1072L25.4519 43.2233V30.1247L37.4288 23.0086V36.1072L49.9104 29.0487L50.4881 29.4986ZM49.3909 14.8858L38.995 20.8088L27.5991 14.8858L38.995 8.96275L49.3909 14.8858ZM24.4684 7.26329L13.0726 13.1863L1.67676 7.26329L13.0726 1.34025L24.4684 7.26329ZM1.11931 14.8858L12.5151 20.8088L23.911 14.8858L12.5151 8.96275L1.11931 14.8858ZM12.5151 43.2233L14.0033 42.3202L24.4684 36.1072V23.0086L12.5151 30.1247V43.2233ZM38.4123 43.2233L48.8774 37.0103V23.9117L37.4288 30.1247V43.2233H38.4123Z"/></svg>
                    </div>
                    
                    <nav>
                        {{-- <a href="#" class="nav-link">Log in</a> --}}
                        <a href="#" class="nav-link">Admin</a>
                    </nav>
                </header>

                <main>
                    <div class="grid">
                        <div class="card docs-card">
                            {{-- <div class="screenshot-container">
                                <img src="https://laravel.com/assets/img/welcome/docs-light.svg" alt="Laravel documentation screenshot" class="screenshot" />
                                <div class="screenshot-overlay"></div>
                            </div> --}}
                        <div class="quote-box">
                            <div class="quote-scroll">
                                <div class="quote-card">"Ketekunan adalah kunci kesuksesan."</div>
                                <div class="quote-card">"Laravel memudahkan developer membangun aplikasi modern."</div>
                                <div class="quote-card">"Konsistensi lebih penting daripada motivasi sementara."</div>
                                <div class="quote-card">"Ketekunan adalah kunci kesuksesan."</div>
                                <div class="quote-card">"Laravel memudahkan developer membangun aplikasi modern."</div>
                                <div class="quote-card">"Konsistensi lebih penting daripada motivasi sementara."</div>
                                <div class="quote-card">"Ketekunan adalah kunci kesuksesan."</div>
                                <div class="quote-card">"Laravel memudahkan developer membangun aplikasi modern."</div>
                                <div class="quote-card">"Konsistensi lebih penting daripada motivasi sementara."</div>
                                <div class="quote-card">"Ketekunan adalah kunci kesuksesan."</div>
                                <div class="quote-card">"Laravel memudahkan developer membangun aplikasi modern."</div>
                                <div class="quote-card">"Konsistensi lebih penting daripada motivasi sementara."</div>
                                <div class="quote-card">"Ketekunan adalah kunci kesuksesan."</div>
                                <div class="quote-card">"Laravel memudahkan developer membangun aplikasi modern."</div>
                                <div class="quote-card">"Konsistensi lebih penting daripada motivasi sementara."</div>
                                <div class="quote-card">"Ketekunan adalah kunci kesuksesan."</div>
                                <div class="quote-card">"Laravel memudahkan developer membangun aplikasi modern."</div>
                                <div class="quote-card">"Konsistensi lebih penting daripada motivasi sementara."</div>
                            </div>
                        </div>



                            <div class="card-content docs-content">
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

                        <div class="card">
                            <div class="card-content">
                                <div class="icon-container">
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="currentColor"><path d="M16.597 12.635a.247.247 0 0 0-.08-.237 2.234 2.234 0 0 1-.769-1.68c.001-.195.03-.39.084-.578a.25.25 0 0 0-.09-.267 8.8 8.8 0 0 0-4.826-1.66.25.25 0 0 0-.268.181 2.5 2.5 0 0 1-2.4 1.824.045.045 0 0 0-.045.037 12.255 12.255 0 0 0-.093 3.86.251.251 0 0 0 .208.214c2.22.366 4.367 1.08 6.362 2.118a.252.252 0 0 0 .32-.079 10.09 10.09 0 0 0 1.597-3.733ZM13.616 17.968a.25.25 0 0 0-.063-.407A19.697 19.697 0 0 0 8.91 15.98a.25.25 0 0 0-.287.325c.151.455.334.898.548 1.328.437.827.981 1.594 1.619 2.28a.249.249 0 0 0 .32.044 29.13 29.13 0 0 0 2.506-1.99ZM6.303 14.105a.25.25 0 0 0 .265-.274 13.048 13.048 0 0 1 .205-4.045.062.062 0 0 0-.022-.07 2.5 2.5 0 0 1-.777-.982.25.25 0 0 0-.271-.149 11 11 0 0 0-5.6 2.815.255.255 0 0 0-.075.163c-.008.135-.02.27-.02.406.002.8.084 1.598.246 2.381a.25.25 0 0 0 .303.193 19.924 19.924 0 0 1 5.746-.438ZM9.228 20.914a.25.25 0 0 0 .1-.393 11.53 11.53 0 0 1-1.5-2.22 12.238 12.238 0 0 1-.91-2.465.248.248 0 0 0-.22-.187 18.876 18.876 0 0 0-5.69.33.249.249 0 0 0-.179.336c.838 2.142 2.272 4 4.132 5.353a.254.254 0 0 0 .15.048c1.41-.01 2.807-.282 4.117-.802ZM18.93 12.957l-.005-.008a.25.25 0 0 0-.268-.082 2.21 2.21 0 0 1-.41.081.25.25 0 0 0-.217.2c-.582 2.66-2.127 5.35-5.75 7.843a.248.248 0 0 0-.09.299.25.25 0 0 0 .065.091 28.703 28.703 0 0 0 2.662 2.12.246.246 0 0 0 .209.037c2.579-.701 4.85-2.242 6.456-4.378a.25.25 0 0 0 .048-.189 13.51 13.51 0 0 0-2.7-6.014ZM5.702 7.058a.254.254 0 0 0 .2-.165A2.488 2.488 0 0 1 7.98 5.245a.093.093 0 0 0 .078-.062 19.734 19.734 0 0 1 3.055-4.74.25.25 0 0 0-.21-.41 12.009 12.009 0 0 0-10.4 8.558.25.25 0 0 0 .373.281 12.912 12.912 0 0 1 4.826-1.814ZM10.773 22.052a.25.25 0 0 0-.28-.046c-.758.356-1.55.635-2.365.833a.25.25 0 0 0-.022.48c1.252.43 2.568.65 3.893.65.1 0 .2 0 .3-.008a.25.25 0 0 0 .147-.444c-.526-.424-1.1-.917-1.673-1.465ZM18.744 8.436a.249.249 0 0 0 .15.228 2.246 2.246 0 0 1 1.352 2.054c0 .337-.08.67-.23.972a.25.25 0 0 0 .042.28l.007.009a15.016 15.016 0 0 1 2.52 4.6.25.25 0 0 0 .37.132.25.25 0 0 0 .096-.114c.623-1.464.944-3.039.945-4.63a12.005 12.005 0 0 0-5.78-10.258.25.25 0 0 0-.373.274c.547 2.109.85 4.274.901 6.453ZM9.61 5.38a.25.25 0 0 0 .08.31c.34.24.616.561.8.935a.25.25 0 0 0 .3.127.631.631 0 0 1 .206-.034c2.054.078 4.036.772 5.69 1.991a.251.251 0 0 0 .267.024c.046-.024.093-.047.141-.067a.25.25 0 0 0 .151-.23A29.98 29.98 0 0 0 15.957.764a.25.25 0 0 0-.16-.164 11.924 11.924 0 0 0-2.21-.518.252.252 0 0 0-.215.076A22.456 22.456 0 0 0 9.61 5.38Z"/></g></svg>
                                </div>

                                <div class="text-container">
                                    <h2>Vibrant Ecosystem</h2>
                                    <p class="card-text">
                                        Laravel's robust library of first-party tools and libraries, such as <span class="accent-text">Forge</span>, <span class="accent-text">Vapor</span>, <span class="accent-text">Nova</span>, <span class="accent-text">Envoyer</span>, and <span class="accent-text">Herd</span> help you take your projects to the next level. Pair them with powerful open source libraries like <span class="accent-text">Cashier</span>, <span class="accent-text">Dusk</span>, <span class="accent-text">Echo</span>, <span class="accent-text">Horizon</span>, <span class="accent-text">Sanctum</span>, <span class="accent-text">Telescope</span>, and more.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer>
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </body>
</html>