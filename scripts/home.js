const elements = [
  {
    name: "background",
    value: 0.5
  }, 
  {
    name: "lune",
    value: 0.7 
  },
  {
    name: "nuages",
    value: 0.7
  }, 
  {
    name: "colline_rose",
    value: 0.5
  },
  {
    name: "colline_verte",
    value: 0.54
  },
  {
    name: "colline_marron",
    value: 0.41
  },
  {
    name: "colline_rouge",
    value: 0.5  
  },
  {
    name: "colline_bleue",
    value: 0.33
  },
  {
    name: "sol",
    value: 0
  }, 
  {
    name: "text",
    value: 0.5
  }
];

/*
function buildParalax() {
  elements.forEach(element => {
    let img = document.createElement('img');
    img.src = `../images/paralax/${element.name}.png`;
    document.getElementById("paralax").appendChild(img);
  })
}
*/

window.addEventListener("scroll", function() {
  const scrollY = window.scrollY;

  elements.forEach(element => {
    document.getElementById(element.name).style.top = `${scrollY * element.value}px`;
  })
})
