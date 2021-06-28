<?php


Class Conexao
{
protected $host = '172.21.4.43';
protected $user = 'uap.ccg.geoservicos';
protected $pswd = 'Fe&KoyrotVeemef7';
protected $dbname = 'panorama';
protected $con = null;

function __construct(){} //método construtor

#método que inicia conexao
function open(){
    try {
        $str_con = "host=172.21.4.43 dbname='panorama' user='uap.ccg.geoservicos' password='Fe&KoyrotVeemef7'";
        $this->con =  new PDO("pgsql:host=172.21.4.43;dbname=geonetwork", "uap.ccg.geoservicos", "Fe&KoyrotVeemef7");
        //pg_connect($str_con);
    } catch(Exception $e) {
       echo $e->getMessage();
    }
    return $this->con;
}

#método que encerra a conexao
function close(){
    unset($this->con);
}

#método verifica status da conexao
function statusCon(){
if(!isset($this->con)){
  echo "<h3>O sistema não está conectado !!!</h3>";  
}
else{
   echo "<h3>O sistema está conectado.</h3>";
}
}


function getCategorias() {
$dados = $this->con->query("SELECT * FROM categories");

return $dados;
}

function query($sql) {
    $dados = $this->con->query($sql);
    
    return $dados;
    }
    

}

?>