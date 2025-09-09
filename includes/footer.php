    <!-- footer -->
    <footer class="bg-[#2f767c] text-white py-6">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row gap-y-8 md:gap-y-0 md:gap-x-5 items-center md:items-start justify-between">
            <!-- Enlaces - orden 2 en mobile, 1 en desktop -->
            <div class="order-2 md:order-1 text-center md:text-left">
                <ul class="space-y-1">
                    <li class="hover:text-gray-300 hover:underline"><a href="./privacyNotice.php">Aviso de privacidad</a></li>
                    <li class="hover:text-gray-300 hover:underline"><a href="./termsConditions.php">Términos y condiciones</a></li>
                    <li class="hover:text-gray-300 hover:underline"><a href="./policyCookies.php">Política de cookies</a></li>
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
<script src="./assets/js/main.js">
</script>
</html>