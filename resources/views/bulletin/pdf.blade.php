<!DOCTYPE html>
<html>
<head>
    <title>Bulletin de paie</title>
</head>
<body>
    <h1>Bulletin de paie de {{ $bulletin->employer->nom }}</h1>
    <p>Mois: {{ $bulletin->mois }}</p>
    <p>Salaire Brut: {{ $bulletin->salaire_brute }}</p>
    <p>Salaire Net: {{ $bulletin->salaire_net }}</p>
</body>
</html>
