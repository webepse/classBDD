<?php
    namespace App\HTML;

    class BootstrapForm extends Form{

        protected function surround($html){
            return "<div class='form-group'>".$html."</div>";
        }

        public function input($name,$type = "text"){
            return $this->surround(
                "<label for='".$name."'>".$name."</label>
                <input type='".$type."' id='".$name."' name='".$name."' value='".$this->getValue($name)."' class='form-control'>
                "
            );
        }

        public function submit(){
            return $this->surround("<button type='submit' class='btn btn-primary'>Envoyer</button>");
        }

    }


?>