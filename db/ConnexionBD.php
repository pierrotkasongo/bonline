<?php

abstract class  ConnexionBD
{
    private $host="localhost"; //nom du serveur
    private $dataBase = "db_bonline"; // nom de la base
    private $User = "root"; //nom d\'utilisateur
    private $Password = ""; // mot de passe
    private $port = '3306'; // port
    private $url;

    public function getConnexion()
    {

        try{

            $this->url=("mysql:host=".$this->host.";dbname=".$this->dataBase);
            return new PDO($this->url,$this->User,$this->Password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8',PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING));

        }
        catch(PDOException $ex){
            die('<h1> impossible de se connecter à la base de données</h1>' +$ex->getMessage());
        }

    }

}

?>