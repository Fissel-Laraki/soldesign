<?php

class Router{

    /**
     * Allows to parse a given url
     * @param url to parse and the Request object
     * @return array containing the parsed url
     */
    static function parse($url,$request){

        // Usually the url should look like this : blabla/controller/action/param1/param2/...
        $url = trim($url,'/');
        $params = explode('/',$url);
        $request->controller = $params[0]; // We save the controller
        $request->action = isset($params[1]) ? $params[1] : 'index'; // We save the requested action
        $request->params = array_slice($params,2); // We put the rest of the url in an array 

    }
    
}