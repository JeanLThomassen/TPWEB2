<?php
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/controllers/cap.controller.php';
require_once 'app/controllers/season.controller.php';
require_once 'app/controllers/char.controller.php';
require_once 'app/controllers/auth.controller.php';


// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$res = new Response();

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}



// tabla de ruteo

// home   -> CapController->showHome();
// caps   -> CapController->showCaps();
// cap   -> CapController->showCap();
// seasons   -> TempController->showSeasons();
// chars   -> CharController->showChars();
// char   -> CharController->showChar();
// login   -> AuthController->showLogin():
// register   -> AuthController->showRegister():
// add   -> (depende el caso)Controller->add(depende el caso, muestra el formulario para añadir un item)();
// delete   -> (depende el caso)Controller->delete(depende el caso)();
// edit   -> (depende el caso)Controller->edit(depende el caso, muestra el formulario para editar un item)();

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        sessionAuthMiddleware($res);
        $controller = new CapController($res);
        $controller->showHome();
        break;

    case 'caps':
        sessionAuthMiddleware($res);
        $controller = new CapController($res);
        if (empty($params[1])) {
            $controller->showCaps();
        } else {
            $controller->showCapsXSeason($params[2]);
        }
        break;

    case 'cap':
        sessionAuthMiddleware($res);
        $controller = new CapController($res);
        $controller->showCap($params[1]);
        break;

    case 'seasons':
        sessionAuthMiddleware($res);
        $controller = new SeasonController($res);
        $controller->showSeasons();
        break;

    case 'chars':
        sessionAuthMiddleware($res);
        $controller = new CharController($res);
        $controller->showChars();
        break;

    case 'char':
        sessionAuthMiddleware($res);
        $controller = new CharController($res);
        $controller->showChar($params[1]);
        break;

    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'add':
        sessionAuthMiddleware($res);
        $def = 'caps';
        if (!empty($params[1])) {
            $def = $params[1];
        }
        switch ($def) {
            case 'caps':
                $controller = new CapController($res);
                $controller->showFormCap();
                break;
            case 'season':
                $controller = new SeasonController($res);
                $controller->showFormSeason();
                break;
            case 'chars':
                $controller = new CharController($res);
                $controller->showFormChar();
                break;
            default:
                //caps
                break;
        }
        break;

    case 'addcap':
        $controller = new CapController($res);
        $controller->addCap();
        break;

    case 'addchar':
        $controller = new CharController($res);
        $controller->addChar();
        break;

    case 'addseason':
        $controller = new SeasonController($res);
        $controller->addSeason();
        break;

    case 'delete':
        sessionAuthMiddleware($res);
        $def = 'caps';
        if (!empty($params[1])) {
            $def = $params[1];
        }
        switch ($def) {
            case 'caps':
                $controller = new CapController($res);
                $controller->deleteCap($params[2]);
                break;
            case 'season':
                $controller = new SeasonController($res);
                $controller->deleteSeason($params[2]);
                break;
            case 'chars':
                $controller = new CharController($res);
                $controller->deleteChar($params[2]);
                break;
            default:
                $controller = new CapController($res);
                $controller->deleteCap($params[2]);
                break;
        }
        break;

    case 'edit':
        sessionAuthMiddleware($res);
        $def = 'caps';
        if (!empty($params[1])) {
            $def = $params[1];
        }
        switch ($def) {
            case 'caps':
                $controller = new CapController($res);
                $controller->showFormEditCap($params[2]);
                break;
            case 'season':
                $controller = new SeasonController($res);
                $controller->showFormEditSeason($params[2]);
                break;
            case 'chars':
                $controller = new CharController($res);
                $controller->showFormEditChar($params[2]);
                break;
            default:
                $controller = new CapController($res);
                $controller->showFormEditCap($params[2]);
                break;
        }
        break;
    
    case 'editcap':
        $controller = new CapController($res);
        $controller->editCap($params[1]);
        break;
    case 'editseason':
        $controller = new SeasonController($res);
        $controller->editSeason($params[1]);
        break;
    case 'editchar':
        $controller = new CharController($res);
        $controller->editChar($params[1]);
        break;
    default: 
        sessionAuthMiddleware($res);
        $controller = new CapController($res);
        $controller->showHome();
        break;
}