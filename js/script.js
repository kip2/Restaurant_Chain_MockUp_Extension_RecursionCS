document.querySelector('.accordion-header').addEventListener('click', function() {
    const accordion = this.parentElement;
    accordion.classList.toggle('open');
});