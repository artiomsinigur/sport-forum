<?php
    class Controleur_Topics extends BaseControleur {
        public function traite(array $params) {
            //assigner une action par défaut
            $action = "listAll";

            if(isset($params["action"])) {
                 $action = $params["action"];
            }
            //structure de controle qui détermine quelles actions poser en fonction du paramètre action
            switch($action){
                case "listAll":
                    // if (!isset($_SESSION["pseudo"])) {
                    //     header('Location: index.php');
                    //     exit();
                    // }

                    // Afficher les sujets pour tout le monde
                    $modelTopics = $this->getDAO("Topics");
                    $listTopics = $modelTopics->getTopicsAndPosts();
                    $nrTopics = $modelTopics->countAllTopics();

                    // Obtenir tous les catégories
                    $modelCategories = $this->getDAO("Category");
                    $listCategories = $modelCategories->getCategories();

                    // Compter tous les messages
                    $modelPosts = $this->getDAO("Posts");
                    $nrPosts = $modelPosts->countAllPosts();

                    // Compter tous les membres
                    $modelMembers = $this->getDAO("Members");
                    $nrMembers = $modelMembers->countAllMembers();

                    $page_content = $this->renderTemplate('main.php', [
                        'listTopics'        => $listTopics,
                        'listCategories'    => $listCategories,
                        'nrPosts'           => $nrPosts,
                        'nrTopics'          => $nrTopics,
                        'nrMembers'         => $nrMembers
                    ]);
                    $layout_content = $this->renderTemplate('layout.php', [
                        'main_content'  => $page_content,
                        'title'         => 'Sport Forum'
                    ]);
                    print($layout_content);
                    break;
                // ====================================//
                // Afficher le contenu d'un sujet
                // ====================================//
                case "topic":
                    // Toujours, tout le monde à accès à cette page
                    $idTopic = isset($params["id"]) ? intval($params["id"]) : false;

                    // Id de la session sera utiliser pour ajouter un réponse dans le sujet courant
                    $_SESSION["idTopic"] = $idTopic;

                    if ($idTopic) {
                        $modelTopic = $this->getDAO("Topics");
                        $topic = $modelTopic->getTopicById($idTopic);

                        // Vérifier si l'id existe
                        if ($topic) {
                            $modelPosts = $this->getDAO("Posts");
                            $posts = $modelPosts->getPostsByTopic($idTopic);
                        } else {
                            header('Location: index.php');
                        }
                    } else {
                        header('Location: index.php');
                    }

                    // Afficher la vue avec les données
                    $page_content = $this->renderTemplate('page-topic.php', [
                        'topic'     => $topic,
                        'posts'     => $posts
                    ]);
                    $layout_content = $this->renderTemplate('layout.php', [
                        'main_content'  => $page_content,
                        'title'         => 'Sujet'
                    ]);
                    print($layout_content);
                    break;
                // =============================//
                // Récuperer le formulaire pour publier un sujet
                // Récuperer les catégories pour le select
                // =============================//
                case "formAddTopic":
                    // phpinfo();
                    // Stocker le chemin temporaire dans une session
                    // J'ai pas utilisé la variable $_SERVER["HTTP_REFERER"] en raison de la possibilité de la modifié
                    $_SESSION["path"] = $_SERVER['QUERY_STRING'];

                    // Si n'est pas connecter, on le dirige vers le formulaire d'authentification, sinon, on laisse passer
                    if (!isset($_SESSION["pseudo"])) {
                        header('Location: index.php?Members&action=formSignIn');
                        exit();
                    }

                    $modelTopics = $this->getDAO("Category");
                    $categories = $modelTopics->getCategories();
                    $page_content = $this->renderTemplate('form-add-topic.php', ['categories' => $categories]);
                    $layout_content = $this->renderTemplate('layout.php', [
                        'main_content'  => $page_content,
                        'title'         => 'Création d’un nouveau sujet'
                    ]);
                    print($layout_content);
                    break;
                // =============================//
                // Le formulaire d'ajout d'un sujet
                // =============================//
                case "addTopic":
                    // Si n'est pas connecter, on le dirige vers le formulaire d'authentification
                    if (!isset($_SESSION["pseudo"])) {
                        header('Location: index.php?Members&action=formSignIn');
                        exit();
                    }

                    $title = isset($params["title"]) ? strip_tags(trim($params["title"])) : header('Location: index.php');
                    $text = isset($params["text"]) ? strip_tags(trim($params["text"])) : header('Location: index.php');
                    $idCat = isset($params["idCat"]) ? intval($params["idCat"]) : header('Location: index.php');

                    // Validation de titre
                    if ($title) {
                        if (!is_numeric($title)) {
                            if (strlen($title) > 5 && strlen($title) < 70) {
                            } else {
                                $errors["topic-title"] = "Veuillez entrer entre 5 et 70 caractères!";
                            }
                        } else {
                            $errors["topic-title"] = "Le champ ne peut pas contenir que des chiffres!";
                        }
                    } else {
                        $errors["topic-title"] = "Le champ est obligatoire!";
                    }

                    // Validation de text
                    if ($text) {
                        if (strlen($text) > 5 && strlen($title) < 2000) {
                        } else {
                            $errors["topic-text"] = "Veuillez entrer entre 5 et 2000 caractères!";
                        }
                    } else {
                        $errors["topic-text"] = "Le champ est obligatoire!";
                    }

                    // Si pas d'erreurs
                    if (empty($errors)) {
                        if (isset($_SESSION["pseudo"])) {
                            $newTopic = new Topic(0, $title, $text, 0, null, null, $idCat, $_SESSION["pseudo"]);
                            $modelTopic = $this->getDAO("Topics");
                            $modelTopic->addTopic($newTopic);
                            header('Location: index.php');
                            exit();
                        } else {
                            header('Location: index.php');
                        }
                    }

                    // Afficher la vue avec les données
                    $modelCategory = $this->getDAO("Category");
                    $categories = $modelCategory->getCategories();
                    $page_content = $this->renderTemplate('form-add-topic.php', [
                        'categories'    => $categories,
                        'errors'        => $errors
                    ]);
                    $layout_content = $this->renderTemplate('layout.php', [
                        'main_content'  => $page_content,
                        'title'         => 'Création d’un nouveau sujet'
                    ]);
                    print($layout_content);
                    break;
                // ==============================//
                // Obtenir tous les sujets
                // ==============================//
                case 'deleteTopic':
                    if (isset($_SESSION["rang"]) && ($_SESSION["rang"] == ADMIN)) {
//                        $modelTopics = $this->getDAO("Topics");
//                        $listTopics = $modelTopics->getListTopics();
                    } else {
                        header('Location: index.php');
                        exit();
                    }

                    $id = isset($params["id"]) ? intval($params["id"]) : false;
                    if ($id) {
                        // D'abord, supprimer toutes les réponses d'un sujet
                        $modelPosts = $this->getDAO("Posts");
                        $modelPosts->deletePostsByIdOfTopic($id);

                        // Ensuite supprimer le sujet
                        $modelTopic = $this->getDAO("Topics");
                        $modelTopic->deleteTopicById($id);
                        header('Location: index.php?Members&action=adminTopics');
                    }
                    break;
                // ==============================//
                // Obtenir tous les sujets par catégorie
                // ==============================//
                case 'topicsByCat':
                    $idCat = isset($params["id"]) ? intval($params["id"]) : false;

                    $modelTopics = $this->getDAO("Topics");
                    $listTopics = $modelTopics->getTopicsByCategory($idCat);

                    var_dump($listTopics);
                    die();

                    $modelCategories = $this->getDAO("Category");
                    $listCategories = $modelCategories->getCategories();


                    // Afficher la vue avec les données
                    $page_content = $this->renderTemplate('main.php', [
                        'listTopics'    => $listTopics,
                        'listCategories' => $listCategories
                    ]);
                    $layout_content = $this->renderTemplate('layout.php', [
                        'main_content'  => $page_content,
                        'title'         => 'Les sujets par catégorie'
                    ]);
                    print($layout_content);
                    break;
            }
//            var_dump($params, $_SESSION);
        }
   }
?>