<?php
$pageTitle = "Contacto";
include('./includes/header.php');
?>
<section class="sm:mt-16 mt-12 flex-grow max-w-6xl mx-auto w-full p-4 sm:p-6 bg-white">
  <!-- titulo -->
  <h2 class="text-center text-3xl text-[#1e482a] font-bold my-10">Contáctanos</h2>
  <!-- texto y formulario -->
  <div class="flex sm:flex-row flex-col gap-x-20 sm:items-center sm:px-10 px-2">
    <!-- texto formulario -->
    <h3 class="flex-1 text-xl text-justify">
      ¿Tienes dudas, buscas asesoría o deseas realizar un pedido?
      En <span class="font-bold text-[#1e482a]">ZimbraTubos&reg;</span> estamos listos para escucharte, responder tus preguntas y brindarte soluciones personalizadas que se adapten a tus necesidades, escríbenos.
      <span class="text-gray-800 text-base">(Los campos marcados con
        <span class="font-bold text-red-600">*</span> son requeridos).</span>
    </h3>
    <!-- formulario -->
    <div class="flex-1">
      <form id="formularioContact" onsubmit="return validarFormularioContact()">
        <div class="flex flex-col gap-y-5 mt-8">
          <!-- name -->
          <div>
            <label for="nameContact" class="block mb-2 text-[#2f767c] font-bold">
              Nombre<span class="font-bold text-red-600">*</span>
            </label>
            <input type="text" name="name" id="nameContact" class="w-full h-10 text-gray-700 rounded-md bg-gray-200 px-2 outline-none" placeholder="Nombre o empresa" autofocus />
            <span class="text-red-600 text-sm hidden" id="errorName"></span>
          </div>

          <!-- email y phone -->
          <div class="flex md:flex-row flex-col gap-x-5">
            <!-- email -->
            <div class="md:w-3/5 w-full">
              <label for="emailContact" class="block mb-2 text-[#2f767c] font-bold">
                Correo electrónico<span class="font-bold text-red-600">*</span>
              </label>
              <input type="email" name="email" id="emailContact" class="w-full h-10 text-gray-700 rounded-md px-2 bg-gray-200 outline-none" placeholder="Correo electrónico" />
              <span class="text-red-600 text-sm hidden" id="errorEmail"></span>
            </div>
            <!-- phone -->
            <div class="md:w-2/5 w-full sm:mt-0 mt-5">
              <label for="phoneContact" class="block mb-2 text-[#2f767c] font-bold">
                Teléfono<span class="font-bold text-red-600">*</span>
              </label>
              <input type="phone" name="phone" id="phoneContact" class="w-full h-10 text-gray-700 rounded-md bg-gray-200 px-2 outline-none" placeholder="Teléfono" />
              <span class="text-red-600 text-sm hidden" id="errorPhone"></span>
            </div>
          </div>
          <!-- affair -->
          <div>
            <label for="affairContact" class="block mb-2 text-[#2f767c] font-bold">
              Asunto<span class="font-bold text-red-600">*</span>
            </label>
            <input type="text" name="affair" id="affairContact" class="w-full h-10 text-gray-700 rounded-md bg-gray-200 px-2 outline-none" placeholder="Asunto" />
            <span class="text-red-600 text-sm hidden" id="errorAffair"></span>
          </div>
          <!-- message -->
          <div>
            <label for="messageContact" class="block mb-2 text-[#2f767c] font-bold">
              Mensaje<span class="font-bold text-red-600">*</span>
            </label>
            <textarea name="message" id="messageContact" cols="20" rows="4" class="w-full text-gray-700 pl-2 rounded-md bg-gray-200 outline-none" placeholder="Mensaje..."></textarea>
            <span class="text-red-600 text-sm hidden" id="errorMessage"></span>
          </div>
        </div>
        <!-- button -->
        <div class="text-end mt-5">
          <button type="submit" id="btnEnviar" class="sm:w-auto w-full bg-[#2f767c] rounded-md text-white text-xl font-bold px-4 py-2 transform duration-300 hover:bg-[#2f767c]/80 hover:-translate-y-1 disabled:bg-gray-200 disabled:cursor-progress">Enviar</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ubicacion -->
  <section class="mt-14 max-w-6xl mx-auto px-4">
    <div class="flex flex-col lg:flex-row flex-col-reverse items-center gap-8">
      <!-- mapa -->
      <div class="flex-1 w-full rounded-lg overflow-hidden shadow-lg border relative opacity-0 translate-y-5 transition-all duration-700 ease-out will-change-transform fade-in-element" style="padding-top: 56.25%;">
        <iframe class="absolute top-0 left-0 w-full h-full transform duration-300 hover:-translate-y-1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d94302.0641233436!2d-99.69094708724272!3d19.298910380685783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d2761ec25c0025%3A0x6af1476e4e6ce6d6!2sFerremexiquense%20Tres%20Caminos!5e1!3m2!1ses-419!2smx!4v1755299276817!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <!-- info -->
      <div class="flex-1">
        <h2 class="text-center text-3xl text-[#1e482a] font-bold">Ubicación de nuestra sucursal</h2>
        <h3 class="mt-5 text-lg text-justify leading-relaxed">Nuestra tienda de tubos de cimbra se encuentra en Toluca, Estado de México, en una ubicación estratégica que nos permite atender a clientes en toda la región y el país. Visítanos para conocer la calidad de nuestro producto y recibir atención personalizada.</h3>
      </div>
    </div>
  </section>

</section>

<script src="./assets/js/contac.js"></script>

<?php
include("./includes/footer.php");
?>