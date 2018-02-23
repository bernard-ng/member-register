<?php
namespace Scs;

use Ng\Core\Managers\StringManager;
use Ng\Core\Database\MysqlDatabase;
use Ng\Core\Managers\ConfigManager;
use Ng\Core\Managers\SessionManager;
use Ng\Core\Managers\LogMessageManager;
use Ng\Core\Managers\MessageManager;
use Ng\Core\Managers\ValidationManager;
use Ng\Core\Managers\FlashMessageManager;
use Ng\Core\Traits\SingletonTrait;
use Ng\Core\Exception\ConfigManagerException;

class Scs
{

    /* base de donnee */
    private static $db_instance;


    use SingletonTrait;


    //FACTORING
    //****************************************************************************


    /**
     * initalise ou recupere la connexion a la base de donnee
     *
     *
     * on recupere la configuration dans un fichier se situant la racine
     * on failt a l'appel a Config qui va mettre la configuration dans la
     * variable setting sous form d'objet.
     * et on passe a Mysqldatabase la config et lui initialise un PDO
     *
     * @return MysqlDatabase
     **/
    private function getDb(): MysqlDatabase
    {
        try {
            $setting = new ConfigManager(ROOT."\config\DatabaseConfig.php");

            if (!isset(self::$db_instance)) {
                self::$db_instance = new MysqlDatabase(
                    $setting->get("db.name"),
                    $setting->get("db.host"),
                    $setting->get("db.user"),
                    $setting->get("db.pass")
                );
            }
            return self::$db_instance;
        } catch (ConfigManagerException $e) {
            self::redirect("/error");
        }
    }


    /**
     * recupere est instancie un nouveau model
     * @param string $class_name
     * @return mixed
     */
    public function getModel(string $class_name)
    {
        $class_name = "Scs\\Models\\".ucfirst($class_name)."Model";
        return new $class_name($this->getDb());
    }


    /**
     * recupere est instancie un nouveau controller
     * @param string $name
     * @return mixed
     */
    public function getController(string $name)
    {
        $controller = "Scs\\Controllers\\".ucfirst($name)."Controller";
        return new $controller(self::getInstance());
    }


    /**
     * recupere une instance de flash
     * @return FlashMessageManager
     */
    public function getFlash(): FlashMessageManager
    {
        return new FlashMessageManager($this->getSession());
    }


    /**
     * recupere une instance de validator
     * @return ValidatorManager
     */
    public function getValidator(): ValidationManager
    {
        return new ValidationManager($this->getDb(), $this->getFlash(), $_POST);
    }

    /**
     * recupere la session
     * @return SessionManager
     */
    public function getSession(): SessionManager
    {
        return SessionManager::getInstance();
    }

    /**
     * recupere le gestion de chaine de charactere
     * @return stringManager
     */
    public function getStr(): StringManager
    {
        return new StringManager();
    }


    public function getMessageManager(): MessageManager
    {
        return new MessageManager;
    }


    //GENERAL APPLICATION METHODS
    //****************************************************************************/


    public function exceptionHandler($e)
    {
        $flash = new FlashMessageManager(new SessionManager());
        $flash->set("danger", $e->getMessage());
        self::redirect("/error");
    }

    public function errorHandler(int $errno, string $errstr, string $errfile)
    {
        $flash = new FlashMessageManager(new SessionManager());
        $flash->set("danger", $errstr);
        self::redirect("/error");
    }


    /**
     * gestion de redirection
     * @param mixed $url
     */
    public static function redirect($url = null)
    {
        if (is_bool($url)) {
            if (!empty($_SERVER['HTTP_REFERER'])) {
                header("location:{$_SERVER['HTTP_REFERER']}");
                exit();
            } else {
                header('location:/register');
                exit();
            }
        } else {
            is_null($url)? header('location:/register') : header("location:{$url}");
            exit();
        }
    }
}
