let galeriaCargada = false;
let imagenesPorCategoria = {};
let categoriaActual = null;
let botonCategoriaActivo = null;

function viewGaleria() {
  const galeria = document.getElementById("galeria");
  const selector = document.getElementById("categoria-selector");
  const boton = document.getElementById("button-galeria");

  // Alternar visibilidad de galería y botones
  galeria.classList.toggle("hidden");
  selector.classList.toggle("hidden");

  boton.textContent = galeria.classList.contains("hidden")
    ? "Galería de instalación y usos"
    : "Ocultar";

  if (galeriaCargada) return;

  fetch("./assets/js/rutas.json")
    .then((res) => res.json())
    .then((imagenes) => {
      // Agrupar por categoría
      imagenes.forEach((img) => {
        const cat = img.categoria || "Sin categoría";
        if (!imagenesPorCategoria[cat]) {
          imagenesPorCategoria[cat] = [];
        }
        imagenesPorCategoria[cat].push(img);
      });

      // Crear botones
      Object.keys(imagenesPorCategoria).forEach((cat) => {
        const btn = document.createElement("button");
        btn.textContent = cat;
        btn.className =
          "bg-[#f78910] text-white px-3 py-1 rounded hover:bg-[#e67800] transition-colors";
        btn.dataset.categoria = cat;

        btn.addEventListener("click", () => {
          mostrarCategoria(cat);

          // Eliminar clase activa del anterior
          if (botonCategoriaActivo) {
            botonCategoriaActivo.classList.remove("bg-[#e67800]", "scale-105");
          }

          // Activar este botón
          btn.classList.add("bg-[#e67800]", "scale-105");
          botonCategoriaActivo = btn;
        });

        selector.appendChild(btn);
      });

      // Mostrar la primera categoría
      const primera = Object.keys(imagenesPorCategoria)[0];
      if (primera) {
        const primerBoton = selector.querySelector(
          `button[data-categoria="${primera}"]`
        );
        primerBoton?.click(); // Simula click para activar
      }

      galeriaCargada = true;
    })
    .catch((error) => {
      mostrarNotificacion(`Error al cargar las imagenes\n ${error}`, 5000);
      console.error("Error cargando las imágenes:", error); 
    });
}

// Función para mostrar una categoría específica
function mostrarCategoria(categoria) {
  const contenedor = document.getElementById("galeria");

  // Limpia todo menos el selector (si está dentro de galeria)
  contenedor.innerHTML = "";

  // Título de la categoría
  const titulo = document.createElement("h3");
  titulo.textContent = categoria;
  titulo.className = "text-2xl text-[#1e482a] font-bold mb-4";
  contenedor.appendChild(titulo);

  // Contenedor grid de imágenes
  const grid = document.createElement("div");
  grid.className =
    "grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5 max-h-[30rem] overflow-y-auto overflow-x-hidden w-full";
    grid.id = 'grid-galeria';

  imagenesPorCategoria[categoria].forEach((img) => {
    const div = document.createElement("div");
    div.innerHTML = `
      <img src="${img.ruta}" alt="${img.name}" 
        class="w-full aspect-[3/2] object-cover rounded-md shadow-md hover:scale-105 transition-transform duration-300" />
    `;
    grid.appendChild(div);
  });

  contenedor.appendChild(grid);
  categoriaActual = categoria;
}