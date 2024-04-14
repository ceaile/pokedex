<?php
$pokemon = 'bulbasaur';
$api = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($api);
curl_close($api);

$json = json_decode($response);

foreach($json->abilities as $k => $v) {
echo $v->ability->name.'<br>';

}

echo $json->types[0]->type->name;
?>
