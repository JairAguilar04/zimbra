// carga los datos de la tabla
const medidas = [
  { diametro: 10, largo: 3, url: "./assets/pdf/diametro_10.pdf" },
  { diametro: 15, largo: 3 },
  { diametro: 20, largo: 3 },
  { diametro: 25, largo: 3 },
  { diametro: 30, largo: 3 },
  { diametro: 35, largo: 3 },
  { diametro: 40, largo: 3, url: "./assets/pdf/diametro_40.pdf" },
  { diametro: 45, largo: 3 },
  { diametro: 50, largo: 3 },
  { diametro: 55, largo: 3 },
  { diametro: 60, largo: 3, url: "./assets/pdf/diametro_60.pdf" },
  { diametro: 70, largo: 3 },
  { diametro: 80, largo: 3 },
  { diametro: 90, largo: 3 },
  { diametro: 100, largo: 3, url: "./assets/pdf/diametro_100.pdf" },
  { diametro: 120, largo: 3 },
];

const estados = [
  "Aguascalientes",
  "Baja California",
  "Baja California Sur",
  "Campeche",
  "Chiapas",
  "Chihuahua",
  "Ciudad de México",
  "Coahuila",
  "Colima",
  "Durango",
  "Guanajuato",
  "Guerrero",
  "Hidalgo",
  "Jalisco",
  "México",
  "Michoacán",
  "Morelos",
  "Nayarit",
  "Nuevo León",
  "Oaxaca",
  "Puebla",
  "Querétaro",
  "Quintana Roo",
  "San Luis Potosí",
  "Sinaloa",
  "Sonora",
  "Tabasco",
  "Tamaulipas",
  "Tlaxcala",
  "Veracruz",
  "Yucatán",
  "Zacatecas",
];

// Ejecutar cuando cargue el DOM
document.addEventListener("DOMContentLoaded", () => {
  const cuerpoTabla = document.getElementById("cuerpo-tabla"); // solo en index.php
  const list = document.querySelector("#view-list"); // está en todas las páginas

  const selectEstado = document.querySelector("#estadoModal");

  // Si no existe ni la tabla ni la lista, no sigas
  if (!cuerpoTabla && !list) return;

  medidas.forEach((medida, index) => {
    const checkboxId = `medida-${index}`;

    // Si existe la tabla, agrégale la fila
    if (cuerpoTabla) {
      const fila = document.createElement("tr");
      fila.classList.add("hover:bg-gray-200");

      fila.innerHTML = `
          <td class="border-b border-gray-300 text-sm">${medida.diametro}</td>
          <td class="border-b border-gray-300 text-sm">${medida.largo}.00</td>
          <td class="border-b border-gray-300">
            <img 
              src="./assets/img/iconos/pdf.png" 
              alt="pdf" 
              class="w-5 mx-auto py-1 transform duration-300 hover:-translate-y-1 cursor-pointer abrir-pdf"
              data-src="${medida.url}"
            />
          </td>
        `;
      cuerpoTabla.appendChild(fila);
    }

    // Si existe la lista del modal, agrégale el checkbox
    if (list) {
      const check = document.createElement("div");
      check.classList.add(
        "flex",
        "items-center",
        "cursor-pointer",
        "px-2",
        "hover:bg-gray-300"
      );

      check.innerHTML = `
        <input type="checkbox" id="${checkboxId}" value="${medida.diametro}" class="accent-[#2f767c] rounded-full mr-2 cursor-pointer" />
        <label for="${checkboxId}" class="w-full cursor-pointer select-none">${medida.diametro} cm</label>
      `;

      list.appendChild(check);

      const checkbox = check.querySelector('input[type="checkbox"]');
      checkbox.addEventListener("change", () => {
        addPedido(medida.diametro);
      });
    }
  });

  // llenamos el select para los estados
    if (selectEstado) {
      estados.forEach((estado) => {
        const option = document.createElement("option"); // Crear una nueva opción en cada iteración
        option.value = estado;
        option.innerText = estado;
        selectEstado.appendChild(option);
      });
    }

});

const notificacion = document.getElementById("notificacion");
const mensajeNotificacion = document.getElementById("mensaje-notificacion");
let timeoutId = null;

function mostrarNotificacion(mensaje, duracion) {
  // Si la notificación ya está visible con el mismo mensaje, no hacemos nada
  if (
    !notificacion.classList.contains("hidden") &&
    mensajeNotificacion.innerText === mensaje
  ) {
    return;
  }

  // Ponemos el mensaje y mostramos la notificación
  mensajeNotificacion.innerText = mensaje;
  notificacion.classList.remove("hidden");

  // Limpiamos timeout anterior si existiera
  if (timeoutId) clearTimeout(timeoutId);

  // Programamos para ocultar la notificación después de tiempo elegido
  timeoutId = setTimeout(() => {
    notificacion.classList.add("hidden");
    timeoutId = null;
  }, duracion);
}

// menu de hamburguesa
const menuToggle = document.getElementById("menu-toggle");
const menuClose = document.getElementById("menu-close");
const mobileMenu = document.getElementById("mobile-menu");
const overlay = document.getElementById("overlay");

function openMenu() {
  mobileMenu.classList.remove("translate-x-full");
  overlay.classList.remove("hidden");
}

function closeMenu() {
  mobileMenu.classList.add("translate-x-full");
  overlay.classList.add("hidden");
}

menuToggle.addEventListener("click", openMenu);
menuClose.addEventListener("click", closeMenu);
overlay.addEventListener("click", closeMenu);

//Script para manejar el consentimiento
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("cookieConsent");
  const acceptBtn = document.getElementById("acceptCookies");
  const declineBtn = document.getElementById("declineCookies");

  const cookieName = "zimbratubos_cookie_consent";

  const setCookie = (value) => {
    const d = new Date();
    d.setTime(d.getTime() + 365 * 24 * 60 * 60 * 1000); // 1 año
    document.cookie = `${cookieName}=${value}; expires=${d.toUTCString()}; path=/`;
  };

  const getCookie = () => {
    const nameEQ = cookieName + "=";
    const ca = document.cookie.split(";");
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i].trim();
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  };

  if (!getCookie()) {
    modal.classList.remove("opacity-0", "pointer-events-none");
  }

  acceptBtn.addEventListener("click", () => {
    setCookie("accepted");
    modal.classList.add("opacity-0", "pointer-events-none");
  });

  declineBtn.addEventListener("click", () => {
    setCookie("declined");
    modal.classList.add("opacity-0", "pointer-events-none");
  });
});

// mostrar lista en modal
function viewList() {
  const list = document.querySelector("#view-list");
  list.classList.toggle("hidden");
  list.classList.add("border-t-2", "border-gray-300");
}

let pedidos = [];
let listaPedido = "";
const titulo = document.querySelector("#titulo-input-cantidad");

function addPedido(medida) {
  const index = pedidos.indexOf(medida); // Buscar el índice del elemento
  listaPedido = document.querySelector("#lista-pedidos-input");

  // Añadir o quitar de la lista de pedidos
  if (index !== -1) {
    pedidos.splice(index, 1); // Eliminar medida
  } else {
    pedidos.push(medida); // Agregar medida
  }

  // oculto el titulo si no hay elementos
  if (pedidos.length === 0) {
    titulo.classList.add("hidden");
  } else {
    titulo.classList.remove("hidden");
  }

  // Limpiar la lista actual en el DOM
  listaPedido.innerHTML = "";

  // Volver a generar la lista completa
  pedidos.forEach((pedido) => {
    const li = document.createElement("li");
    li.classList.add("flex", "items-end", "space-x-2");
    li.innerHTML = `
        <span class="block text-gray-700 font-semibold basis-1/4 select-none">
          ${pedido} cm<span class="font-bold text-red-600">*</span>
        </span>
        <input type="number" name="${pedido}" id="${pedido}" class="basis-3/4 w-full h-10 text-gray-700 border-b-2 border-[#2f767c] px-2 outline-none" min="0" />
      `;
    listaPedido.appendChild(li);
  });
}

function obtenerPedidosConCantidad() {
  const listaPedido = document.querySelector("#lista-pedidos-input");
  const inputs = listaPedido.querySelectorAll('input[type="number"]');

  const pedidosConCantidad = {};

  inputs.forEach((input) => {
    const medida = input.name;
    const cantidad = parseInt(input.value, 10);

    // Validamos que sea un número y que no sea NaN
    if (!isNaN(cantidad) && cantidad > 0) {
      pedidosConCantidad[medida] = cantidad;
    }
  });

  return pedidosConCantidad;
}

function validarFormularioModal() {
  const campos = {
    nameModal: {
      regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñüÜ\s'-]+$/u,
      maxLength: 60,
      requiredMessage: "El nombre es requerido.",
      formatMessage: "El nombre no tiene un formato válido.",
      lengthMessage: "El nombre es demasiado largo.",
    },
    nameEmpresaModal: {
      maxLength: 80,
      requiredMessage: "El nombre de la empresa es requerido.",
      lengthMessage: "El nombre de la empresa es demasiado largo.",
    },
    telefonoModal: {
      regex: /^\d{10}$/,
      requiredMessage: "El teléfono es requerido.",
      formatMessage: "El teléfono debe tener solo números y 10 dígitos.",
    },
    estadoModal: {
      maxLength: 21,
      regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñüÜ\s'-]+$/u,
      requiredMessage: "El estado es requerido.",
      lengthMessage: "El estado es demasiado largo.",
      formatMessage: "El estado no tiene un formato válido."
    },
    municipioModal: {
      maxLength: 200,
      requiredMessage: "El municipio es requerido.",
      lengthMessage: "El municipio es demasiado largo.",
    },
    poblacionModal: {
      maxLength: 200,
      requiredMessage: "La población es requerida.",
      lengthMessage: "La población es demasiado larga.",
    },
  };

  let formularioValido = true;
  const errorPedidos = document.querySelector("#errorPedidos");
  const boton = document.querySelector("#btn-modal");
  const pedidosModal = obtenerPedidosConCantidad();

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

  if (Object.keys(pedidosModal).length === 0) {
    errorPedidos.classList.remove("hidden");
    return false;
  } else {
    errorPedidos.classList.add("hidden");
  }

  deshabilitarBoton(boton);

  const formData = new FormData();
  formData.append("name", document.getElementById("nameModal").value.trim());
  formData.append(
    "nameEmpresa",
    document.getElementById("nameEmpresaModal").value.trim()
  );
  formData.append(
    "phone",
    document.getElementById("telefonoModal").value.trim()
  );
  formData.append(
    "estado",
    document.getElementById("estadoModal").value.trim()
  );
  formData.append(
    "municipio",
    document.getElementById("municipioModal").value.trim()
  );
  formData.append(
    "poblacion",
    document.getElementById("poblacionModal").value.trim()
  );
  formData.append("pedidos", JSON.stringify(pedidosModal));

  fetch("backend/formulario-modal.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        habilitarBoton(boton);
        // restablecemos clases
        titulo.classList.add("hidden");
        document.querySelectorAll("input, textarea").forEach((el) => el.classList.remove("border-green-600"));
        viewList();
        // reseteamos valores
        document.getElementById("contact-form").reset();
        pedidos = [];
        listaPedido.innerHTML = "";
        //cerramos modal y mostramos notificacion
        closeModal();
        // mostrarNotificacion("Tu cotización ha sido recibida.\nEn breve, nuestro equipo se pondrá en contacto contigo para ofrecerte una atención personalizada.",5000);
        mostrarNotificacion(data.message, 5000);
        //Mandar el link de whatsapp
        setTimeout(() => {
          window.location.href = data.whatsapp_link;
        }, 5100);
        console.log(data.whatsapp_link);
        
      } else {
        habilitarBoton(boton);
        mostrarNotificacion(data.message, 2500);
      }
    })
    .catch((error) => {
      console.error(error);
      habilitarBoton(boton);
    });
  return false;
}

// valida inputs de formulario en tiempo real
document.addEventListener("DOMContentLoaded", () => {
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
    nameModal: {
      regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñüÜ\s'-]+$/u,
      maxLength: 60,
      requiredMessage: "El nombre es requerido.",
      formatMessage: "El nombre no tiene un formato válido.",
      lengthMessage: "El nombre es demasiado largo.",
    },
    nameEmpresaModal: {
      maxLength: 80,
      requiredMessage: "El nombre de la empresa es requerido.",
      lengthMessage: "El nombre de la empresa es demasiado largo.",
    },
    telefonoModal: {
      regex: /^\d{10}$/,
      requiredMessage: "El teléfono es requerido.",
      formatMessage: "El teléfono debe tener solo números y 10 dígitos.",
    },
    estadoModal: {
      maxLength: 21,
      regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñüÜ\s'-]+$/u,
      requiredMessage: "El estado es requerido.",
      lengthMessage: "El estado es demasiado largo.",
      formatMessage: "El estado no tiene un formato válido."
    },
    municipioModal: {
      maxLength: 200,
      requiredMessage: "El municipio es requerido.",
      lengthMessage: "El municipio es demasiado largo.",
    },
    poblacionModal: {
      maxLength: 200,
      requiredMessage: "La población es requerida.",
      lengthMessage: "La población es demasiado larga.",
    },
  };

  // Asignar eventos de input para validación en tiempo real
  Object.keys(campos).forEach((id) => {
    const input = document.querySelector(`#${id}`);
    const config = campos[id];

    if (input) {
      input.addEventListener("input", () => {
        validarCampo(input, config);
      });
    }
  });
});

// valida campo por campo y muestra mensaje de error
function validarCampo(input, config) {
  const value = input.value.trim();
  //Quita lo de Contact, la primer letra la convierte en mayuscula
  const convPalabra =
    input.id.charAt(0).toUpperCase() + input.id.slice(1).replace("Contact", "");
  const errorElement = document.getElementById(`error${convPalabra}`);

  let errorMessage = "";

  if (!value) {
    errorMessage = config.requiredMessage;
  } else if (config.maxLength && value.length > config.maxLength) {
    errorMessage = config.lengthMessage;
  } else if (config.regex && !config.regex.test(value)) {
    errorMessage = config.formatMessage;
  }

  if (errorMessage) {
    input.classList.add("border-2", "border-red-600");
    input.classList.remove("border-green-600");
    errorElement.textContent = errorMessage;
    errorElement.classList.remove("hidden");
    return false;
  } else {
    input.classList.remove("border-2", "border-red-600");
    input.classList.add("border-2", "border-green-600");
    errorElement.textContent = "";
    errorElement.classList.add("hidden");
    return true;
  }
}

function deshabilitarBoton(boton) {
  boton.disabled = true;
  boton.innerHTML = `
      <div role="status">
        <svg aria-hidden="true" class="inline w-5 h-5 text-[#2f767c] animate-spin fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
      </div>
    `;
}

function habilitarBoton(boton) {
  boton.innerHTML = "Enviar";
  boton.disabled = false;
}
