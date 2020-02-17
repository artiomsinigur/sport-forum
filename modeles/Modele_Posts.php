<?php
    class Modele_Posts extends BaseDAO {
        public function getTableName() {
            return "post";
        }

        /**
         * @desc Afficher les réponses et ses auteurs d'un sujet
         * @param $idTopic
         * @return array
         */
        public function getPostsByTopic($idTopic) {
            $query = "SELECT p.post_id, p.post_text, p.post_published,
                    m.member_pseudo, m.member_avatar, m.member_registered, m.member_last_visited
            FROM post p 
            JOIN member m ON p.member_pseudo = m.member_pseudo
            WHERE p.topic_id = ? LIMIT 10";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$idTopic]);
            return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Post");
        }

//        public function countPostsByTopic($idTopic) {
//            $query = "SELECT COUNT(*) as countPosts FROM post WHERE topic_id = ?";
//            $stmt = $this->db->prepare($query);
//            $stmt->execute([$idTopic]);
//            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Post");
//            return $stmt->fetch();
//        }

        /**
         * @desc Ajout d'un nouveu réponse
         * @return object PDOStmt
         */
        public function addPost(Post $post) {
            $query = "INSERT INTO post(post_text, member_pseudo, topic_id) VALUES(?,?,?)";
            $data = array($post->getPostText(), $post->getMemberPseudo(), $post->getTopicId());
            return $this->requete($query, $data);
        }

        /**
         * @desc Supprimer tous les réponses d'un sujet
         * @return number of affected rows
         */
        public function deletePostsByIdOfTopic($id) {
            $query = "DELETE FROM " . $this->getTableName() . " WHERE `topic_id` = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute([$id]);
            return $stmt->rowCount();
        }

        /**
         * @desc Compter tous les messages
         * @return mixed
         */
        public function countAllPosts() {
            $query = "SELECT COUNT(*) FROM " . $this->getTableName();
            $stmt = $this->db->query($query);
            return $stmt->fetchColumn();
        }
    }
?>