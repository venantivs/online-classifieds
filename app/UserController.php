<?php
    require_once "Connection.php";
    require_once "UserModel.php";

    class UserController {
        public function SignupUser($UserModel) {
            global $pdo;


		var_dump($UserModel);
            $UserQuery = $pdo->prepare("INSERT INTO Users (Users_FirstName, Users_LastName, Users_SignDate, Users_Phone, Users_Email, Users_Password) VALUES (?, ?, ?, ?, ?, ?);");
            $UserQuery->bindValue(1, $UserModel->getUserFirstName(), PDO::PARAM_STR);
            $UserQuery->bindValue(2, $UserModel->getUserLastName(), PDO::PARAM_STR);
            $UserQuery->bindValue(3, $UserModel->getUserSignDate(), PDO::PARAM_STR);
            $UserQuery->bindValue(4, $UserModel->getUserPhone(), PDO::PARAM_STR);
            $UserQuery->bindValue(5, $UserModel->getUserEmail(), PDO::PARAM_STR);
            $UserQuery->bindValue(6, password_hash($UserModel->getUserPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);

            if ($UserQuery->execute()) {
                return true;
            }

            return false;
        }
        
        public function LoginUser($UserModel) {
            global $pdo;

            $UserQuery = $pdo->prepare("SELECT Users_ID, Users_Password FROM Users WHERE Users_Email = ?;");
            $UserQuery->bindValue(1, $UserModel->getUserEmail(), PDO::PARAM_STR);

            if ($UserQuery->execute()) {
                if ($UserQuery->rowCount() == 1) {
                    $Row = $UserQuery->fetch();

                    if (password_verify($UserModel->getUserPassword(), $Row["Users_Password"])) {
                        return $Row["Users_ID"];
                    }
                }
            }

            return false;
        }

        public function GetUserByID($UserModel) {
            global $pdo;

            $UserQuery = $pdo->prepare("SELECT Users_FirstName, Users_LastName, Users_SignDate, Users_Phone, Users_Picture, Users_Email FROM Users WHERE Users_ID = ?;");
            $UserQuery->bindValue(1, $UserModel->getUserID(), PDO::PARAM_INT);

            if ($UserQuery->execute()) {
                if ($UserQuery->rowCount() == 1) {
                    $Row = $UserQuery->fetch();

                    $UserModel->setUserFirstName($Row["Users_FirstName"]);
                    $UserModel->setUserLastName($Row["Users_LastName"]);
                    $UserModel->setUserSignDate($Row["Users_SignDate"]);
                    $UserModel->setUserPhone($Row["Users_Phone"]);
                    $UserModel->setUserPicture($Row["Users_Picture"]);
                    $UserModel->setUserEmail($Row["Users_Email"]);

                    return $UserModel;
                }
            }

            return false;
        }

        public function IsEmailExistent($UserModel) {
            global $pdo;

            $UserQuery = $pdo->prepare("SELECT Users_ID FROM Users WHERE Users_Email = ?;");
            $UserQuery->bindValue(1, $UserModel->getUserEmail(), PDO::PARAM_STR);

            if ($UserQuery->execute()) {
                if ($UserQuery->rowCount() == 0) {
                    return false;
                }
            }

            return true;
        }

        public function ChangeUserPic($UserModel) {
            global $pdo;

            $UserQuery = $pdo->prepare("UPDATE Users SET Users_Picture = ?;");
            $UserQuery->bindValue(1, $UserModel->getUserPicture(), PDO::PARAM_STR);

            if ($UserQuery->execute()) {
                return true;
            }

            return false;
        }

        public function LogoutUser() {
            session_destroy();
        }
    }
?>
