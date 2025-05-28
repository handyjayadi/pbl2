document.addEventListener('DOMContentLoaded', () => {
    const contrastToggle = document.getElementById('contrast-toggle');
    const fontSmallBtn = document.getElementById('font-small');
    const fontNormalBtn = document.getElementById('font-normal');
    const fontLargeBtn = document.getElementById('font-large');
    const accessibilityToggle = document.getElementById('accessibility-toggle');
    const accessibilityPanel = document.getElementById('accessibility-panel');
    const accessibilityCloseBtn = document.getElementById('accessibility-close');
    const body = document.body;

    // Load saved settings
    const savedContrast = localStorage.getItem('highContrastMode');
    if (savedContrast === 'enabled') {
        body.classList.add('high-contrast');
        contrastToggle.checked = true;
    }

    const savedFontSize = localStorage.getItem('fontSize');
    if (savedFontSize && savedFontSize !== 'font-normal') { // Apply only if not 'normal'
        body.classList.add(savedFontSize);
    }

    // Toggle Contrast Mode
    contrastToggle.addEventListener('change', () => {
        if (contrastToggle.checked) {
            body.classList.add('high-contrast');
            localStorage.setItem('highContrastMode', 'enabled');
        } else {
            body.classList.remove('high-contrast');
            localStorage.setItem('highContrastMode', 'disabled');
        }
    });

    // Font Size Adjustment
    function setFontSize(sizeClass) {
        body.classList.remove('font-small', 'font-large'); // Remove existing font size classes
        if (sizeClass !== 'font-normal') {
            body.classList.add(sizeClass);
        }
        localStorage.setItem('fontSize', sizeClass);
    }

    fontSmallBtn.addEventListener('click', () => setFontSize('font-small'));
    fontNormalBtn.addEventListener('click', () => setFontSize('font-normal'));
    fontLargeBtn.addEventListener('click', () => setFontSize('font-large'));

    // Toggle Accessibility Panel
    accessibilityToggle.addEventListener('click', () => {
        const isHidden = accessibilityPanel.classList.contains('hidden');
        accessibilityPanel.classList.toggle('hidden', !isHidden);
        accessibilityToggle.setAttribute('aria-expanded', isHidden ? 'true' : 'false');

        // Ensure the chatbot modal is closed if open
        const chatbotModal = document.getElementById('chatbot-modal');
        if (!chatbotModal.classList.contains('hidden')) {
            chatbotModal.classList.add('hidden');
            document.getElementById('chatbot-toggle').setAttribute('aria-expanded', 'false');
        }
    });

    accessibilityCloseBtn.addEventListener('click', () => {
        accessibilityPanel.classList.add('hidden');
        accessibilityToggle.setAttribute('aria-expanded', 'false');
    });

    // Close panel if clicking outside
    document.addEventListener('click', (event) => {
        if (!accessibilityPanel.contains(event.target) && !accessibilityToggle.contains(event.target) && !event.target.closest('#accessibility-panel') && !event.target.closest('#accessibility-toggle')) {
            accessibilityPanel.classList.add('hidden');
            accessibilityToggle.setAttribute('aria-expanded', 'false');
        }
    });
});