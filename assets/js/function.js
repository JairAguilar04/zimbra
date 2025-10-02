// mostrar galeria
let galeriaCargada = false;

function viewGaleria() {
  const galeria = document.querySelector("#galeria");
  const gridGaleria = document.querySelector("#grid-galeria");
  const boton = document.querySelector("#button-galeria");
  const fragment = document.createDocumentFragment();

  if (!galeriaCargada) {
    fetch("./assets/js/rutas.json")
      .then((res) => res.json())
      .finally(() => {
        boton.disabled = false;
      })
      .then((imagenes) => {
        imagenes.forEach((img) => {
          const div = document.createElement("div");
          div.innerHTML = `
            <img src="${img.ruta}" alt="${img.nombre}"
            class="w-full aspect-[3/2] object-cover rounded-md shadow-md hover:scale-105 transition-transform duration-300" />`;
          fragment.appendChild(div);
        });

        gridGaleria.appendChild(fragment);
        galeriaCargada = true;
      })
      .catch((error) => console.error("Error cargando las imágenes:", error));
  }

  galeria.classList.toggle("hidden");
  boton.textContent = galeria.classList.contains("hidden")
    ? "Galería de instalación y usos"
    : "Ocultar";
}