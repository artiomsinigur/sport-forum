<?php
    class Modele_Category extends BaseDAO {
        public function getTableName() {
            return "categorie";
        }

        /**
         * @desc Obtenir tous les catégories
         * @return array
         */
        public function getCategories() {
            $stmt = $this->lireTous();
            return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Category");
        }
    }
?>