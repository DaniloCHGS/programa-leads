<?php

namespace App\Model;

use App\Db\Database;
use PDO;

class Teste{
    
    /**
     * Identificador único de vídeo
     * @var integer
     */
    public $id;

    /**
     * Título do vídeo
     * @var string
     */
    public $nome;
    
    /**
     * Link de acesso ao vídeo
     * @var integer
     */
    public $idade;

    /**
     * Tabela usada
     * @var string
     */
    const TABLE = 'teste';

    /**
     * Método responsável por cadastrar um novo produto no banco.
     * @return boolean
     */
    public function insert(){
        $db = new Database(self::TABLE);
        $this->id = $db->insert([
            'nome'    => $this->nome,
            'idade'      => $this->idade
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
     * @param string $id
     * @return interger
     */
    public static function getCount($where = null){
        return (new Database(self::TABLE))->select($where, null, null, 'COUNT(*) as qtd')
                                          ->fetchObject()
                                          ->qtd;
    }

    /**
     * Método responsável por obter um produto do banco.
     * @param string $where
     * @param array 
     * @return boolean
     */
    public function update(){
        return (new Database(self::TABLE))->update("id = ".$this->id, [
            'nome'    => $this->nome,
            'idade'   => $this->idade
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

    public function getLink(){
        $code = explode('v=', $this->link);

        return $code[count($code) - 1];
    }

    public function getDescricao(){
        $desc = $this->descricao;
    
        if($desc != ''){
            $descBreak = explode("\r\n", $desc);
            $desc = '';
            foreach($descBreak as $d){
                if(isset($d)){
                    $desc .= '<p>'.$d.'</p>'."\n\r";
                }
            }
        }

        return $desc;
    }
}