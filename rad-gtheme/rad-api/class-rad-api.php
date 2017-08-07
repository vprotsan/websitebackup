<?php
class RADAPI{
    var $host;
    var $key;

    function __construct(){
        $this->host = 'http://getrad.co:8080';
        $this->key = 'G6TKOySPuM1S1Fw4MP9TxYgtClOx2goVSwZ8dWfm';
    }

    function get_scene($id){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->host . '/api/v1/scene/' . $id);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-Auth: ' . $this->key));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec($curl);
        curl_close($curl);
        return json_decode($out);
    }

    function create_scene($params){
        $params = json_encode( $params );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->host . '/api/v1/scene');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                                                        'X-Auth: ' . $this->key,
                                                        'Content-Type: application/json'
                                                    ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec ($curl);
        curl_close ($curl);
        return json_decode($out);
    }
}
