<?php
    abstract class BaseControleur
    {
        public abstract function traite(array $params);
        
        public function afficheVue($nomVue, $data = null)
        {
            //inclusion de la vue -- notez que le paramètre data sera utilisé directement dans les vues
            $cheminVue = RACINE . "vues/" . $nomVue . ".php";

            if(file_exists($cheminVue))
                include_once($cheminVue);
            else
                trigger_error("La vue spécifiée est introuvable.");
        }
        
        public function getDAO($nomModele)
        {
            $classe = "Modele_" . $nomModele;
            
            if(class_exists($classe))
            {
                //on crée la connexion à la BD
                $connexionPDO = DBFactory::getDB(DBTYPE, DBNAME, HOST, USER, PWD);
                
                //on crée une instance de la classe Modele_$nomModele
                $objetModele = new $classe($connexionPDO);
                
                if($objetModele instanceof BaseDAO)
                    return $objetModele;
                else
                    trigger_error("Modèle invalide.");
            }
        }


        // Fonction permettand d'assembler/réunir les layouts, sections, blocks, etc
        public function renderTemplate($file_name, $data_array) {
            $path = 'vues/' . $file_name;
            if(file_exists($path)) {
                // Démarrer la temporisation de sortie
                ob_start();
                extract($data_array);
                require($path);
                // Lire le contenu courant du tampon de sortie puis l'efface
                return ob_get_clean();
            } else {
                return 'Pas de fichier';
            }
        }
    }
?>