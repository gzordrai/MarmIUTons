<!-- navbar -->
<ul>
  <li><a class="active" href="#home">Livre de recettes</a></li>
  <li><a href="#">Recherche</a></li>
  <li class="connect"><a href="controller/ClientController.php?create">Se connecter</a></li>
  <li class="connect"><a href="../view/register.php">S'inscrire</a></li>
</ul>

<section>
  <img src="img/bg.png" id="bg">
  <img src="img/etoile.png" id="etoile">
  <img src="img/lune.png" id="lune">
  <img src="img/nuages.png" id="nuages">
  <img src="img/colline_rose.png" id="rose">
  <img src="img/colline_verte.png" id="verte">
  <img src="img/colline_marron.png" id="marron">
  <img src="img/colline_rouge.png" id="rouge">
  <img src="img/colline_bleue.png" id="bleue">
  <img src="img/sol.png" id="sol">
  <h2 id="text">Recipie</h2>
</section>

<script>

  let bg = document.getElementById('bg');
  let lune = document.getElementById('lune');
  let nuages = document.getElementById('nuages');
  let rose = document.getElementById('rose');
  let verte = document.getElementById('verte');
  let marron = document.getElementById('marron');
  let rouge = document.getElementById('rouge');
  let bleue = document.getElementById('bleue');
  let sol = document.getElementById('sol');
  let text = document.getElementById('text');
  window.addEventListener('scroll', paralax);

  function paralax() {
    let value = window.scrollY;
    bg.style.top = value * 0.5 + 'px';
    lune.style.top = value * 1.0 + 'px';
    nuages.style.top = value * 0.7 + 'px';
    rose.style.top = value * 0.50 + 'px';
    verte.style.top = value * 0.54 + 'px';
    text.style.top = value * 0.50 + 'px';
    marron.style.top = value * 0.41 + 'px';
    rouge.style.top = value * 0.50 + 'px';
    bleue.style.top = value * 0.33 + 'px';
    sol.style.top = value * 0 + 'px';
  }
</script>