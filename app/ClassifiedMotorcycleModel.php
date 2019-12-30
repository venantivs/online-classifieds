<?php
    require_once "ClassifiedModel.php";
    require_once "ClassifiedMotorcycleItemsModel.php";

    class ClassifiedMotorcycleModel extends ClassifiedModel {
        private $ClassifiedMotorcycleID;
        private $ClassifiedMotorcycleBrand;
        private $ClassifiedMotorcycleModel;
        private $ClassifiedMotorcycleVersion;
        private $ClassifiedMotorcycleYear;
        private $ClassifiedMotorcycleFuel;
        private $ClassifiedMotorcycleColor;
        private $ClassifiedMotorcycleMetreage;
        private $ClassifiedMotorcycleItemsModel;

        public function getClassifiedMotorcycleID() {
            return $this->ClassifiedMotorcycleID;
        }

        public function setClassifiedMotorcycleID($ClassifiedMotorcycleID) {
            $this->ClassifiedMotorcycleID = $ClassifiedMotorcycleID;
        }

        public function getClassifiedMotorcycleBrand() {
            return $this->ClassifiedMotorcycleBrand;
        }

        public function setClassifiedMotorcycleBrand($ClassifiedMotorcycleBrand) {
            $this->ClassifiedMotorcycleBrand = $ClassifiedMotorcycleBrand;
        }

        public function getClassifiedMotorcycleModel() {
            return $this->ClassifiedMotorcycleModel;
        }

        public function setClassifiedMotorcycleModel($ClassifiedMotorcycleModel) {
            $this->ClassifiedMotorcycleModel = $ClassifiedMotorcycleModel;
        }

        public function getClassifiedMotorcycleVersion() {
            return $this->ClassifiedMotorcycleVersion;
        }

        public function setClassifiedMotorcycleVersion($ClassifiedMotorcycleVersion) {
            $this->ClassifiedMotorcycleVersion = $ClassifiedMotorcycleVersion;
        }

        public function getClassifiedMotorcycleYear() {
            return $this->ClassifiedMotorcycleYear;
        }

        public function setClassifiedMotorcycleYear($ClassifiedMotorcycleYear) {
            $this->ClassifiedMotorcycleYear = $ClassifiedMotorcycleYear;
        }

        public function getClassifiedMotorcycleFuel() {
            return $this->ClassifiedMotorcycleFuel;
        }

        public function setClassifiedMotorcycleFuel($ClassifiedMotorcycleFuel) {
            $this->ClassifiedMotorcycleFuel = $ClassifiedMotorcycleFuel;
        }

        public function getClassifiedMotorcycleColor() {
            return $this->ClassifiedMotorcycleColor;
        }

        public function setClassifiedMotorcycleColor($ClassifiedMotorcycleColor) {
            $this->ClassifiedMotorcycleColor = $ClassifiedMotorcycleColor;
        }

        public function getClassifiedMotorcycleMetreage() {
            return $this->ClassifiedMotorcycleMetreage;
        }

        public function setClassifiedMotorcycleMetreage($ClassifiedMotorcycleMetreage) {
            $this->ClassifiedMotorcycleMetreage = $ClassifiedMotorcycleMetreage;
        }

        public function getClassifiedMotorcycleItemsModel() {
            return $this->ClassifiedMotorcycleItemsModel;
        }

        public function setClassifiedMotorcycleItemsModel($ClassifiedMotorcycleItemsModel) {
            $this->ClassifiedMotorcycleItemsModel = $ClassifiedMotorcycleItemsModel;
        }
    }
?>