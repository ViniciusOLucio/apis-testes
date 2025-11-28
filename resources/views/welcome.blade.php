<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif

    @livewireStyles
</head>
<body>

<livewire:api-search-name />

<div class="py-10">

</div>
<header class="container text-xl mx-auto w-full"><h1> {{ $data['squadName'] }}</h1>
    <h2> {{ $data['homeTown'] }}</h2>
</header>

<section class="bg-blue-200 container w-full mx-auto flex gap-10">
    @foreach($data['members'] as $hero)
        <div class=" ">
            <h3> {{$hero['name']}} - {{$hero['secretIdentity']}}</h3>
            <h2 class="text-red-700 text-bold">Idade: {{$hero['age']}} </h2>
            @foreach($hero['powers'] as $power)
                <li class="text-bold font-bold "> {{$power}}</li>
            @endforeach
        </div>
    @endforeach
</section>

<script>
    var header = document.querySelector("#Header");
    var section = document.querySelector("#section");

    var requestURL = "https://mdn.github.io/learning-area/javascript/oojs/json/superheroes.json";

    var request = new XMLHttpRequest();
    request.open("GET", requestURL);

    request.responseType = "json";
    request.send();

    request.onload = function () {
        var superHeros = request.response;
        console.log(superHeros);
        populateHeader(superHeros);
        showHeros(superHeros);
    };

    function populateHeader(jsonObj) {
        var myH1 = document.createElement("h1");
        myH1.textContent = jsonObj["squadName"];
        header.appendChild(myH1);

        var myPara = document.createElement("p");
        myPara.textContent =
            "Hometown: " + jsonObj["homeTown"] + "// Formed: " + jsonObj["formed"];
        header.appendChild(myPara);
    };

    function showHeros(jsonObj) {
        var heros = jsonObj["members"];

        for (var i = 0; i < heros.length; i++) {
            var myArticle = document.createElement("article");
            var myH2 = document.createElement("h2");
            var myPara1 = document.createElement("p");
            var myPara2 = document.createElement("p");
            var myPara3 = document.createElement("p");
            var myList = document.createElement("ul");

            myH2.textContent = heros[i].name;
            myPara1.textContent = "Secret ID: " + heros[i].secretIdentity;
            myPara2.textContent = "Age: " + heros[i].age;
            myPara3.textContent = "Superpowers:";

            var superPowers = heros[i].powers;
            for (var h = 0; h < superPowers.length; h++) {

                var listItem = document.createElement("li");
                listItem.textContent = superPowers[h];
                myList.appendChild(listItem);
            }

            myArticle.appendChild(myH2);
            myArticle.appendChild(myPara1);
            myArticle.appendChild(myPara2);
            myArticle.appendChild(myPara3);
            myArticle.appendChild(myList);

            section.appendChild(myArticle);
        }
    };
</script>

@livewireScripts
</body>
</html>
