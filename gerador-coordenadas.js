window.addEventListener('load', function(){
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDl9SQUHc8U-eJgyXZQ1uVcjxYfyXX-XMc&callback=init';
    document.body.appendChild(script);
});

function init() {
    var geocoder = new google.maps.Geocoder();
    document.getElementById('submit').addEventListener('click', function() {
      address = document.getElementById('address').value;
      geocodeAddress(geocoder, address);
    });
}

function geocodeAddress(geocoder, address) {
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK')
            return console.log('Latitude: ' + results[0].geometry.location.lat() + 'Longitude: ' + results[0].geometry.location.lng());
        else
            alert('Geocode was not successful for the following reason: ' + status);
    });
}