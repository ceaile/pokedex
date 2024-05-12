<?php
/*
testeo de parametros de sesion
esta sera la lista con todos los pokemon
caundo se clicke a uno en concreto y abra su pagina con url /ficha
debe tener el id del pokemon como parametro GET
ejemplo: /ficha?id_pokemon=25
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a id="inicio" href="#">Inicio</a><img height=1px width=40px src="../img/spacer.gif" alt=""><a href="#">Mis Equipos</a></li>
                <li>
                    <input class="redondearbordes" type="text" placeholder="Buscar">
                    <button class="redondearbordes" id="searchBtn"><img width=15px height=15px src="../img/filtro.gif"></button>
                </li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </header>
    <div class="pokemon-container">

    </div>
    <div id="spinner" class="spinner-border text-light" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    <script src="./main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchButton = document.getElementById("searchBtn");
            searchButton.addEventListener("click", filterPokemons);
        });

        function filterPokemons() {
            const searchString = document.querySelector("nav ul li input[type='text']").value.toLowerCase();
            const pokemonCards = document.querySelectorAll(".pokemon-block");
            
            const originalOrder = [];
            pokemonCards.forEach(card => {
                originalOrder.push(card.parentElement);
            });
            
            pokemonCards.forEach(card => {
                const pokemonName = card.querySelector(".name").textContent.toLowerCase();
                if (pokemonName.includes(searchString)) {
                    card.parentElement.style.display = "block";
                } else {
                    card.parentElement.style.display = "none";
                }
            });

            const pokemonContainer = document.querySelector(".pokemon-container");
            pokemonContainer.innerHTML = "";
            originalOrder.forEach(card => {
                pokemonContainer.appendChild(card);
            });
        }
    </script>
</body>
</html>