var btn = document.getElementsByClassName("button")[0];


btn.addEventListener("click", function () {
    ChargeInfosJson();
});


function ChargeInfosJson() {
    fetch("pizza.json")
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            console.log(data);
            CreateDivs(data);
        });
}

function CreateDivs(_data) {

    var preview = document.getElementsByClassName("preview")[0];
    preview.innerHTML = "";

    var pizzeriaName = document.createElement("div");
    pizzeriaName.innerHTML = _data.Name;
    pizzeriaName.setAttribute("id", "NomPizza");

    var pizzeriaSlogan = document.createElement("div");
    pizzeriaSlogan.innerHTML = _data.Slogan;
    pizzeriaSlogan.setAttribute("id", "Slogan");


    preview.appendChild(pizzeriaName);
    preview.appendChild(pizzeriaSlogan);


    var PizzeriaListPizzas = document.createElement("div");
    PizzeriaListPizzas.setAttribute("id", "PizzaList");
    PizzeriaListPizzas.setAttribute("class", "contenu");

    var listPizzas = _data.Pizzas;
    for (var x = 0; x < listPizzas.length; x++) {
        var listIngredients = listPizzas[x].Ingredients;
        var PizzaListElement = document.createElement("div");
        PizzaListElement.setAttribute("class", "card");

        PizzaListElement.innerHTML = '<h1 class = "pizzanom">' + listPizzas[x].Name + '</h1>' +
            '<h2 class = "pizzaprix">' + listPizzas[x].Prix + '</h2>' +
            '<img src= ' + listPizzas[x].Image + '><ul>';


        for ( var y = 0; y < listIngredients.length; y++){
            PizzaListElement.innerHTML += '<li class="ingredient">' + listIngredients[y] + '</li>';
        }
        PizzaListElement.innerHTML += '</ul>';

        PizzeriaListPizzas.appendChild(PizzaListElement);
    }
    preview.appendChild(PizzeriaListPizzas);
}

