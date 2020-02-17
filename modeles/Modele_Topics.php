<?php
    class Modele_Topics extends BaseDAO {
        public function getTableName() {
            return "topic";
        }

        /**
         * @desc Obtenir une liste des sujets
         * @return mixed
         */
        public function getListTopics() {
            $stmt = $this->lireTous();
            return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Topic");
        }

        /**
         * @desc Obtenir un sujet par id
         * @return mixed
         */
        public function getTopicById($id) {
            $stmt = $this->lire($id);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Topic");
            return $stmt->fetch();
        }

        /**
         * Get last stored resource
         */
        public function getLast() {
            $query = "SELECT * FROM " . $this->getTableName() . " ORDER BY numero DESC LIMIT 1";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            // or
            // $stmt = $this->requete($query);

            // Should write <setFetchMode> when use fetch_style PDO::FETCH_CLASS
            // $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Presentation");
            // return $stmt->fetch();

            // Without fetch_style PDO::FETCH_CLASS it's allow to write PDO::FETCH_ASSOC directly inside fetch()
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        /**
         * @desc Obtenir tous les sujets avec des réponses
         * // Trier les sujets par rapport au dernier réponse et
         * // compter le nombre des messages par sujet dans une même requete
         * @return array
         */
        public function getTopicsAndPosts() {
            $query = "SELECT COUNT(p.post_id) as nrPostsByTopic,
                            t.topic_id, t.topic_title, t.topic_text, t.topic_published, t.topic_update_by_post, t.member_pseudo as memberTopic,
                            p.post_published, p.member_pseudo as memberPost
                    FROM post p
                    RIGHT OUTER JOIN topic t ON t.topic_id = p.topic_id
                    GROUP BY t.topic_id
                    ORDER BY t.topic_update_by_post DESC,  p.post_published DESC LIMIT 10";
            $stmt = $this->db->query($query);
            $topics = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Topic");
            return $topics;
        }

        /**
         * @desc Ajout d'un nouveau sujet lier à un catégorie
         * @return object PDOStmt
         */
        public function addTopic(Topic $classTopic) {
            $query = "INSERT INTO `topic`(`topic_title`, `topic_text`, `topic_view`, `cat_id`, `member_pseudo`) VALUES (?,?,?,?,?)";
            $data = [$classTopic->getTopicTitle(), $classTopic->getTopicText(), $classTopic->getTopicView(), $classTopic->getCatId(), $classTopic->getMemberPseudo()];
            return $this->requete($query, $data);
        }

        /**
         * @desc Supprimer un sujet
         * @return number of rows
         */
        public function deleteTopicById($id) {
            $stmt = $this->supprimer($id);
            return $stmt->rowCount();
        }

        /**
         * @desc Obtenir tous les sujet par catégorie
         * @return array
         */
        public function getTopicsByCategory($idCat) {
            $query = "SELECT * FROM " . $this->getTableName() . " WHERE cat_id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$idCat]);
            return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Topic");
        }

        /**
         * @desc Compter tous les sujets
         * @return mixed
         */
        public function countAllTopics() {
            $query = "SELECT COUNT(*) FROM " . $this->getTableName();
            $stmt = $this->db->query($query);
            return $stmt->fetchColumn();
        }

        /**
         * @desc Mettre à jour le sujet quand une réponse aurait été ajoutée
         * @return boolean
         */
        public function updateTopicByPost($idTopic) {
            $query = "UPDATE " . $this->getTableName() .
                    " SET topic_update_by_post = now() " .
                    " WHERE topic_id = ?";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$idTopic]);
        }
    }
?>