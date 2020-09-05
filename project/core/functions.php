<?php

function debug($var){

    if(Conf::$debug>0){

        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

}

function redirect($url){
    header('Location: '.$url);
}


function diverse_array($vector) {
    $result = array();
    foreach($vector as $key1 => $value1)
        foreach($value1 as $key2 => $value2)
            $result[$key2][$key1] = $value2;
    return $result;
}

function title($text){
    
    echo "<section class=\"jumbotron text-center\">
        <div class=\"container\">
            <h1 class=\"jumbotron-heading\">".$text."</h1>
        </div>
    </section>";
}
function activate($title,$text){
    
    if($title === $text){
        echo "active";
    }else{
        echo "";
    }
}