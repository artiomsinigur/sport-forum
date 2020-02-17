<?php

    class Member {
        private $member_pseudo;
        private $membre_password;
        private $member_email;
        private $member_avatar;
        private $member_rang;
        private $member_registered;
        private $member_last_visited;
        private $member_gender;
        private $member_banned;

        public function __construct($member_pseudo = "", $membre_password = "", $member_email = "", $member_avatar = null, $member_rang = 2, $member_registered = null, $member_last_visited = null, $member_gender = "", $member_banned = 0)
        {
            $this->member_pseudo = $member_pseudo;
            $this->membre_password = $membre_password;
            $this->member_email = $member_email;
            $this->member_avatar = $member_avatar;
            $this->member_rang = $member_rang;
            $this->member_registered = $member_registered;
            $this->member_last_visited = $member_last_visited;
            $this->member_gender = $member_gender;
            $this->member_banned = $member_banned;
        }

        /**
         * @return mixed
         */
        public function getMemberPseudo()
        {
            return $this->member_pseudo;
        }

        /**
         * @param mixed $member_pseudo
         * @return Member
         */
        public function setMemberPseudo($member_pseudo)
        {
            $this->member_pseudo = $member_pseudo;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getMembrePassword()
        {
            return $this->membre_password;
        }

        /**
         * @param mixed $membre_password
         * @return Member
         */
        public function setMembrePassword($membre_password)
        {
            $this->membre_password = $membre_password;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getMemberEmail()
        {
            return $this->member_email;
        }

        /**
         * @param mixed $member_email
         * @return Member
         */
        public function setMemberEmail($member_email)
        {
            $this->member_email = $member_email;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getMemberAvatar()
        {
            return $this->member_avatar;
        }

        /**
         * @param mixed $member_avatar
         * @return Member
         */
        public function setMemberAvatar($member_avatar)
        {
            $this->member_avatar = $member_avatar;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getMemberRang()
        {
            return $this->member_rang;
        }

        /**
         * @param mixed $member_rang
         * @return Member
         */
        public function setMemberRang($member_rang)
        {
            $this->member_rang = $member_rang;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getMemberRegistered()
        {
            return $this->member_registered;
        }

        /**
         * @param mixed $member_registered
         * @return Member
         */
        public function setMemberRegistered($member_registered)
        {
            $this->member_registered = $member_registered;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getMemberLastVisited()
        {
            return $this->member_last_visited;
        }

        /**
         * @param mixed $member_last_visited
         * @return Member
         */
        public function setMemberLastVisited($member_last_visited)
        {
            $this->member_last_visited = $member_last_visited;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getMemberGender()
        {
            return $this->member_gender;
        }

        /**
         * @param mixed $member_gender
         * @return Member
         */
        public function setMemberGender($member_gender)
        {
            $this->member_gender = $member_gender;
            return $this;
        }

        /**
         * @return int
         */
        public function getMemberBanned(): int
        {
            return $this->member_banned;
        }

        /**
         * @param int $member_banned
         * @return Member
         */
        public function setMemberBanned(int $member_banned): Member
        {
            $this->member_banned = $member_banned;
            return $this;
        }
    }
?>