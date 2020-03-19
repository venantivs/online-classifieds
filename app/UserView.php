<?php
    require_once "UserModel.php";
    require_once "UserController.php";
    require_once "ImageHandler.php";

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_POST["action"]) && !is_numeric($_POST["action"]) && !empty($_POST["action"])) {
        $Action = strip_tags(trim(filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

        if ($Action === "login") {
            if (isset($_POST["txtEmail"]) && !is_numeric($_POST["txtEmail"]) && !empty($_POST["txtEmail"]) && isset($_POST["txtPassword"]) && !empty($_POST["txtPassword"]) && filter_input(INPUT_POST, "txtEmail", FILTER_VALIDATE_EMAIL)) {
                $UserModel = new UserModel();
                $UserController = new UserController();

                $UserModel->setUserEmail(strip_tags(trim(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL))));
                $UserModel->setUserPassword(strip_tags(trim(filter_input(INPUT_POST, "txtPassword", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));

                if (!$UserController->IsEmailExistent($UserModel)) {
                    echo json_encode(array('status' => 'failure', 'message' => 'Email não cadastrado.'));
                    exit();
                }

                if (($ID = $UserController->LoginUser($UserModel)) != false) {
                    $_SESSION["UserID"] = $ID;
                    
                    echo json_encode(array('status' => 'success', 'message' => 'Logado com sucesso!'));
                    exit();
                } else {
                    echo json_encode(array('status' => 'failure', 'message' => 'Senha incorreta.'));
                    exit();
                }
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Email e/ou senha inválidos.'));
                exit();
            }
        } else if ($Action === "logout") {
            if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {
                $UserController = new UserController();
                $UserController->logoutUser();
            }
        } else if ($Action === "register") {
            if (isset($_POST["txtFirstName"]) && !is_numeric($_POST["txtFirstName"]) && !empty($_POST["txtFirstName"]) &&
                isset($_POST["txtLastName"]) && !is_numeric($_POST["txtLastName"]) && !empty($_POST["txtLastName"]) &&
                isset($_POST["txtPhone"]) && !is_numeric($_POST["txtPhone"]) && !empty($_POST["txtPhone"]) &&
                isset($_POST["txtEmail"]) && !is_numeric($_POST["txtEmail"]) && !empty($_POST["txtEmail"]) && filter_input(INPUT_POST, "txtEmail", FILTER_VALIDATE_EMAIL) &&
                isset($_POST["txtConfirmEmail"]) && !is_numeric($_POST["txtConfirmEmail"]) && !empty($_POST["txtConfirmEmail"]) && filter_input(INPUT_POST, "txtConfirmEmail", FILTER_VALIDATE_EMAIL) &&
                isset($_POST["txtConfirmPassword"]) && !empty($_POST["txtConfirmPassword"]) && isset($_POST["txtPassword"]) && !empty($_POST["txtPassword"])) {
                   
                if ($_POST["txtEmail"] !== $_POST["txtConfirmEmail"]) {
                    echo json_encode(array('status' => 'failure', 'message' => 'Os emails não coincidem.'));
                    exit();
                }

                if ($_POST["txtPassword"] !== $_POST["txtConfirmPassword"]) {
                    echo json_encode(array('status' => 'failure', 'message' => 'As senhas não coincidem.'));
                    exit();
                }

                $UserModel = new UserModel();
                $UserController = new UserController();
                $UserModel->setUserFirstName(strip_tags(trim(filter_input(INPUT_POST, "txtFirstName", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                $UserModel->setUserLastName(strip_tags(trim(filter_input(INPUT_POST, "txtLastName", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                $UserModel->setUserSignDate(date("Y-m-d"));
                $UserModel->setUserPhone(strip_tags(trim(filter_input(INPUT_POST, "txtPhone", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
                $UserModel->setUserEmail(strip_tags(trim(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL))));
                $UserModel->setUserPassword(strip_tags(trim(filter_input(INPUT_POST, "txtPassword", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));

                if ($UserController->IsEmailExistent($UserModel)) {
                    echo json_encode(array('status' => 'failure', 'message' => 'Email já cadastrado.'));
                    exit();
                }

                if ($UserController->SignupUser($UserModel)) {
                    echo json_encode(array('status' => 'success', 'message' => 'Usuário cadastrado com sucesso!'));
                    exit();
                } else {
                    echo json_encode(array('status' => 'failure', 'message' => 'Não foi possível cadastrar o usuário.'));
                    exit();
                }
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Dados inválidos.'));
                exit();
            }
        } else if ($Action === "change_pic") {
            if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {
                if (isset($_FILES["fileImage"]) && !($_FILES["fileImage"]["error"] > 0)) {
                    
                    if (($Name = UploadImage($_FILES)) !== false)  {
                        $UserModel = new UserModel();
                        $UserController = new UserController();
                        $UserModel->setUserID($_SESSION["UserID"]);
                        $UserModel->setUserPicture($Name);

                        if ($UserController->ChangeUserPic($UserModel)) {
                            echo json_encode(array('status' => 'success', 'message' => 'Foto alterada com sucesso!'));
                            exit();
                        } else {
                            echo json_encode(array('status' => 'failure', 'message' => 'Não foi possível alterar a foto.'));
                            exit();
                        }
                    }
                } else {
                    echo json_encode(array('status' => 'failure', 'message' => 'Uma imagem deve ser selecionada.'));
                    exit();
                }
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Você não tem permissão para fazer isto.'));
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
