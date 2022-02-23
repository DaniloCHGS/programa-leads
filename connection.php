<?php
    function dd($args){
        var_dump($args);
        die();
    }

    function connection(){
        try {
            $pdo = new PDO("mysql:dbname=ondeencontrar;host=mysql.taticaweb.com.br", "nossochope", "Sucesso2021*", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $pdo;
        } catch (PDOException $e) {
            echo "Erro com o Banco: ".$e->getMessage();
        } catch (Exception $e) {
            echo "Erro: ".$e->getMessage(); 
        }
    }
    
    function noData($data){
        if(!$data || count($data) == 0) {
            return false;
        }
    }

    function insert($values){

        // noData($values);

        $connection = connection();
        var_dump($values);die();
        $res = $connection->prepare("INSERT INTO leads(mes-solicitato, trinta-litros, cinquenta-litros, observacoes, total-venda, negocio-fechado, nome, telefone, cidade, bairro)VALUES(:mes, :trinta, :cinquenta, :obs, :total, :negocio, :nome, :telefone, :cidade, :bairro)");
        
        $res->bindValue(":mes", $values['mes-solicitato']);
        $res->bindValue(":trinta", $values['trinta-litros']);
        $res->bindValue(":cinquenta", $values['cinquenta-litros']);
        $res->bindValue(":obs", $values['observacoes']);
        $res->bindValue(":total", $values['total-venda']);
        $res->bindValue(":negocio", $values['negocio-fechado']);
        $res->bindValue(":nome", $values['nome']);
        $res->bindValue(":telefone", $values['telefone']);
        $res->bindValue(":cidade", $values['cidade']);
        $res->bindValue(":bairro", $values['bairro']);
        $res->execute();
        var_dump($res);die();
    }

    function all(string $table){

        $connection = connection();

        $res = $connection->prepare("SELECT * FROM ".$table."");
        $res->execute();
        $all = $res->fetchAll();
        return $all;
    }

    function findWhere($where) {
        
        $connection = connection();

        $str    = $where;
        $needle = '-';
        $pos    = strripos($str, $needle);

        if($pos){
            $cidadeBairro = explode(" - ", $str);
            $res = $connection->prepare("SELECT * FROM bares WHERE cidade = :cidade && bairro = :bairro ORDER BY nome ASC");
            $res->bindValue(':cidade', $cidadeBairro[0]);
            $res->bindValue(':bairro', $cidadeBairro[1]);
        } else {
            // $res = $connection->prepare("SELECT * FROM bares WHERE cidade = :find OR bairro = :find ORDER BY nome ASC");
            $res = $connection->prepare("SELECT * FROM bares WHERE cidade LIKE '%".$where."%' OR bairro LIKE '%".$where."%' ORDER BY nome ASC");
            $res->bindValue(':find', $where);
        }

        
        $res->execute();
        $all = $res->fetchAll();
        $t = [];
        foreach($all as $i) {
            $t[$i['cidade']][] = $i;
        }
        return $t;
    }

    function dropWhere($where) {
        
        $connection = connection();

        $params = explode('-', $where);
        $res = $connection->prepare("SELECT * FROM bares WHERE cidade = :cidade And bairro = :bairro ORDER BY nome ASC");
        $res->bindValue(':cidade', $params[1]);
        $res->bindValue(':bairro', $params[2]);
        $res->execute();
        $all = $res->fetchAll();
        $t = [];
        foreach($all as $i) {
            $t[$i['cidade']][] = $i;
        }
        return $t;
    }

    function viewRender($data){
        
        $view = 0;
        if(isset($data[2])) $view++;
        if(isset($data[3])) $view++;
        if(isset($data[4])) $view++;
        if(isset($data[5])) $view++;
        if(isset($data[6])) $view++;
        return ($view == 5) ? true : false;
    }

    function allCitys(){

        $connection = connection();

        $res = $connection->prepare("SELECT * FROM estado ORDER BY nome ASC");

        $res->execute();
        $all = $res->fetchAll();
        return $all;
    }

    function allDistrict($cidade){

        $connection = connection();
        // adaptado para estado
        $res = $connection->prepare("SELECT * FROM cidade WHERE estado = :estado ORDER BY nome ASC");
        $res->bindValue(':estado', $cidade);
        $res->execute();
        $all = $res->fetchAll();
        return $all;

    }

    function allRoad($cidade){

        $connection = connection();
        // adaptado para bairro
        $res = $connection->prepare("SELECT * FROM bairro WHERE cidade = :cidade ORDER BY nome ASC");
        $res->bindValue(':cidade', $cidade);
        $res->execute();
        $all = $res->fetchAll();
        return $all;

    }

    function cidadeWhere($where){
        $connection = connection();
        $res = $connection->prepare("SELECT * FROM cidade WHERE estado = :estado ORDER BY nome ASC");
        $res->bindValue(':estado', $where);
        $res->execute();
        $all = $res->fetchAll();
        return $all;
    }
    function bairroWhere($where){
        $connection = connection();
        $res = $connection->prepare("SELECT * FROM bairro WHERE cidade = :cidade ORDER BY nome ASC");
        $res->bindValue(':cidade', $where);
        $res->execute();
        $all = $res->fetchAll();
        return $all;
    }
    
?>