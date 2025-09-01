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

    <!-- CARDS -->
    <section class="max-w-6xl mx-auto px-4 py-8 bg-gray-100">
        <div class="grid sm:grid-cols-4 grid-cols-2 gap-6">
            <!-- CARD 1 -->
            <div class="bg-transparent sm:p-4 flex items-center gap-5 rounded-lg hover:shadow-lg transform duration-300 hover:-translate-y-1">
                <div>
                    <img src="./assets/img/iconos/paloma.png" alt="Icono elección" class="w-14 sm:w-20">
                </div>
                <div>
                    <h3 class="text-[#2f767c] sm:text-lg text-base font-bold mb-1">ZimbraTubos&reg; tú mejor elección</h3>
                    <p class="text-sm text-gray-600">Fabricados a la medida, durables y eficientes para tus obras.</p>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class=" p-4 flex items-center gap-5 rounded-lg hover:shadow-lg transform duration-300 hover:-translate-y-1">
                <div>
                    <img src="./assets/img/iconos/estrella.png" alt="Icono ideal" class="w-14 sm:w-16">
                </div>
                <div>
                    <h3 class="text-[#2f767c] sm:text-lg text-base font-bold mb-1">Material de alta calidad</h3>
                    <p class="text-sm text-gray-600">Ideal para colar confiable y cómodo de instalar.</p>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="p-4 flex items-center gap-5 rounded-lg hover:shadow-lg transform duration-300 hover:-translate-y-1">
                <div>
                    <img src="./assets/img/iconos/envio.png" alt="Icono envio" class="w-14 sm:w-20">
                </div>
                <div>
                    <h3 class="text-[#2f767c] sm:text-lg text-base font-bold mb-1">Envío a todo el país</h3>
                    <p class="text-sm text-gray-600">Contamos con envío a todo el país, seguro y confiable.</p>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="sm:p-4 flex items-center gap-5 rounded-lg hover:shadow-lg transform duration-300 hover:-translate-y-1">
                <div>
                    <img src="./assets/img/iconos/reciclaje.png" alt="Icono reciclaje" class="w-14 sm:w-20">
                </div>
                <div>
                    <h3 class="text-[#2f767c] sm:text-lg text-base font-bold mb-1">Comprometidos con el reciclaje</h3>
                    <p class="text-sm text-gray-600">Fomentamos el reciclaje y cuidamos nuestro medio ambiente.</p>
                </div>
            </div>
        </div>
    </section>








    <?php
        include("./includes/footer.php");
    ?>