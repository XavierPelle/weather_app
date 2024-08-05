# Weather Application

## Description

Ce projet est une application web simple qui permet d'obtenir des informations météorologiques pour une ville donnée, un ID de ville, ou des coordonnées géographiques en utilisant l'API OpenWeatherMap.

## Prérequis

- Docker

## Installation

1. Clonez ce dépôt sur votre machine locale :
    ```sh
    git clone https://github.com/XavierPelle/weather_app.git
    cd weather_app
    ```

2. Placez-vous dans le dossier `docker` :
    ```sh
    cd docker
    ```

3. Démarrez les conteneurs Docker :
    ```sh
    docker-compose up -d
    ```

## Utilisation

### Accéder à l'application

Une fois les conteneurs démarrés, l'application devrait être accessible à l'adresse suivante : [http://localhost:8123](http://localhost:8123).

### Paramètres de l'URL

Pour obtenir les informations météorologiques, vous pouvez utiliser l'un des paramètres suivants dans l'URL :

- **city** : Nom de la ville (ex. `?city=Paris`)
- **city_id** : ID de la ville (ex. `?city_id=2988507`)
- **lat** et **lon** : Latitude et longitude (ex. `?lat=48.8566&lon=2.3522`)

### Exemple d'URL

- Par nom de ville :
    ```
    http://localhost:8123?city=Paris
    ```

- Par ID de ville :
    ```
    http://localhost:8123?city_id=2988507
    ```

- Par coordonnées géographiques :
    ```
    http://localhost:8123?lat=48.8566&lon=2.3522
    ```

### Tutoriel

Si aucun paramètre n'est fourni ou si l'utilisateur se trompe dans les paramètres, un mini tutoriel sera affiché pour guider l'utilisateur sur la façon d'utiliser l'application.

## Structure du Projet

- `controllers/` : Contient le contrôleur de l'application.
- `services/` : Contient le service de récupération des données météorologiques depuis l'API OpenWeatherMap.
- `docker/` : Contient les fichiers de configuration Docker.
