<?php
    namespace App;
    use PDO;
    use Exception;
    class Database{
        private $dbHost;
        private $dbName;
        private $dbUser;
        private $dbPass;

        private $bdd;

        public function __construct($dbName, $dbUser = "root", $dbPass = "", $dbHost = "localhost")
        {
            $this->dbHost = $dbHost;
            $this->dbName = $dbName;
            $this->dbUser = $dbUser;
            $this->dbPass = $dbPass;
        }

        private function getBDD()
        {
            if($this->bdd === NULL){
                try{
                    $bdd = new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName.';charset=utf8',$this->dbUser,$this->dbPass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                    $this->bdd = $bdd;
                }catch(Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }

            return $this->bdd;
        }

        public function myQuery($statement,$className){
            $req = $this->getBDD()->query($statement);
            // 'App\\'.$className
            $datas = $req->fetchAll(PDO::FETCH_CLASS,__NAMESPACE__.'\\'.$className);
            $req->closeCursor();
            return $datas;
        }

        public function myPrepare($statement,$values,$className,$one = false)
        {
            $req = $this->getBDD()->prepare($statement);
            $req->execute($values);
            $req->setFetchMode(PDO::FETCH_CLASS,__NAMESPACE__.'\\'.$className);
            if($one){
                $datas = $req->fetch();
            } else {
                $datas = $req->fetchAll();
            }
            $req->closeCursor();
            return $datas;
        }
    }

?>