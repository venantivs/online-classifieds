<?php
    require_once "UserModel.php";
    require_once "ClassifiedCarModel.php";
    require_once "ClassifiedMotorcycleModel.php";
    require_once "ClassifiedController.php";
    require_once "ImageHandler.php";

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_POST["action"]) && !is_numeric($_POST["action"]) && !empty($_POST["action"])) {
        $Action = strip_tags(trim(filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

        if ($Action === "announce") {
            if (!isset($_SESSION["UserID"]) || !is_numeric($_SESSION["UserID"]) || empty($_SESSION["UserID"])) {
                echo json_encode(array('status' => 'failure', 'message' => 'Você não tem permissão para realizar esta ação.'));
                exit();
            }

            if (isset($_POST["cmbType"]) && !is_numeric($_POST["cmbType"]) && !empty($_POST["cmbType"]) &&
                isset($_POST["cmbBrand"]) && !is_numeric($_POST["cmbBrand"]) && !empty($_POST["cmbBrand"]) &&
                isset($_POST["txtModel"]) && !is_numeric($_POST["txtModel"]) && !empty($_POST["txtModel"]) &&
                isset($_POST["txtVersion"]) && !is_numeric($_POST["txtVersion"]) && !empty($_POST["txtVersion"]) &&
                isset($_POST["cmbYear"]) && is_numeric($_POST["cmbYear"]) && !empty($_POST["cmbYear"]) &&
                isset($_POST["txtPrice"]) && is_numeric($_POST["txtPrice"]) && !empty($_POST["txtPrice"]) && 
                isset($_POST["cmbFuel"]) && !is_numeric($_POST["cmbFuel"]) && !empty($_POST["cmbFuel"]) &&
                isset($_POST["txtMetreage"]) && is_numeric($_POST["txtMetreage"]) && !empty($_POST["txtMetreage"]) &&
                isset($_POST["txtColor"]) && !is_numeric($_POST["txtColor"]) && !empty($_POST["txtColor"]) &&
                isset($_POST["txtDescription"]) && !is_numeric($_POST["txtDescription"]) && !empty($_POST["txtDescription"]) &&
                isset($_POST["cmbUF"]) && !is_numeric($_POST["cmbUF"]) && !empty($_POST["cmbUF"]) && strlen($_POST["cmbUF"]) == 2 &&
                isset($_POST["txtCity"]) && !is_numeric($_POST["txtCity"]) && !empty($_POST["txtCity"])) {

                if ($_POST["cmbType"] === "Carro" || $_POST["cmbType"] === "Clássico") {
                    if (!isset($_POST["cmbTransmission"]) || is_numeric($_POST["cmbTransmission"]) || empty($_POST["cmbTransmission"]) ||
                        !isset($_POST["cmbDoors"]) || !is_numeric($_POST["cmbDoors"]) || empty($_POST["cmbDoors"]) ||
                        !isset($_POST["txtEngine"]) || empty($_POST["txtEngine"])) {
                        
                        echo json_encode(array('status' => 'failure', 'message' => 'Dados inválidos.'));
                        exit();
                    }
                }

                if (isset($_POST["txtVideoLink"]) && !empty($_POST["txtVideoLink"])) {
                    if (is_numeric($_POST["txtVideoLink"]) || !filter_input(INPUT_POST, "txtVideoLink", FILTER_VALIDATE_URL)) {
                        echo json_encode(array('status' => 'failure', 'message' => 'Link de vídeo inválido.'));
                        exit();
                    }
                }

                $ImagesArray = array();

                if (array_sum($_FILES["fileImages"]["error"]) == 0) {
                    $ImagesArray = UploadImages($_FILES);
                    if (count($ImagesArray) == 0) {
                        echo json_encode(array('status' => 'failure', 'message' => 'Não foi possível fazer o upload das imagens.'));
                        exit();
                    }
                }

                $Type = strip_tags(trim(filter_input(INPUT_POST, "cmbType", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

                if ($Type === "Carro" || $Type === "Clássico") {
                    $ClassifiedCarModel = new ClassifiedCarModel();
                    $ClassifiedCarItemsModel = new ClassifiedCarItemsModel();
                    $UserModel = new UserModel();

                    $UserModel->setUserID($_SESSION["UserID"]);

                    $ClassifiedCarModel->setClassifiedDate(date("Y-m-d"));
                    $ClassifiedCarModel->setClassifiedDescription(strip_tags(trim(filter_input(INPUT_POST, "txtDescription", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedPrice(strip_tags(trim(filter_input(INPUT_POST, "txtPrice", FILTER_SANITIZE_NUMBER_INT))));
                    $ClassifiedCarModel->setClassifiedVideoLink(strip_tags(trim(filter_input(INPUT_POST, "txtVideoLink", FILTER_SANITIZE_URL))));
                    $ClassifiedCarModel->setClassifiedUF(strip_tags(trim(filter_input(INPUT_POST, "cmbUF", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedCity(strip_tags(trim(filter_input(INPUT_POST, "txtCity", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedType(strip_tags(trim(filter_input(INPUT_POST, "cmbType", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedPictures($ImagesArray);
                    $ClassifiedCarModel->setUserModel($UserModel);
                    $ClassifiedCarModel->setClassifiedCarBrand(strip_tags(trim(filter_input(INPUT_POST, "cmbBrand", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedCarModel(strip_tags(trim(filter_input(INPUT_POST, "txtModel", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedCarVersion(strip_tags(trim(filter_input(INPUT_POST, "txtVersion", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedCarYear(strip_tags(trim(filter_input(INPUT_POST, "cmbYear", FILTER_SANITIZE_NUMBER_INT))));
                    $ClassifiedCarModel->setClassifiedCarFuel(strip_tags(trim(filter_input(INPUT_POST, "cmbFuel", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedCarTransmission(strip_tags(trim(filter_input(INPUT_POST, "cmbTransmission", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedCarDoors(filter_input(INPUT_POST, "cmbDoors", FILTER_SANITIZE_NUMBER_INT));
                    $ClassifiedCarModel->setClassifiedCarEngine(strip_tags(trim(filter_input(INPUT_POST, "txtEngine", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedCarColor(strip_tags(trim(filter_input(INPUT_POST, "txtColor", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedCarModel->setClassifiedCarMetreage(strip_tags(trim(filter_input(INPUT_POST, "txtMetreage", FILTER_SANITIZE_NUMBER_INT))));

                    if (isset($_POST["ckbAirConditioning"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasAirConditioning(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasAirConditioning(false);

                    if (isset($_POST["ckbLeatherSeats"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasLeatherSeats(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasLeatherSeats(false);

                    if (isset($_POST["ckbRearHeadrest"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasRearHeadrest(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasRearHeadrest(false);

                    if (isset($_POST["ckbPowerLocks"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerLocks(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerLocks(false);

                    if (isset($_POST["ckbPowerMirrors"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerMirrors(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerMirrors(false);

                    if (isset($_POST["ckbHeatedSeats"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasHeatedSeats(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasHeatedSeats(false);

                    if (isset($_POST["ckbBoardComputer"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasBoardComputer(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasBoardComputer(false);

                    if (isset($_POST["ckbReverseSensor"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasReverseSensor(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasReverseSensor(false);

                    if (isset($_POST["ckbMultimediaCenter"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasMultimediaCenter(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasMultimediaCenter(false);

                    if (isset($_POST["ckbGPS"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasGPS(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasGPS(false);

                    if (isset($_POST["ckbPowerSteering"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerSteering(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasPowerSteering(false);

                    if (isset($_POST["ckbAutoPilot"]))
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasAutoPilot(true);
                    else
                        $ClassifiedCarItemsModel->setClassifiedCarItemsHasAutoPilot(false);

                    $ClassifiedCarModel->setClassifiedCarItemsModel($ClassifiedCarItemsModel);

                    $ClassifiedController = new ClassifiedController();

                    if ($ClassifiedController->AnnounceCar($ClassifiedCarModel)) {
                        echo json_encode(array('status' => 'success', 'message' => 'Anúncio realizado com sucesso!'));
                        exit();
                    } else {
                        echo json_encode(array('status' => 'failure', 'message' => 'Não foi possível fazer o anúncio.'));
                        exit();
                    }
                } else if ($Type === "Moto") {
                    $ClassifiedMotorcycleModel = new ClassifiedMotorcycleModel();
                    $ClassifiedMotorcycleItemsModel = new ClassifiedMotorcycleItemsModel();
                    $UserModel = new UserModel();

                    $UserModel->setUserID($_SESSION["UserID"]);

                    $ClassifiedMotorcycleModel->setClassifiedDate(date("Y-m-d"));
                    $ClassifiedMotorcycleModel->setClassifiedDescription(strip_tags(trim(filter_input(INPUT_POST, "txtDescription", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedMotorcycleModel->setClassifiedPrice(strip_tags(trim(filter_input(INPUT_POST, "txtPrice", FILTER_SANITIZE_NUMBER_INT))));
                    $ClassifiedMotorcycleModel->setClassifiedVideoLink(strip_tags(trim(filter_input(INPUT_POST, "txtVideoLink", FILTER_SANITIZE_URL))));
                    $ClassifiedMotorcycleModel->setClassifiedUF(strip_tags(trim(filter_input(INPUT_POST, "cmbUF", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedMotorcycleModel->setClassifiedCity(strip_tags(trim(filter_input(INPUT_POST, "txtCity", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedMotorcycleModel->setClassifiedType(strip_tags(trim(filter_input(INPUT_POST, "cmbType", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedMotorcycleModel->setClassifiedPictures($ImagesArray);
                    $ClassifiedMotorcycleModel->setUserModel($UserModel);
                    $ClassifiedMotorcycleModel->setClassifiedMotorcycleBrand(strip_tags(trim(filter_input(INPUT_POST, "cmbBrand", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedMotorcycleModel->setClassifiedMotorcycleModel(strip_tags(trim(filter_input(INPUT_POST, "txtModel", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedMotorcycleModel->setClassifiedMotorcycleVersion(strip_tags(trim(filter_input(INPUT_POST, "txtVersion", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedMotorcycleModel->setClassifiedMotorcycleYear(strip_tags(trim(filter_input(INPUT_POST, "cmbYear", FILTER_SANITIZE_NUMBER_INT))));
                    $ClassifiedMotorcycleModel->setClassifiedMotorcycleFuel(strip_tags(trim(filter_input(INPUT_POST, "cmbFuel", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedMotorcycleModel->setClassifiedMotorcycleColor(strip_tags(trim(filter_input(INPUT_POST, "txtColor", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                    $ClassifiedMotorcycleModel->setClassifiedMotorcycleMetreage(strip_tags(trim(filter_input(INPUT_POST, "txtMetreage", FILTER_SANITIZE_NUMBER_INT))));

                    if (isset($_POST["ckbFrontBrakeDisc"]))
                        $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasFrontBrakeDisk(true);
                    else
                        $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasFrontBrakeDisk(false);

                    if (isset($_POST["ckbBackBrakeDisc"]))
                        $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasBackBrakeDisk(true);
                    else
                        $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasBackBrakeDisk(false);

                    if (isset($_POST["ckbABS"]))
                        $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasABS(true);
                    else
                        $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasABS(false);

                    if (isset($_POST["ckbPowerStart"]))
                        $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasPowerStart(true);
                    else
                        $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasPowerStart(false);

                    if (isset($_POST["ckbAlloyWheels"]))
                        $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasAlloyWheels(true);
                    else
                        $ClassifiedMotorcycleItemsModel->setClassifiedMotorcycleItemsHasAlloyWheels(false);

                    $ClassifiedMotorcycleModel->setClassifiedMotorcycleItemsModel($ClassifiedMotorcycleItemsModel);

                    $ClassifiedController = new ClassifiedController();

                    if ($ClassifiedController->AnnounceMotorcycle($ClassifiedMotorcycleModel)) {
                        echo json_encode(array('status' => 'success', 'message' => 'Moto anunciada com sucesso!'));
                        exit();
                    } else {
                        echo json_encode(array('status' => 'failure', 'message' => 'Não foi possível fazer o anúncio.'));
                        exit();
                    }
                } else {
                    echo json_encode(array('status' => 'failure', 'message' => 'Dados inválidos.'));
                    exit();
                }
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Dados inválidos.'));
                exit();
            }
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Comando inválido.'));
            exit();
        }
    } else {
        exit();
    }
?>