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

</head>

<body class="min-h-screen flex flex-col bg-gray-200">
    <div class="w-full p-2 bg-[#1e482a]">
        <header class="flex items-center gap-5">
            <!-- logotipo -->
            <div class="w-20 ml-20">
                <a href="./">
                    <img src="./assets/img/logo_white.png" alt="Logo" class="w-20 h-20">
                </a>
            </div>
            <!-- links -->
            <div class="w-3/4">
                <ul class="flex justify-end gap-x-8 text-white font-bold text-xl">
                    <li
                        class="w-auto h-8 px-2 text-center bg-transparent hover:rounded-md hover:bg-[#1e482a] hover:text-white transform duration-300 hover:-translate-y-1
                        <?php echo $currentPage === 'index.php' ? 'border-b-4 border-white pb-8' : ''; ?>">
                        <a href="./">Inicio</a>
                    </li>
                    <li
                        class="w-auto h-8 px-2 text-center bg-transparent hover:rounded-md hover:bg-[#1e482a] hover:text-white transform duration-300 hover:-translate-y-1
                        <?php echo $currentPage === 'contact.php' ? 'border-b-4 border-white pb-8' : ''; ?>">
                        <a href="./contact.php">Contacto</a>
                    </li>
                    <li
                        class="w-auto h-8 px-2 text-center bg-transparent hover:rounded-md hover:bg-[#1e482a] hover:text-white transform duration-300 hover:-translate-y-1
                        <?php echo $currentPage === 'about.php' ? 'border-b-4 border-white pb-8' : ''; ?>">
                        <a href="./about.php">Nosotros</a>
                    </li>
                    <li
                        class="w-auto h-8 px-2 text-center bg-transparent hover:rounded-md hover:bg-[#1e482a] hover:text-white transform duration-300 hover:-translate-y-1
                        <?php echo $currentPage === 'asFunction.php' ? 'border-b-4 border-white pb-8' : ''; ?>">
                        <a href="./asFunction.php">Cómo funciona</a>
                    </li>
                </ul>
            </div>
            <!-- menu -->
            <div class="w-auto text-end bg-orange-300 hidden">
                Menú
            </div>
        </header>
    </div>