<?php
    class Controleur_Members extends BaseControleur {
        public function traite(array $params) {
            //assigner une action par défaut
            $action = "formSignIn";
            $errors = [];
            $messages = [];

            if(isset($params["action"])) {
                 $action = $params["action"]; 
            }

            //structure de controle qui détermine quelles actions poser en fonction du paramètre action
            switch($action){
                case "formSignIn":
                    // Si la session est ouverte, bloquer l'accès sur cette page
                    if (isset($_SESSION["pseudo"])) {
                        header("Location: index.php?Topics");
                        exit();
                    }

                    $page_content = $this->renderTemplate('signin.php', []);
                    $layout_content = $this->renderTemplate('layout.php', [
                        'main_content'  => $page_content,
                        'title'         => 'Connexion'
                    ]);
                    print($layout_content);
                    break;
                // ==============================//
                // Authentification d'un usager
                // ==============================//
                case "signIn":
                    // Si la session est ouverte, bloquer l'accès sur cette page
                    if (isset($_SESSION["pseudo"])) {
                        header("Location: index.php");
                        exit();
                    }

                    $username = isset($params["username"]) ? trim($params["username"]) : header('Location: index.php');
                    $password = isset($params["password"]) ? trim($params["password"]) : header('Location: index.php');

                    if ($username && $password) {
                        // Étape 1 - Valider l'usager
                        $modelMember = $this->getDAO("Members");
                        $userValide = $modelMember->authentication($username, $password);

                        // Si usager est valide, aller à l'étape 2
                        if ($userValide) {

                            // Étape 2 - Vérifier si le usager est banni
                            $dataUser = $modelMember->getUserbyPseudo($username);
                            if ($dataUser->getMemberBanned() != 1) {

                                // Mettre à jour la date de la denière visite
                                $modelMember->updateLastVisite($dataUser->getMemberPseudo());

                                // Étape 3 - Ouvrire une session et stocker le pseudo et son rang dans des sessions
                                $_SESSION["pseudo"] = $dataUser->getMemberPseudo();
                                $_SESSION["rang"] = $dataUser->getMemberRang();

                                // Récupérer la session["path"] stocké lors d'avant de l'authentification du: formAddTopic ou formAddPost pour aller directement au formulaire
                                header('Location: index.php' . '?' . $_SESSION["path"]);
                                exit();
                            } else {
                                $messages["banned"] = "Vous avez été banni. Veuillez communiquer avec l'administration du site.";
                            }
                        } else {
                            $errors["signin"] = "Le login ou le mots de pass est invalide!";
                        }
                    } else {
                        $errors["signin"] = "Les champs sont requis!";
                    }

                    // Afficher le formulaire avec les erreurs
                    $page_content = $this->renderTemplate('signin.php', [
                        'errors'    => $errors,
                        'messages'  => $messages
                    ]);
                    $layout_content = $this->renderTemplate('layout.php', [
                        'main_content'  => $page_content,
                        'title'         => 'Connexion'
                    ]);
                    print($layout_content);
                    break;
                // ==============================//
                // Aller au tableau de bord
                // ==============================//
                case 'dashboard':
                    if (isset($_SESSION["rang"]) && ($_SESSION["rang"] == ADMIN)) {
                        header('Location: index.php?Members&action=adminTopics');
                    } else {
                        header('Location: index.php');
                    }
                    break;
                // ==============================//
                // Obtenir tous les sujets
                // ==============================//
                case 'adminTopics':
                    if (isset($_SESSION["rang"]) && ($_SESSION["rang"] == ADMIN)) {
                        $modelTopics = $this->getDAO("Topics");
                        $listTopics = $modelTopics->getListTopics();
                        $nrTopics = $modelTopics->countAllTopics();

                        $modelMembers = $this->getDAO("Members");
                        $nrMembers = $modelMembers->countAllMembers();
                    } else {
                        header('Location: index.php');
                        exit();
                    }

                    $page_content = $this->renderTemplate('admin-topic.php', [
                        'listTopics'        => $listTopics
                    ]);
                    $layout_content = $this->renderTemplate('layout-dashboard.php', [
                        'main_content'  => $page_content,
                        'nrTopics'      => $nrTopics,
                        'nrMembers'     => $nrMembers,
                        'title'         => 'Tableau de bord'
                    ]);
                    print($layout_content);
                    break;
                // ==============================//
                // Obtenir tous les membres
                // ==============================//
                case 'adminMembers':
                    if (isset($_SESSION["rang"]) && ($_SESSION["rang"] == ADMIN)) {
                        $modelMembers = $this->getDAO("Members");
                        $listMembers = $modelMembers->listMembers();
                        $nrMembers = $modelMembers->countAllMembers();

                        $modelTopics = $this->getDAO("Topics");
                        $nrTopics = $modelTopics->countAllTopics();
                    } else {
                        header('Location: index.php');
                        exit();
                    }

                    $page_content = $this->renderTemplate('admin-member.php', [
                        'listMembers'        => $listMembers
                    ]);
                    $layout_content = $this->renderTemplate('layout-dashboard.php', [
                        'main_content'  => $page_content,
                        'nrTopics'      => $nrTopics,
                        'nrMembers'     => $nrMembers,
                        'title'         => 'Tableau de bord'
                    ]);
                    print($layout_content);
                    break;
                // ==============================//
                // Bannir un usager
                // ==============================//
                case 'banUser':
                    if (isset($_SESSION["rang"]) && ($_SESSION["rang"] == ADMIN)) {
                        $pseudo = isset($params["pseudo"]) ? trim($params["pseudo"]) : false;

                        $modelMembers = $this->getDAO("Members");
                        $userState = $modelMembers->getUserbyPseudo($pseudo);

                        // Si l'usager n'existe pas, diriger vers la page d'accueil
                        if ($userState !== false) {
                            if ($pseudo) {
                                $listMembers = $modelMembers->listMembers();
                                $nrMembers = $modelMembers->countAllMembers();

                                $modelTopics = $this->getDAO("Topics");
                                $nrTopics = $modelTopics->countAllTopics();

                                // Si l'usager est banni, on l'active sinon, on le bannit
                                if ($userState->getMemberBanned() == 0) {
                                    $userBanned = $modelMembers->banUser($pseudo, 1);
                                } else {
                                    $userBanned = $modelMembers->banUser($pseudo, 0);
                                }
                            } else {
                                header('Location: index.php');
                            }
                        } else {
                            header('Location: index.php');
                        }

                    } else {
                        header('Location: index.php');
                        exit();
                    }

                    $listMembers = $modelMembers->listMembers();
                    $page_content = $this->renderTemplate('admin-member.php', [
                        'listMembers'        => $listMembers
                    ]);
                    $layout_content = $this->renderTemplate('layout-dashboard.php', [
                        'main_content'  => $page_content,
                        'nrTopics'      => $nrTopics,
                        'nrMembers'     => $nrMembers,
                        'title'         => 'Tableau de bord'
                    ]);
                    print($layout_content);
                    break;
                // ==============================//
                // Obtenir tous les usagers banni
                // ==============================//
                case 'usersBanned':
                    if (isset($_SESSION["rang"]) && ($_SESSION["rang"] == ADMIN)) {
                        $modelMembers = $this->getDAO("Members");
                        $usersBanned = $modelMembers->getAllUsersBanned(1);
                        $nrMembers = $modelMembers->countAllMembers();

                        $modelTopics = $this->getDAO("Topics");
                        $nrTopics = $modelTopics->countAllTopics();
                    } else {
                        header('Location: index.php');
                        exit();
                    }

                    $page_content = $this->renderTemplate('admin-members-banned.php', [
                        'usersBanned'        => $usersBanned
                    ]);
                    $layout_content = $this->renderTemplate('layout-dashboard.php', [
                        'main_content'  => $page_content,
                        'nrTopics'      => $nrTopics,
                        'nrMembers'     => $nrMembers,
                        'title'         => 'Tableau de bord'
                    ]);
                    print($layout_content);
                    break;
                // ==============================//
                // Déconnexion
                // ==============================//
                case 'logout':
                    $_SESSION = array();

                    // Détruire la session complètement
                    session_destroy();
                    header('Location: index.php');
                    break;
            }
//            var_dump($params, $_SESSION);
        }
   }
?>