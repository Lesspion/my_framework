<?php
/**
 *   Core class file
 *
 *   Class do put profil pix
 *
 *
 * PHP Version 5.4
 *
 * @category Nothing
 * @package  Nothing
 * @author   coquel_d <christophe1.coquelet@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
namespace lib\lesspionCore;
use \lib\Model\Model;
use \lib\Exceptions\NotFoundException;
use \Exception;
/**
 *   Core class file
 *
 *   Class do put profil pix
 *
 *
 * PHP Version 5.4
 *
 * @category Nothing
 * @package  Nothing
 * @author   coquel_d <christophe1.coquelet@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
class Core
{
    /**
     *   Function router
     *   @return if folder was delete or not
     */
    public static function run()
    {
        try
        {
            //set_error_handler('');
            Core::registerAutoload();
            Core::loadConfig();
            if (isset($_GET['page']) && $_GET['page'] !== "") {
                $page = explode("/", $_GET['page']);
                $class = $page[0];
                $method = !empty($page[1]) ? $page[1] . "Action" : "indexAction";
                //require_once(ABSPATH . "app/controllers/" . ucfirst($class) . "Controller.php");
                $class = "app\\controllers\\" . ucfirst($class) . "Controller";

                try {

                    if (class_exists($class)) {
                        $actualClass = new $class();
                    } else {
                        throw new NotFoundException();
                    }

                } catch(Exception $e) {
                    throw new NotFoundException();
                }
                $actualClass->$method();
            }
        } catch (Exception $e) {
            if ($e instanceOf NotFoundException) {
                //die('c est pas bon !');
                header("HTTP/1.1 404 Not Found");
            } else {
                header("HTTP/1.1 500 Internal Server Error");
            }
        }
    }
    /**
     *   Register autoload function
     *   @return if folder was delete or not
     */
    public static function registerAutoload()
    {
        spl_autoload_register(["lib\lesspionCore\Core", 'autoload']);
    }
    /**
     *   Autoload function
     *   @param string $class path to the directory
     *   @return if folder was delete or not
     */
    public static function autoload($class)
    {
        $classname = ltrim($class, '\\');
        $path = str_replace("\\", "/", $class);
        $path .= ".php";
        include_once ABSPATH . $path;

    }
    /**
     *   Throw notfoundexception function
     *   @return if folder was delete or not
     */
    public static function throwExcept()
    {
        throw new NotFoundException();
    }
    /**
     *   Load ini pdo config
     *   @return if folder was delete or not
     */
    public static function loadConfig()
    {
        $file = ABSPATH . "lib/conf/database.ini";
        if (!file_exists($file)) {
            throw new NotFoundException();
        }
        $config = array();
        if (file_exists($file) && $conf = file($file)) {
            array_shift($conf);
            foreach ($conf as $key => $val) {
                $tmp = explode("=", $val);
                if (!isset($tmp[1])) {
                    $tmp[1] = "";
                } else {
                    //die(var_dump($tmp[1][strlen($tmp[1]) - 1]));
                    //$tmp[1] = substr($tmp[1], 0, strlen($tmp[1]) -1);
                    $tmp[1] = rtrim($tmp[1]);
                }
                $config[$tmp[0]] = $tmp[1];
                //die(var_dump($config));
            }
            //die(var_dump($config));
            Model::loadIni($config);
        } else {
            throw new NotFoundException();
        }
    }
}
?>