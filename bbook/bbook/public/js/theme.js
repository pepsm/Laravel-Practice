const toggleSwitch = document.querySelector('input[name=theme]');
const currentTheme = localStorage.getItem('theme');
const nav = document.querySelector('nav');
const text = document.querySelector('div');
const iconMode = document.querySelector('.icon-mode');
const textMode = document.querySelector('.text-mode');

nav.classList.add('navbar-light', 'bg-white');

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        nav.classList.remove('navbar-light', 'bg-white');
        nav.classList.add('navbar-dark', 'bg-dark');

        if (toggleSwitch !== null) {
            iconMode.classList.remove('fa-sun');
            iconMode.classList.add('fa-moon');

            text.classList.remove('text-light');
            text.classList.add('text-dark')

            textMode.textContent = "Dark Mode";

            toggleSwitch.checked = true;
        }
    }
}

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');

        nav.classList.remove('navbar-light', 'bg-white');
        nav.classList.add('navbar-dark', 'bg-dark');

        text.classList.remove('text-dark');
        text.classList.add('text-light')

        iconMode.classList.remove('fa-sun');
        iconMode.classList.add('fa-moon');

        textMode.textContent = "Dark Mode";

    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');

        nav.classList.remove('navbar-dark', 'bg-dark');
        nav.classList.add('navbar-light', 'bg-white');

        iconMode.classList.remove('fa-moon');
        iconMode.classList.add('fa-sun');

        textMode.textContent = "Light Mode";

    }
}

if (toggleSwitch !== null) {
    toggleSwitch.addEventListener('change', switchTheme, false);
}