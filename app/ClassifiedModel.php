<?php
    class ClassifiedModel {
        private $ClassifiedID;
        private $ClassifiedDate;
        private $ClassifiedDescription;
        private $ClassifiedPrice;
        private $ClassifiedVideoLink;
        private $ClassifiedUF;
        private $ClassifiedCity;
        private $ClassifiedType;
        private $ClassifiedPictures; // ARRAY
        private $UserModel;

        public function getClassifiedID() {
            return $this->ClassifiedID;
        }

        public function setClassifiedID($ClassifiedID) {
            $this->ClassifiedID = $ClassifiedID;
        }

        public function getClassifiedDate() {
            return $this->ClassifiedDate;
        }

        public function setClassifiedDate($ClassifiedDate) {
            $this->ClassifiedDate = $ClassifiedDate;
        }

        public function getClassifiedDescription() {
            return $this->ClassifiedDescription;
        }

        public function setClassifiedDescription($ClassifiedDescription) {
            $this->ClassifiedDescription = $ClassifiedDescription;
        }

        public function getClassifiedPrice() {
            return $this->ClassifiedPrice;
        }

        public function setClassifiedPrice($ClassifiedPrice) {
            $this->ClassifiedPrice = $ClassifiedPrice;
        }

        public function getClassifiedVideoLink() {
            return $this->ClassifiedVideoLink;
        }

        public function setClassifiedVideoLink($ClassifiedVideoLink) {
            $this->ClassifiedVideoLink = $ClassifiedVideoLink;
        }

        public function getClassifiedUF() {
            return $this->ClassifiedUF;
        }

        public function setClassifiedUF($ClassifiedUF) {
            $this->ClassifiedUF = $ClassifiedUF;
        }

        public function getClassifiedCity() {
            return $this->ClassifiedCity;
        }

        public function setClassifiedCity($ClassifiedCity) {
            $this->ClassifiedCity = $ClassifiedCity;
        }

        public function getClassifiedType() {
            return $this->ClassifiedType;
        }

        public function setClassifiedType($ClassifiedType) {
            $this->ClassifiedType = $ClassifiedType;
        }

        public function getClassifiedPictures() {
            return $this->ClassifiedPictures;
        }

        public function setClassifiedPictures($ClassifiedPictures) {
            $this->ClassifiedPictures = $ClassifiedPictures;
        }

        public function getUserModel() {
            return $this->UserModel;
        }

        public function setUserModel($UserModel) {
            $this->UserModel = $UserModel;
        }
    }
?>