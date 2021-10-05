// hamburger button
(function() {
    const hamburger = document.getElementById('hamburger');
    const menu = document.getElementById('topMenu');
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        menu.classList.toggle('active');
    });
})();

// tokens navigation
(function() {
    const navigationMenu = document.getElementById('tokensNavigation');
    if (!navigationMenu) {
        return;
    }

    const links = navigationMenu.querySelectorAll('a');
    const collectionWrapper = document.getElementById('tokensCollection');

    clearLinksState = () => {
        links.forEach(link => {
            link.classList.remove('tokens-navigation__link_active');
        })
    };

    links.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();

            clearLinksState();
            link.classList.add('tokens-navigation__link_active');
            
            const collectionName = link.getAttribute('data-collection-link');
            collectionWrapper.querySelectorAll('[data-collection]').forEach(dc => {
                if (dc.getAttribute('data-collection') === collectionName) {
                    dc.classList.remove('hidden');
                    dc.classList.add('active');
                    setTimeout(() => dc.classList.add('visible'));
                }
                else {
                    dc.classList.remove('active');
                    dc.classList.remove('visible');
                    dc.classList.add('hidden');
                }
            });
        });
    });
})();