<?php
namespace Scs\Controllers;

use Scs\Scs;

class SearchController extends Controller
{
    /* constructeur */
    public function __construct(Scs $app)
    {
        parent::__construct($app);
    }


    /* Recherche des membres */
    public function index()
    {
        if (isset($_POST['q']) && !empty($_POST['q'])) {
            $this->loadModel('members');
            $query = addcslashes(htmlentities($_POST['q']), "'?=-");
            $results = $this->members->search($query, "begin");

            while (empty($result)) {
                $results = $this->members->search($query, "end");
                $results = $this->members->search($query, "within");
                $results = $this->members->search($query, "concat");

                if (empty($result)) {
                    break;
                }
            }

            $this->setLayout("default");
            $this->viewRender("base/search", compact("query", "results"));
        } else {
            $this->flash->set("danger", "Le champs de recherche doit être rempli");
            $this->app::redirect("/");
        }
    }

    /* alternative des recherches */
    public function alternate(string $query)
    {
        $_POST['q'] = $query;
        $this->index();
    }
}
