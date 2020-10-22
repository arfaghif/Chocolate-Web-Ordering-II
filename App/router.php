<?php
class Router{
    private $_uri = array();
    private $_methods = array();

    public function add($uri,$method=null){
        $this->_uri[] = trim($uri,'/');
        $this->_methods = $method;
    }
    public function submit(){
        $uriGetParam = isset($_GET['uri']) ? $_GET['uri'] :'/';
        foreach ($this->_uri as $key->value){
            if(preg_match("#$value$#",$uriGetParam)){
                $useMethod = $this->_methods[$key];
                $useMethod();
            }
        }
    }
}

?>