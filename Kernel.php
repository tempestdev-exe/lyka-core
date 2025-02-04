<?php

/**
 * Class Kernel
 *
 * @package paprikadev\paprikacore
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace paprikadev\paprikacore;

use paprikadev\paprikacore\db\Database;
use paprikadev\paprikacore\db\DBModel;

class Kernel {

    public static string $ROOT_DIR;

    public string $layout = 'main';
    public string $userClass ='';
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public ?UserModel $user;
    public View $view;


    public static Kernel $kernel;
    public ?Controller $controller = null;
    public function __construct($rootPath, array $conf)
    {
        $this->userClass = $conf['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$kernel = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->db = new Database($conf['db']);


        $value = $this->session->get('user');
        if ($value) {
            $primaryKey = (new $this->userClass())->primaryKey();
            $this->user = (new $this->userClass())->findOne([$primaryKey => $value]);
        } else {
            $this->user = null;
        }
    }
    
    public function run() {
        try {
            echo $this->router->resolve();
        }
        catch(\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('error', [
                'exception' => $e
            ]);
        }

    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function login(DBModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $value = $user->{$primaryKey};
        $this->session->set('user', $value);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return self::$kernel->user === null;
    }
}