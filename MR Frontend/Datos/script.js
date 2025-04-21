document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const emailInput = document.getElementById('email');
    const telefonoInput = document.getElementById('telefono');
    const emailError = document.getElementById('emailError');
    const telefonoError = document.getElementById('telefonoError');

    // Valida el email
    function validateEmail() {
        const emailValue = emailInput.value.trim();
        if (!emailValue) {
            emailError.textContent = '';
            return true;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
            emailError.textContent = 'Correo inválido (debe contener @).';
            return false;
        } else {
            emailError.textContent = '';
            return true;
        }
    }

    // Valida el teléfono
    function validateTelefono() {
        const telefonoValue = telefonoInput.value.trim();
        if (!telefonoValue) {
            telefonoError.textContent = '';
            return true;
        }
        if (!/^[0-9]+$/.test(telefonoValue)) {
            telefonoError.textContent = 'Teléfono solo debe contener números.';
            return false;
        } else {
            telefonoError.textContent = '';
            return true;
        }
    }

    // Asigna validación en tiempo real
    emailInput.addEventListener('input', validateEmail);
    telefonoInput.addEventListener('input', validateTelefono);

    // Maneja el envío del formulario
    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();

        const isEmailValid = validateEmail();
        const isTelefonoValid = validateTelefono();

        if (!this.checkValidity() || !isEmailValid || !isTelefonoValid) {
            this.classList.add('was-validated');
        } else {
            alert('Gracias por contactarnos. Nos pondremos en contacto contigo pronto.');
            this.reset();
            this.classList.remove('was-validated');
        }
    });
});

const switchModo = document.getElementById("modoOscuro");
switchModo.addEventListener("change", () => {
    document.body.classList.toggle("modo-oscuro");
});
const modoOscuro = localStorage.getItem("modoOscuro");
if (modoOscuro === "true") {
    document.body.classList.add("modo-oscuro");
    switchModo.checked = true;
}
  // para boton de subida y bajada
document.addEventListener("DOMContentLoaded", function () {
    let mybutton = document.getElementById("btn-back-to-top");

    window.onscroll = function () {
    scrollFunction();
    };

    function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }

    mybutton.addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
    });
});

    