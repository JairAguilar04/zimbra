<?php
$pageTitle = "Home";
include("./includes/header.php");
?>

    <!-- slider -->
    <div class="bg-gray-100">
        <div class="relative w-full overflow-hidden">
            <!-- Slides -->
            <div class="w-full">
                <img src="./assets/img/banners/banner_uno.png" alt="Imagen 1"
                    class="slide w-full object-cover hidden" />
                <img src="./assets/img/banners/banner_dos.png" alt="Imagen 2"
                    class="slide w-full object-cover hidden" />
                <!-- <img src="https://picsum.photos/id/1018/1920/600" alt="Imagen 3"
                    class="slide w-full object-cover hidden" /> -->
            </div>

            <!-- Controles -->
            <button id="prev"
                class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 text-gray-800 rounded-full p-3 shadow">
                &#8592;
            </button>
            <button id="next"
                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 text-gray-800 rounded-full p-3 shadow">
                &#8594;
            </button>
        </div>
    </div>

    <!-- informacion y tabla -->
    <!-- <section class="flex items-center px-20 p-10"> -->
    <section class="flex-grow max-w-6xl mx-auto w-full p-4 sm:p-6 bg-white">
        <h2 class="text-center sm:text-3xl text-2xl text-[#1e482a] font-bold mt-10">Construye con facilidad y precisión</h2>
        
            <div class="flex sm:flex-row flex-col items-center gap-x-5 sm:px-20 px-2 mt-5">
                <div class="flex-1">
                    <p class="text-justify my-5">
                        En <span class="text-[#1e482a] font-bold">ZimbraTubos&reg;</span> ofrecemos soluciones prácticas para columnas de concreto. Nuestra cimbra de cartón es resistente, fácil de usar y te ayuda a avanzar tu obra más rápido, logrando resultados profesionales sin complicaciones.
                    </p>
                    <p class="text-justify">
                        Ligera y manejable, optimiza tu tiempo y recursos en cada proyecto. Haz que tu construcción sea más sencilla y eficiente con <span class="text-[#1e482a] font-bold">ZimbraTubos&reg;</span>.
                    </p>
                </div>

                <div class="flex-1">
                    <img src="./assets/img/arqui_producto.png" alt="ArquiZimbra"
                        class="w-3/4 mx-auto mt-6 rounded-md hover:shadow-2xl hover:shadow-gray-400 transform duration-300 hover:-translate-y-1" />
                </div>
            </div>

        <div class="mt-16">
            <div class="text-center sm:px-20 px-2">
                <h2 class="sm:text-3xl text-2xl font-bold text-[#1e482a]">
                    Fabricamos medidas de largo especiales
                </h2>
                <h3 class="text-lg text-gray-700 mt-2">
                    Contamos con tubos de las siguientes medidas:
                </h3>
            </div>
            <div class="overflow-x-auto p-4">
                <table class="mx-auto sm:w-96 w-3/4 divide-y divide-gray-200 shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-[#f78910] text-white">
                        <tr>
                            <th>Diametro (cm)</th>
                            <th>Largo (m)</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="cuerpo-tabla">

                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- cards -->
    <section class="max-w-6xl mx-auto w-full sm:p-5 p-4 bg-gray-100 flex items-center sm:gap-20 gap-5">
        <div class="bg-red-400 flex items-center sm:w-72 w-auto sm:h-32 h-auto sm:p-4 transform duration-300 hover:-translate-y-1">
            <div class="mr-4">
                <img src="./assets/img/iconos/paloma.png" alt="Icono elección" class="w-24">
            </div>
            <div class="">
                <h3 class="text-[#2f767c] sm:text-xl text-base font-bold ">ZimbraTubos&reg; tú mejor elección</h3>
                <p class="sm:text-base text-sm text-gray-600">Fabricados a la medida, durables y eficientes para tus obras.</p>
            </div>
        </div>

        <div class="bg-red-400 flex items-center sm:w-72 w-auto sm:h-32 h-auto sm:p-4 transform duration-300 hover:-translate-y-1">
            <div class="mr-4">
                <img src="./assets/img/iconos/estrella.png" alt="Icono ideal" class="w-16">
            </div>
            <div class="">
                <h3 class="text-[#2f767c] sm:text-xl text-base font-bold ">Material de alta calidad</h3>
                <p class="sm:text-base text-sm text-gray-600">Ideal para colar confiable y cómodo de instalar.</p>
            </div>
        </div>

        <div class="bg-red-400 flex items-center sm:w-72 w-auto sm:h-32 h-auto sm:p-4 transform duration-300 hover:-translate-y-1">
            <div class="mr-4">
                <img src="./assets/img/iconos/envio.png" alt="Icono envio" class="w-20">
            </div>
            <div class="">
                <h3 class="text-[#2f767c] sm:text-xl text-base font-bold ">Envío a todo el país</h3>
                <p class="sm:text-base text-sm text-gray-600">Contamos con envío a todo el país, seguro y confiable.</p>
            </div>
        </div>

        <div class="bg-red-400 flex items-center sm:w-72 w-auto h-32 sm:p-4 transform duration-300 hover:-translate-y-1">
            <div class="mr-4">
                <img src="./assets/img/iconos/reciclaje.png" alt="Icono contruccion" class="w-20">
            </div>
            <div class="">
                <h3 class="text-[#2f767c] sm:text-xl text-base font-bold ">Comprometidos con el reciclaje</h3>
                <p class="sm:text-base text-sm text-gray-600">Fomentamos el reciclaje y cuidamos nuestro medio ambiente.</p>
            </div>
        </div>
    </section>





    <a
  href="https://wa.me/7228014814"
  target="_blank"
  aria-label="Contáctame por WhatsApp"
  class="fixed bottom-6 right-6 z-50 bg-green-500 p-4 rounded-full shadow-lg animate-pulse hover:scale-110 transition-transform duration-200"
>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    class="w-6 h-6 text-white"
    fill="currentColor"
    viewBox="0 0 24 24"
  >
    <path d="M12.04 2C6.51 2 2 6.49 2 12c0 1.93.49 3.76 1.43 5.38L2 22l4.77-1.25A10.05 10.05 0 0 0 12.04 22C17.56 22 22 17.51 22 12S17.56 2 12.04 2zm0 18.32c-1.6 0-3.17-.42-4.56-1.21l-.33-.2-2.83.74.76-2.75-.21-.35A8.05 8.05 0 0 1 4 12c0-4.41 3.63-8 8.04-8C16.43 4 20 7.59 20 12s-3.57 8.32-7.96 8.32zm4.37-5.89c-.24-.12-1.42-.7-1.64-.77-.22-.08-.38-.12-.54.13s-.62.77-.76.93c-.14.15-.28.17-.52.06a6.56 6.56 0 0 1-1.93-1.19 7.2 7.2 0 0 1-1.34-1.66c-.14-.24 0-.38.11-.5.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.75-1.78-.2-.48-.4-.41-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2 0 1.18.86 2.32.98 2.48.12.16 1.69 2.57 4.1 3.6.57.24 1.01.38 1.36.49.57.18 1.08.16 1.48.1.45-.06 1.42-.58 1.62-1.14.2-.56.2-1.05.14-1.15-.06-.1-.22-.16-.46-.28z"/>
  </svg>
</a>





    <?php
        include("./includes/footer.php");
    ?>