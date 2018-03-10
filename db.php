<?PHP

class database{
    public $databaseLink;
    function __construct(){
        include "dbSettings.php";
        $this->database = $dbInfo['host'];
        $this->mysql_user = $dbInfo['user'];
        $this->mysql_pass = $dbInfo['pass'];
		$this->mysql_dbna = $dbInfo['dbna'];
        $this->openConnection();
        return $this->get_link();
    }
    function openConnection(){
    $this->databaseLink = mysqli_connect($this->database, $this->mysql_user, $this->mysql_pass, $this->mysql_dbna);
    }

    function get_link(){
    return $this->databaseLink;
    }
}
?>