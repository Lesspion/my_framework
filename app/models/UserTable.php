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
namespace app\models;
use \lib\Model\Model;
/**
 *   Media class
 *
 *   Class do put profil pix
 *
 * @category Nothing
 * @package  Nothing
 * @author   coquel_d <christophe1.coquelet@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
class UserTable extends Model
{
    /**
     * Generate a random key
     * Generate random key
     * @return key string
     */
    public function __construct()
    {
        parent::__construct();
        //die(var_dump(self::$pdo));
    }
}
?>