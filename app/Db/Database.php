<?php

namespace App\Db;

use App\Utils\Debug;
use PDO;
use PDOException;

class Database{
    //ATRIBUDOS
    
    /**
     * Host de conexão
     * @var string
     */
    const HOST = 'mysql.taticaweb.com.br';

    /**
     * Nome da base de dados
     * @var string
     */
    const NAME = 'ondeencontrar';

    /**
     * Usuário de conexão a base de dados
     * @var string
     */
    const USER = 'nossochope';

    /**
     * Senha de conexão com a base de dados
     * @var string
     */
    const PASS = 'Sucesso2021*';

    /**
     * Nome da tabela
     * @var string
     */
    private $table;

    /**
     * Instancia de conexão com o banco de dados
     * @var PDO
     */
    private $connection;
    
    //MÉTODOS
    
    /**
     * Define a tabele e instacia a conexão
     * @param string $table
     */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar a conexação com o banco de dados.
     */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERRO: '.$e->getMessage());
        }
    }
    
    /**
     * Método responsável por executar querys dentro do banco
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;
        }catch(PDOException $e){
            die('ERRPR: '.$e->getMessage());
        }
    }
    
    /**
     * Método responsável por inserir dados no banco
     * @param array $values [ field => value ]
     * @return integer
     */
    public function insert($values){    
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',',$binds).')';
        
        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }
    
    /**
     * Método responsável por buscar dados no banco
     * @param string $where 
     * @param string $order 
     * @param string $limit 
     * @param string $fields 
     * @return array
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }

    /**
     * Método responsável por buscar dados no banco
     * @param integer $id 
     * @return PDOStatement
     */
    public function selectByID($id = 1, $fields = '*'){
        $where = 'WHERE id = '.$id;

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where;

        return $this->execute($query);
    }
    
    /**
     * Método responsável por atualizar dados no banco
     * @param array $values [ field => value ]
     * @param string $where
     * @return boolean
     */
    public function update($where, $values){    
        $fields = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE '.$where;

        $this->execute($query, array_values($values));

        return true;
    }

    /**
     * Método responsável por deletar dados no banco
     * @param string $where
     * @return boolean
     */
    public function delete($where){    
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        
        $this->execute($query);

        return true;
    }
}