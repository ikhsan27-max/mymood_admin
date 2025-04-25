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

<button class="add-quote-btn" id="addQuoteBtn">+</button>

<script>
    // Get DOM elements
//     const addQuoteBtn = document.getElementById('addQuoteBtn');
//     const quoteModal = document.getElementById('quoteModal');
//     const closeModal = document.getElementById('closeModal');
//     const quoteInput = document.getElementById('quoteInput');
//     const submitQuote = document.getElementById('submitQuote');
//     const quoteContainer = document.getElementById('quoteContainer');

//     // Initial quotes data
//     const initialQuotes = [
//         const initialQuotes = @json($quotes);

// const quoteContainer = document.getElementById('quoteContainer');

// initialQuotes.forEach((quote) => {
//     const card = document.createElement('div');
//     card.className = 'quote-card';
//     card.textContent = quote;
//     quoteContainer.appendChild(card);
// });
//     ];

//     // IntersectionObserver for quote animations
//     const observerOptions = {
//         root: quoteContainer,
//         rootMargin: '0px',
//         threshold: 0.1
//     };

//     const quoteObserver = new IntersectionObserver((entries) => {
//         entries.forEach(entry => {
//             if (entry.isIntersecting) {
//                 entry.target.style.opacity = '1';
//                 entry.target.style.transform = `translateX(0) rotate(${entry.target.dataset.rotation}deg)`;
//             } else {
//                 entry.target.style.opacity = '0.5';
//                 entry.target.style.transform = `translateX(-10px) rotate(${entry.target.dataset.rotation}deg)`;
//             }
//         });
//     }, observerOptions);

//     // Enhanced smooth scrolling with smooth animations
//     class EnhancedSmoothScroll {
//         constructor(element, speed = 0.5, pauseDuration = 2000) {
//             this.container = element;
//             this.scrollSpeed = speed;
//             this.pauseDuration = pauseDuration;
//             this.scrollHeight = element.scrollHeight;
//             this.containerHeight = element.clientHeight;
//             this.isPaused = false;
//             this.userPaused = false;
//             this.lastTimestamp = 0;
//             this.scrollPosition = 0;
//             this.isScrolling = false;
//             this.pauseTimer = null;
//             this.setupEventListeners();
//         }

//         setupEventListeners() {
//             this.container.addEventListener('mouseenter', () => {
//                 this.userPaused = true;
//             });

//             this.container.addEventListener('mouseleave', () => {
//                 this.userPaused = false;
//             });

//             window.addEventListener('resize', () => {
//                 this.scrollHeight = this.container.scrollHeight;
//                 this.containerHeight = this.container.clientHeight;
//             });
//         }

//         start() {
//             if (!this.isScrolling) {
//                 this.isScrolling = true;
//                 requestAnimationFrame(this.scroll.bind(this));
//             }
//         }

//         stop() {
//             this.isScrolling = false;
//             if (this.pauseTimer) {
//                 clearTimeout(this.pauseTimer);
//                 this.pauseTimer = null;
//             }
//         }

//         scroll(timestamp) {
//             if (!this.isScrolling) return;
//             if (!this.lastTimestamp) this.lastTimestamp = timestamp;

//             if (this.userPaused || this.isPaused) {
//                 this.lastTimestamp = timestamp;
//                 requestAnimationFrame(this.scroll.bind(this));
//                 return;
//             }

//             const elapsed = timestamp - this.lastTimestamp;
//             const maxScroll = this.scrollHeight / 2; // karena kita duplikat isi
//             const delta = elapsed * this.scrollSpeed * 0.06;

//             this.scrollPosition += delta;

//             if (this.scrollPosition >= maxScroll) {
//                 this.scrollPosition = 0;
//                 this.container.scrollTop = 0;
//             }

//             this.container.scrollTop = this.scrollPosition;
//             this.lastTimestamp = timestamp;

//             requestAnimationFrame(this.scroll.bind(this));
//         }
//     }

//     // Function to create quote cards
//     function createQuoteCard(quoteText, isNew = false) {
//         const quoteCard = document.createElement('div');
//         quoteCard.className = 'quote-card';
//         if (isNew) quoteCard.classList.add('new-quote');

//         const rotation = Math.random() * 1 - 0.5;
//         quoteCard.dataset.rotation = rotation;
//         quoteCard.style.borderLeftColor = getRandomColor(0.7);

//         quoteCard.innerHTML = `
//             <p>${quoteText}</p>
//             <div class="quote-highlight"></div>
//         `;

//         quoteCard.addEventListener('mousemove', (e) => {
//             const cardRect = quoteCard.getBoundingClientRect();
//             const centerX = cardRect.left + cardRect.width / 2;
//             const centerY = cardRect.top + cardRect.height / 2;
//             const angleX = (e.clientY - centerY) / 15;
//             const angleY = (centerX - e.clientX) / 15;
//             quoteCard.style.transform = `perspective(1000px) rotateX(${angleX}deg) rotateY(${angleY}deg) scale(1.02)`;
//         });

//         quoteCard.addEventListener('mouseleave', () => {
//             quoteCard.style.transform = `rotate(${rotation}deg)`;
//         });

//         quoteContainer.appendChild(quoteCard); // append biasa, urutan natural
//         quoteObserver.observe(quoteCard);

//         return quoteCard;
//     }

//     // Function to get random pastel color
//     function getRandomColor(opacity = 1) {
//         const hue = Math.floor(Math.random() * 360);
//         return `hsla(${hue}, 70%, 60%, ${opacity})`;
//     }

//     // Initialize quote display
//     function initializeQuotes() {
//         initialQuotes.forEach(quote => {
//             createQuoteCard(quote);
//         });

//         // DUPLIKAT untuk efek scroll seamless
//         initialQuotes.forEach(quote => {
//             createQuoteCard(quote);
//         });

//         const smoothScroller = new EnhancedSmoothScroll(quoteContainer);
//         setTimeout(() => smoothScroller.start(), 1000);
//     }

//     // Modal functionality
//     addQuoteBtn.addEventListener('click', () => {
//         quoteModal.style.display = 'flex';
//         quoteInput.focus();
//     });

//     closeModal.addEventListener('click', () => {
//         quoteModal.style.display = 'none';
//     });

//     quoteModal.addEventListener('click', (e) => {
//         if (e.target === quoteModal) {
//             quoteModal.style.display = 'none';
//         }
//     });

//     submitQuote.addEventListener('click', () => {
//         const quoteText = quoteInput.value.trim();
//         if (quoteText) {
//             const newCard = createQuoteCard(quoteText, true);

//             setTimeout(() => {
//                 quoteContainer.scrollTo({
//                     top: 0,
//                     behavior: 'smooth'
//                 });
//             }, 100);

//             quoteInput.value = '';
//             quoteModal.style.display = 'none';
//         }
//     });

//     quoteInput.addEventListener('keydown', (e) => {
//         if (e.key === 'Enter' && !e.shiftKey) {
//             e.preventDefault();
//             submitQuote.click();
//         }
//     });

//     document.addEventListener('DOMContentLoaded', initializeQuotes);
//     const initialQuotes = @json($quotes);

// const quoteContainer = document.getElementById('quoteContainer');

// initialQuotes.forEach((quote) => {
//     const card = document.createElement('div');
//     card.className = 'quote-card';
//     card.textContent = quote;
//     quoteContainer.appendChild(card);
// });
</script