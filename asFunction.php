<?php
    $pageTitle = "Funcionamiento";
    include('./includes/header.php');
?>

<section class="flex-grow max-w-6xl mx-auto w-full p-4 sm:p-6 bg-white">
    <div>
        <div class="sm:w-[70%] w-full mx-auto">
            <iframe width="100%" height="315" class="rounded-xl"
                src="https://www.youtube.com/embed/WQQ4uEj2nt8?autoplay=1&mute=1&loop=1&playlist=WQQ4uEj2nt8&controls=1&modestbranding=1&rel=0&playsinline=1"
                title="Demostración" frameborder="0" allow="autoplay; encrypted-media; picture-in-picture"
                allowfullscreen referrerpolicy="strict-origin-when-cross-origin">
            </iframe>
        </div>
        <div>
            <h2 class="text-center text-3xl text-[#1e482a] font-bold mt-14">La forma perfecta para cada columna</h2>
            <h3 class="text-xl text-justify mt-5">
                Simplifica el proceso de colado y obtén columnas firmes, resistentes y con acabados uniformes. Nuestro sistema práctico y eficiente permite una instalación rápida, reduce el tiempo de obra y asegura resultados profesionales en cada proyecto.
            </h3>
        </div>
    </div>

    <!-- carrusel imagenes -->
    <div class="">
        <h2 class="text-center text-3xl text-[#1e482a] font-bold mt-14">Así resolvemos tus necesidades</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 my-10">
            <!-- Card 1 -->
            <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl hover:shadow-gray-400 duration-300">
                <img class="w-full h-full object-cover" src="./assets/img/cards-obras/card_uno.jpg" alt="Card 1">
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl hover:shadow-gray-400 transition-shadow duration-300">
                <img class="w-full h-full object-cover" src="./assets/img/cards-obras/card_dos.jpg" alt="Card 2">
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl hover:shadow-gray-400 transition-shadow duration-300">
                <img class="w-full h-full object-cover" src="./assets/img/cards-obras/card_tres.jpg" alt="Card 3">
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl hover:shadow-gray-400 transition-shadow duration-300">
                <img class="w-full h-full " src="./assets/img/cards-obras/card_cuatro.jpg" alt="Card 4">
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="button" class="w-auto bg-[#2f767c] rounded-md text-white text-xl font-bold px-4 py-2 transform duration-300 hover:bg-[#2f767c]/80 hover:-translate-y-1" id="button-galeria" onClick="viewGaleria()">Galería de instalación y usos</button>
    </div>

    <div class="my-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5 h-96 overflow-y-auto hidden" id="galeria">
        <!-- Imagen individual (repetida en bucle) -->
    </div>

    <!-- instructivo -->
     <div class="my-14">
        <h2 class="text-center text-3xl text-[#1e482a] font-bold">Manual de instalación</h2>
        <div class="flex sm:flex-row flex-col items-center gap-x-5 mt-8">
            <!-- imagen -->
            <div class="flex-1 sm:order-1 order-2 p-4">
                <img src="./assets/img/instructivo.png" alt="Instructivo" class="w-1/2 mx-auto object-cover rounded-lg shadow-xl hover:shadow-2xl hover:shadow-gray-400">
            </div>

            <!-- instrucciones -->
            <div class="flex-1 sm:order-2 order-1 p-4">
                <h2 class="text-2xl text-[#f78910] font-bold sm:p-0 p-2">Instrucciones:</h2>
                <ol class="list-decimal list-inside space-y-4 text-gray-700 text-justify mt-4 sm:p-0 p-2">
                    <li>
                        Sitúa la cimbra de cartón alrededor del área donde se formará la columna. Asegúrate de que quede firme y alineada
                    </li>
                    <li>
                        Llena la cimbra con la mezcla de concreto. Hazlo de manera uniforme para evitar huecos.
                    </li>
                    <li>
                        Permite que el concreto se endurezca completamente según las indicaciones de tu mezcla.
                        Una vez seco, retira cuidadosamente la cimbra de cartón. ¡Tu columna queda lista!
                    </li>
                </ol>
            </div>
        </div>
     </div>
</section>

<?php
    include('./includes/footer.php');
?>