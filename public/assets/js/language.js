// language.js

// Function to apply language based on the selected language
function setLanguage(lang) {
    // Store the selected language in localStorage
    localStorage.setItem('selectedLanguage', lang);

    // Change the language of the page dynamically
    if (lang === 'fr') {
        document.documentElement.setAttribute('lang', 'fr');
        updateLanguageText('fr');
    } else {
        document.documentElement.setAttribute('lang', 'en');
        updateLanguageText('en');
    }
}

// Function to update the text on the page according to the selected language
function updateLanguageText(lang) {
    // Example: You can modify specific text elements based on language selection
    const elements = document.querySelectorAll('[data-translate]');
    
    elements.forEach(element => {
        const translationKey = element.getAttribute('data-translate');
        element.textContent = getTranslation(translationKey, lang);
    });
}

// Function to get the translation for a key (you can extend this with a proper translation object)
function getTranslation(key, lang) {
    const translations = {
        en: {
            'home': 'Home',
            'houses': 'Houses',
            'reserve': 'Reserve Now',
            // Add more translations for 'en' language
        },
        fr: {
            'home': 'Accueil',
            'houses': 'Maisons',
            'reserve': 'Réservez maintenant',
            // Add more translations for 'fr' language
        }
    };

    return translations[lang][key] || key;
}

// Load the language on page load based on localStorage or default to 'en'
document.addEventListener('DOMContentLoaded', function () {
    const savedLanguage = localStorage.getItem('selectedLanguage') || 'en'; // Default to 'en'
    setLanguage(savedLanguage);

    // Add event listeners to language change options
    document.querySelectorAll('.language-option').forEach(option => {
        option.addEventListener('click', function (e) {
            const lang = e.target.getAttribute('data-lang');
            setLanguage(lang);
        });
    });
});
