<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel Weather API

This is a simple weather application built using Laravel. It allows users to fetch real-time weather data by city name. The project leverages caching with Redis for performance optimization and is fully containerized with Docker to ensure consistent deployment across different environments.

## Features

- **Redis Caching**: Weather data is cached using Redis to minimize repeated API calls, optimizing performance.
- **Dark/Light Mode**: A toggle switch enables users to change the theme between dark and light modes for better user experience.
- **Dockerized Application**: The entire application runs inside Docker containers, ensuring consistency across all environments.
- **API Testing with Postman**: Easily test the weather API endpoints using Postman.

## Technologies and Tools

- **Laravel 11**: The core framework used for routing, controller logic, and Blade templates.
- **Redis**: Used to cache weather data to improve performance and reduce external API calls.
- **Docker & Docker Compose**: Containerization for the entire application, ensuring consistent deployment.
- **Apache**: The web server running inside the Docker container.
- **Postman**: Used to test the API endpoints.
- **Postman Documentation** [here](https://documenter.getpostman.com/view/38857071/2sAY4siQ2K)

## Installation

### Prerequisites

- Docker
- Docker Compose
- Composer
- PHP 8.2

### Steps

1. **Clone the repository**:
    ```bash
    https://github.com/mohamedmagdy841/weather-api.git
    ```

2. **Navigate to the project directory**:
    ```bash
    cd weather-api
    ```

3. **Copy `.env.example` to `.env` and configure environment variables (API keys, Redis settings)**:
    ```bash
    cp .env.example .env
    ```

4. **Build and start Docker containers**:
    ```bash
    docker-compose up --build
    ```

5. **Access the application** at `http://localhost:8080/weather`.

## Docker and Redis

This project is fully containerized using **Docker** and **Docker Compose** to ensure it runs consistently across different environments. 
<p align="center"><a href="https://www.docker.com" target="_blank"><img src="https://github.com/user-attachments/assets/b6fcf59c-9532-477b-a030-8e54d939d456" width="300" alt="Docker Logo"></a></p>
<p align="center"><a href="https://redis.io" target="_blank"><img src="https://github.com/user-attachments/assets/454b1985-6723-4448-a127-827c6b12a3c0" width="300" alt="Redis Logo"></a></p>

- **Redis Stack** is included in the setup, which includes both **Redis CLI** and **Redis Insight** for monitoring and debugging cache data.

- The default endpoint for accessing the weather form is configured to be `http://localhost:8080/weather`.


## Project Demo Api

- Response time before caching 1841ms.
- Response time after caching 246ms.

https://github.com/user-attachments/assets/67748d31-6afb-4ab9-8ada-de556c39f4a9

## Project Demo Web

https://github.com/user-attachments/assets/a90d8eb9-143b-4c86-9a15-49159a96e9ee

