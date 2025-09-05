<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            $currentPage = basename($_SERVER['PHP_SELF']);
            echo isset($pageTitle) ? $pageTitle . " | ZimbraTubos" : "ZimbraTubos";
        ?>
    </title>
    <link rel="icon" type="image/png" href="./assets/img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes breath {
        0%, 100% {
            transform: scale(1.2);
            opacity: 1;
        }
        50% {
            transform: scale(1.02);
            opacity: 0.9;
        }
        }
        .breath {
            animation: breath 2.4s ease-in-out infinite;
        }
    </style>

</head>

<body class="min-h-screen flex flex-col bg-gray-200">
    <!-- Contenedor del FAB -->
    <div id="fab-container" class="fixed bottom-40 right-6 z-50 flex flex-col items-end space-y-3">
        <!-- Botón de WhatsApp -->
        <a href="https://wa.me/7224041872?text=Hola%2C%20estoy%20interesado%20en%20sus%20productos."
            target="_blank"
            aria-label="Contáctame por WhatsApp"
            class="bg-green-600 p-4 rounded-full shadow-lg hover:scale-110 transition-transform duration-200 relative">
            <!-- Ícono -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.04 2C6.51 2 2 6.49 2 12c0 1.93.49 3.76 1.43 5.38L2 22l4.77-1.25A10.05 10.05 0 0 0 12.04 22C17.56 22 22 17.51 22 12S17.56 2 12.04 2zm0 18.32c-1.6 0-3.17-.42-4.56-1.21l-.33-.2-2.83.74.76-2.75-.21-.35A8.05 8.05 0 0 1 4 12c0-4.41 3.63-8 8.04-8C16.43 4 20 7.59 20 12s-3.57 8.32-7.96 8.32zm4.37-5.89c-.24-.12-1.42-.7-1.64-.77-.22-.08-.38-.12-.54.13s-.62.77-.76.93c-.14.15-.28.17-.52.06a6.56 6.56 0 0 1-1.93-1.19 7.2 7.2 0 0 1-1.34-1.66c-.14-.24 0-.38.11-.5.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.75-1.78-.2-.48-.4-.41-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2 0 1.18.86 2.32.98 2.48.12.16 1.69 2.57 4.1 3.6.57.24 1.01.38 1.36.49.57.18 1.08.16 1.48.1.45-.06 1.42-.58 1.62-1.14.2-.56.2-1.05.14-1.15-.06-.1-.22-.16-.46-.28z" />
            </svg>
            <!-- Circulito animado -->
            <span class="absolute top-0 right-0 w-3 h-3 bg-orange-500 rounded-full animate-bounce ring-2 ring-white"></span>
        </a>

        <!-- Botón para abrir el modal -->
        <button onclick="openModal()"
            class="bg-blue-600 p-4 rounded-full shadow-lg hover:scale-110 transition-transform duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
    </div>

    <!-- Botón de toggle para mostrar/ocultar -->
    <button onclick="toggleFab()" class="fixed bottom-24 right-6 z-50 bg-[#f78910] text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-200">
        <svg id="toggle-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path id="toggle-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Modal oculto -->
    <div id="modal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden transition-opacity duration-300">
        <div id="modal-content" class="bg-white p-6 rounded-lg w-full max-w-xl transform scale-95 opacity-0 transition-all duration-300">
            <h2 class="sm:text-2xl text-xl text-[#1e482a] font-bold mb-4">Formulario de contacto</h2>
            <form id="contact-form" onsubmit="submitForm(event)">
                <input type="text" id="name" placeholder="Nombre" class="w-full p-2 border mb-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <input type="email" id="email" placeholder="Correo" class="w-full p-2 border mb-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <textarea id="message" placeholder="Mensaje" class="w-full p-2 border mb-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancelar</button>
                    <button type="submit" class="bg-[#2f767c] hover:bg-[#2f767c]/80 text-white px-4 py-2 rounded">Enviar</button>
                </div>
                <p id="form-error" class="text-red-500 text-sm mt-2 hidden">Por favor completa todos los campos.</p>
            </form>
        </div>
    </div>

    <!-- script boton whatshapp y modal -->
    <script>
        let fabOpen = true;

        function toggleFab() {
            const fab = document.getElementById('fab-container');
            const path = document.getElementById('toggle-path');

            fabOpen = !fabOpen;

            if (fabOpen) {
                fab.classList.remove('hidden');
                path.setAttribute("d", "M6 18L18 6M6 6l12 12"); // Ícono X
            } else {
                fab.classList.add('hidden');
                path.setAttribute("d", "M12 4v16m8-8H4"); // Ícono +
            }
        }

        function openModal() {
            const modal = document.getElementById('modal');
            const modalContent = document.getElementById('modal-content');

            modal.classList.remove('hidden');
            // Mostrar con animación
            setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            const modalContent = document.getElementById('modal-content');

            // Ocultar con animación
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function submitForm(event) {
            event.preventDefault();

            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            const error = document.getElementById('form-error');

            if (!name || !email || !message) {
                error.classList.remove('hidden');
                return;
            }

            error.classList.add('hidden');

            // Aquí puedes manejar el envío real, como un fetch()

            alert("Formulario enviado. ¡Gracias!");
            closeModal();
            document.getElementById('contact-form').reset();
        }
    </script>

    <!-- cookies -->
    <div id="cookieConsent" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 transition-opacity duration-300 opacity-0 pointer-events-none">
        <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-6 w-full max-w-xl mx-4">
            <h2 class="text-lg font-semibold mb-2">Este sitio utiliza cookies 🍪</h2>
            <p class="text-sm text-gray-600 mb-4">
                Utilizamos cookies para mejorar tu experiencia en nuestro sitio. Al continuar navegando, aceptas nuestro
                <a href="./policyCookies.php" class="text-[#1e482a] underline hover:bg-[#1e482a]/20 hover:font-semibold">uso de cookies</a>.
            </p>
            <div class="flex justify-end gap-2">
                <button id="acceptCookies" class="bg-[#2f767c] hover:bg-[#2f767c]/80 text-white text-sm px-4 py-2 rounded transition">Aceptar</button>
                <button id="declineCookies" class="bg-gray-200 hover:bg-gray-300 text-sm px-4 py-2 rounded transition">Rechazar</button>
            </div>
        </div>
    </div>


    <div class="w-full p-2 bg-[#1e482a]">
        <header class="flex sm:justify-start justify-between items-center gap-5">
            <!-- logotipo -->
            <div class="w-20 sm:ml-20 ml-2">
                <a href="./">
                    <img src="./assets/img/logo_white.png" alt="Logo" class="sm:w-20 w-10">
                </a>
            </div>
            <!-- links -->
            <div class="w-3/4 sm:block hidden">
                <ul class="flex justify-end gap-x-8 text-white font-bold text-xl">
                    <li
                        class="w-auto h-8 px-2 text-center bg-transparent hover:bg-[#1e482a] hover:text-white transform duration-300 hover:-translate-y-1
                        <?php echo $currentPage === 'index.php' ? 'border-b-4 border-white pb-8' : ''; ?>">
                        <a href="./">Inicio</a>
                    </li>
                    <li
                        class="w-auto h-8 px-2 text-center bg-transparent hover:bg-[#1e482a] hover:text-white transform duration-300 hover:-translate-y-1
                        <?php echo $currentPage === 'contact.php' ? 'border-b-4 border-white pb-8' : ''; ?>">
                        <a href="./contact.php">Contacto</a>
                    </li>
                    <li
                        class="w-auto h-8 px-2 text-center bg-transparent hover:bg-[#1e482a] hover:text-white transform duration-300 hover:-translate-y-1
                        <?php echo $currentPage === 'about.php' ? 'border-b-4 border-white pb-8' : ''; ?>">
                        <a href="./about.php">Nosotros</a>
                    </li>
                    <li
                        class="w-auto h-8 px-2 text-center bg-transparent hover:bg-[#1e482a] hover:text-white transform duration-300 hover:-translate-y-1
                        <?php echo $currentPage === 'asFunction.php' ? 'border-b-4 border-white pb-8' : ''; ?>">
                        <a href="./asFunction.php">Cómo funciona</a>
                    </li>
                </ul>
            </div>
            <!-- menu de hamburguesa -->
            <div class="w-auto border-2 border-white rounded-md sm:hidden block">
                <!-- boton -->
                <button id="menu-toggle" class="block md:hidden focus:outline-none">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <!-- Menú móvil deslizable (oculto por defecto) -->
                <div id="mobile-menu"
                    class="fixed top-0 right-0 h-full w-3/4 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 md:hidden">
                    <div class="p-4 flex justify-between items-center border-b bg-[#2f767c]">
                        <span class="font-bold text-white text-lg">Menú</span>
                        <button id="menu-close" class="text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <ul class="p-2 space-y-4">
                        <!-- home -->
                        <li>
                            <a href="./index.php" class="block text-gray-800 px-2 py-1 hover:border-b-4 hover:border-gray-200 hover:font-semibold transform duration-300 hover:-translate-y-1
                            <?php echo $currentPage === 'index.php' ? 'border-b-4 border-gray-400' : ''; ?>">
                                Home
                            </a>
                        </li>
                        <!-- contact -->
                        <li>
                            <a href="./contact.php" class="block text-gray-800 px-2 py-1 hover:border-b-4 hover:border-gray-200 hover:font-semibold transform duration-300 hover:-translate-y-1
                            <?php echo $currentPage === 'contact.php' ? 'border-b-4 border-gray-400' : ''; ?>">
                                Contacto
                            </a>
                        </li>
                        <!-- about -->
                        <li>
                            <a href="./about.php" class="block text-gray-800 px-2 py-1 hover:border-b-4 hover:border-gray-200 hover:font-semibold transform duration-300 hover:-translate-y-1
                            <?php echo $currentPage === 'about.php' ? 'border-b-4 border-gray-400' : ''; ?>">
                            Nosotros
                            </a>
                        </li>
                        <!-- asFunction -->
                        <li>
                            <a href="./asFunction.php" class="block text-gray-800 px-2 py-1 hover:border-b-4 hover:border-gray-200 hover:font-semibold transform duration-300 hover:-translate-y-1
                            <?php echo $currentPage === 'asFunction.php' ? 'border-b-4 border-gray-400' : ''; ?>">
                                Cómo funciona
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- FONDO OSCURO (cuando el menú está abierto) -->
                <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40 md:hidden"></div>

            </div>
        </header>
    </div>