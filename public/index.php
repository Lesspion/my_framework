<?php
/**
 *   Index File
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
define("ABSPATH", dirname(__dir__) . '/');
define("ABSFILE", __file__);
define('PHP_ENV', getenv('PHP_ENV'));
if (PHP_ENV == "prod") {
    error_reporting(0);
}
require_once ABSPATH . "lib/lesspionCore/Core.php";
lib\lesspionCore\Core::run();
//phpinfo();
?>
