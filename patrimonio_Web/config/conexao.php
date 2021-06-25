<?php

//Criar as constantes com as credencias de acesso ao banco de dados
define('HOST', '172.22.5.222');
define('USER', 'app.patrimonio');
define('PASS', 'P@tr!m0n!0');
define('DBNAME', 'patrimonio_app');
		
        
class Conexao{
    private static $pdo;
    public static function conectar(){
     if(self::$pdo == null){
    try {		
       self::$pdo = new PDO('pgsql:host='.HOST.';dbname='.DBNAME, USER,PASS);
        //self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
        } 
        catch (PDOException $e) {
 echo 'Erro na Canexão'.$e->getMessage();
        }	
  }
    return self::$pdo;
    }
}
		
?>



