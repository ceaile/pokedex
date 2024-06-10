<div class="pokemon-container" style="opacity: 0;" id="pokemonContainer">
    <?php foreach ($pokedex as $pokemon) : ?>
        <div class="pokemon-item">
            <a href="/card?id_pokemon=<?= $pokemon['id'] ?>">
                <img id="<?= $pokemon['id'] ?>" 
                     src="<?= $pokemon['art'] ?>"
                     class="pokemon-image w-48 h-48 mx-auto">
            </a>
            <div class="types-container flex flex-wrap justify-center">
                <?php foreach ($pokemon['tipos'] as $tipo) : ?>
                    <div class="tipo-<?= strtolower($tipo) ?> rounded-full px-3 py-1 mx-1">
                        <p style="color: white;"><?= $tipo ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <br>
        </div>
    <?php endforeach; ?>
</div>

<style>
.pokemon-container {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    padding: 20px;
    gap: 10px;
    height: 80vh;
    max-width: 100vw;
    align-items: center;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
}

.pokemon-item {
    flex: 0 0 auto;
    width: 230px;
    height: 350px;
    background-color: transparent;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    overflow: hidden;
    text-align: center;
    margin: 10px 0;
}

.pokemon-image {
    width: 100%;
    height: auto;
}

.types-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap; /* Permite que los tipos se envuelvan */
}

.type-text {
    text-align: center;
    border: 1px solid #000;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
    background-color: #f0f0f0;
}
/*
@media (max-width: 768px) {
    .pokemon-container {
        flex-direction: column;
        overflow-x: hidden;
        overflow-y: auto;
        align-items: center;
        width: 100%; /* Asegura que el contenedor ocupe todo el ancho de la pantalla */
        /*min-height: 100vh; /* Asegura que el contenedor tenga al menos la altura de la ventana del navegador */
   /* }

    .pokemon-item {
        width: 70%; /* Hace las tarjetas más anchas en el espacio disponible */
       /* height: auto;*/ /* Altura automática para adaptarse al contenido */
       /* margin: 10px; /* Añade margen alrededor de cada tarjeta para espacio */
   /* }

    /*.pokemon-image {
       /* margin-top: 10px; /* Espacio superior para la imagen */
        /*height: 80%; /* Altura en porcentaje para la imagen */
       /* object-fit: cover; /* Asegura que la imagen cubra el área designada sin perder proporción */
   /* }
}

/* Colores para cada tipo de Pokémon */
.tipo-fire { background-color: red; color: white; }
.tipo-water { background-color: blue; color: white; }
.tipo-grass { background-color: green; color: white; }
.tipo-ghost { background-color: purple; color: white; }
.tipo-normal { background-color: gray; color: white; }
.tipo-fighting { background-color: orange; color: black; }
.tipo-bug { background-color: lime; color: white; }
.tipo-dark { background-color: black; color: white; }
.tipo-electric { background-color: gold; color: black; }
.tipo-fairy { background-color: pink; color: white; }
.tipo-rock { background-color: brown; color: white; }
.tipo-flying { background-color: skyblue; color: black; }
.tipo-psychic { background-color: magenta; color: white; }
.tipo-poison { background-color: darkgreen; color: white; }
.tipo-ground { background-color: sienna; color: white; }
.tipo-steel { background-color: silver; color: black; }
.tipo-dragon { background-color: indigo; color: white; }
.tipo-ice { background-color: cyan; color: black; }
.tipo-unknown { background-color: beige; color: black; }
</style>

<script>
document.getElementById('pokemonContainer').addEventListener('wheel', function(event) {
    if (event.deltaY > 0) {
        this.scrollLeft += 100;
    } else {
        this.scrollLeft -= 100;
    }
    event.preventDefault();
});
</script>
