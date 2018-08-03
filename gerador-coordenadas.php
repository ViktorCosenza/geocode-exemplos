<?PHP
    echo getCoordinates('Gen osorio n 527, Pelotas, RS');
    function getCoordinates($address){
 
        $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google   search pattern
 
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
 
        $response = file_get_contents($url);
        $json = json_decode($response,TRUE); //generate array object from the response from the web

        if($json['status'] === 'ZERO_RESULTS')
            return 'Cannot find address';
        if($json['status'] === 'OVER_QUERY_LIMIT'){
            sleep(1);
            for($i = 0; ($json['status'] !== 'OK') && $i < 3; $i++){
                $response = file_get_contents($url);
                $json = json_decode($response,TRUE); //generate array object from the response from the web
            }
        }
        
        if($json['status'] !== 'OK')
            return 'Erro ' . $json['status'];
        
        return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
    }
?>