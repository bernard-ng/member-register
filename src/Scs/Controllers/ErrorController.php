<?php
namespace Scs\Controllers;

use Scs\Scs;

/*
 * @author Bernard Ng <ngandubernard@gmail.com>
 * Ce controller gere, les differentes erreur et
 * exception de l'applicaton.
*/
class ErrorController extends Controller
{

    /* constructeur */
    public function __construct(Scs $app)
    {
        parent::__construct($app);
    }

    /* Rendu de la page d'erreur */
    public function index()
    {
        $this->setLayout("error");
        $this->viewRender("base/error");
    }
}
