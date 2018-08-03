var NodeGeocoder = require('node-geocoder');
 
var options = {
  provider: 'google',
 
  // Optional depending on the providers
  httpAdapter: 'https', // Default
  apiKey: 'AIzaSyDl9SQUHc8U-eJgyXZQ1uVcjxYfyXX-XMc', // for Mapquest, OpenCage, Google Premier
  formatter: null         // 'gpx', 'string', ...
};
 
var geocoder = NodeGeocoder(options);
var address = "Pelotas, RS";
// Using callback
geocoder.geocode(address, function(err, res) {
  if (err){ 
    return console.log(err);
  }
  if(!res.length)
    return console.log('NO RESULTS FOUND');
  console.log('Latitude: ' + res[0].latitude);
  console.log('Longitude: ' + res[0].longitude);
});
