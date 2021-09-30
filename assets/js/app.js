// hamburger button
(function() {
    const hamburger = document.getElementById('hamburger');
    const menu = document.getElementById('topMenu');
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        menu.classList.toggle('active');
    });
})()