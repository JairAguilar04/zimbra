    <!-- footer -->
    <footer class="bg-[#1e482a] text-white py-6">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between">

            <!-- enlaces -->
            <div>
                <ul>
                    <li class="hover:text-gray-400 hover:underline"><a href="#">Aviso de privacidad</a></li>
                    <li class="hover:text-gray-400 hover:underline"><a href="#">Términos y condiciones</a></li>
                    <li class="hover:text-gray-400 hover:underline"><a href="#"></a>Política de cookies</li>
                    <li class="hover:text-gray-400 hover:underline"><a href="https://zimbratubos.com/admin/"
                            target="_blank">Powered by Hubbdi 2.0.0.28</a></li>
                </ul>
            </div>

            <div>
                <div class="flex justify-center items-center gap-2 mb-5">
                    <img src="./assets/img/logo_white.png" alt="Logo" class="w-10">
                    <h3 class="text-center text-lg font-bold uppercase">#Lacolumnadetuobra</h3>
                </div>
                <p class="text-sm text-center md:text-left">
                    &copy; <?php echo date("Y"); ?> ZimbraTubos. Todos los derechos reservados.
                </p>
            </div>

            <!-- redes sociales -->
            <div>
                <h2 class="text-center text-lg font-bold mb-2">Redes sociales</h2>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="https://www.facebook.com/ZimbraTubosToluca?mibextid=kFxxJD" target="_blank"
                        class="text-sm hover:underline">
                        <img src="./assets/img/iconos/facebook.png" alt="facebook"
                            class="w-10 transform duration-300 hover:-translate-y-1">
                    </a>
                    <a href="https://www.instagram.com/zimbratubos/?igsh=dmN4eTFoMjM0ZHNt&utm_source=qr" target="_blank"
                        class="text-sm hover:underline">
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
</script>
</html>