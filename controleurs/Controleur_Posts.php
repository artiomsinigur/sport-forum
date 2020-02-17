<?php
class Controleur_Posts extends BaseControleur {
        public function traite(array $params) {
            //assigner une action par défaut
            $action = "post";

            if(isset($params["action"])) {
                 $action = $params["action"]; 
            }
            //structure de controle qui détermine quelles actions poser en fonction du paramètre action
            switch($action){
                case "post":
                    header('Location: index.php?Topics');
                    break;
                // ===============================//
                // Récupèrer le formulaire d'ajout d'une réponse
                // ===============================//
                case "formAddPost":
                    // Stocker le chemin temporaire dans une session
                    $_SESSION["path"] = $_SERVER['QUERY_STRING'];

                    // Si n'est pas connecter, on le dirige vers le formulaire d'authentification, sinon, on laisse passer
                    if (!isset($_SESSION["pseudo"])) {
                        header('Location: index.php?Members&action=formSignIn');
                        exit();
                    }

                    $page_content = $this->renderTemplate('form-add-post.php', []);
                    $layout_content = $this->renderTemplate('layout.php', [
                        'main_content'  => $page_content,
                        'title'         => 'Création d’une nouvelle réponse'
                    ]);
                    print($layout_content);
                    break;
                // ===============================//
                // Ajout d'une réponse
                // ===============================//
                case "addPost":
                    // Si n'est pas connecter, on sort
                    if (!isset($_SESSION["pseudo"])) {
                        header('Location: index.php');
                        exit();
                    }

                    $comment = isset($params["comment"]) ? strip_tags(trim($params["comment"])) : header('Location: index.php');
                    // Valider le champ text
                    if ($comment) {
                        if (!is_numeric($comment)) {
                            if (strlen($comment) > 5 && strlen($comment) < 2000) {
                            } else {
                                $errors["post-text"] = "Veuillez entrer entre 5 et 2000 caractères!";
                            }
                        } else {
                            $errors["post-text"] = "Veuillez saisir un format valide!";
                        }
                    } else {
                        $errors["post-text"] = "Le champ est obligatoire!";
                    }

                    // S'il n'y a pas d'erreurs, ajouter le post
                    if (empty($errors)) {
                        $post = new Post(0, $comment, null, $_SESSION["pseudo"], $_SESSION["idTopic"]);
                        $modelPost = $this->getDAO("Posts");
                        $modelPost->addPost($post);

                        // Mettre à jour le sujet en question
                        $modelTopics = $this->getDAO("Topics");
                        $modelTopics->updateTopicByPost($_SESSION["idTopic"]);
                        header('Location: index.php?Topics&action=topic&id=' . $_SESSION["idTopic"]);
                        exit();
                    }

                    // Afficher la vue avec le formulaire ainsi que les erreurs
                    $page_content = $this->renderTemplate('form-add-post.php', [
                        'errors' => $errors
                    ]);
                    $layout_content = $this->renderTemplate('layout.php', [
                        'main_content' => $page_content
                    ]);
                    print($layout_content);
                    break;
            }
//            var_dump($params, $_SESSION);
        }
   }
?>