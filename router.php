<?php
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
// require_once 'app/middlewares/verify.auth.middleware.php';
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
// add   -> (depende el caso)Controller->add(depende el caso)();
// delete   -> (depende el caso)Controller->delete(depende el caso)();
// edit   -> (depende el caso)Controller->edit(depende el caso)();

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $controller = new CapController($res);
        $controller->showHome();
        break;

    case 'caps':
        sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $controller = new CapController($res);
        if (empty($params[1])) {
            $controller->showCaps();
        } else {
            $controller->showCapsXSeason($params[2]);
        }
        break;

    case 'cap':
        sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $controller = new CapController($res);
        $controller->showCap($params[1]);
        break;

    case 'seasons':
        sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $controller = new SeasonController($res);
        $controller->showSeasons();
        break;

    case 'chars':
        sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $controller = new CharController($res);
        $controller->showChars();
        break;

    case 'char':
        sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
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

    case 'register':
        $controller = new AuthController();
        $controller->showRegister();
        break;

    case 'add':
        sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $def = 'caps';
        if (!empty($params[1])) {
            $def = $params[1];
        }
        switch ($def) {
            case 'caps':
                
                break;
            case 'season':
                
                break;
            case 'chars':
            
                break;
            default:
                //caps
                break;
        }
    
    case 'delete':
        sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $def = 'caps';
        if (!empty($params[1])) {
            $def = $params[1];
        }
        switch ($def) {
            case 'caps':
                # code...
                break;
            case 'season':
                $controller = new SeasonController($res);
                $controller->deleteSeason($params[2]);
                break;
            case 'chars':

                break;
            default:
                //caps
                break;
        }

    case 'edit':
        sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $def = 'caps';
        if (!empty($params[1])) {
            $def = $params[1];
        }
        switch ($def) {
            case 'caps':
                
                break;
            case 'season':
                
                break;
            case 'chars':
            
                break;
            default:
                //caps
                break;
        }

    default: 
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
        break;
}
// bajoterra/caps = todos los capitulos
// bajoterra/caps/temp1 = caps temp 1