<?php
    require_once "Connection.php";
    require_once "UserModel.php";
    require_once "ClassifiedCarModel.php";
    require_once "ClassifiedMotorcycleModel.php";

    class ClassifiedController {
        public function AnnounceCar($ClassifiedCarModel) {
            global $pdo;

            $ClassifiedCarQuery = $pdo->prepare("INSERT INTO Classifieds (Classifieds_Date, Classifieds_Description, Classifieds_Price, Classifieds_VideoLink, Classifieds_UF, Classifieds_City, Classifieds_Type, Users_ID_FK) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $ClassifiedCarQuery->bindValue(1, $ClassifiedCarModel->getClassifiedDate(), PDO::PARAM_STR);
            $ClassifiedCarQuery->bindValue(2, $ClassifiedCarModel->getClassifiedDescription(), PDO::PARAM_STR);
            $ClassifiedCarQuery->bindValue(3, $ClassifiedCarModel->getClassifiedPrice(), PDO::PARAM_STR);
            $ClassifiedCarQuery->bindValue(4, $ClassifiedCarModel->getClassifiedVideoLink(), PDO::PARAM_STR);
            $ClassifiedCarQuery->bindValue(5, $ClassifiedCarModel->getClassifiedUF(), PDO::PARAM_STR);
            $ClassifiedCarQuery->bindValue(6, $ClassifiedCarModel->getClassifiedCity(), PDO::PARAM_STR);
            $ClassifiedCarQuery->bindValue(7, $ClassifiedCarModel->getClassifiedType(), PDO::PARAM_STR);
            $ClassifiedCarQuery->bindValue(8, $ClassifiedCarModel->getUserModel()->getUserID(), PDO::PARAM_INT);

            if ($ClassifiedCarQuery->execute()) {
                $LastID = $pdo->lastInsertId();

                for ($i = 0; $i < count($ClassifiedCarModel->getClassifiedPictures()); $i++) {
                    $ClassifiedCarQuery = $pdo->prepare("INSERT INTO Classifieds_Pictures (Classifieds_Pictures_FileName, Classifieds_ID_FK) VALUES (?, ?);");
                    $ClassifiedCarQuery->bindValue(1, $ClassifiedCarModel->getClassifiedPictures()[$i], PDO::PARAM_STR);
                    $ClassifiedCarQuery->bindValue(2, $LastID, PDO::PARAM_INT);

                    $ClassifiedCarQuery->execute();
                }
                
                $ClassifiedCarQuery = $pdo->prepare("INSERT INTO Classifieds_Cars (Classifieds_Cars_Brand, Classifieds_Cars_Model, Classifieds_Cars_Version, Classifieds_Cars_Year, Classifieds_Cars_Fuel, Classifieds_Cars_Transmission, Classifieds_Cars_Doors, Classifieds_Cars_Engine, Classifieds_Cars_Colors, Classifieds_Cars_Metreage, Classifieds_ID_FK) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
                $ClassifiedCarQuery->bindValue(1, $ClassifiedCarModel->getClassifiedCarBrand(), PDO::PARAM_STR);
                $ClassifiedCarQuery->bindValue(2, $ClassifiedCarModel->getClassifiedCarModel(), PDO::PARAM_STR);
                $ClassifiedCarQuery->bindValue(3, $ClassifiedCarModel->getClassifiedCarVersion(), PDO::PARAM_STR);
                $ClassifiedCarQuery->bindValue(4, $ClassifiedCarModel->getClassifiedCarYear(), PDO::PARAM_INT);
                $ClassifiedCarQuery->bindValue(5, $ClassifiedCarModel->getClassifiedCarFuel(), PDO::PARAM_STR);
                $ClassifiedCarQuery->bindValue(6, $ClassifiedCarModel->getClassifiedCarTransmission(), PDO::PARAM_STR);
                $ClassifiedCarQuery->bindValue(7, $ClassifiedCarModel->getClassifiedCarDoors(), PDO::PARAM_INT);
                $ClassifiedCarQuery->bindValue(8, $ClassifiedCarModel->getClassifiedCarEngine(), PDO::PARAM_STR);
                $ClassifiedCarQuery->bindValue(9, $ClassifiedCarModel->getClassifiedCarColor(), PDO::PARAM_STR);
                $ClassifiedCarQuery->bindValue(10, $ClassifiedCarModel->getClassifiedCarMetreage(), PDO::PARAM_INT);
                $ClassifiedCarQuery->bindValue(11, $LastID, PDO::PARAM_STR);

                if ($ClassifiedCarQuery->execute()) {
                    $ClassifiedCarQuery = $pdo->prepare("INSERT INTO Classifieds_Cars_Items (Classifieds_Cars_Items_HasAirConditioning, Classifieds_Cars_Items_HasLeatherSeats, Classifieds_Cars_Items_HasRearHeadrest, Classifieds_Cars_Items_HasPowerLocks, Classifieds_Cars_Items_HasPowerMirrors, Classifieds_Cars_Items_HasHeatedSeats, Classifieds_Cars_Items_HasBoardComputer, Classifieds_Cars_Items_HasReverseSensor, Classifieds_Cars_Items_HasMultimediaCenter, Classifieds_Cars_Items_HasGPS, Classifieds_Cars_Items_HasPowerSteering, Classifieds_Cars_Items_HasAutoPilot, Classifieds_Cars_ID_FK) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
                    $ClassifiedCarQuery->bindValue(1, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasAirConditioning(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(2, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasLeatherSeats(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(3, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasRearHeadrest(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(4, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasPowerLocks(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(5, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasPowerMirrors(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(6, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasHeatedSeats(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(7, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasBoardComputer(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(8, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasReverseSensor(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(9, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasMultimediaCenter(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(10, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasGPS(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(11, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasPowerSteering(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(12, $ClassifiedCarModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasAutoPilot(), PDO::PARAM_INT);
                    $ClassifiedCarQuery->bindValue(13, $pdo->lastInsertId(), PDO::PARAM_INT);

                    if ($ClassifiedCarQuery->execute()) {
                        return true;
                    }
                }
            }

            return false;
        }

        public function AnnounceMotorcycle($ClassifiedMotorcycleModel) {
            global $pdo;

            $ClassifiedMotorcycleQuery = $pdo->prepare("INSERT INTO Classifieds (Classifieds_Date, Classifieds_Description, Classifieds_Price, Classifieds_VideoLink, Classifieds_UF, Classifieds_City, Classifieds_Type, Users_ID_FK) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $ClassifiedMotorcycleQuery->bindValue(1, $ClassifiedMotorcycleModel->getClassifiedDate(), PDO::PARAM_STR);
            $ClassifiedMotorcycleQuery->bindValue(2, utf8_decode($ClassifiedMotorcycleModel->getClassifiedDescription()), PDO::PARAM_STR);
            $ClassifiedMotorcycleQuery->bindValue(3, $ClassifiedMotorcycleModel->getClassifiedPrice(), PDO::PARAM_STR);
            $ClassifiedMotorcycleQuery->bindValue(4, utf8_decode($ClassifiedMotorcycleModel->getClassifiedVideoLink()), PDO::PARAM_STR);
            $ClassifiedMotorcycleQuery->bindValue(5, utf8_decode($ClassifiedMotorcycleModel->getClassifiedUF()), PDO::PARAM_STR);
            $ClassifiedMotorcycleQuery->bindValue(6, utf8_decode($ClassifiedMotorcycleModel->getClassifiedCity()), PDO::PARAM_STR);
            $ClassifiedMotorcycleQuery->bindValue(7, utf8_decode($ClassifiedMotorcycleModel->getClassifiedType()), PDO::PARAM_STR);
            $ClassifiedMotorcycleQuery->bindValue(8, $ClassifiedMotorcycleModel->getUserModel()->getUserID(), PDO::PARAM_INT);

            if ($ClassifiedMotorcycleQuery->execute()) {
                $LastID = $pdo->lastInsertId();

                for ($i = 0; $i < count($ClassifiedMotorcycleModel->getClassifiedPictures()); $i++) {
                    $ClassifiedMotorcycleQuery = $pdo->prepare("INSERT INTO Classifieds_Pictures (Classifieds_Pictures_FileName, Classifieds_ID_FK) VALUES (?, ?);");
                    $ClassifiedMotorcycleQuery->bindValue(1, utf8_decode($ClassifiedMotorcycleModel->getClassifiedPictures()[$i]), PDO::PARAM_STR);
                    $ClassifiedMotorcycleQuery->bindValue(2, $LastID, PDO::PARAM_INT);

                    $ClassifiedMotorcycleQuery->execute();
                }
                
                $ClassifiedMotorcycleQuery = $pdo->prepare("INSERT INTO Classifieds_Motorcycles (Classifieds_Motorcycles_Brand, Classifieds_Motorcycles_Model, Classifieds_Motorcycles_Version, Classifieds_Motorcycles_Year, Classifieds_Motorcycles_Fuel, Classifieds_Motorcycles_Color, Classifieds_Motorcycles_Metreage, Classifieds_ID_FK) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
                $ClassifiedMotorcycleQuery->bindValue(1, utf8_decode($ClassifiedMotorcycleModel->getClassifiedMotorcycleBrand()), PDO::PARAM_STR);
                $ClassifiedMotorcycleQuery->bindValue(2, utf8_decode($ClassifiedMotorcycleModel->getClassifiedMotorcycleModel()), PDO::PARAM_STR);
                $ClassifiedMotorcycleQuery->bindValue(3, utf8_decode($ClassifiedMotorcycleModel->getClassifiedMotorcycleVersion()), PDO::PARAM_STR);
                $ClassifiedMotorcycleQuery->bindValue(4, $ClassifiedMotorcycleModel->getClassifiedMotorcycleYear(), PDO::PARAM_INT);
                $ClassifiedMotorcycleQuery->bindValue(5, utf8_decode($ClassifiedMotorcycleModel->getClassifiedMotorcycleFuel()), PDO::PARAM_STR);
                $ClassifiedMotorcycleQuery->bindValue(6, utf8_decode($ClassifiedMotorcycleModel->getClassifiedMotorcycleColor()), PDO::PARAM_STR);
                $ClassifiedMotorcycleQuery->bindValue(7, $ClassifiedMotorcycleModel->getClassifiedMotorcycleMetreage(), PDO::PARAM_INT);
                $ClassifiedMotorcycleQuery->bindValue(8, $LastID, PDO::PARAM_STR);

                if ($ClassifiedMotorcycleQuery->execute()) {
                    $ClassifiedMotorcycleQuery = $pdo->prepare("INSERT INTO Classifieds_Motorcycles_Items (Classifieds_Motorcycles_Items_HasFrontBrakeDisk, Classifieds_Motorcycles_Items_HasBackBrakeDisk, Classifieds_Motorcycles_Items_HasABS, Classifieds_Motorcycles_Items_HasPowerStart, Classifieds_Motorcycles_Items_HasAlloyWheels, Classifieds_Motorcycles_ID_FK) VALUES (?, ?, ?, ?, ?, ?);");
                    $ClassifiedMotorcycleQuery->bindValue(1, $ClassifiedMotorcycleModel->getClassifiedMotorcycleItemsModel()->getClassifiedMotorcycleItemsHasFrontBrakeDisk(), PDO::PARAM_INT);
                    $ClassifiedMotorcycleQuery->bindValue(2, $ClassifiedMotorcycleModel->getClassifiedMotorcycleItemsModel()->getClassifiedMotorcycleItemsHasBackBrakeDisk(), PDO::PARAM_INT);
                    $ClassifiedMotorcycleQuery->bindValue(3, $ClassifiedMotorcycleModel->getClassifiedMotorcycleItemsModel()->getClassifiedMotorcycleItemsHasABS(), PDO::PARAM_INT);
                    $ClassifiedMotorcycleQuery->bindValue(4, $ClassifiedMotorcycleModel->getClassifiedMotorcycleItemsModel()->getClassifiedMotorcycleItemsHasPowerStart(), PDO::PARAM_INT);
                    $ClassifiedMotorcycleQuery->bindValue(5, $ClassifiedMotorcycleModel->getClassifiedMotorcycleItemsModel()->getClassifiedMotorcycleItemsHasAlloyWheels(), PDO::PARAM_INT);
                    $ClassifiedMotorcycleQuery->bindValue(6, $pdo->lastInsertId(), PDO::PARAM_INT);

                    if ($ClassifiedMotorcycleQuery->execute()) {
                        return true;
                    }
                }
            }

            return false;
        }

        public function GetClassifiedCars() {
            global $pdo;

            $ClassifiedCarQuery = $pdo->query("SELECT Classifieds_ID, Classifieds_Date, Classifieds_Description, Classifieds_Price, Classifieds_VideoLink, Classifieds_UF, Classifieds_City, Classifieds_Type, Users_ID_FK, Classifieds_Cars_ID, Classifieds_Cars_Brand, Classifieds_Cars_Model, Classifieds_Cars_Version, Classifieds_Cars_Year, Classifieds_Cars_Fuel, Classifieds_Cars_Transmission, Classifieds_Cars_Doors, Classifieds_Cars_Engine, Classifieds_Cars_Colors, Classifieds_Cars_Metreage, Classifieds_Cars_Items_ID, Classifieds_Cars_Items_HasAirConditioning, Classifieds_Cars_Items_HasLeatherSeats, Classifieds_Cars_Items_HasRearHeadrest, Classifieds_Cars_Items_HasPowerLocks, Classifieds_Cars_Items_HasPowerMirrors, Classifieds_Cars_Items_HasHeatedSeats, Classifieds_Cars_Items_HasBoardComputer, Classifieds_Cars_Items_HasReverseSensor, Classifieds_Cars_Items_HasMultimediaCenter, Classifieds_Cars_Items_HasGPS, Classifieds_Cars_Items_HasPowerSteering, Classifieds_Cars_Items_HasAutoPilot FROM Classifieds INNER JOIN Classifieds_Cars ON Classifieds_ID = Classifieds_ID_FK INNER JOIN Classifieds_Cars_Items ON Classifieds_Cars_ID = Classifieds_Cars_ID_FK WHERE Classifieds_Cars_Year > 1981;");

            $ClassifiedCarsArray = array();

		if ($ClassifiedCarQuery) {
			if ($ClassifiedCarQuery->rowCount() > 0) {
            while ($Row = $ClassifiedCarQuery->fetch()) {
                $UserModel = new UserModel();
                $ClassifiedCarModel = new ClassifiedCarModel();
                $ClassifiedCarItemsModel = new ClassifiedCarItemsModel();

                $ClassifiedCarModel->setClassifiedID($Row["Classifieds_ID"]);
                $ClassifiedCarModel->setClassifiedDate($Row["Classifieds_Date"]);
                $ClassifiedCarModel->setClassifiedDescription(utf8_encode($Row["Classifieds_Description"]));
                $ClassifiedCarModel->setClassifiedPrice($Row["Classifieds_Price"]);
                $ClassifiedCarModel->setClassifiedVideoLink(utf8_encode($Row["Classifieds_VideoLink"]));
                $ClassifiedCarModel->setClassifiedUF(utf8_encode($Row["Classifieds_UF"]));
                $ClassifiedCarModel->setClassifiedCity(utf8_encode($Row["Classifieds_City"]));
                $ClassifiedCarModel->setClassifiedType(utf8_encode($Row["Classifieds_Type"]));
                $UserModel->setUserID($Row["Users_ID_FK"]);
                $ClassifiedCarModel->setClassifiedCarID($Row["Classifieds_Cars_ID"]);
                $ClassifiedCarModel->setClassifiedCarBrand(utf8_encode($Row["Classifieds_Cars_Brand"]));
                $ClassifiedCarModel->setClassifiedCarModel(utf8_encode($Row["Classifieds_Cars_Model"]));
                $ClassifiedCarModel->setClassifiedCarVersion(utf8_encode($Row["Classifieds_Cars_Version"]));
                $ClassifiedCarModel->setClassifiedCarYear($Row["Classifieds_Cars_Year"]);
                $ClassifiedCarModel->setClassifiedCarFuel(utf8_encode($Row["Classifieds_Cars_Fuel"]));
                $ClassifiedCarModel->setClassifiedCarTransmission(utf8_encode($Row["Classifieds_Cars_Transmission"]));
                $ClassifiedCarModel->setClassifiedCarDoors($Row["Classifieds_Cars_Doors"]);
                $ClassifiedCarModel->setClassifiedCarEngine(utf8_encode($Row["Classifieds_Cars_Engine"]));
                $ClassifiedCarModel->setClassifiedCarColor(utf8_encode($Row["Classifieds_Cars_Colors"]));
                $ClassifiedCarModel->setClassifiedCarMetreage($Row["Classifieds_Cars_Metreage"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsID($Row["Classifieds_Cars_Items_ID"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasAirConditioning($Row["Classifieds_Cars_Items_HasAirConditioning"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasLeatherSeats($Row["Classifieds_Cars_Items_HasLeatherSeats"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasRearHeadrest($Row["Classifieds_Cars_Items_HasRearHeadrest"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerLocks($Row["Classifieds_Cars_Items_HasPowerLocks"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerMirrors($Row["Classifieds_Cars_Items_HasPowerMirrors"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasHeatedSeats($Row["Classifieds_Cars_Items_HasHeatedSeats"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasBoardComputer($Row["Classifieds_Cars_Items_HasBoardComputer"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasReverseSensor($Row["Classifieds_Cars_Items_HasReverseSensor"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasMultimediaCenter($Row["Classifieds_Cars_Items_HasMultimediaCenter"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasGPS($Row["Classifieds_Cars_Items_HasGPS"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerSteering($Row["Classifieds_Cars_Items_HasPowerSteering"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasAutoPilot($Row["Classifieds_Cars_Items_HasAutoPilot"]);

                $ClassifiedCarImagesQuery = $pdo->prepare("SELECT Classifieds_Pictures_FileName FROM Classifieds_Pictures WHERE Classifieds_ID_FK = ?;");
                $ClassifiedCarImagesQuery->bindValue(1, $ClassifiedCarModel->getClassifiedID(), PDO::PARAM_INT);

                $ClassifiedCarImagesArray = array();

                if ($ClassifiedCarImagesQuery->execute()) {
                    while ($RowImages = $ClassifiedCarImagesQuery->fetch()) {
                        array_push($ClassifiedCarImagesArray, utf8_encode($RowImages["Classifieds_Pictures_FileName"]));
                    }
                }

                $ClassifiedCarModel->setClassifiedPictures($ClassifiedCarImagesArray);

                array_push($ClassifiedCarsArray, $ClassifiedCarModel);
            }
}
}
            return $ClassifiedCarsArray;
        }

        public function GetClassifiedClassics() {
            global $pdo;

            $ClassifiedCarQuery = $pdo->query("SELECT Classifieds_ID, Classifieds_Date, Classifieds_Description, Classifieds_Price, Classifieds_VideoLink, Classifieds_UF, Classifieds_City, Classifieds_Type, Users_ID_FK, Classifieds_Cars_ID, Classifieds_Cars_Brand, Classifieds_Cars_Model, Classifieds_Cars_Version, Classifieds_Cars_Year, Classifieds_Cars_Fuel, Classifieds_Cars_Transmission, Classifieds_Cars_Doors, Classifieds_Cars_Engine, Classifieds_Cars_Colors, Classifieds_Cars_Metreage, Classifieds_Cars_Items_ID, Classifieds_Cars_Items_HasAirConditioning, Classifieds_Cars_Items_HasLeatherSeats, Classifieds_Cars_Items_HasRearHeadrest, Classifieds_Cars_Items_HasPowerLocks, Classifieds_Cars_Items_HasPowerMirrors, Classifieds_Cars_Items_HasHeatedSeats, Classifieds_Cars_Items_HasBoardComputer, Classifieds_Cars_Items_HasReverseSensor, Classifieds_Cars_Items_HasMultimediaCenter, Classifieds_Cars_Items_HasGPS, Classifieds_Cars_Items_HasPowerSteering, Classifieds_Cars_Items_HasAutoPilot FROM Classifieds INNER JOIN Classifieds_Cars ON Classifieds_ID = Classifieds_ID_FK INNER JOIN Classifieds_Cars_Items ON Classifieds_Cars_ID = Classifieds_Cars_ID_FK WHERE Classifieds_Cars_Year < 1982;");

            $ClassifiedCarsArray = array();
        
            if ($ClassifiedCarQuery) {
		if ($ClassifiedCarQuery->rowCount() > 0) {
            while ($Row = $ClassifiedCarQuery->fetch()) {
                $UserModel = new UserModel();
                $ClassifiedCarModel = new ClassifiedCarModel();
                $ClassifiedCarItemsModel = new ClassifiedCarItemsModel();

                $ClassifiedCarModel->setClassifiedID($Row["Classifieds_ID"]);
                $ClassifiedCarModel->setClassifiedDate($Row["Classifieds_Date"]);
                $ClassifiedCarModel->setClassifiedDescription(utf8_encode($Row["Classifieds_Description"]));
                $ClassifiedCarModel->setClassifiedPrice($Row["Classifieds_Price"]);
                $ClassifiedCarModel->setClassifiedVideoLink(utf8_encode($Row["Classifieds_VideoLink"]));
                $ClassifiedCarModel->setClassifiedUF(utf8_encode($Row["Classifieds_UF"]));
                $ClassifiedCarModel->setClassifiedCity(utf8_encode($Row["Classifieds_City"]));
                $ClassifiedCarModel->setClassifiedType(utf8_encode($Row["Classifieds_Type"]));
                $UserModel->setUserID($Row["Users_ID_FK"]);
                $ClassifiedCarModel->setClassifiedCarID($Row["Classifieds_Cars_ID"]);
                $ClassifiedCarModel->setClassifiedCarBrand(utf8_encode($Row["Classifieds_Cars_Brand"]));
                $ClassifiedCarModel->setClassifiedCarModel(utf8_encode($Row["Classifieds_Cars_Model"]));
                $ClassifiedCarModel->setClassifiedCarVersion(utf8_encode($Row["Classifieds_Cars_Version"]));
                $ClassifiedCarModel->setClassifiedCarYear($Row["Classifieds_Cars_Year"]);
                $ClassifiedCarModel->setClassifiedCarFuel(utf8_encode($Row["Classifieds_Cars_Fuel"]));
                $ClassifiedCarModel->setClassifiedCarTransmission(utf8_encode($Row["Classifieds_Cars_Transmission"]));
                $ClassifiedCarModel->setClassifiedCarDoors($Row["Classifieds_Cars_Doors"]);
                $ClassifiedCarModel->setClassifiedCarEngine(utf8_encode($Row["Classifieds_Cars_Engine"]));
                $ClassifiedCarModel->setClassifiedCarColor(utf8_encode($Row["Classifieds_Cars_Colors"]));
                $ClassifiedCarModel->setClassifiedCarMetreage($Row["Classifieds_Cars_Metreage"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsID($Row["Classifieds_Cars_Items_ID"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasAirConditioning($Row["Classifieds_Cars_Items_HasAirConditioning"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasLeatherSeats($Row["Classifieds_Cars_Items_HasLeatherSeats"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasRearHeadrest($Row["Classifieds_Cars_Items_HasRearHeadrest"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerLocks($Row["Classifieds_Cars_Items_HasPowerLocks"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerMirrors($Row["Classifieds_Cars_Items_HasPowerMirrors"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasHeatedSeats($Row["Classifieds_Cars_Items_HasHeatedSeats"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasBoardComputer($Row["Classifieds_Cars_Items_HasBoardComputer"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasReverseSensor($Row["Classifieds_Cars_Items_HasReverseSensor"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasMultimediaCenter($Row["Classifieds_Cars_Items_HasMultimediaCenter"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasGPS($Row["Classifieds_Cars_Items_HasGPS"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerSteering($Row["Classifieds_Cars_Items_HasPowerSteering"]);
                $ClassifiedCarItemsModel->setClassifiedCarItemsHasAutoPilot($Row["Classifieds_Cars_Items_HasAutoPilot"]);
                $ClassifiedCarModel->setClassifiedCarItemsModel($ClassifiedCarItemsModel);

                $ClassifiedCarImagesQuery = $pdo->prepare("SELECT Classifieds_Pictures_FileName FROM Classifieds_Pictures WHERE Classifieds_ID_FK = ?;");
                $ClassifiedCarImagesQuery->bindValue(1, $ClassifiedCarModel->getClassifiedID(), PDO::PARAM_INT);

                $ClassifiedCarImagesArray = array();

                if ($ClassifiedCarImagesQuery->execute()) {
                    while ($RowImages = $ClassifiedCarImagesQuery->fetch()) {
                        array_push($ClassifiedCarImagesArray, utf8_encode($RowImages["Classifieds_Pictures_FileName"]));
                    }
                }

                $ClassifiedCarModel->setClassifiedPictures($ClassifiedCarImagesArray);

                array_push($ClassifiedCarsArray, $ClassifiedCarModel);
            }
}}

            return $ClassifiedCarsArray;
        }

        public function GetClassifiedsByUser($UserModel) {
            global $pdo;

            $ClassifiedsQuery = $pdo->prepare("SELECT Classifieds_ID, Classifieds_Date, Classifieds_Description, Classifieds_Price, Classifieds_VideoLink, Classifieds_UF, Classifieds_City, Classifieds_Type FROM Classifieds WHERE Users_ID_FK = ?;");
            $ClassifiedsQuery->bindValue(1, $UserModel->getUserID(), PDO::PARAM_INT);

            $ClassifiedsArray = array();

            if ($ClassifiedsQuery->execute()) {
                if ($ClassifiedsQuery->rowCount() > 0) {

                    while ($Row = $ClassifiedsQuery->fetch()) {
                        if (utf8_encode($Row["Classifieds_Type"]) === "Carro" || utf8_encode($Row["Classifieds_Type"]) === "Clássico") {
                            $ClassifiedCarModel = new ClassifiedCarModel();
                            $ClassifiedCarItemsModel = new ClassifiedCarItemsModel();

                            $ClassifiedCarModel->setClassifiedID($Row["Classifieds_ID"]);
                            $ClassifiedCarModel->setClassifiedDate($Row["Classifieds_Date"]);
                            $ClassifiedCarModel->setClassifiedDescription(utf8_encode($Row["Classifieds_Description"]));
                            $ClassifiedCarModel->setClassifiedPrice($Row["Classifieds_Price"]);
                            $ClassifiedCarModel->setClassifiedVideoLink(utf8_encode($Row["Classifieds_VideoLink"]));
                            $ClassifiedCarModel->setClassifiedUF(utf8_encode($Row["Classifieds_UF"]));
                            $ClassifiedCarModel->setClassifiedCity(utf8_encode($Row["Classifieds_City"]));
                            $ClassifiedCarModel->setClassifiedType(utf8_encode($Row["Classifieds_Type"]));
                            $ClassifiedCarModel->setUserModel($UserModel);
                            
                            $ClassifiedCarQuery = $pdo->prepare("SELECT Classifieds_Cars_ID, Classifieds_Cars_Brand, Classifieds_Cars_Model, Classifieds_Cars_Version, Classifieds_Cars_Year, Classifieds_Cars_Fuel, Classifieds_Cars_Transmission, Classifieds_Cars_Doors, Classifieds_Cars_Engine, Classifieds_Cars_Colors, Classifieds_Cars_Metreage, Classifieds_Cars_Items_ID, Classifieds_Cars_Items_HasAirConditioning, Classifieds_Cars_Items_HasLeatherSeats, Classifieds_Cars_Items_HasRearHeadrest, Classifieds_Cars_Items_HasPowerLocks, Classifieds_Cars_Items_HasPowerMirrors, Classifieds_Cars_Items_HasHeatedSeats, Classifieds_Cars_Items_HasBoardComputer, Classifieds_Cars_Items_HasReverseSensor, Classifieds_Cars_Items_HasMultimediaCenter, Classifieds_Cars_Items_HasGPS, Classifieds_Cars_Items_HasPowerSteering, Classifieds_Cars_Items_HasAutoPilot FROM Classifieds_Cars INNER JOIN Classifieds_Cars_Items ON Classifieds_Cars_ID = Classifieds_Cars_ID_FK WHERE Classifieds_ID_FK = ?;");
                            $ClassifiedCarQuery->bindValue(1, $ClassifiedCarModel->getClassifiedID(), PDO::PARAM_INT);

                            if ($ClassifiedCarQuery->execute()) {
                                $RowCar = $ClassifiedCarQuery->fetch();

                                $ClassifiedCarModel->setClassifiedCarID($RowCar["Classifieds_Cars_ID"]);
                                $ClassifiedCarModel->setClassifiedCarBrand(utf8_encode($RowCar["Classifieds_Cars_Brand"]));
                                $ClassifiedCarModel->setClassifiedCarModel(utf8_encode($RowCar["Classifieds_Cars_Model"]));
                                $ClassifiedCarModel->setClassifiedCarVersion(utf8_encode($RowCar["Classifieds_Cars_Version"]));
                                $ClassifiedCarModel->setClassifiedCarYear($RowCar["Classifieds_Cars_Year"]);
                                $ClassifiedCarModel->setClassifiedCarFuel(utf8_encode($RowCar["Classifieds_Cars_Fuel"]));
                                $ClassifiedCarModel->setClassifiedCarTransmission(utf8_encode($RowCar["Classifieds_Cars_Transmission"]));
                                $ClassifiedCarModel->setClassifiedCarDoors($RowCar["Classifieds_Cars_Doors"]);
                                $ClassifiedCarModel->setClassifiedCarEngine(utf8_encode($RowCar["Classifieds_Cars_Engine"]));
                                $ClassifiedCarModel->setClassifiedCarColor(utf8_encode($RowCar["Classifieds_Cars_Colors"]));
                                $ClassifiedCarModel->setClassifiedCarMetreage($RowCar["Classifieds_Cars_Metreage"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsID($RowCar["Classifieds_Cars_Items_ID"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasAirConditioning($RowCar["Classifieds_Cars_Items_HasAirConditioning"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasLeatherSeats($RowCar["Classifieds_Cars_Items_HasLeatherSeats"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasRearHeadrest($RowCar["Classifieds_Cars_Items_HasRearHeadrest"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerLocks($RowCar["Classifieds_Cars_Items_HasPowerLocks"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerMirrors($RowCar["Classifieds_Cars_Items_HasPowerMirrors"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasHeatedSeats($RowCar["Classifieds_Cars_Items_HasHeatedSeats"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasBoardComputer($RowCar["Classifieds_Cars_Items_HasBoardComputer"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasReverseSensor($RowCar["Classifieds_Cars_Items_HasReverseSensor"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasMultimediaCenter($RowCar["Classifieds_Cars_Items_HasMultimediaCenter"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasGPS($RowCar["Classifieds_Cars_Items_HasGPS"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerSteering($RowCar["Classifieds_Cars_Items_HasPowerSteering"]);
                                $ClassifiedCarItemsModel->setClassifiedCarItemsHasAutoPilot($RowCar["Classifieds_Cars_Items_HasAutoPilot"]);
                                $ClassifiedCarModel->setClassifiedCarItemsModel($ClassifiedCarItemsModel);

                                $ClassifiedCarImagesQuery = $pdo->prepare("SELECT Classifieds_Pictures_FileName FROM Classifieds_Pictures WHERE Classifieds_ID_FK = ?;");
                                $ClassifiedCarImagesQuery->bindValue(1, $ClassifiedCarModel->getClassifiedID(), PDO::PARAM_INT);

                                $ClassifiedCarImagesArray = array();

                                if ($ClassifiedCarImagesQuery->execute()) {
                                    while ($RowImages = $ClassifiedCarImagesQuery->fetch()) {
                                        array_push($ClassifiedCarImagesArray, utf8_encode($RowImages["Classifieds_Pictures_FileName"]));
                                    }
                                }

                                $ClassifiedCarModel->setClassifiedPictures($ClassifiedCarImagesArray);

                                array_push($ClassifiedsArray, $ClassifiedCarModel);
                            }
                        } else if (utf8_encode($Row["Classifieds_Type"] === "Moto")) {
                            $ClassifiedMotorcycleModel = new ClassifiedMotorcycleModel();
                            $ClassifiedMotorcycleItemsModel = new ClassifiedMotorcycleItemsModel();
                            $ClassifiedMotorcycleModel->setClassifiedID($Row["Classifieds_ID"]);
                            $ClassifiedMotorcycleModel->setClassifiedDate($Row["Classifieds_Date"]);
                            $ClassifiedMotorcycleModel->setClassifiedDescription(utf8_encode($Row["Classifieds_Description"]));
                            $ClassifiedMotorcycleModel->setClassifiedPrice($Row["Classifieds_Price"]);
                            $ClassifiedMotorcycleModel->setClassifiedVideoLink(utf8_encode($Row["Classifieds_VideoLink"]));
                            $ClassifiedMotorcycleModel->setClassifiedUF(utf8_encode($Row["Classifieds_UF"]));
                            $ClassifiedMotorcycleModel->setClassifiedCity(utf8_encode($Row["Classifieds_City"]));
                            $ClassifiedMotorcycleModel->setClassifiedType(utf8_encode($Row["Classifieds_Type"]));
                            $ClassifiedMotorcycleModel->setUserModel($UserModel);

                            $ClassifiedMotorcycleQuery = $pdo->prepare("SELECT Classifieds_Motorcycles_ID, Classifieds_Motorcycles_Brand, Classifieds_Motorcycles_Model, Classifieds_Motorcycles_Version, Classifieds_Motorcycles_Year, Classifieds_Motorcycles_Fuel, Classifieds_Motorcycles_Color, Classifieds_Motorcycles_Metreage, Classifieds_Motorcycles_Items_ID, Classifieds_Motorcycles_Items_HasFrontBrakeDisk, Classifieds_Motorcycles_Items_HasBackBrakeDisk, Classifieds_Motorcycles_Items_HasABS, Classifieds_Motorcycles_Items_HasPowerStart, Classifieds_Motorcycles_Items_HasAlloyWheels FROM Classifieds_Motorcycles INNER JOIN Classifieds_Motorcycles_Items ON Classifieds_Motorcycles_ID = Classifieds_Motorcycles_ID_FK WHERE Classifieds_ID_FK = ?;");
                            $ClassifiedMotorcycleQuery->bindValue(1, $ClassifiedMotorcycleModel->getClassifiedID(), PDO::PARAM_INT);

                            if ($RowMotorcycle->execute()) {
                                $RowMotorcycle = $ClassifiedMotorcycleQuery->fetch();

                                $ClassifiedMotorcycleModel->setClassifiedMotorcycleID($RowMotorcycle["Classifieds_Motorcycles_ID"]);
                                $ClassifiedMotorcycleModel->setClassifiedMotorcycleBrand(utf8_encode($RowMotorcycle["Classifieds_Motorcycles_Brand"]));
                                $ClassifiedMotorcycleModel->setClassifiedMotorcycleModel(utf8_encode($RowMotorcycle["Classifieds_Motorcycles_Model"]));
                                $ClassifiedMotorcycleModel->setClassifiedMotorcycleVersion(utf8_encode($RowMotorcycle["Classifieds_Motorcycles_Version"]));
                                $ClassifiedMotorcycleModel->setClassifiedMotorcycleYear($RowMotorcycle["Classifieds_Motorcycles_Year"]);
                                $ClassifiedMotorcycleModel->setClassifiedMotorcycleFuel(utf8_encode($RowMotorcycle["Classifieds_Motorcycles_Fuel"]));
                                $ClassifiedMotorcycleModel->setClassifiedMotorcycleColor(utf8_encode($RowMotorcycle["Classifieds_Motorcycles_Color"]));
                                $ClassifiedMotorcycleModel->setClassifiedMotorcycleMetreage($RowMotorcycle["Classifieds_Motorcycles_Metreage"]);
                                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsID($RowMotorcycle["Classifieds_Motorcycles_Items_ID"]);
                                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasFrontBrakeDisk($RowMotorcycle["Classifieds_Motorcycles_Items_HasFrontBrakeDisk"]);
                                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasBackBrakeDisk($RowMotorcycle["Classifieds_Motorcycles_Items_HasBackBrakeDisk"]);
                                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasABS($RowMotorcycle["Classifieds_Motorcycles_Items_HasABS"]);
                                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasPowerStart($RowMotorcycle["Classifieds_Motorcycles_Items_HasPowerStart"]);
                                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasAlloyWheels($RowMotorcycle["Classifieds_Motorcycles_Items_HasAlloyWheels"]);

                                $ClassifiedMotorcycleImagesQuery = $pdo->prepare("SELECT Classifieds_Pictures_FileName FROM Classifieds_Pictures WHERE Classifieds_ID_FK = ?;");
                                $ClassifiedMotorcycleImagesQuery->bindValue(1, $ClassifiedMotorcycleModel->getClassifiedID(), PDO::PARAM_INT);

                                $ClassifiedMotorcycleImagesArray = array();

                                if ($ClassifiedMotorcycleImagesQuery->execute()) {
                                    while ($RowImages = $ClassifiedMotorcycleImagesQuery->fetch()) {
                                        array_push($ClassifiedMotorcycleImagesArray, utf8_encode($RowImages["Classifieds_Pictures_FileName"]));
                                    }
                                }

                                $ClassifiedMotorcycleModel->setClassifiedPictures($ClassifiedMotorcycleImagesArray);
                                
                                array_push($ClassifiedsArray, $ClassifiedMotorcycleModel);
                            }
                        }                       
                    }
                }
            }
            
            return $ClassifiedsArray;
        }

        public function GetClassifiedMotorcycles() {
            global $pdo;

            $ClassifiedMotorcycleQuery = $pdo->query("SELECT Classifieds_ID, Classifieds_Date, Classifieds_Description, Classifieds_Price, Classifieds_VideoLink, Classifieds_UF, Classifieds_City, Classifieds_Type, Users_ID_FK, Classifieds_Motorcycles_ID, Classifieds_Motorcycles_Brand, Classifieds_Motorcycles_Model, Classifieds_Motorcycles_Version, Classifieds_Motorcycles_Year, Classifieds_Motorcycles_Fuel, Classifieds_Motorcycles_Color, Classifieds_Motorcycles_Metreage, Classifieds_Motorcycles_Items_ID, Classifieds_Motorcycles_Items_HasFrontBrakeDisk, Classifieds_Motorcycles_Items_HasBackBrakeDisk, Classifieds_Motorcycles_Items_HasABS, Classifieds_Motorcycles_Items_HasPowerStart, Classifieds_Motorcycles_Items_HasAlloyWheels FROM Classifieds INNER JOIN Classifieds_Motorcycles ON Classifieds_ID = Classifieds_ID_FK INNER JOIN Classifieds_Motorcycles_Items ON Classifieds_Motorcycles_ID = Classifieds_Motorcycles_ID_FK;");

            $ClassifiedMotorcyclesArray = array();
		if ($ClassifiedMotorcycleQuery) {
			if ($ClassifiedMotorcycleQuery->rowCount() > 0) {
            while ($Row = $ClassifiedMotorcycleQuery->fetch()) {
                $UserModel = new UserModel();
                $ClassifiedMotorcycleModel = new ClassifiedMotorcycleModel();
                $ClassifiedMotorcycleItemsModel = new ClassifiedMotorcycleItemsModel();

                $ClassifiedMotorcycleModel->setClassifiedID($Row["Classifieds_ID"]);
                $ClassifiedMotorcycleModel->setClassifiedDate($Row["Classifieds_Date"]);
                $ClassifiedMotorcycleModel->setClassifiedDescription(utf8_encode($Row["Classifieds_Description"]));
                $ClassifiedMotorcycleModel->setClassifiedPrice($Row["Classifieds_Price"]);
                $ClassifiedMotorcycleModel->setClassifiedVideoLink(utf8_encode($Row["Classifieds_VideoLink"]));
                $ClassifiedMotorcycleModel->setClassifiedUF(utf8_encode($Row["Classifieds_UF"]));
                $ClassifiedMotorcycleModel->setClassifiedCity(utf8_encode($Row["Classifieds_City"]));
                $ClassifiedMotorcycleModel->setClassifiedType(utf8_encode($Row["Classifieds_Type"]));
                $UserModel->setUserID($Row["Users_ID_FK"]);
                $ClassifiedMotorcycleModel->setUserModel($UserModel);
                $ClassifiedMotorcycleModel->setClassifiedMotorcycleID($Row["Classifieds_Motorcycles_ID"]);
                $ClassifiedMotorcycleModel->setClassifiedMotorcycleBrand(utf8_encode($Row["Classifieds_Motorcycles_Brand"]));
                $ClassifiedMotorcycleModel->setClassifiedMotorcycleModel(utf8_encode($Row["Classifieds_Motorcycles_Model"]));
                $ClassifiedMotorcycleModel->setClassifiedMotorcycleVersion(utf8_encode($Row["Classifieds_Motorcycles_Version"]));
                $ClassifiedMotorcycleModel->setClassifiedMotorcycleYear($Row["Classifieds_Motorcycles_Year"]);
                $ClassifiedMotorcycleModel->setClassifiedMotorcycleFuel(utf8_encode($Row["Classifieds_Motorcycles_Fuel"]));
                $ClassifiedMotorcycleModel->setClassifiedMotorcycleColor(utf8_encode($Row["Classifieds_Motorcycles_Color"]));
                $ClassifiedMotorcycleModel->setClassifiedMotorcycleMetreage($Row["Classifieds_Motorcycles_Metreage"]);
                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsID($Row["Classifieds_Motorcycles_Items_ID"]);
                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasFrontBrakeDisk($Row["Classifieds_Motorcycles_Items_HasFrontBrakeDisk"]);
                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasBackBrakeDisk($Row["Classifieds_Motorcycles_Items_HasBackBrakeDisk"]);
                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasABS($Row["Classifieds_Motorcycles_Items_HasABS"]);
                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasPowerStart($Row["Classifieds_Motorcycles_Items_HasPowerStart"]);
                $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasAlloyWheels($Row["Classifieds_Motorcycles_Items_HasAlloyWheels"]);

                $ClassifiedMotorcycleImagesQuery = $pdo->prepare("SELECT Classifieds_Pictures_FileName FROM Classifieds_Pictures WHERE Classifieds_ID_FK = ?;");
                $ClassifiedMotorcycleImagesQuery->bindValue(1, $ClassifiedMotorcycleModel->getClassifiedID(), PDO::PARAM_INT);

                $ClassifiedMotorcycleImagesArray = array();

                if ($ClassifiedMotorcycleImagesQuery->execute()) {
                    while ($RowImages = $ClassifiedMotorcycleImagesQuery->fetch()) {
                        array_push($ClassifiedMotorcycleImagesArray, utf8_encode($RowImages["Classifieds_Pictures_FileName"]));
                    }
                }

                $ClassifiedMotorcycleModel->setClassifiedPictures($ClassifiedMotorcycleImagesArray);

                array_push($ClassifiedMotorcyclesArray, $ClassifiedMotorcycleModel);
            }
}}

            return $ClassifiedMotorcyclesArray;
        }

        public function GetClassifiedByID($ClassifiedID) {
            global $pdo;

            $ClassifiedQuery = $pdo->prepare("SELECT Classifieds_ID, Classifieds_Date, Classifieds_Description, Classifieds_Price, Classifieds_VideoLink, Classifieds_UF, Classifieds_City, Classifieds_Type, Users_ID_FK FROM Classifieds WHERE Classifieds_ID = ?;");
            $ClassifiedQuery->bindValue(1, $ClassifiedID, PDO::PARAM_INT);
            
            if ($ClassifiedQuery->execute()) {
                $Row = $ClassifiedQuery->fetch();
                if ($Row["Classifieds_Type"] === "Carro" || $Row["Classifieds_Type"] === "Clássico") {
                    $UserModel = new UserModel();
                    $ClassifiedCarModel = new ClassifiedCarModel();
                    $ClassifiedCarItemsModel = new ClassifiedCarItemsModel();
                    $ClassifiedCarModel->setClassifiedID($Row["Classifieds_ID"]);
                    $ClassifiedCarModel->setClassifiedDate($Row["Classifieds_Date"]);
                    $ClassifiedCarModel->setClassifiedDescription($Row["Classifieds_Description"]);
                    $ClassifiedCarModel->setClassifiedPrice($Row["Classifieds_Price"]);
                    $ClassifiedCarModel->setClassifiedVideoLink($Row["Classifieds_VideoLink"]);
                    $ClassifiedCarModel->setClassifiedUF($Row["Classifieds_UF"]);
                    $ClassifiedCarModel->setClassifiedCity($Row["Classifieds_City"]);
                    $ClassifiedCarModel->setClassifiedType($Row["Classifieds_Type"]);
                    $UserModel->setUserID($Row["Users_ID_FK"]);
                    $ClassifiedCarModel->setUserModel($UserModel);

                    $ClassifiedQuery = $pdo->prepare("SELECT Classifieds_Cars_ID, Classifieds_Cars_Brand, Classifieds_Cars_Model, Classifieds_Cars_Version, Classifieds_Cars_Year, Classifieds_Cars_Fuel, Classifieds_Cars_Transmission, Classifieds_Cars_Doors, Classifieds_Cars_Engine, Classifieds_Cars_Colors, Classifieds_Cars_Metreage, Classifieds_Cars_Items_ID, Classifieds_Cars_Items_HasAirConditioning, Classifieds_Cars_Items_HasLeatherSeats, Classifieds_Cars_Items_HasRearHeadrest, Classifieds_Cars_Items_HasPowerLocks, Classifieds_Cars_Items_HasPowerMirrors, Classifieds_Cars_Items_HasHeatedSeats, Classifieds_Cars_Items_HasBoardComputer, Classifieds_Cars_Items_HasReverseSensor, Classifieds_Cars_Items_HasMultimediaCenter, Classifieds_Cars_Items_HasGPS, Classifieds_Cars_Items_HasPowerSteering, Classifieds_Cars_Items_HasAutoPilot FROM Classifieds_Cars INNER JOIN Classifieds_Cars_Items ON Classifieds_Cars_ID = Classifieds_Cars_ID_FK WHERE Classifieds_ID_FK = ?;");
                    $ClassifiedQuery->bindValue(1, $ClassifiedCarModel->getClassifiedID());

                    if ($ClassifiedQuery->execute()) {
                        $Row = $ClassifiedQuery->fetch();

                        $ClassifiedCarModel->setClassifiedCarID($Row["Classifieds_Cars_ID"]);
                        $ClassifiedCarModel->setClassifiedCarBrand($Row["Classifieds_Cars_Brand"]);
                        $ClassifiedCarModel->setClassifiedCarModel($Row["Classifieds_Cars_Model"]);
                        $ClassifiedCarModel->setClassifiedCarVersion($Row["Classifieds_Cars_Version"]);
                        $ClassifiedCarModel->setClassifiedCarYear($Row["Classifieds_Cars_Year"]);
                        $ClassifiedCarModel->setClassifiedCarFuel($Row["Classifieds_Cars_Fuel"]);
                        $ClassifiedCarModel->setClassifiedCarTransmission($Row["Classifieds_Cars_Transmission"]);
                        $ClassifiedCarModel->setClassifiedCarDoors($Row["Classifieds_Cars_Doors"]);
                        $ClassifiedCarModel->setClassifiedCarEngine($Row["Classifieds_Cars_Engine"]);
                        $ClassifiedCarModel->setClassifiedCarColor($Row["Classifieds_Cars_Colors"]);
                        $ClassifiedCarModel->setClassifiedCarMetreage($Row["Classifieds_Cars_Metreage"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsID($Row["Classifieds_Cars_Items_ID"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasAirConditioning($Row["Classifieds_Cars_Items_HasAirConditioning"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasLeatherSeats($Row["Classifieds_Cars_Items_HasLeatherSeats"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasRearHeadrest($Row["Classifieds_Cars_Items_HasRearHeadrest"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerLocks($Row["Classifieds_Cars_Items_HasPowerLocks"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerMirrors($Row["Classifieds_Cars_Items_HasPowerMirrors"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasHeatedSeats($Row["Classifieds_Cars_Items_HasHeatedSeats"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasBoardComputer($Row["Classifieds_Cars_Items_HasBoardComputer"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasReverseSensor($Row["Classifieds_Cars_Items_HasReverseSensor"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasMultimediaCenter($Row["Classifieds_Cars_Items_HasMultimediaCenter"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasGPS($Row["Classifieds_Cars_Items_HasGPS"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerSteering($Row["Classifieds_Cars_Items_HasPowerSteering"]);
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasAutoPilot($Row["Classifieds_Cars_Items_HasAutoPilot"]);
                        $ClassifiedCarModel->setClassifiedCarItemsModel($ClassifiedCarItemsModel);

                        $ClassifiedCarImagesQuery = $pdo->prepare("SELECT Classifieds_Pictures_FileName FROM Classifieds_Pictures WHERE Classifieds_ID_FK = ?;");
                        $ClassifiedCarImagesQuery->bindValue(1, $ClassifiedCarModel->getClassifiedID(), PDO::PARAM_INT);
        
                        $ClassifiedCarImagesArray = array();
        
                        if ($ClassifiedCarImagesQuery->execute()) {
                            while ($RowImages = $ClassifiedCarImagesQuery->fetch()) {
                                array_push($ClassifiedCarImagesArray, $RowImages["Classifieds_Pictures_FileName"]);
                            }
                        }
        
                        $ClassifiedCarModel->setClassifiedPictures($ClassifiedCarImagesArray);

                        return $ClassifiedCarModel;
                    }
                } 
                else if (utf8_encode($Row["Classifieds_Type"]) === "Moto") {
                    $UserModel = new UserModel();
                    $ClassifiedMotorcycleModel = new ClassifiedMotorcycleModel();
                    $ClassifiedMotorcycleItemsModel = new ClassifiedMotorcycleItemsModel();
                    $ClassifiedMotorcycleModel->setClassifiedID($Row["Classifieds_ID"]);
                    $ClassifiedMotorcycleModel->setClassifiedDate($Row["Classifieds_Date"]);
                    $ClassifiedMotorcycleModel->setClassifiedDescription(utf8_encode($Row["Classifieds_Description"]));
                    $ClassifiedMotorcycleModel->setClassifiedPrice($Row["Classifieds_Price"]);
                    $ClassifiedMotorcycleModel->setClassifiedVideoLink(utf8_encode($Row["Classifieds_VideoLink"]));
                    $ClassifiedMotorcycleModel->setClassifiedUF(utf8_encode($Row["Classifieds_UF"]));
                    $ClassifiedMotorcycleModel->setClassifiedCity(utf8_encode($Row["Classifieds_City"]));
                    $ClassifiedMotorcycleModel->setClassifiedType(utf8_encode($Row["Classifieds_Type"]));
                    $UserModel->setUserID($Row["Users_ID_FK"]);
                    $ClassifiedMotorcycleModel->setUserModel($UserModel);

                    $ClassifiedQuery = $pdo->prepare("SELECT Classifieds_Motorcycles_ID, Classifieds_Motorcycles_Brand, Classifieds_Motorcycles_Model, Classifieds_Motorcycles_Version, Classifieds_Motorcycles_Year, Classifieds_Motorcycles_Fuel, Classifieds_Motorcycles_Color, Classifieds_Motorcycles_Metreage, Classifieds_Motorcycles_Items_ID, Classifieds_Motorcycles_Items_HasFrontBrakeDisk, Classifieds_Motorcycles_Items_HasBackBrakeDisk, Classifieds_Motorcycles_Items_HasABS, Classifieds_Motorcycles_Items_HasPowerStart, Classifieds_Motorcycles_Items_HasAlloyWheels FROM Classifieds_Motorcycles INNER JOIN Classifieds_Motorcycles_Items ON Classifieds_Motorcycles_ID = Classifieds_Motorcycles_ID_FK WHERE Classifieds_ID_FK = ?;");
                    $ClassifiedQuery->bindValue(1, $ClassifiedMotorcycleModel->getClassifiedID(), PDO::PARAM_INT);

                    if ($ClassifiedQuery->execute()) {
                        if ($ClassifiedQuery->rowCount() == 1) {
                            $Row = $ClassifiedQuery->fetch();

                            $ClassifiedMotorcycleModel->setClassifiedMotorcycleID($Row["Classifieds_Motorcycles_ID"]);
                            $ClassifiedMotorcycleModel->setClassifiedMotorcycleBrand(utf8_encode($Row["Classifieds_Motorcycles_Brand"]));
                            $ClassifiedMotorcycleModel->setClassifiedMotorcycleModel(utf8_encode($Row["Classifieds_Motorcycles_Model"]));
                            $ClassifiedMotorcycleModel->setClassifiedMotorcycleVersion(utf8_encode($Row["Classifieds_Motorcycles_Version"]));
                            $ClassifiedMotorcycleModel->setClassifiedMotorcycleYear($Row["Classifieds_Motorcycles_Year"]);
                            $ClassifiedMotorcycleModel->setClassifiedMotorcycleFuel(utf8_encode($Row["Classifieds_Motorcycles_Fuel"]));
                            $ClassifiedMotorcycleModel->setClassifiedMotorcycleColor(utf8_encode($Row["Classifieds_Motorcycles_Color"]));
                            $ClassifiedMotorcycleModel->setClassifiedMotorcycleMetreage($Row["Classifieds_Motorcycles_Metreage"]);
                            $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsID($Row["Classifieds_Motorcycles_Items_ID"]);
                            $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasFrontBrakeDisk($Row["Classifieds_Motorcycles_Items_HasFrontBrakeDisk"]);
                            $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasBackBrakeDisk($Row["Classifieds_Motorcycles_Items_HasBackBrakeDisk"]);
                            $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasABS($Row["Classifieds_Motorcycles_Items_HasABS"]);
                            $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasPowerStart($Row["Classifieds_Motorcycles_Items_HasPowerStart"]);
                            $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasAlloyWheels($Row["Classifieds_Motorcycles_Items_HasAlloyWheels"]);
                            $ClassifiedMotorcycleModel->setClassifiedMotorcycleItemsModel($ClassifiedMotorcycleItemsModel);
                            $ClassifiedMotorcycleImagesQuery = $pdo->prepare("SELECT Classifieds_Pictures_FileName FROM Classifieds_Pictures WHERE Classifieds_ID_FK = ?;");
                            $ClassifiedMotorcycleImagesQuery->bindValue(1, $ClassifiedMotorcycleModel->getClassifiedID(), PDO::PARAM_INT);

                            $ClassifiedMotorcycleImagesArray = array();

                            if ($ClassifiedMotorcycleImagesQuery->execute()) {
                                while ($RowImages = $ClassifiedMotorcycleImagesQuery->fetch()) {
                                    array_push($ClassifiedMotorcycleImagesArray, utf8_encode($RowImages["Classifieds_Pictures_FileName"]));
                                }
                            }

                            $ClassifiedMotorcycleModel->setClassifiedPictures($ClassifiedMotorcycleImagesArray);

                            return $ClassifiedMotorcycleModel;
                        }
                    }
                }
            }

            return null;
        }

        function GetYoutubeEmbedUrl($url){
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
            if (preg_match($longUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            if (preg_match($shortUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            return 'https://www.youtube.com/embed/' . $youtube_id ;
        }
    }
?>
