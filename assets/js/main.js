 // slider
document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.slide');
    let currentIndex = 0;
    // segundos
    let intervalTime = 2500;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('hidden', i !== index);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex === slides.length - 1) ? 0 : currentIndex + 1;
        showSlide(currentIndex);
    }

    document.getElementById('prev').addEventListener('click', () => {
        currentIndex = (currentIndex === 0) ? slides.length - 1 : currentIndex - 1;
        showSlide(currentIndex);
    });

    document.getElementById('next').addEventListener('click', () => {
        nextSlide();
    });

    // Cambio automático (segundos)
    setInterval(nextSlide, intervalTime);

    showSlide(currentIndex);
});


// carga los datos de la tabla
const medidas = [
    { diametro: 10, largo: 3 },
    { diametro: 15, largo: 3 },
    { diametro: 20, largo: 3 },
    { diametro: 25, largo: 3 },
    { diametro: 30, largo: 3 },
    { diametro: 35, largo: 3 },
    { diametro: 40, largo: 3 },
    { diametro: 45, largo: 3 },
    { diametro: 50, largo: 3 },
    { diametro: 55, largo: 3 },
    { diametro: 60, largo: 3 },
    { diametro: 70, largo: 3 },
    { diametro: 80, largo: 3 },
    { diametro: 90, largo: 3 },
    { diametro: 100, largo: 3 },
    { diametro: 120, largo: 3 },
];

// Ejecutar cuando cargue el DOM
document.addEventListener('DOMContentLoaded', () => {
  const cuerpoTabla = document.getElementById('cuerpo-tabla'); // solo en index.php
  const list = document.querySelector('#view-list'); // está en todas las páginas

  // Si no existe ni la tabla ni la lista, no sigas
  if (!cuerpoTabla && !list) return;

  medidas.forEach((medida, index) => {
    const checkboxId = `medida-${index}`;

    // Si existe la tabla, agrégale la fila
    if (cuerpoTabla) {
      const fila = document.createElement('tr');
      fila.classList.add('hover:bg-gray-200');

      fila.innerHTML = `
        <td class="border-b border-gray-300 text-sm">${medida.diametro}</td>
        <td class="border-b border-gray-300 text-sm">${medida.largo}.00</td>
        <td class="border-b border-gray-300">
          <img src="./assets/img/iconos/pdf.png" alt="pdf" class="w-5 mx-auto py-1 transform duration-300 hover:-translate-y-1">
        </td>
      `;

      cuerpoTabla.appendChild(fila);
    }

    // Si existe la lista del modal, agrégale el checkbox
    if (list) {
      const check = document.createElement('div');
      check.classList.add('flex', 'items-center', 'cursor-pointer', 'px-2', 'hover:bg-gray-300');

      check.innerHTML = `
        <input type="checkbox" id="${checkboxId}" value="${medida.diametro}" class="accent-[#2f767c] rounded-full mr-2 cursor-pointer" />
        <label for="${checkboxId}" class="w-full cursor-pointer select-none">${medida.diametro}</label>
      `;

      list.appendChild(check);

      const checkbox = check.querySelector('input[type="checkbox"]');
      checkbox.addEventListener('change', () => {
        addPedido(medida.diametro);
      });
    }
  });
});

// animation iframe
document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll(".fade-in-element");
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.remove("opacity-0", "translate-y-5");
          }
        });
      }, { threshold: 0.2 });

      elements.forEach(el => observer.observe(el));
});

// menu de hamburguesa
const menuToggle = document.getElementById('menu-toggle');
const menuClose = document.getElementById('menu-close');
const mobileMenu = document.getElementById('mobile-menu');
const overlay = document.getElementById('overlay');

function openMenu() {
    mobileMenu.classList.remove('translate-x-full');
    overlay.classList.remove('hidden');
}

function closeMenu() {
    mobileMenu.classList.add('translate-x-full');
    overlay.classList.add('hidden');
}

menuToggle.addEventListener('click', openMenu);
menuClose.addEventListener('click', closeMenu);
overlay.addEventListener('click', closeMenu);

// mostrar galeria
let galeriaCargada = false;
function viewGaleria(){
    const galeria = document.querySelector('#galeria');
    const boton = document.querySelector('#button-galeria');
    const fragment = document.createDocumentFragment();
        
    if(!galeriaCargada){
      fetch('./assets/js/rutas.json')
        .then(res => res.json())
        .finally(() => {
          boton.disabled = false;
        })
        .then(imagenes => {

          imagenes.forEach(img => {
            const div = document.createElement('div');
            div.innerHTML = `
            <img src="${img.ruta}" alt="${img.nombre}" 
              class="w-full aspect-[3/2] object-cover rounded-md shadow-md hover:scale-105 transition-transform duration-300">`;
              fragment.appendChild(div);
          });

          galeria.appendChild(fragment);
          galeriaCargada = true;
        })
        .catch(error => console.error('Error cargando las imágenes:', error));
    }
        galeria.classList.toggle('hidden');
        boton.textContent = galeria.classList.contains('hidden') ? "Galería de instalación y usos" : "Ocultar";
}

//   Script para manejar el consentimiento
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('cookieConsent');
    const acceptBtn = document.getElementById('acceptCookies');
    const declineBtn = document.getElementById('declineCookies');

    const cookieName = 'zimbratubos_cookie_consent';

    const setCookie = (value) => {
      const d = new Date();
      d.setTime(d.getTime() + (365*24*60*60*1000)); // 1 año
      document.cookie = `${cookieName}=${value}; expires=${d.toUTCString()}; path=/`;
    };

    const getCookie = () => {
      const nameEQ = cookieName + "=";
      const ca = document.cookie.split(';');
      for(let i=0; i < ca.length; i++) {
        let c = ca[i].trim();
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
      }
      return null;
    };

    if (!getCookie()) {
      modal.classList.remove('opacity-0', 'pointer-events-none');
    }

    acceptBtn.addEventListener('click', () => {
      setCookie('accepted');
      modal.classList.add('opacity-0', 'pointer-events-none');
    });

    declineBtn.addEventListener('click', () => {
      setCookie('declined');
      modal.classList.add('opacity-0', 'pointer-events-none');
    });
});

function viewList(){
    const list = document.querySelector('#view-list');
    list.classList.toggle('hidden');
    list.classList.add('border-t-2', 'border-gray-300');
}

const pedidos = [];
function addPedido(medida){
    const index = pedidos.indexOf(medida); // Buscar el índice del elemento
    const listaPedido = document.querySelector('#lista-pedidos-input');

    // Añadir o quitar de la lista de pedidos
    if (index !== -1) {
      pedidos.splice(index, 1); // Eliminar medida
    } else {
      pedidos.push(medida); // Agregar medida
    }

    // Limpiar la lista actual en el DOM
    listaPedido.innerHTML = '';

    // Volver a generar la lista completa
    pedidos.forEach(pedido => {
      const li = document.createElement('li');
      li.classList.add('flex', 'items-end', 'space-x-2');
      li.innerHTML = `
        <span class="block text-gray-700 font-semibold basis-1/4 select-none">
          ${pedido} cm<span class="font-bold text-red-600">*</span>
        </span>
        <input type="number" name="${pedido}" id="${pedido}" class="basis-3/4 w-full h-10 text-gray-700 border-b-2 border-[#2f767c] px-2 outline-none" min="0" />
      `;
      listaPedido.appendChild(li);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const campos = {
      nameContact: {
        regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñüÜ\s'-]+$/u,
        maxLength: 60,
        requiredMessage: 'El nombre es requerido.',
        formatMessage: 'El nombre no tiene un formato válido.',
        lengthMessage: 'El nombre es demasiado largo.',
      },
      emailContact: {
        regex: /^[^@]+@[^@]+\.[^@]+$/,
        maxLength: 80,
        requiredMessage: 'El correo electrónico es requerido.',
        formatMessage: 'El correo electrónico no tiene un formato válido.',
        lengthMessage: 'El correo electrónico es demasiado largo.',
      },
      phoneContact: {
        regex: /^\d{10}$/,
        requiredMessage: 'El teléfono es requerido.',
        formatMessage: 'El teléfono debe tener solo números y 10 dígitos.',
      },
      affairContact: {
        maxLength: 100,
        requiredMessage: 'El asunto es requerido.',
        lengthMessage: 'El asunto es demasiado largo.',
      },
      messageContact: {
        maxLength: 500,
        requiredMessage: 'El mensaje es requerido.',
        lengthMessage: 'El mensaje es demasiado largo.',
      }
    };

    // Asignar eventos de input para validación en tiempo real
    Object.keys(campos).forEach(id => {
      const input = document.querySelector(`#${id}`);
      const config = campos[id];

      if (input) {
        input.addEventListener('input', () => {
          validarCampo(input, config);
        });
      }
    });
  });

  function validarCampo(input, config) {
    const value = input.value.trim();
    //Quita lo de Contact, la primer letra la convierte en mayuscula
    const convPalabra = input.id.charAt(0).toUpperCase() + input.id.slice(1).replace('Contact', '');
    const errorElement = document.getElementById(`error${convPalabra}`);

    let errorMessage = '';

    if (!value) {
      errorMessage = config.requiredMessage;
    } else if (config.maxLength && value.length > config.maxLength) {
      errorMessage = config.lengthMessage;
    } else if (config.regex && !config.regex.test(value)) {
      errorMessage = config.formatMessage;
    }

    if (errorMessage) {
      input.classList.add('border-2', 'border-red-600');
      input.classList.remove('border-green-600');
      errorElement.textContent = errorMessage;
      errorElement.classList.remove('hidden');
      return false;
    } else {
      input.classList.remove('border-2', 'border-red-600');
      input.classList.add('border-2', 'border-green-600');
      errorElement.textContent = '';
      errorElement.classList.add('hidden');
      return true;
    }
  }

  function validarFormularioContact() {
    const campos = {
      nameContact: {
        regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñüÜ\s'-]+$/u,
        maxLength: 60,
        requiredMessage: 'El nombre es requerido.',
        formatMessage: 'El nombre no tiene un formato válido.',
        lengthMessage: 'El nombre es demasiado largo.',
      },
      emailContact: {
        regex: /^[^@]+@[^@]+\.[^@]+$/,
        maxLength: 80,
        requiredMessage: 'El correo electrónico es requerido.',
        formatMessage: 'El correo electrónico no tiene un formato válido.',
        lengthMessage: 'El correo electrónico es demasiado largo.',
      },
      phoneContact: {
        regex: /^\d{10}$/,
        requiredMessage: 'El teléfono es requerido.',
        formatMessage: 'El teléfono debe tener solo números y 10 dígitos.',
      },
      affairContact: {
        maxLength: 100,
        requiredMessage: 'El asunto es requerido.',
        lengthMessage: 'El asunto es demasiado largo.',
      },
      messageContact: {
        maxLength: 500,
        requiredMessage: 'El mensaje es requerido.',
        lengthMessage: 'El mensaje es demasiado largo.',
      }
    };

    let formularioValido = true;

    Object.keys(campos).forEach(id => {
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

    const formData = new FormData();
    formData.append('name', document.getElementById('nameContact').value.trim());
    formData.append('email', document.getElementById('emailContact').value.trim());
    formData.append('phone', document.getElementById('phoneContact').value.trim());
    formData.append('affair', document.getElementById('affairContact').value.trim());
    formData.append('message', document.getElementById('messageContact').value.trim());

    fetch('backend/procesar-formulario.php', {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      console.log(data);
      if (data.success) {
        alert("Mensaje enviado correctamente.");
        document.getElementById('formularioContact').reset();
        document.querySelectorAll('input, textarea').forEach(el => el.classList.remove('border-green-600'));
      } else {
        alert("Error al enviar: " + data.message);
      }
    })
    .catch(error => {
      alert("Error de red o servidor.");
      console.error(error);
    });

    return false; // evita recarga

    //Todos los campos están bien
    /* alert("Formulario enviado correctamente.");
    return true; */
  }