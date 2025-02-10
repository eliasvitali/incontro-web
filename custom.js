const menuImagesContainer = document.getElementById('menu-images');
const menuToggleGroup = document.getElementById("menus-toggle-group");
const menuRadioInputs = document.getElementsByName("menus-selector");

//populated from functions.php
const rootDir = customData.themeUrl;

//on page load
document.addEventListener("DOMContentLoaded", () => {
  
  if (window?.pdfjsLib) {
    console.log("PDF GOOD, setting worker");
    window.pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";
  }
  
  initMenus();
});

//on toggle buttons changing
document.getElementById("menus-toggle-group").addEventListener("change", (event) => {
  if (event.target.name === "menus-selector") setMenuPDF(event.target.value);
});

const initMenus = () => {
  const menus = customData?.menuData;
  if (!menus) {
    console.log("no menus");
    return;
  }
  const sortedMenus = menus.sort((a,b) => Number(a.position) - Number(b.position));
  const buttonRow = document.getElementById('menus-toggle-group');
  
  const allMenus = [];
  console.log('1', sortedMenus);
  
  
  let i = 0;
  for (const m of sortedMenus) {
    allMenus.push(
      `<input type="radio" id="${m.slug}" name="menus-selector" value="${m.slug}" ${i === 0 ? "checked" : ""}><label for="${m.slug}"><p class="body">${m.title}</p></label>`
    )
    i++;
  }
  console.log('2', allMenus);
  
  buttonRow.innerHTML = allMenus.join('');
  setMenuPDF(sortedMenus[0].slug);
}

const setMenuPDF = (key) => {
  
  const url = customData.menuData.find(menu => menu.slug === key)?.file_url;
  if (!url) {
    console.log("couldnt find url for key ", key);
    return;
  }
  displayPDF(url);
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
  
  if (!window?.pdfjsLib) {
    console.log("no-go on pdf");
    return;
  }
  
  const pdfjsLib = window.pdfjsLib;
  
  //disable buttons
  disableMenuToggles(true);
  
  try {
    const pdf = await pdfjsLib.getDocument(pdfUrl).promise;

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