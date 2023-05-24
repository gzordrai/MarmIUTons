<?php 
  echo "<!-- Git this is not Hack language but php file... -->";
?>

<div class="research">
  <h1>Rechercher une recette</h1>
  <form action="" method="post">
    <div class="title_s">
      <input type="text" placeholder="Nom de la recette...">
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