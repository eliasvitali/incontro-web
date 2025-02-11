const imagesSection = document.getElementById('images-gallery');
const panoSection = document.getElementById('pano-gallery');
const galleryToggleGroup = document.getElementById("gallery-selector-group");
const galleryRadioInputs = document.getElementsByName("gallery-selector");

//on page load
document.addEventListener("DOMContentLoaded", () => {
  panoSection.style.display = 'none';
});

//on toggle buttons changing
galleryToggleGroup.addEventListener("change", (event) => {
  if (event.target.name === "gallery-selector") {
    if (event.target.value === 'images') {
      panoSection.style.display = 'none';
      imagesSection.style.display = 'grid';
    } 
    else {
      panoSection.style.display = 'grid';
      imagesSection.style.display = 'none';
    }
  }
});