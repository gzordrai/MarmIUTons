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
            <h1></h1>
            <div class="research">
              <h1 class="title_search">Rechercher une recette</h1>
              <form action="" method="post">
                <div class="title_s">
                  <input type="text" class="input_title input" placeholder="Nom de la recette...">
                </div>


                <div class="type search">
                  <select name="meal_type" id="type-select" required>
                    <option value="">type de plat...</option>
                    <option value="Cocktail">Cocktail</option>
                    <option value="Apéritif">Apéritif</option>
                    <option value="Entrée">Entrée</option>
                    <option value="Plat">Plat</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Petit-dejeuné">Petit-dejeuné</option>
                  </select>
                </div>


                <div class="season search">
                  <div class="row">
                    <div>
                      <input type="radio" id="huey" name="season" value="huey" checked>
                      <label for="huey">Printemps</label>
                    </div>
                    <div>
                      <input type="radio" id="dewey" name="season" value="dewey">
                      <label for="dewey">Eté</label>
                    </div>
                  </div>
                  <div class="row">
                    <div>
                      <input type="radio" id="dewey" name="season" value="dewey">
                      <label for="dewey">Automne</label>
                    </div>
                    <div>
                      <input type="radio" id="dewey" name="season" value="dewey">
                      <label for="dewey">Hiver</label>
                    </div>
                  </div>
                </div>

                <div class="btn">
                  <input class="btn_search" type="button" value="Rechercher">
                </div>

              </form>
            </div>
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
  
  let pack = <?php echo json_encode($pack_recettes); ?>;
  let max_page = pack.length;
  let cpt = 1;
  let recette_actu = 0;
  const bookk = document.getElementById('book');
  const p1 = document.getElementById('p1');
  p1.style.zIndex = max_page+1;

  // on a deja p1 de créé, donc on remplie juste le bac de p1

  init();

  function init() {
    console.log(max_page);
    
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
    h.textContent = "";

    page.append(b);
    b.append(b_c);
    b_c.append(h);
  }

  function new_left_page(page) {
    let b = document.createElement("div");
    b.setAttribute('class', 'back');

    let b_c = document.createElement("div");
    b_c.setAttribute('id', 'b' + cpt);
    b_c.setAttribute('class', 'back-content');

    let h = document.createElement("h1");
    h.setAttribute('class', 'title_rec');
    h.textContent = pack[cpt - 1]['name'];
    // AJOUTER LE TITRE

    let img = document.createElement("img");
    img.setAttribute('class', 'item');
    img.setAttribute('src', './images/logo/' + pack[recette_actu]['image']);
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
    let l;
      for(let i = 0 ; i < pack[recette_actu]['ingredients'].length ; i++) {
          l = document.createElement("li");
          l.textContent = pack[recette_actu]['ingredients'][i]['lib_ingr'] + " " + pack[recette_actu]['ingredients'][i]['quentity'];
          col1.append(l);
      }
    // AJOUTER LES INGREDIENTS

    let t = document.createElement("div");
    t.setAttribute('class', 'tools');

    let lib_tool = document.createElement("p");
    lib_tool.setAttribute('class', 'tool_title');
    lib_tool.setAttribute('class', 'item');
    lib_tool.textContent = "Outils :";

    let col2 = document.createElement("ul");
    col2.setAttribute('class', 'col');
    let l1;
      for(let i = 0 ; i < pack[recette_actu]['ustensils'].length ; i++) {
          l1 = document.createElement("li");
          l1.textContent = pack[recette_actu]['ustensils'][i]['lib_tool'];
          col2.append(l1);
      }


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
    p.setAttribute('id', 'p' + cpt);
    eval('p.style.zIndex = ' + ((max_page+2)-cpt) + ';');
    p.setAttribute('class', 'paper');

    let f = document.createElement("div");
    f.setAttribute('class', 'front');

    let f_c = document.createElement("div");
    f_c.setAttribute('id', 'f' + cpt);
    f_c.setAttribute('class', 'front-content');

    let lib_title = document.createElement("p");
    lib_title.setAttribute('class', 'step_title');
    lib_title.textContent = "Étapes :";

    let u = document.createElement("ul");
    u.setAttribute('class', 'col');
    // AJOUTER LES ETAPES
    let l2;

    for(let i = 0 ; i < pack[recette_actu]['etapes'].length ; i++) {
          l2 = document.createElement("li");
          l2.textContent = pack[recette_actu]['etapes'][i]['txt_step'];
          u.append(l2);
      }


    bookk.append(p);
    p.append(f);
    f.append(f_c);
    f_c.append(lib_title);
    f_c.append(u);
    recette_actu++;
    return p;
  }

  // References to DOM Elements
  const prevBtn = document.querySelector("#prev-btn");
  const nextBtn = document.querySelector("#next-btn");
  const book = document.querySelector("#book");

  // Event Listener
  prevBtn.addEventListener("click", goPrevPage);
  nextBtn.addEventListener("click", goNextPage);

  // Business Logic
  let currentLocation = 1;
  let numOfPapers = max_page +1;
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
      if(currentLocation==1) {
        openBook();
      }
      eval('document.querySelector("#p' + currentLocation + '").classList.add("flipped");');
      eval('document.querySelector("#p' + currentLocation  + '").style.zIndex = ' + currentLocation + ';');

      if(currentLocation==maxLocation-1) {
        closeBook(false);
      }
      currentLocation++;
    }
    
  }


  function goPrevPage() {
    if (currentLocation > 1) {
      if(currentLocation == 2) {
        closeBook(true);
      }

      eval('document.querySelector("#p' + (currentLocation-1) + '").classList.remove("flipped");');
      eval('document.querySelector("#p' + (currentLocation-1) + '").style.zIndex = ' + (numOfPapers-(currentLocation-2)) + ';');

      if(currentLocation == maxLocation) {
        openBook();
      }
      currentLocation--;
    }
  }

</script>