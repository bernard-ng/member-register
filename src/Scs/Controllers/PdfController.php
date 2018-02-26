<?php
namespace Scs\Controllers;

use Scs\Scs;
use mikehaertl\wkhtmlto\Pdf;

class PdfController extends Controller
{
    public function construct(Scs $app)
    {
        parent::__construct($app);
    }


    public function index(int $id)
    {
        $member = $this->loadModel('members')->find(intval($id));

        if ($member) {

            /*
                ob_start();
                $this->viewRender("base/pdf", compact("member"));
                $content = ob_get_clean();

                $pdf = new Pdf();
                $pdf->setOptions(["user-style-sheet" => WEBROOT."/assets/css/pdf.css"]);
                $pdf->addPage($content);
                $pdf->saveAs(WEBROOT."/pdf/{$member->id}.pdf");
                $pdf->send();
            */

            $this->setLayout("pdf");
            $this->viewRender("base/pdf", compact("member"));
        } else {
            $this->flash->set("danger", "Membre non trouvé");
            $this->app::redirect("/");
        }

    }

}
