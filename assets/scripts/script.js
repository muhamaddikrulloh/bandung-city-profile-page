// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }  
    });
});

// Fade In on Scroll
const images = document.querySelectorAll('.featured-image, h1, h2, h3, p, aside');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'scale(1)';
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.2 });

images.forEach(img => {
    img.style.opacity = '0';
    img.style.transform = 'scale(0.97)';
    img.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(img);
});