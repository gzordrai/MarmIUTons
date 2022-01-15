<div class="add_rec">
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="create_recipe">
        <div class="form">

            <div class="form_p1">

                <div class="title item">
                    <input type="text" placeholder="Titre de la recette..." name="rec_name">
                </div>

                <div class="img item">
                    <div class="center">
                        <div class="form-input">
                            <label for="file-ip-1">Illustrer la recette</label>
                            <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);" name="image">
                            <div class="preview">
                                <img id="file-ip-1-preview">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row item">
                    <div class="cost">
                        <p>Coût de la recette :</p>
                        <div class="container_cost">
                            <div class="euroWidget">
                                <input type="radio" name="cost" id="cost-3" value="3">
                                <label for="cost-3" class="fas fa-euro-sign"></label>
                                <input type="radio" name="cost" id="cost-2" value="2">
                                <label for="cost-2" class="fas fa-euro-sign"></label>
                                <input type="radio" name="cost" id="cost-1" value="1">
                                <label for="cost-1" class="fas fa-euro-sign"></label>
                            </div>
                        </div>
                    </div>

                    <div class="quentity">
                        <p>Pour combien de personnes ?</p>
                        <input type="number" id="num" name="num_people" min="1" max="20" class="input">
                    </div>
                </div>

                <div class="row">
                    <div class="season">
                        <p>A quelle saison faire cette recette ?</p>
                        <div>
                            <input type="radio" id="huey" name="season" value="Printemps" checked>
                            <label for="huey">Printemps</label>
                        </div>
                        <div>
                            <input type="radio" id="dewey" name="season" value="Eté">
                            <label for="dewey">Eté</label>
                        </div>
                        <div>
                            <input type="radio" id="dewey" name="season" value="Automne">
                            <label for="dewey">Automne</label>
                        </div>
                        <div>
                            <input type="radio" id="dewey" name="season" value="Hiver">
                            <label for="dewey">Hiver</label>
                        </div>
                    </div>


                    <div class="meal_type">
                        <div class="meal">
                            <p>Selectionner le type de plat :</p>
                            <div class="custom-select">
                                <select name="meal_type" id="type-select" required>
                                    <option value="">Selectionner...</option>
                                    <option value="Cocktail">Cocktail</option>
                                    <option value="Apéritif">Apéritif</option>
                                    <option value="Entrée">Entrée</option>
                                    <option value="Plat">Plat</option>
                                    <option value="Dessert">Dessert</option>
                                    <option value="Petit-dejeuné">Petit-déjeuner</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form_p2">
                <div class="row item">

                    <div class="tools" id="tools">
                        <div id="champs_tool">
                            <p>Le matériel nécessaire :</p>
                            <input class="item input" type="text" placeholder="Mixeur..." name="tool1">
                        </div>
                        <input type="button" value="+" id="add_tool">
                    </div>

                    <div class="ingrs" id="ingrs">
                        <div id="champs_ingrs">
                            <p>Les ingrédients et leur quantité :</p>
                            <div class="item">
                                <input type="text" placeholder="Sucre..." name="ingr1" class="input">
                                <input class="quentity input" type="text" placeholder="32g..." name="quen1">
                            </div>

                        </div>

                        <input type="button" value="+" id="add_ingr">
                    </div>
                </div>
                <div class="steps item" id="steps">
                    <div id="champs_steps">
                        <input class="item step input" type="text" placeholder="Etape..." name="step1">
                    </div>

                    <input type="button" value="+" id="add_step">
                </div>


                <div class="submit">
                    <input type="submit" value="Ajouter" name="envoyer" class="ajouter_btn">
                </div>
            </div>

        </div>
    </form>
</div>



<script>
    const btn_add_tool = document.getElementById('add_tool');
    const div_tools = document.getElementById('champs_tool');

    const btn_add_step = document.getElementById('add_step');
    const div_steps = document.getElementById('champs_steps');

    const btn_add_ingr = document.getElementById('add_ingr');
    const div_ingrs = document.getElementById('champs_ingrs');

    btn_add_tool.addEventListener("click", add_tool);
    btn_add_step.addEventListener("click", add_step);
    btn_add_ingr.addEventListener("click", add_ingr);

    let cpt_step = 1;
    let cpt_ingr = 1;
    let cpt_tool = 1;

    function add_tool() {
        var input = document.createElement("input")
        input.setAttribute('class', 'item');
        input.setAttribute('type', 'text');
        input.setAttribute('class', 'input');

        input.setAttribute('placeholder', "Mixeur...");
        div_tools.append(input);
    }

    function add_step() {
        cpt_step++;
        var input = document.createElement("input")
        input.setAttribute('class', 'item');
        input.setAttribute('type', 'text');

        input.setAttribute('class', 'input');

        eval("input.setAttribute('name', 'step" + cpt_step + "');");
        input.setAttribute('placeholder', "Etape...");
        div_steps.append(input);
    }

    function add_ingr() {
        var input_ing = document.createElement("input");
        var input_quen = document.createElement("input");
        var div = document.createElement("div");

        div.setAttribute('class', 'item');

        input_ing.setAttribute('type', 'text');
        input_ing.setAttribute('class', 'input');

        input_ing.setAttribute('placeholder', "Sucre...");
        eval("input_ing.setAttribute('name', 'ingr" + cpt_ingr + "');");

        input_quen.setAttribute('type', 'text');
        input_quen.setAttribute('class', 'input');

        eval("input_quen.setAttribute('name', 'quen" + cpt_ingr + "');");
        input_quen.setAttribute('placeholder', "32g...");
        input_quen.setAttribute('class', 'quentity');

        div.appendChild(input_ing);
        div.appendChild(input_quen);

        div_ingrs.append(div);
    }


    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }

    //-------------------------------------------------------------------

    var x, i, j, l, ll, selElmnt, a, b, c;
    /* Look for any elements with the class "custom-select": */
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /* For each option in the original select element,
            create a new DIV that will act as an option item: */
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /* When an item is clicked, update the original select box,
                and the selected item: */
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /* When the select box is clicked, close any other select boxes,
            and open/close the current select box: */
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        /* A function that will close all select boxes in the document,
        except the current select box: */
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }

    /* If the user clicks anywhere outside the select box,
    then close all select boxes: */
    document.addEventListener("click", closeAllSelect);
</script>