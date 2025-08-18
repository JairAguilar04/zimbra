<?php
$pageTitle = "Contacto";
    include('./includes/header.php');
?>
    <section class="flex-grow max-w-6xl mx-auto w-full p-4 sm:p-6 bg-white">
      <h2 class="text-center text-3xl text-[#1e482a] font-bold">Contáctanos</h2>
      <h3 class="mt-5 text-xl text-justify">
        ¿Tienes dudas, buscas asesoría o deseas realizar un pedido?
        En <span class="font-bold text-[#1e482a]">ZimbraTubos&reg;</span> estamos listos para escucharte, responder tus preguntas y brindarte soluciones personalizadas que se adapten a tus necesidades.
        <span class="text-gray-800 text-base">(Los campos marcados con
        <span class="font-bold text-red-600">*</span> son requeridos).</span>
      </h3>

     <section class="flex gap-x-5">
       <!-- formulario -->
      <div class="flex-1">
        <form action="#">
          <div class="flex flex-col gap-y-5 mt-8">
            <!-- name -->
            <div>
              <label for="name" class="block mb-2">
                Nombre<span class="font-bold text-red-600">*</span>
              </label>
              <input type="text" name="name" id="name" class="w-full h-10 text-gray-700 rounded-md border border-[#1e482a] px-2 focus:ring focus:ring-[#1e482a] outline-none" placeholder="Nombre o empresa" autofocus />
            </div>

            <!-- email y phone -->
            <div class="flex flex-row gap-x-5">
              <!-- email -->
              <div class="w-3/5">
                <label for="email" class="block mb-2">
                    Correo electrónico<span class="font-bold text-red-600">*</span>
                </label>
                <input type="email" name="email" id="email" class="w-full h-10 text-gray-700 rounded-md border border-[#1e482a] px-2 focus:ring focus:ring-[#1e482a] outline-none" placeholder="Correo electrónico"/>
              </div>
              <!-- phone -->
              <div class="w-2/5">
                <label for="phone" class="block mb-2">
                    Teléfono<span class="font-bold text-red-600">*</span>
                </label>
                <input type="phone" name="phone" id="phone" class="w-full h-10 text-gray-700 rounded-md border border-[#1e482a] px-2 focus:ring focus:ring-[#1e482a] outline-none" placeholder="Teléfono"/>
              </div>
            </div>
            <!-- affair -->
             <div>
              <label for="affair" class="block mb-2">
                Asunto<span class="font-bold text-red-600">*</span>
              </label>
              <input type="text" name="affair" id="affair" class="w-full h-10 text-gray-700 rounded-md border border-[#1e482a] px-2 focus:ring focus:ring-[#1e482a] outline-none" placeholder="Asunto"/>
            </div>
            <!-- message -->
             <div>
              <label for="message" class="block mb-2">
                Mensaje<span class="font-bold text-red-600">*</span>
              </label>
              <textarea name="message" id="message" cols="20" rows="4" class="w-full text-gray-700 rounded-md border border-[#1e482a] px-2 focus:ring focus:ring-[#1e482a] outline-none" placeholder="Mensaje..."></textarea>
            </div>
          </div>
          <!-- button -->
          <div class="text-end mt-5">
            <button type="submit" class="w-auto bg-[#e6b800] rounded-md text-white text-xl font-bold px-4 py-2 transform duration-300 hover:bg-[#e6b800]/80 hover:-translate-y-1">Enviar</button>
          </div>
        </form>
      </div>

          <!-- contactos directos -->
       <div class="flex-1 flex justify-center items-center">
         <div class="px-5 py-10 w-3/4">
            <h3 class="text-center text-2xl text-[#1e482a] font-bold">Contactos directos</h3>
            <!-- list contac -->
             <div class="mt-8">

              <ul class="space-y-2">
                <li class="flex items-center p-2 rounded hover:bg-gray-200 hover:">
                  <div class="mr-2 w-1/6 breath">
                    <img src="./assets/img/iconos/whatsapp.png" alt="Whatsapp" class="w-8 mx-auto">
                  </div>
                  <div class="w-5/6">
                    <h3 class="text-lg text-[#1e482a] font-bold">Vendedora Veronica</h3>
                    <p>722 418 9891</p>
                  </div>
                </li>

                <li class="flex items-center p-2 rounded hover:bg-gray-200">
                  <div class="mr-2 w-1/6 breath">
                    <img src="./assets/img/iconos/whatsapp.png" alt="Whatsapp" class="w-8 mx-auto">
                  </div>
                  <div class="w-5/6">
                    <h3 class="text-lg text-[#1e482a] font-bold">Vendedor José Luis Miramontes</h3>
                    <p>722 400 6823</p>
                  </div>
                </li>                
              </ul>

          </div>
       </div>
     </section>

      <!-- ubicacion -->
       <section class="mt-14 max-w-6xl mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-8">
          <div class="flex-1">
            <h2 class="text-center text-3xl text-[#1e482a] font-bold">Ubicación de nuestra sucursal</h2>
            <h3 class="mt-5 text-lg text-justify leading-relaxed">Nuestra tienda de tubos de cimbra se encuentra en Toluca, Estado de México, en una ubicación estratégica que nos permite atender a clientes en toda la región y el país. Visítanos para conocer la calidad de nuestro producto y recibir atención personalizada.</h3>
          </div>
          <!-- mapa -->
          <div class="flex-1 w-full rounded-lg overflow-hidden shadow-lg border relative opacity-0 translate-y-5 transition-all duration-700 ease-out will-change-transform fade-in-element" style="padding-top: 56.25%;">
            <iframe class="absolute top-0 left-0 w-full h-full transform duration-300 hover:-translate-y-1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d94302.0641233436!2d-99.69094708724272!3d19.298910380685783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d2761ec25c0025%3A0x6af1476e4e6ce6d6!2sFerremexiquense%20Tres%20Caminos!5e1!3m2!1ses-419!2smx!4v1755299276817!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
       </section>
    </section>
    <?php
      include("./includes/footer.php");
    ?>
