<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 flex items-center justify-center h-screen">
    <div class="p-8 max-w-lg mx-auto bg-white rounded-xl shadow-md space-y-4">
        <?php if (isset($tutorial) && $tutorial): ?>
            <div class="bg-yellow-100 text-yellow-700 p-6" role="alert">
                <strong class="font-bold">Information :</strong>
                <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
                <p class="mt-2 text-gray-700">Pour obtenir les informations météorologiques, veuillez utiliser l'un des paramètres suivants dans l'URL :</p>
                <ul class="list-disc list-inside text-gray-700">
                    <li><strong>city</strong> : nom de la ville (ex. ?city=Paris)</li>
                    <li><strong>city_id</strong> : ID de la ville (ex. ?city_id=2988507)</li>
                    <li><strong>lat</strong> et <strong>lon</strong> : latitude et longitude (ex. ?lat=48.8566&lon=2.3522)</li>
                </ul>
            </div>
        <?php elseif (isset($error)): ?>
            <div class="bg-red-100 text-red-700 p-4" role="alert">
                <strong class="font-bold">Erreur :</strong>
                <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
            </div>
        <?php else: ?>
            <h1 class="text-2xl font-semibold text-gray-900">Météo pour <?php echo htmlspecialchars($weatherData['name']); ?></h1>
            <p class="text-lg text-gray-700">Température : <?php echo $weatherData['main']['temp']; ?>°C</p>
            <p class="text-lg text-gray-700">Conditions : <?php echo $weatherData['weather'][0]['description']; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
