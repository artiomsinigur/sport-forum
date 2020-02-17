<?php
    class Controleur_Category extends BaseControleur {
        public function traite(array $params) {
            //assigner une action par défaut
            $action = "listAll";

            if(isset($params["action"])) {
                 $action = $params["action"]; 
            }
            // =============================//
            // Récuperer les catégories pour le select
            // =============================//
            switch($action){
                case "listAll":
                    $modelTopics = $this->getDAO("Category");
                    $categories = $modelTopics->getCategories();

                    $page_content = $this->renderTemplate('main.php', [
                        'categories' => $categories
                    ]);
                    $layout_content = $this->renderTemplate('layout.php', [
                        'main_content'  => $page_content,
                        'title'         => 'Catégories'
                    ]);
                    print($layout_content);
                    break;
            }
//            var_dump($params, $_SESSION);
        }
   }
?>