focim = document.getElementById("focim");
bekezdes = document.getElementById("bekezdes");
var currentCarType = "";

// kocsikhoz a képek típus szerint
var carImages = {
  "2101": ["img/lada2101_1.jpg", "img/lada2101_2.jpg"],
  "2103": ["img/lada2103_1.jpg", "img/lada2103_2.jpg"],
  "2105": ["img/lada2105_1.jpg", "img/lada2105_2.jpg"],
  "2106": ["img/lada2106_1.jpg", "img/lada2106_2.jpg"],
};

var kep = document.getElementById("kep");
var prevButton = document.getElementById("prevButton");
var nextButton = document.getElementById("nextButton");

// Változók a jelenlegi autótípus és képindex nyomon követéséhez
var currentImageIndex = 0;

// Kép frissítése
function updateImage() {
  var imageUrl = carImages[currentCarType][currentImageIndex];
  kep.src = imageUrl;
}

// Autótípus váltása
function changeCarType(carType) {
  if (carImages.hasOwnProperty(carType)) {
    currentCarType = carType;
    currentImageIndex = 0;
    updateImage();
    carName.innerHTML = carType;
  }
}

// Előző gomb eseménykezelője
prevButton.addEventListener("click", function() {
  if (currentImageIndex > 0) {
    currentImageIndex--;
    updateImage();
  }
});

// Következő gomb eseménykezelője
nextButton.addEventListener("click", function() {
  if (currentImageIndex < carImages[currentCarType].length - 1) {
    currentImageIndex++;
    updateImage();
  }
});

// Alapértelmezett kép beállítása
updateImage();


function gombKatt(carType)
{
    if(carType == "2101")
    {
        focim.innerHTML = szovegek[carType][0];
        bekezdes.innerHTML = szovegek[carType][1];
        currentCarType = carType;
        currentImageIndex = 0;
        updateImage();
    }
    else if(carType == "2103")
    {
        focim.innerHTML = szovegek[carType][0];
        bekezdes.innerHTML = szovegek[carType][1];
        currentCarType = carType;
        currentImageIndex = 0;
        updateImage();
    }
    else if(carType == "2105")
    {
        focim.innerHTML = szovegek[carType][0];
        bekezdes.innerHTML = szovegek[carType][1];
        currentCarType = carType;
        currentImageIndex = 0;
        updateImage();
    }
    else
    {
        focim.innerHTML = szovegek[carType][0];
        bekezdes.innerHTML = szovegek[carType][1];
        currentCarType = carType;
        currentImageIndex = 0;
        updateImage();
    }
}