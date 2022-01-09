<div class="book_anim">
  <!-- Previous Button -->
  <button id="prev-btn">
    <i class="fas fa-arrow-circle-left"></i>
  </button>

  <div class="book_container">
    <!-- Book -->
    <div id="book" class="book">
      <!-- Paper 1 -->
      <div id="p1" class="paper">
        <div class="front couverture">
          <div id="f1" class="front-content pp">
            <h1>Livre de recettes</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Next Button -->
  <button id="next-btn">
    <i class="fas fa-arrow-circle-right"></i>
  </button>
</div>

<script>
  let max_page = 3;
  let cpt = 1;

  const bookk = document.getElementById('book');
  const p1 = document.getElementById('p1');

  var page_temp;

  // on a deja p1 de créé, donc on remplie juste le bac de p1

  init();

  function init() {
    console.log('entré dans init');
    let page;
    new_left_page(p1);

    for (let i = 0; i < max_page - 1; i++) {
      page = new_right_page();
      new_left_page(page);
    }
    page = new_right_page();
    end_page(page);
  }

  function end_page(page) {
    let b = document.createElement("div");
    b.setAttribute('class', 'back');

    let b_c = document.createElement("div");
    b_c.setAttribute('id', 'b' + (cpt));
    b_c.setAttribute('class', 'back-content');

    let h = document.createElement("h1");
    h.textContent = "END";

    page.append(b);
    b.append(b_c);
    b_c.append(h);
  }

  function new_left_page(page) {
    console.log('left_page haha');
    let b = document.createElement("div");
    b.setAttribute('class', 'back');

    let b_c = document.createElement("div");
    b_c.setAttribute('id', 'b' + cpt);
    b_c.setAttribute('class', 'back-content');

    let h = document.createElement("h1");
    h.setAttribute('class', 'title_rec');
    // AJOUTER LE TITRE

    let img = document.createElement("img");
    img.setAttribute('class', 'item');
    img.setAttribute('src', '../images/logo/cookie.jpg');
    // AJOUTER L'IMAGE

    let r = document.createElement("div");
    r.setAttribute('class', 'row');

    let i = document.createElement("div");
    i.setAttribute('class', 'ingr');

    let lib_ingr = document.createElement("p");
    lib_ingr.setAttribute('class', 'ingr_title');
    lib_ingr.setAttribute('class', 'item');
    lib_ingr.textContent = "Ingredients :";

    let col1 = document.createElement("ul");
    col1.setAttribute('class', 'col');

    // AJOUTER LES INGREDIENTS

    let t = document.createElement("div");
    t.setAttribute('class', 'tools');

    let lib_tool = document.createElement("p");
    lib_tool.setAttribute('class', 'tool_title');
    lib_tool.setAttribute('class', 'item');
    lib_tool.textContent = "Outils :";

    let col2 = document.createElement("ul");
    col2.setAttribute('class', 'col');
    // AJOUTER LES OUTILS


    page.append(b);
    b.append(b_c);
    b_c.append(h);
    b_c.append(img);
    b_c.append(r);
    r.append(i);
    i.append(lib_ingr);
    i.append(col1);
    r.append(t);
    t.append(lib_tool);
    t.append(col2);
  }

  function new_right_page() {
    cpt++;
    let p = document.createElement("div");
    p.setAttribute('id', 'p' + (cpt));
    p.setAttribute('class', 'paper');

    let f = document.createElement("div");
    f.setAttribute('class', 'front');

    let f_c = document.createElement("div");
    f_c.setAttribute('id', 'f' + (cpt));
    f_c.setAttribute('class', 'front-content');

    let lib_title = document.createElement("p");
    lib_title.setAttribute('class', 'step_title');
    lib_title.textContent = "Étapes :";

    let step_rec = document.createElement("div");
    step_rec.setAttribute('class', 'step_rec');
    // AJOUTER LES ETAPES

    bookk.append(p);
    p.append(f);
    f.append(f_c);
    f_c.append(lib_title);
    f_c.append(step_rec);
    return p;
  }



  // References to DOM Elements
  const prevBtn = document.querySelector("#prev-btn");
  const nextBtn = document.querySelector("#next-btn");
  const book = document.querySelector("#book");

  const paper1 = document.querySelector("#p1");
  const paper2 = document.querySelector("#p2");
  const paper3 = document.querySelector("#p3");
  const paper4 = document.querySelector("#p4");

  // Event Listener
  prevBtn.addEventListener("click", goPrevPage);
  nextBtn.addEventListener("click", goNextPage);

  // Business Logic
  let currentLocation = 1;
  let numOfPapers = 4;
  let maxLocation = numOfPapers + 1;

  function openBook() {
    book.style.transform = "translateX(50%)";
    prevBtn.style.transform = "translateX(-180px)";
    nextBtn.style.transform = "translateX(180px)";
  }

  function closeBook(isAtBeginning) {
    if (isAtBeginning) {
      book.style.transform = "translateX(0%)";
    } else {
      book.style.transform = "translateX(100%)";
    }

    prevBtn.style.transform = "translateX(0px)";
    nextBtn.style.transform = "translateX(0px)";
  }

  function goNextPage() {
    if (currentLocation < maxLocation) {
      switch (currentLocation) {
        case 1:
          openBook();
          paper1.classList.add("flipped");
          paper1.style.zIndex = 1;
          break;
        case 2:
          paper2.classList.add("flipped");
          paper2.style.zIndex = 2;
          break;
        case 3:
          paper3.classList.add("flipped");
          paper3.style.zIndex = 3;
          break;
        case 4:
          paper4.classList.add("flipped");
          paper4.style.zIndex = 4;
          closeBook(false);
          break;
        default:
          throw new Error("unkown state");
      }
      currentLocation++;
    }
  }

  function goPrevPage() {
    if (currentLocation > 1) {
      switch (currentLocation) {
        case 2:
          closeBook(true);
          paper1.classList.remove("flipped");
          paper1.style.zIndex = 4;
          break;
        case 3:
          paper2.classList.remove("flipped");
          paper2.style.zIndex = 3;
          break;
        case 4:
          paper3.classList.remove("flipped");
          paper3.style.zIndex = 2;
          break;
        case 5:
          openBook();
          paper4.classList.remove("flipped");
          paper4.style.zIndex = 1;
          break;
        default:
          throw new Error("unkown state");
      }

      currentLocation--;
    }
  }
</script>