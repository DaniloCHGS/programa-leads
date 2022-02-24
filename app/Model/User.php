<?php

namespace App\Model;

use App\Db\Database;
use PDO;

class User{
    
    /**
     * Identificador único de usuário
     * @var integer
     */
    public $id;

    /**
     * Usuario
     * @var string
     */
    public $usuario;
    
    /**
     * Senha
     * @var string
     */
    public $cpf;

    /**
     * Tabela usada
     * @var string
     */
    const TABLE = 'leads_usuarios';

    /**
     * Método responsável por cadastrar um novo produto no banco.
     * @return boolean
     */
    public function insert(){
        $db = new Database(self::TABLE);
        $this->id = $db->insert([
            'usuario'    => $this->usuario,
            'cpf'      => $this->cpf
        ]);
    }

    /**
     * Método responsável por obter os produtos do banco.
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function select($where = null, $order = null, $limit = null){
        return (new Database(self::TABLE))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter um produto do banco.
     * @param string $id
     * @return Produto
     */
    public static function selectById($id){
        return (new Database(self::TABLE))->select('id = '.$id)->fetchObject(self::class);
    }

    /**
     * Método responsável por obter um produto do banco.
     * @param string $where
     * @param array 
     * @return boolean
     */
    public function update(){
        return (new Database(self::TABLE))->update("id = ".$this->id, [
            'usuario'    => $this->usuario,
            'cpf'      => $this->cpf
        ]);
    }

    /**
     * Método responsável por deletar um produto do banco.
     * @param string $where
     * @param array 
     * @return boolean
     */
    public function delete(){
        return (new Database(self::TABLE))->delete("id = ".$this->id);
    }
}