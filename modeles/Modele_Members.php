<?php
    class Modele_Members extends BaseDAO {
        public function getTableName() {
            return "member";
        }

        /**
         * @desc Authentifier l'usager s'il existe dans la bd
         * @return boolean
         */
        public function authentication($user, $pass) {
            $stmt = $this->lire($user);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Member");
            $member = $stmt->fetch();
            if ($member) {
                if ($pass === $member->getMembrePassword()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        /**
         * @desc Obtenir tous les membres
         * @return array
         */
        public function listMembers(){
            $pdoSTMT = $this->lireTous();
            //members sera un tableau d'instances de la classe Member
            return $pdoSTMT->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Member");
        }

        /**
         * @desc Obtenir un usager par son pseudo
         * @param $pseudo
         * @return Member l'objet d'un membre
         */
        public function getUserbyPseudo($pseudo){
            $pdoSTMT = $this->lire($pseudo);
            $pdoSTMT->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Member");
            //member sera une instance de la classe Member
            return $pdoSTMT->fetch();
        }

        /**
         * @param Bannir un usager
         * @return bool
         */
        public function banUser($pseudo, $banned) {
            $query = "UPDATE " . $this->getTableName() .
                " SET " . " member_banned=:mb " . " WHERE member_pseudo=:mp ";
            $data = [
                ':mp' => $pseudo,
                ':mb' => $banned ];
            return $this->db->prepare($query)->execute($data);
        }

        /**
         * @desc Séléctionner tous les usagers banni
         * @return array
         */
        public function getAllUsersBanned($idBanned) {
            $query = "SELECT * FROM " . $this->getTableName() . " WHERE member_banned = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$idBanned]);
            return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Member");
        }

        /**
         * @desc Compter tous les membres
         * @return mixed
         */
        public function countAllMembers() {
            $query = "SELECT COUNT(*) FROM " . $this->getTableName();
            $stmt = $this->db->query($query);
            return $stmt->fetchColumn();
        }

        /**
         * @desc Mettre à jour la date de dernier visite
         * @return bool
         */
        public function updateLastVisite($user) {
            $query = "UPDATE " . $this->getTableName() .
                    " SET " . " member_last_visited = now() " . " WHERE member_pseudo = ? ";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$user]);
        }
    }
?>