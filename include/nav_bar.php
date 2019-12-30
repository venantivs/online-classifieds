<?php require_once "app/UserController.php"; ?>
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
        </button>
        <a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a>
        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="classifieds.php?Type=Car">Carros</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="classifieds.php?Type=Motorcycle">Motos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="classifieds.php?Type=Classic">Clássicos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="announce.php">Anunciar</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {
                    $UserModel = new UserModel();
                    $UserController = new UserController();
                    $UserModel->setUserID($_SESSION["UserID"]);
                    $UserModel = $UserController->GetUserByID($UserModel);
                    if ($UserModel !== false) {
                        echo $UserModel->getUserFirstName();
                    } else {
                        echo "Usuário";
                    }
                } else { ?>
                    Usuário
                <?php } ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) { ?>
                <a class="dropdown-item" href="profile.php">Perfil</a>
                <a class="dropdown-item" href="#" onclick="LogoutUser();">Logout</a>
                <?php } else { ?>
                <a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="register.php">Cadastro</a>
                <?php } ?>
            </div>
            </li>
        </ul>
        </div>
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
        </button>
    </div>
</nav>

<script>
    function LogoutUser() {
        $.post("app/UserView.php", {action: "logout"}).done(function(data) {location.reload()});
        return false;
    }
</script>