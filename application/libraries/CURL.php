<?php
/**
 * Created by PhpStorm.
 * User: porfirio
 * Date: 15/10/2014
 * Time: 07:10 PM
 */

class CURL{

    private $curl;
    private $customResponse = FALSE;

    public function __construct($params = array()){

        $this->curl = curl_init();
        $headr[] = 'Content-Type: application/json';
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, isset($params["time_out"]) ? $params["time_out"] : 0);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER,$headr);
    }

    public function customResponse(){
        $this->customResponse = TRUE;
    }

    public function createCustomResponse(){

        $jsonResponse = json_decode(curl_exec($this->curl), TRUE);
        $codeResponse = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

        return array(
            "response" => $jsonResponse,
            "code" => $codeResponse
        );

    }

    public function setHeaders($headers){
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
    }

    public function sendGetMethod($url, $paramethers = NULL){

        if(!is_null($paramethers)){
            $params = $this->buildParamethers($paramethers);
            $url .= "?".$params;
        }


        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($this->curl, CURLOPT_POST, FALSE);

        return $this->customResponse ? $this->createCustomResponse() : curl_exec($this->curl);
    }

    public function sendPostMethod($url, $paramethers = NULL){

        if(!is_null($paramethers)){

            if(json_decode($paramethers)){
                curl_setopt($this->curl, CURLOPT_POSTFIELDS, $paramethers);
            }else{
                $params = $this->buildParamethers($paramethers);
                curl_setopt($this->curl, CURLOPT_POSTFIELDS, $params);
            }

        }

        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($this->curl, CURLOPT_POST, TRUE);

        return $this->customResponse ? $this->createCustomResponse() : curl_exec($this->curl);

    }

    public function buildParamethers($paramethers){

        $param_result = "";

        foreach($paramethers as $key => $value){
            $param_result .= $key."=".$value."&";
        }

        return trim($param_result, "&");

    }

    public function closeCurl(){
        curl_close($this->curl);
    }
// cambios
}

?>