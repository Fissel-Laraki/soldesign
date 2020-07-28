<?php
if($this->request->controller === 'admin'){
    if(!($this->Session->isLogged() && $this->Session->isAdmin())){
        $this->e404('La page est indisponible');
    }   
}

if($this->request->controller === 'product' || $this->request->controller === 'main'){
    if(($this->Session->isLogged() && $this->Session->isAdmin())){
        $this->e404('La page est indisponible');
    }   
}