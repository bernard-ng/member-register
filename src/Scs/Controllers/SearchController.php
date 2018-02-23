<?php
namespace Scs\Controllers;
use Scs\Scs;

class SearchController extends Controller
{
    /* constructeur */
    public function __construct(Scs $app)
    {
        parent::__construct($app, $pageManager);
    }


    /* Recherche des membres */
    public function index()
    {
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $query = addcslashes(htmlentities($_GET['q']));

            $result = $this->membres->search($query, "begin");
            while (empty($result)) {
                $result = $this->members->search($query, "end");
                $result = $this->membres->search($query, "within");
                $result = $this->membres->search($query, "concat");

                if (empty($result)) {
                    break;
                }
            }

            $this->setLayout("default");
            $this->viewRender("search", compact("query", "result"));
        } else {
            $this->flash("danger", "Le champs de recherche doit être rempli");
        }
    }
}
