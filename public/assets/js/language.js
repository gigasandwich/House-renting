let translations = {};
function initializeLanguage() {
    // Load (default english)
    let savedLanguage = localStorage.getItem('selectedLanguage');
    if (!savedLanguage) {
        savedLanguage = 'en';
        localStorage.setItem('selectedLanguage', savedLanguage);
    }

    setLanguage(savedLanguage);
    document.getElementById('languageSelect').value = savedLanguage;
}

function setLanguage(lang) {
    const langData = {
        en: { name: 'English', flag: `${baseUrl}/assets/img/flags/en.jpg` },
        fr: { name: 'Français', flag: `${baseUrl}/assets/img/flags/fr.png` }
    };

    document.documentElement.setAttribute('lang', lang);

    // Update the flag and page text
    const currentLanguageFlag = document.getElementById('currentLanguageFlag');
    currentLanguageFlag.src = langData[lang].flag;

    updateLanguageText(lang);
}

function updateLanguageText(lang) {
    const elements = document.querySelectorAll('[data-translate]');
    elements.forEach(element => {
        const translationKey = element.getAttribute('data-translate');
        if (translations[lang] && translations[lang][translationKey]) {
            element.textContent = translations[lang][translationKey];
        }
    });
}

function loadTranslations(callback) { // Mba asio doc kely le callback
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `${baseUrl}/assets/js/languages/translations.json`, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            translations = JSON.parse(xhr.responseText);
            if (callback) callback();
        } else {
            console.error('Failed to load translations');
        }
    };
    xhr.send();
}

document.addEventListener('DOMContentLoaded', function () {
    loadTranslations(() => {
        initializeLanguage();

        const languageSelect = document.getElementById('languageSelect');
        languageSelect.addEventListener('change', function () {
            const selectedLanguage = this.value;
            localStorage.setItem('selectedLanguage', selectedLanguage);
            setLanguage(selectedLanguage);
        });
    });
});
