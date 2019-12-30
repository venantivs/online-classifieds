<?php
    class UserModel {
        private $UserID;
        private $UserFirstName;
        private $UserLastName;
        private $UserSignDate;
        private $UserPhone;
        private $UserPicture;   
        private $UserEmail;
        private $UserPassword;

        public function getUserID() {
            return $this->UserID;
        }

        public function setUserID($UserID) {
            $this->UserID = $UserID;
        }

        public function getUserFirstName() {
            return $this->UserFirstName;
        }

        public function setUserFirstName($UserFirstName) {
            $this->UserFirstName = $UserFirstName;
        }

        public function getUserLastName() {
            return $this->UserLastName;
        }

        public function setUserLastName($UserLastName) {
            $this->UserLastName = $UserLastName;
        }

        public function getUserSignDate() {
            return $this->UserSignDate;
        }

        public function setUserSignDate($UserSignDate) {
            $this->UserSignDate = $UserSignDate;
        }

        public function getUserPhone() {
            return $this->UserPhone;
        }

        public function setUserPhone($UserPhone) {
            $this->UserPhone = $UserPhone;
        }

        public function getUserPicture() {
            return $this->UserPicture;
        }

        public function setUserPicture($UserPicture) {
            $this->UserPicture = $UserPicture;
        }

        public function getUserEmail() {
            return $this->UserEmail;
        }

        public function setUserEmail($UserEmail) {
            $this->UserEmail = $UserEmail;
        }

        public function getUserPassword() {
            return $this->UserPassword;
        }

        public function setUserPassword($UserPassword) {
            $this->UserPassword = $UserPassword;
        }
    }
?>