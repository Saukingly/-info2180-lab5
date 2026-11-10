document.addEventListener("DOMContentLoaded", function() {

    const lookup = document.getElementById("lookup");
    const result = document.getElementById("result");
    const country = document.getElementById("country");
    lookup.addEventListener('click', function() {
        const url = 'world.php?country=' + encodeURIComponent(country.value.trim());
        fetch(url)
            .then(function(response) {
                return response.text();
            })
            .then(function(data) {
                result.innerHTML = data;
            })
            .catch();
    });

    const cities_lookup = document.getElementById("cities-lookup");
    cities_lookup.addEventListener('click', function() {
        const url = 'world.php?country=' + encodeURIComponent(country.value.trim()) + '&lookup=cities';
        console.log(url);
        fetch(url)
            .then(function(response) {
                return response.text();
            })
            .then(function(data) {
                result.innerHTML = data;
            })
            .catch();
    });

})