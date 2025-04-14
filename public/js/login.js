document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.login-form');
    form.classList.add('fade-in');

    setTimeout(() => {
        form.classList.remove('fade-in');
    }, 1000);
});

// Animación de Fade-in para el formulario
document.styleSheets[0].insertRule(`
    .fade-in {
        opacity: 0;
        transition: opacity 1s ease-in;
    }

    .fade-in {
        opacity: 1;
    }
`, 0);
