<?php
namespace Scs\Controllers;

use Scs\Scs;
use \RuntimeException;
use \DirectoryIterator;
use mikehaertl\wkhtmlto\Pdf;
use \UnexpectedValueException;
use Ng\Core\Managers\Collection;

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

            $this->setLayout("pdf");

                ob_start();
                $this->viewRender("base/pdf", compact("member"));
                $content = ob_get_clean();

                $pdf = new Pdf();
                $pdf->setOptions(["user-style-sheet" => WEBROOT."/assets/css/pdf.css"]);
                $pdf->addPage($content);
                $pdf->saveAs(WEBROOT."/pdf/{$member->id}.pdf");
                if (!$pdf->saveAs(WEBROOT."/pdf/{$member->id}.pdf")) {
                    echo $pdf->getError();
                }

                $pdf->send();
        } else {
            $this->flash->set("danger", "Membre non trouvé");
            $this->app::redirect("/");
        }

    }


    public function generator()
    {
        try {
            $files = new DirectoryIterator(WEBROOT."/pdf");
        } catch (UnexpectedValueException $e) {
            $this->flash->set('danger', 'erreur');
            $this->app::redirect(true);
        } catch (RuntimeException $e) {
            $this->flash->set('danger', 'le dossier contenant les pdfs n\'existe pas');
            $this->app::redirect(true);
        }

        $member = $this->loadModel('members');

        $this->setLayout("default");
        $this->viewRender("base/pdf-generator", compact("files", "member"));
    }


    public function delete()
    {
        if (isset($_POST) && !empty($_POST)) {
            $post = new Collection($_POST);
            if (!empty($post->get('file'))) {
                $dir = WEBROOT."/pdf";

                if (is_dir($dir)) {
                    $file = $dir.'/'.$post->get('file');
                    if (is_file($file)) {
                        unlink($file);
                        $this->flash->set('success', 'suppression du fichier pdf success');
                        $this->app::redirect(true);
                    } else {
                        $this->flash->set('danger', 'suppression du fichier pdf failed');
                        $this->app::redirect(true);
                    }
                } else {
                    $this->flash->set('danger', 'le dossier contenant les pdfs n\'existe pas');
                    $this->app::redirect(true);
                }
            } else {
                $this->flash->set('danger', 'erreur');
                $this->app::redirect(true);
            }
        } else {
            $this->flash->set('danger', 'erreur');
            $this->app::redirect(true);
        }
    }

}
