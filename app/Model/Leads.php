<?php

namespace App\Model;

use App\Db\Database;
use PDO;

class Leads{
    
    /**
     * Identificador único de vídeo
     * @var integer
     */
    public $id;

    /**
     * Título do vídeo
     * @var string
     */
    public $mes_solicitado;
    
    /**
     * Link de acesso ao vídeo
     * @var integer
     */
    public $trinta_litros;
    
    /**
     * Link de acesso ao vídeo
     * @var integer
     */
    public $cinquenta_litros;
    
    /**
     * Link de acesso ao vídeo
     * @var string
     */
    public $observacoes;
    
    /**
     * Link de acesso ao vídeo
     * @var integer
     */
    public $total_venda;
    
    /**
     * Link de acesso ao vídeo
     * @var integer
     */
    public $negocio_fechado;
    
    /**
     * Link de acesso ao vídeo
     * @var string
     */
    public $nome;
    
    /**
     * Link de acesso ao vídeo
     * @var string
     */
    public $telefone;
    
    /**
     * Link de acesso ao vídeo
     * @var string
     */
    public $cidade;
    
    /**
     * Link de acesso ao vídeo
     * @var string
     */
    public $bairro;

    /**
     * Tabela usada
     * @var string
     */
    const TABLE = 'leads';

    /**
     * Método responsável por cadastrar um novo produto no banco.
     * @return boolean
     */
    public function insert(){
        $db = new Database(self::TABLE);
        $this->id = $db->insert([
            'mes_solicitado'    => $this->mes_solicitado,
            'trinta_litros'     => $this->trinta_litros,
            'cinquenta_litros'  => $this->cinquenta_litros,
            'observacoes'       => $this->observacoes,
            'total_venda'       => $this->total_venda,
            'negocio_fechado'   => $this->negocio_fechado,
            'nome'              => $this->nome,
            'telefone'          => $this->telefone,
            'cidade'            => $this->cidade,
            'bairro'            => $this->bairro
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
            'mes_solicitado'    => $this->mes_solicitado,
            'trinta_litros'     => $this->trinta_litros,
            'cinquenta_litros'  => $this->cinquenta_litros,
            'observacoes'       => $this->observacoes,
            'total_venda'       => $this->total_venda,
            'negocio_fechado'   => $this->negocio_fechado,
            'nome'              => $this->nome,
            'telefone'          => $this->telefone,
            'cidade'            => $this->cidade,
            'bairro'            => $this->bairro
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