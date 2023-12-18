document.addEventListener('DOMContentLoaded', function() {
    // List of cities
    const cities = ['Paris', 'Bengaluru', 'Moscow', 'Allahabad'];

    // API key for the RapidAPI
    const apiKey = '849b469476msheba35c78aa0af8fp111642jsnd00e7d421c8f'; // Replace with your actual RapidAPI key

    // Update weather information for each city
    cities.forEach(city => {
        fetchWeatherData(city, apiKey);
    });

    // Function to fetch weather data for a specific city using RapidAPI
    async function fetchWeatherData(city, apiKey) {
        const apiUrl = `https://weather-by-api-ninjas.p.rapidapi.com/v1/weather?city=${encodeURIComponent(city)}`;

        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '849b469476msheba35c78aa0af8fp111642jsnd00e7d421c8f',
                'X-RapidAPI-Host': 'weather-by-api-ninjas.p.rapidapi.com'
            }
        };

        try {
            const response = await fetch(apiUrl, options);
            const data = await response.json();

            // Update HTML elements with the received weather data
            updateWeatherInfo(city, data);
        } catch (error) {
            console.error(`Error fetching weather data for ${city}:`, error);
        }
    }

    // Function to update HTML elements with weather information from RapidAPI
    function updateWeatherInfo(city, data) {
        const prefix = city.toLowerCase().replace(/\s/g, '_'); // Convert city name to lowercase and replace spaces with underscores

        document.getElementById(`${prefix}_cloud_pct`).innerText = data.cloud_pct;
        document.getElementById(`${prefix}_feels_like`).innerText = data.feels_like;
        document.getElementById(`${prefix}_humidity`).innerText = data.humidity;
        document.getElementById(`${prefix}_max_temp`).innerText = data.max_temp;
        document.getElementById(`${prefix}_min_temp`).innerText = data.min_temp;
        document.getElementById(`${prefix}_sunrise`).innerText = data.sunrise;
        document.getElementById(`${prefix}_sunset`).innerText = data.sunset;
        document.getElementById(`${prefix}_temp`).innerText = data.temp;
        document.getElementById(`${prefix}_wind_degrees`).innerText = data.wind_degrees;
        document.getElementById(`${prefix}_wind_speed`).innerText = data.wind_speed;
    }
});
