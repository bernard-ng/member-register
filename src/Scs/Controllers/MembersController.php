<?php
namespace Scs\Controllers;
use Scs\Scs;

use Ng\Core\Managers\Collection;

class MembersController extends Controller
{

    /* constructeur */
    public function __construct(Scs $app)
    {
        parent::__construct($app);
        $this->loadModel("members");
    }

    /* Page d'acceuil */
    public function index()
    {
        $members = $this->members->all();
        $this->setLayout("default");
        $this->viewRender("register", compact("members"));
    }


    /* ajout des informations */
    public function add()
    {
        $infos = new Collection($_POST);

        if (isset($_POST) && !empty($_POST)) {
            $this->validator->isEmpty("name");
            $this->validator->isEmpty("second_name");
            $this->validator->isEmpty("type");

            if ($this->validator->isValid()) {
                $this->members->add(compact("name", "second_name", "type"));
                $this->flash->set("success", "Ajout effectué");
                $this->app::redirect(true);
            } else {
                $this->flash->set("danger", "Complétez tous les champs");
            }
        }

        $this->setLayout("form");
        $this->viewRender("add", compact("infos"));
    }


    /* edition des informations */
    public function edit(int $id)
    {
        if ($this->members->find(intval($id))) {
            $user = $this->members->find(intval($id));
            $infos = new Collection($_POST);

            if (isset($_POST) && !empty($_POST)) {
                $name = $infos->get("name") ?? $user->name;
                $second_name = $infos->get("second_name") ?? $user->name;
                $type = $infos->get("type") ?? $user->type;

                $this->members->edit($user->id, compact("name", "second_name", "type"));
                $this->flash->set("success", "Edition effectuée");
                $this->app::redirect(true);
            }

            $this->setLayout("form");
            $this->viewRender("edit", compact("infos"));
        } else {
            $this->flash->set("danger", "Le Membre que vous souhaitez editer n'existe pas ou plus");
            $this->app::redirect(true);
        }
    }


    /* suppression d'un membre */
    public function delete(int $id)
    {
        if ($this->members->find(intval($id))) {
            $this->members->delete(intval($id));
            $this->flash("success", "Le Membre a bien été supprimer");
            $this->app::redirect(true);
        } else {
            $this->flash->set("danger", "Le Membre que vous souhaitez supprimer n'existe pas ou plus");
            $this->app::redirect(true);
        }
    }
}
