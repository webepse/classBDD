<?php
    namespace App;

    class Article{

        public function getURL(){
            return 'index.php?action=article&id='.$this->id;
        }

        public function getExtrait(){
            $texte = strip_tags($this->content);
            if(preg_match('#(\w+\W+){20}\w+#s',$texte,$out)){
                $html = "<div>".$out[0]."...<a href='".$this->getURL()."'>voir la suite</a></div>";
            }else{
                $html = "<div>".$texte."</div>";
            }

            return $html;

        }



    }



?>