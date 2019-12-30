<?php
    require_once "ClassifiedModel.php";
    require_once "ClassifiedCarItemsModel.php";

    class ClassifiedCarModel extends ClassifiedModel {
        private $ClassifiedCarID;
        private $ClassifiedCarBrand;
        private $ClassifiedCarModel;
        private $ClassifiedCarVersion;
        private $ClassifiedCarYear;
        private $ClassifiedCarFuel;
        private $ClassifiedCarTransmission;
        private $ClassifiedCarDoors;
        private $ClassifiedCarEngine;
        private $ClassifiedCarColor;
        private $ClassifiedCarMetreage;
        private $ClassifiedCarItemsModel;

        public function getClassifiedCarID() {
            return $this->ClassifiedCarID;
        }

        public function setClassifiedCarID($ClassifiedCarID) {
            $this->ClassifiedCarID = $ClassifiedCarID;
        }

        public function getClassifiedCarBrand() {
            return $this->ClassifiedCarBrand;
        }

        public function setClassifiedCarBrand($ClassifiedCarBrand) {
            $this->ClassifiedCarBrand = $ClassifiedCarBrand;
        }

        public function getClassifiedCarModel() {
            return $this->ClassifiedCarModel;
        }

        public function setClassifiedCarModel($ClassifiedCarModel) {
            $this->ClassifiedCarModel = $ClassifiedCarModel;
        }

        public function getClassifiedCarVersion() {
            return $this->ClassifiedCarVersion;
        }

        public function setClassifiedCarVersion($ClassifiedCarVersion) {
            $this->ClassifiedCarVersion = $ClassifiedCarVersion;
        }

        public function getClassifiedCarYear() {
            return $this->ClassifiedCarYear;
        }

        public function setClassifiedCarYear($ClassifiedCarYear) {
            $this->ClassifiedCarYear = $ClassifiedCarYear;
        }

        public function getClassifiedCarFuel() {
            return $this->ClassifiedCarFuel;
        }

        public function setClassifiedCarFuel($ClassifiedCarFuel) {
            $this->ClassifiedCarFuel = $ClassifiedCarFuel;
        }

        public function getClassifiedCarTransmission() {
            return $this->ClassifiedCarTransmission;
        }

        public function setClassifiedCarTransmission($ClassifiedCarTransmission) {
            $this->ClassifiedCarTransmission = $ClassifiedCarTransmission;
        }

        public function getClassifiedCarDoors() {
            return $this->ClassifiedCarDoors;
        }

        public function setClassifiedCarDoors($ClassifiedCarDoors) {
            $this->ClassifiedCarDoors = $ClassifiedCarDoors;
        }

        public function getClassifiedCarEngine() {
            return $this->ClassifiedCarEngine;
        }

        public function setClassifiedCarEngine($ClassifiedCarEngine) {
            $this->ClassifiedCarEngine = $ClassifiedCarEngine;
        }

        public function getClassifiedCarColor() {
            return $this->ClassifiedCarColor;
        }

        public function setClassifiedCarColor($ClassifiedCarColor) {
            $this->ClassifiedCarColor = $ClassifiedCarColor;
        }

        public function getClassifiedCarMetreage() {
            return $this->ClassifiedCarMetreage;
        }

        public function setClassifiedCarMetreage($ClassifiedCarMetreage) {
            $this->ClassifiedCarMetreage = $ClassifiedCarMetreage;
        }

        public function getClassifiedCarItemsModel() {
            return $this->ClassifiedCarItemsModel;
        }

        public function setClassifiedCarItemsModel($ClassifiedCarItemsModel) {
            $this->ClassifiedCarItemsModel = $ClassifiedCarItemsModel;
        }
    }
?>