/**
 * Lógica de Validación para Formularios de Autenticación
 */
(function () {
  'use strict'

  var forms = document.querySelectorAll('.needs-validation')
  var password = document.getElementById("password");
  var confirm_password = document.getElementById("password_confirm");

  function validatePassword() {
    if (!password || !confirm_password) return;
    if (password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Las contraseñas no coinciden");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  if (password && confirm_password) {
    password.addEventListener("input", validatePassword);
    confirm_password.addEventListener("input", validatePassword);
  }

  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
      validatePassword();
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()