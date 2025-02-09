import { getDocument, GlobalWorkerOptions } from "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.10.38/pdf.min.mjs";

// Set the worker source
GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.10.38/pdf.worker.mjs";

const menuImagesContainer = document.getElementById('menu-images');
const menuToggleGroup = document.getElementById("menus-toggle-group");
const menuRadioInputs = document.getElementsByName("menus-selector");

//on page load
document.addEventListener("DOMContentLoaded", () => {
  const menuSelection = document.querySelector('input[name="menus-selector"]:checked')?.value;

  if (!menuSelection) return;
  setMenuPDF(menuSelection);
});

//on toggle buttons changing
document.getElementById("menus-toggle-group").addEventListener("change", (event) => {
  if (event.target.name === "menus-selector") setMenuPDF(event.target.value);
});

const setMenuPDF = (key) => {
  if (key === 'main') displayPDF('img/menus/herbstkarte2024.pdf');
  else if (key === 'togo') displayPDF('img/menus/kartetogo2021.pdf');
}

const disableMenuToggles = (disable) => {
  if (disable) {
    menuToggleGroup.style.opacity = 0.5;
    [...menuRadioInputs].forEach(btn => {
      btn.setAttribute('disabled', true);
    });
    return;
  }
  [...menuRadioInputs].forEach(btn => {
    btn.removeAttribute('disabled');
  });
  menuToggleGroup.style.opacity = 1;
}

const displayPDF = async (pdfUrl) => {
  menuImagesContainer.innerHTML = "";
  
  //disable buttons
  disableMenuToggles(true);
  
  try {
    const pdf = await getDocument(pdfUrl).promise;

    for (let i = 1; i <= pdf.numPages; i++) {
      const page = await pdf.getPage(i);
      
      const viewport = page.getViewport({ scale: 2 }); // Adjust scale for resolution
      const canvas = document.createElement("canvas");
      const context = canvas.getContext("2d");

      canvas.width = viewport.width;
      canvas.height = viewport.height;

      await page.render({ canvasContext: context, viewport }).promise;
      menuImagesContainer.appendChild(canvas);
    }
    
    disableMenuToggles(false);
    
  } catch (error) {
    console.error("Error loading PDF:", error);
    disableMenuToggles(false);
  }
}