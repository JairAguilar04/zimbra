// animation iframe para mapa
document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll(".fade-in-element");
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.remove("opacity-0", "translate-y-5");
        }
      });
    },
    { threshold: 0.2 }
  );

  elements.forEach((el) => observer.observe(el));
});


function validarFormularioContact() {
  const btnEnviar = document.querySelector("#btnEnviar");

  const campos = {
    nameContact: {
      regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñüÜ\s'-]+$/u,
      maxLength: 60,
      requiredMessage: "El nombre es requerido.",
      formatMessage: "El nombre no tiene un formato válido.",
      lengthMessage: "El nombre es demasiado largo.",
    },
    emailContact: {
      regex: /^[^@]+@[^@]+\.[^@]+$/,
      maxLength: 80,
      requiredMessage: "El correo electrónico es requerido.",
      formatMessage: "El correo electrónico no tiene un formato válido.",
      lengthMessage: "El correo electrónico es demasiado largo.",
    },
    phoneContact: {
      regex: /^\d{10}$/,
      requiredMessage: "El teléfono es requerido.",
      formatMessage: "El teléfono debe tener solo números y 10 dígitos.",
    },
    affairContact: {
      maxLength: 100,
      requiredMessage: "El asunto es requerido.",
      lengthMessage: "El asunto es demasiado largo.",
    },
    messageContact: {
      maxLength: 500,
      requiredMessage: "El mensaje es requerido.",
      lengthMessage: "El mensaje es demasiado largo.",
    },
  };

  let formularioValido = true;

  Object.keys(campos).forEach((id) => {
    const input = document.getElementById(id);
    const config = campos[id];

    const campoValido = validarCampo(input, config);
    if (!campoValido) {
      formularioValido = false;
    }
  });

  if (!formularioValido) {
    // Detiene el envío
    return false;
  }

  deshabilitarBoton(btnEnviar);

  const formData = new FormData();
  formData.append("name", document.getElementById("nameContact").value.trim());
  formData.append("email", document.getElementById("emailContact").value.trim());
  formData.append("phone", document.getElementById("phoneContact").value.trim());
  formData.append("affair", document.getElementById("affairContact").value.trim());
  formData.append("message", document.getElementById("messageContact").value.trim());

    fetch("backend/procesar-formulario.php", {
      method: "POST",
      body: formData,
    })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        habilitarBoton(btnEnviar);

        // reseteamos valores del formulario
        document.getElementById("formularioContact").reset();

        document.querySelectorAll("input, textarea").forEach((el) => el.classList.remove("border-green-600"));

        mostrarNotificacion(data.message, 5000);
      } else {
        mostrarNotificacion(data.message, 2000);
        habilitarBoton(btnEnviar);
      }
    })
    .catch((error) => {
      console.error(error);
      mostrarNotificacion(error, 3000);
      habilitarBoton(btnEnviar);
    });

  return false; // evita recarga
}