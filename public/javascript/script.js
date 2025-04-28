const lineCtx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Users',
                    data: [6000, 9000, 12000, 8000, 12000, 15000, 14000],
                    fill: true,
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderColor: 'rgb(59, 130, 246)',
                    tension: 0.4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        min: 0,
                        max: 20000,
                        ticks: {
                            stepSize: 5000,
                            callback: function(value) {
                                return value === 0 ? '0' : value / 1000 + 'k';
                            }
                        }
                    }
                }
            }
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     const quoteItems = document.querySelectorAll('.quote-item');
        //     let currentIndex = 0;
            
        //     // Function to show next quote
        //     function showNextQuote() {
        //         // Remove active class from current quote
        //         quoteItems[currentIndex].classList.remove('active');
        //         quoteItems[currentIndex].style.animation = 'fadeOut 0.5s ease-out';
                
        //         // Update index to next quote
        //         currentIndex = (currentIndex + 1) % quoteItems.length;
                
        //         // Add active class to next quote
        //         setTimeout(() => {
        //             quoteItems.forEach(item => {
        //                 item.style.animation = '';
        //                 item.classList.remove('active');
        //             });
        //             quoteItems[currentIndex].classList.add('active');
        //         }, 500);
        //     }
            
        //     // Set interval to show next quote every 5 seconds
        //     setInterval(showNextQuote, 5000);
        // });

        // Sidebar functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Element selectors
            const hamburgerMenu = document.getElementById('hamburger-menu');
            const closeButton = document.getElementById('close-sidebar');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const contentWrapper = document.getElementById('content-wrapper');
            const menuLinks = document.querySelectorAll('.sidebar-menu-item');
            
            // Open sidebar
            hamburgerMenu.addEventListener('click', function() {
                sidebar.classList.add('active');
                overlay.classList.add('active');
                contentWrapper.classList.add('shifted');
                console.log('Sidebar opened');
            });
            
            // Close sidebar with X button
            closeButton.addEventListener('click', function() {
                closeSidebar();
                console.log('Sidebar closed with button');
            });
            
            // Close sidebar with overlay click
            overlay.addEventListener('click', function() {
                closeSidebar();
                console.log('Sidebar closed with overlay');
            });
            
            // Close sidebar with menu item click
            menuLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    closeSidebar();
                    console.log('Sidebar closed with menu link');
                });
            });

            // Function to close sidebar
            function closeSidebar() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                contentWrapper.classList.remove('shifted');
            }

            // Close sidebar with escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && sidebar.classList.contains('active')) {
                    closeSidebar();
                    console.log('Sidebar closed with Escape key');
                }
            });
        });