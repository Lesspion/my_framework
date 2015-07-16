<?php
/**
 *   Model class file
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
namespace lib\Model;
use \PDO;
/**
 *   Model class file
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
abstract class Model
{
    
    protected static $pdo = null;
    protected static $host = "localhost";
    protected static $db = "";
    protected static $port = "";
    protected static $unixSocket = "";
    protected static $user = "root";
    protected static $passwd = "";
    public static $co = "";
    /**
     * Generate a random key
     * Generate random key
     * @return key string
     */
    public function __construct()
    {
        try {
            // var_dump(self::$port);
            // var_dump(self::$co);
            // var_dump(self::$user);
            // var_dump(self::$passwd);
            // die();
            self::$pdo = new PDO(self::$co, self::$user, self::$passwd);
        } catch (PDOExcetpion $e) {
            throw new Exception('Connection failed : ' . $e->getMessage());
        }
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param array $arr path to the directory
     *   @return if folder was delete or not
     */
    public static function loadIni($arr)
    {
        //die(var_dump($arr));
        self::$host = $arr['host'];
        self::$db = $arr['database'];
        self::$port = $arr['port'];
        self::$unixSocket = $arr['unix_socket'];
        self::$user = $arr['user'];
        self::$passwd = $arr['passwd'];
        self::$co = "mysql:host=" . self::$host;
        if (self::$port !== "") {
            self::$co .= ";port=" . self::$port;
        }
        self::$co .= ";dbname=" . self::$db;
        if (self::$unixSocket !== "") {
            self::$co .= ";unix_socket=" . self::$unixSocket;
        }
        if (self::$passwd === "") {
            self::$passwd = "";
        }

    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $me path to the directory
     *   @return if folder was delete or not
     */
    public function displayClass($me)
    {
        return get_class($me);
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $cond   path to the directory
     *   @param string $arrVal path to the directory
     *   @return if folder was delete or not
     */
    final public function findOne($cond, $arrVal)
    {
        $tab = explode("\\", $this->displayClass($this));
        $me = $tab[sizeof($tab) - 1];
        $me = str_replace("Table", "", $me);
        $me = strtolower($me);
        $req = "SELECT * FROM " . $me . " WHERE " . $cond;
        $exec = self::$pdo->prepare($req);
        foreach ($arrVal as $key => $value) {
            $exec->bindValue($key+1, $value);
        }
        $exec->execute();
        return $exec->fetch(PDO::FETCH_ASSOC);
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    final public function findAll()
    {
        $tab = explode("\\", $this->displayClass($this));
        $me = $tab[sizeof($tab) - 1];
        $me = str_replace("Table", "", $me);
        $me = strtolower($me);
        $req = "SELECT * FROM " . $me;
        $exec = self::$pdo->prepare($req);
        $exec->execute();
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $cond   path to the directory
     *   @param string $arrVal path to the directory
     *   @return if folder was delete or not
     */
    final public function findAllWhere($cond, $arrVal)
    {
        $tab = explode("\\", $this->displayClass($this));
        $me = $tab[sizeof($tab) - 1];
        $me = str_replace("Table", "", $me);
        $me = strtolower($me);
        $req = "SELECT * FROM " . $me . " WHERE " . $cond;
        $exec = self::$pdo->prepare($req);
        foreach ($arrVal as $key => $value) {
            $exec->bindValue($key+1, $value);
        }
        $exec->execute();
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $query path to the directory
     *   @return if folder was delete or not
     */
    final public function queryBuilder($query)
    {
        $exec = self::$pdo->prepare($query);
        $exec->execute();
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public static function getCo()
    {
        return self::$co;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public static function getPdo()
    {
        return self::$pdo;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public function getHost()
    {
        return self::$host;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $myHost path to the directory
     *   @return if folder was delete or not
     */
    public function setHost($myHost)
    {
        self::$host = $myHost;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public function getDb()
    {
        return self::$db;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $myDb path to the directory
     *   @return if folder was delete or not
     */
    public function setDb($myDb)
    {
        self::$db = $myDb;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public function getPort()
    {
        return self::$port;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $myport path to the directory
     *   @return if folder was delete or not
     */
    public function setPort($myport)
    {
        self::$port = $myport;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public function getUnixSocket()
    {
        return self::$unixSocket;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $myUnixSocket path to the directory
     *   @return if folder was delete or not
     */
    public function setUnixSocket($myUnixSocket)
    {
        self::$unixSocket = $myUnixSocket;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public function getUser()
    {
        return self::$user;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $myUser path to the directory
     *   @return if folder was delete or not
     */
    public function setUser($myUser)
    {
        self::$user= $myUser;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @return if folder was delete or not
     */
    public function getPasswd()
    {
        return self::$passwd;
    }
    /**
     *   Function to delete * files and directory recursively
     *   @param string $myPasswd path to the directory
     *   @return if folder was delete or not
     */
    public function setPasswd($myPasswd)
    {
        self::$passwd = $myPasswd;
    }
}
?>