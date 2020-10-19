<?php
    namespace App\HTML;

    class Form{
        protected $data;
        public $surround = 'p';

        public function __construct($data = [])
        {
            $this->data = $data;
        }

        protected function surround($html)
        {
            return "<".$this->surround.">".$html."</".$this->surround.">";
        }
        /*
        protected function getValue($key){
            if(isset($this->data[$key])){
                return $this->data[$key];
            }else{
                return null;
            }
        }
        */

        protected function getValue($key){
            return isset($this->data[$key]) ? $this->data[$key] : null;
        }

        public function input($name, $type = "text"){
            return $this->surround("<input type='".$type."' name='".$name."' value='".$this->getValue($name)."'>");
        }

        public function submit(){
            return $this->surround("<button type='submit'>Envoyer</button>");
        }
        
    }


?>