    <!-- footer -->
    <footer class="bg-[#2f767c] text-white py-6">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row gap-y-8 md:gap-y-0 md:gap-x-5 items-center md:items-start justify-between">
            <!-- Enlaces - orden 2 en mobile, 1 en desktop -->
            <div class="order-2 md:order-1 text-center md:text-left">
                <ul class="space-y-1">
                    <li class="hover:text-gray-300 hover:underline"><a href="#">Aviso de privacidad</a></li>
                    <li class="hover:text-gray-300 hover:underline"><a href="#">Términos y condiciones</a></li>
                    <li class="hover:text-gray-300 hover:underline"><a href="#">Política de cookies</a></li>
                    <!-- <li class="hover:text-gray-300 hover:underline">
                    <a href="https://zimbratubos.com/admin/" target="_blank">Powered by Hubbdi 2.0.0.28</a>
                    </li> -->
                </ul>
            </div>

            <!-- Logo y eslogan - orden 3 en mobile, 2 en desktop -->
            <div class="order-3 md:order-2 text-center md:text-center">
                <div class="flex justify-center md:justify-center items-center gap-2 mb-3">
                    <img src="./assets/img/logo_white.png" alt="Logo" class="w-10">
                    <h3 class="text-lg font-bold uppercase">#Lacolumnadetuobra</h3>
                </div>
                <p class="text-sm">&copy; <?php echo date("Y"); ?> ZimbraTubos. Todos los derechos reservados.</p>
            </div>

            <!-- Redes sociales - orden 1 en mobile, 3 en desktop -->
            <div class="order-1 md:order-3 text-center md:text-right">
                <h2 class="text-lg font-bold mb-2">Redes sociales</h2>
                <div class="flex justify-center md:justify-end space-x-4">
                    <a href="https://www.facebook.com/ZimbraTubosToluca?mibextid=kFxxJD" target="_blank">
                    <img src="./assets/img/iconos/facebook.png" alt="facebook"
                        class="w-10 transform duration-300 hover:-translate-y-1">
                    </a>
                    <a href="https://www.instagram.com/zimbratubos/?igsh=dmN4eTFoMjM0ZHNt&utm_source=qr" target="_blank">
                    <img src="./assets/img/iconos/instagram.png" alt="instagram"
                        class="w-10 transform duration-300 hover:-translate-y-1">
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
<script defer>
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
        { diametro: 30, largo: 3.00 },
        { diametro: 35, largo: 3.00 },
        { diametro: 40, largo: 3.00 },
        { diametro: 45, largo: 3.00 },
        { diametro: 50, largo: 3.00 },
        { diametro: 55, largo: 3.00 },
        { diametro: 60, largo: 3.00 },
        { diametro: 70, largo: 3.00 },
        { diametro: 80, largo: 3.00 },
        { diametro: 90, largo: 3.00 },
        { diametro: 100, largo: 3.00 },
        { diametro: 110, largo: 3.00 },
        { diametro: 120, largo: 3.00 },
    ];

    // Ejecutar cuando cargue el DOM
    document.addEventListener('DOMContentLoaded', () => {
        const cuerpoTabla = document.getElementById('cuerpo-tabla');

        medidas.forEach((medida, index) => {
            const fila = document.createElement('tr');
            fila.classList.add('hover:bg-gray-300');

            fila.innerHTML = `
          <td class="border-b border-gray-300 text-sm">${medida.diametro}</td>
          <td class="border-b border-gray-300 text-sm">${medida.largo}.00</td>
        `;

            cuerpoTabla.appendChild(fila);
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
                        class="w-full aspect-[3/2] object-cover rounded-md shadow-md hover:scale-105 transition-transform duration-300">
                `;
                fragment.appendChild(div);
                });
                galeria.appendChild(fragment);
                galeriaCargada = true;
                })
                .catch(error => console.error('Error cargando las imágenes:', error));

        }

        galeria.classList.toggle('hidden');
        boton.textContent = galeria.classList.contains('hidden') ? "Ver más" : "Ocultar";
    }

</script>
</html>