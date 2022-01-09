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
        <div class="back">
          <div id="b1" class="back-content">
            <h1 class="title_rec">Cookies</h1>
            <img class="item" src="../images/logo/cookie.jpg" alt="">
            <div class="row">
              <div class="ingr">
                <p class="ingr_title item">Ingredients :</p>
                <ul class="col">
                  <li>Oeuf 1</li>
                  <li>Chocolat 100g</li>
                  <li>Beurre 85g</li>
                  <li>Farine 85g</li>
                </ul>
              </div>    
              <div class="tools">
                <p class="tool_title item">Outils :</p>
                <ul class="col">
                  <li>Cuillère</li>
                  <li>Saladier</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Paper 2 -->
      <div id="p2" class="paper">
        <div class="front">
          <div id="f2" class="front-content">
            <p class="step_title">Etapes :</p>
            <div class="step_rec">
              <p class="step">Laissez ramollir le beurre à température ambiante. Dans un saladier, malaxez-le avec le
                sucre. </p>
              <p class="step">Ajoutez l'oeuf et éventuellement le sucre vanillé. </p>
              <p class="step">Versez progressivement la farine, la levure chimique, le sel et les pépites de chocolat.
                Mélangez bien. </p>
              <p class="step">Beurrez une plaque allant au four ou recouvrez-la d'une plaque de silicone. À l'aide de
                deux cuillères à soupe ou simplement avec les mains, formez des noix de pâte en les espaçant car elles
                s'étaleront à la cuisson. </p>

            </div>

          </div>
        </div>
        <div class="back">
          <div id="b2" class="back-content">
            <h1>Back 2</h1>
          </div>
        </div>
      </div>
      <!-- Paper 3 -->
      <div id="p3" class="paper">
        <div class="front">
          <div id="f3" class="front-content">
            <h1>Front 3</h1>
          </div>
        </div>
        <div class="back">
          <div id="b3" class="back-content">
            <h1>Back 3</h1>
          </div>
        </div>
      </div>
      <!-- Paper 4 -->
      <div id="p4" class="paper">
        <div class="front">
          <div id="f4" class="front-content">
            <h1>Front 4</h1>
          </div>
        </div>
        <div class="back">
          <div id="b4" class="back-content">
            <h1>Back 4</h1>
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