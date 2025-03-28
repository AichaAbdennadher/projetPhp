<?php
    class connexion
    {
        public function CNXbase(){
            $dbc = new PDO('mysql:host=localhost;dbname=glow &glam', 'root','');
            return $dbc;
        }
    }
?>