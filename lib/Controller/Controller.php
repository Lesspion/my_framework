<?php
/**
 *   Controller file
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
namespace lib\Controller;
use \Exception;
/**
 *   Controller class file
 *
 *   Class do put profil pix
 *
 * @category Nothing
 * @package  Nothing
 * @author   coquel_d <christophe1.coquelet@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
abstract class Controller
{
    private $_arr = array();
    /**
     *   Function to delete * files and directory recursively
     *   @param string $buffer path to the directory
     *   @return if folder was delete or not
     */
    protected function replace($buffer)
    {
        $var = $this->_arr;
        return preg_replace_callback(
            "/\{\{ (.+) \}\}/", function ($matches) use ($var) {
                foreach ($matches as $key => $val) {
                    $match = str_replace(" ", "", $val);
                    $match = str_replace("{{", "", $match);
                    $match = str_replace("}}", "", $match);
                    return $var[$match];
                }
            }, $buffer
        );
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $view path to the directory
     *   @param string $arr  path to the directory
     *   @return if folder was delete or not
     */
    final public function render($view, $arr = array())
    {
        if (!empty($arr)) {
            extract($arr);
        }
        $this->_arr = $arr;
        $split = explode(":", $view);
        $path = ABSPATH . "app/views/" . $split[0] . "/";
        $file = "";
        if (file_exists($path . $split[1] . ".html")) {
            $file = $path . $split[1] . ".html";
        } elseif (file_exists($path . $split[1] . ".php")) {
            $file = $path . $split[1] . '.php';
        } elseif (file_exists($path . $split[1] . ".phtml")) {
            $file = $path . $split[1] . ".phtml";
        } else {
            throw new \lib\Exceptions\NotFoundException();
        }
        ob_start([$this, 'replace']);
        include $file;
        ob_end_flush();
        //die(var_dump($this->replace($res)));
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $helper path to the directory
     *   @return if folder was delete or not
     */
    final public function load($helper)
    {
        if (file_exists(ABSPATH . "lib/assets/" . $helper . "_helper.php")) {
            include_once ABSPATH . "lib/assets/" . $helper . "_helper.php";
        } elseif (file_exists(ABSPATH . "app/assets/" . $helper . "_helper.php")) {
            include_once ABSPATH . "app/assets/" . $helper . "_helper.php";
        } else {
            throw new NotFoundException();
        }
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $str path to the directory
     *   @return if folder was delete or not
     */
    final public function getParam($str)
    {
        $tab = explode("/", $_GET['page']);
        $res = array_search($str, $tab);
        return $tab[$res + 1];
    }

}
?>