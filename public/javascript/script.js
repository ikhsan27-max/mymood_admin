function scrollQuotes(direction) {
    const quoteScroll = document.querySelector('.quote-scroll');
    const scrollAmount = 100; // Mengatur jarak scroll per klik
    quoteScroll.scrollBy({ top: direction * scrollAmount, behavior: 'smooth' });
}