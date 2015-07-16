<?php
/**
 *   Media class file
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
namespace app\controllers;
use \lib\Controller\Controller;
use \app\models\UserTable;
/**
 *   IndexController
 *
 *   Class do put profil pix
 *
 * @category Nothing
 * @package  Nothing
 * @author   coquel_d <christophe1.coquelet@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
class IndexController extends Controller
{
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public function __construct()
    {
        $this->load('assets');
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public function indexAction()
    {
        $u = new UserTable();
        $user = $u->findOne("login = ? and firstname = ?", ['coquel_d', 'christophe']);
        $this->render("IndexController:test2", $user);
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public function dieAction()
    {
        die(var_dump($this->getParam('hihi')));
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public function bddAction()
    {
        $u = new UserTable();
        //$u->displayClass($u);
        $user = $u->findOne("login = ?", ['coquel_d']);
    }
}
?>