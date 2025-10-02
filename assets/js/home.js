// slider
document.addEventListener("DOMContentLoaded", () => { 
  const slides = document.querySelectorAll(".slide");
  let currentIndex = 0;
  // segundos
  let intervalTime = 2500;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle("hidden", i !== index);
    });
  }

  function nextSlide() {
    currentIndex = currentIndex === slides.length - 1 ? 0 : currentIndex + 1;
    showSlide(currentIndex);
  }

  const prev = document.querySelector('#prev');
  const next = document.querySelector('#next')

  if(prev){
    prev.addEventListener("click", () => {
        currentIndex = currentIndex === 0 ? slides.length - 1 : currentIndex - 1;
        showSlide(currentIndex);
    });
  }

  if(next){
    next.addEventListener("click", () => {
    nextSlide();
  });
  }

  // Cambio automático (segundos)
  setInterval(nextSlide, intervalTime);

  showSlide(currentIndex);

  // controla el iframe del visor pdf
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("abrir-pdf")) {
            const rutaPdf = e.target.getAttribute("data-src");
            const visor = document.getElementById("visorPdf");
            const modal = document.getElementById("modalPdf");

            if (rutaPdf !== "undefined" && visor && modal) {
                visor.src = rutaPdf;
                modal.classList.remove("hidden");
                modal.classList.add("flex");
            } else {
                mostrarNotificacion("No existe guía técnica para esta medida.", 2500);
            }
        }

        // Cerrar modal
        if (e.target.id === "cerrarModal" || e.target.id === "modalPdf") {
            const modal = document.getElementById("modalPdf");
            const visor = document.getElementById("visorPdf");
                if (modal && visor) {
                    visor.src = ""; // Limpia el visor
                    modal.classList.add("hidden");
                    modal.classList.remove("flex");
                }
        }
    });
});

