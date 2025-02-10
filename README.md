# Toll Station Management System


El Toll Station Management System es una plataforma diseñada para gestionar estaciones de peaje, permitiendo el registro de vehículos, el cálculo automático de tarifas según el tipo de vehículo y la generación de reportes detallados. Facilita la administración eficiente del cobro de peajes y la supervisión de los ingresos.

## Capturas de Pantalla
![Screenshot 2025-02-10 013711](https://github.com/user-attachments/assets/fb322068-774b-4ad6-a8b0-49998beb746e)

![Screenshot 2025-02-10 013752](https://github.com/user-attachments/assets/7d4be767-8c1c-418b-8c01-7d1148d5633a)
![Screenshot 2025-02-10 013813](https://github.com/user-attachments/assets/9c6644bd-9cf6-4aec-894b-5dfada15da09)

## Pre-requisitos

Para ejecutar este proyecto, necesitas instalar:
- PHP >= 8.0
- Laravel >= 10
- Composer
- Node.js y npm
- Base de datos SQLite / MySQL / PostgreSQL

## Pasos para la Instalación

1. Clonar el repositorio:
   ```sh
   git clone https://github.com/tu-repositorio/toll-station-management.git
   cd toll-station-management
   ```

2. Instalar dependencias del backend:
   ```sh
   composer install
   ```

3. Configurar el archivo `.env`:
   ```sh
   cp .env.example .env
   ```
   Y configurar los datos de la base de datos.

4. Generar la clave de la aplicación:
   ```sh
   php artisan key:generate
   ```

5. Ejecutar migraciones y seeders:
   ```sh
   php artisan migrate --seed
   ```

6. Instalar dependencias del frontend:
   ```sh
   npm install && npm run dev
   ```

7. Iniciar el servidor:
   ```sh
   php artisan serve
   ```

## Ejecución de los Tests

Para ejecutar las pruebas:
```sh
php artisan test
```

### Captura de la cobertura
![Screenshot 2025-02-10 011633](https://github.com/user-attachments/assets/82c92272-b43b-4da2-b171-fc1acefeb46e)

## Diagramas realizados - Jira
![Screenshot 2025-02-07 235244](https://github.com/user-attachments/assets/dc93d32c-426e-4a50-8605-c71452d3f6a3)

![Screenshot 2025-02-10 014057](https://github.com/user-attachments/assets/ef933562-cb89-4f8e-9e5f-4a00842ae53f)

## Documentación de las APIs (EndPoints)
# API Documentation

## Station Routes

| HTTP Method | Endpoint | Controller & Method | Route Name | Description |
|------------|----------|---------------------|------------|-------------|
| **GET** | `/station` | `StationController@index` | `station.index` | Retrieve a list of all stations. |
| **POST** | `/station` | `StationController@store` | `station.store` | Create a new station. |
| **GET** | `/station/{id}` | `StationController@show` | `station.show` | Retrieve details of a specific station by ID. |
| **PUT** | `/station/{id}` | `StationController@update` | `station.update` | Update details of a specific station. |
| **DELETE** | `/station/{id}` | `StationController@destroy` | `station.destroy` | Delete a station by ID. |

## Vehicle Routes

| HTTP Method | Endpoint | Controller & Method | Route Name | Description |
|------------|----------|---------------------|------------|-------------|
| **GET** | `/vehicle` | `VehicleController@index` | `vehicleIndex` | Retrieve a list of all vehicles. |
| **POST** | `/vehicle` | `VehicleController@store` | `vehicle.store` | Create a new vehicle record. |
| **GET** | `/vehicle/{id}` | `VehicleController@show` | `vehicle.show` | Retrieve details of a specific vehicle. |
| **PUT** | `/vehicle/{id}` | `VehicleController@update` | `vehicle.update` | Update details of a specific vehicle. |
| **DELETE** | `/vehicle/{id}` | `VehicleController@destroy` | `vehicle.destroy` | Delete a vehicle record. |

## Station-Vehicle Interaction Routes

| HTTP Method | Endpoint | Controller & Method | Route Name | Description |
|------------|----------|---------------------|------------|-------------|
| **GET** | `/station/{id}/vehicles` | `VehicleController@getVehiclesByStation` | `getVehiclesByStation` | Retrieve all vehicles that have passed through a station. |
| **GET** | `/station/{id}/total-collected` | `VehicleController@getTotalCollected` | `getTotalCollected` | Get the total collected fee at a specific station. |
| **POST** | `/vehicles/{id}/stations/{stationId}` | `VehicleController@passStation` | `apipassStation` | Register a vehicle passing through a station and charge a fee. |
| **POST** | `/assign-random-vehicles` | `VehicleController@assignRandomVehiclesToStations` | `assignRandomVehiclesToStations` | Assign random vehicles to stations for toll collection. |


## Autores

- Issam Chellaf - Desarrollador Backend
- Issam Chellaf - Desarrollador Frontend
- Issam Chellaf - Diseñadores, QA, etc.

---

© 2025 Toll Station Management System. Todos los derechos reservados.
