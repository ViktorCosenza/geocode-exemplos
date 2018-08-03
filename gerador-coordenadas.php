<?PHP
    //Para testar, altere o endereço abaixo 
    echo getCoordinates('Pelotas, RS');
    
    function getCoordinates($address){
 
        $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google   search pattern
 
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
 
        $response = file_get_contents($url);
        

        $json = json_decode($response,TRUE); //generate array object from the response from the web
        if(empty($json['results'])){
            return 'Cannot find address';
        }
        return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
    }
?>