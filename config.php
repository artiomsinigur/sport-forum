<?php
    //le fichier config devrait contenir toutes vos constantes de configuration
     define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/php/maisonneuve/TP/php3/public_html/");
    // define("RACINE", $_SERVER["DOCUMENT_ROOT"] . $_SERVER['REQUEST_URI']);
    session_start();

    // Définir des constantes
    define('VISITOR', 1);
    define('REGISTERED', 2);
    define('ADMIN', 3);

    // Définition des constantes de connexion à la BD..
    define("DBTYPE", "mysql");
    define("DBNAME", "sport_forum");
    define("HOST", "localhost");
    define("USER", "root");
    define("PWD", "");

    // Définition de la fonction d'autoload
    function mon_autoloader($nomClasse)
    {
        $repertoires = array(RACINE . "controleurs/",
                            RACINE . "modeles/",
                            RACINE . "vues/");
        
        foreach($repertoires as $rep)
        {
            if(file_exists($rep . $nomClasse . ".php"))
            {
                require_once($rep . $nomClasse . ".php");
                return;
            }
        }
    }
    
    //enregistrement de ma fonction d'autoload
    spl_autoload_register("mon_autoloader");
?>