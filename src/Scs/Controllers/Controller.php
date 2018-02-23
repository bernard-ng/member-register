<?php
namespace Scs\Controllers;

use Scs\Scs;
use Ng\Core\Controllers\Controller as SuperController;

class Controller extends SuperController
{
    protected $viewPath;
    protected $layout;
    protected $session;
    protected $pageManager;
    protected $str;
    protected $validator;
    protected $app;


    public function __construct(Scs $app)
    {
        $this->viewPath = APP."/Views/";
        $this->layout = 'default';

        $this->app = $app;

        $this->session = $this->app->getSession();
        $this->str = $this->app->getStr();
        $this->validator = $this->app->getValidator();
        $this->flash = $this->app->getFlash();
    }


    public function viewRender(string $view, array $variables = [], bool $layout = true)
    {
        $variables['pageManager'] = $this->pageManager;
        $variables['sessionManager'] = $this->session;
        $variables['flashMessageManager'] = $this->flash;

        parent::viewRender($view, $variables, $layout);
    }


    /**
     * charge un model
     * @param string|array $model
     * @return mixed|null
     */
    protected function loadModel($model)
    {
        if (is_string($model)) {
            return $this->$model = $this->app->getModel($model);
        } elseif (is_array($model)) {
            foreach ($model as $m) {
                $this->$m =  $this->app->getModel($m);
            }
        } else {
            return null;
        }
    }


    /**
     * fait appel a un controller dans un autre controller
     * @param string $name
     * @return mixed
     */
    protected function callController(string $name)
    {
        return $this->app->getController($name);
    }


    /**
     * definit un layout pour une vue
     * @param string $layout
     */
    protected function setLayout(string $layout)
    {
        $this->layout = $layout;
    }
}
