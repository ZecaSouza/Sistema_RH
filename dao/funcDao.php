<?php

    require_once("models/func.php");
    require_once("models/message.php");

    class funcDAO implements FuncDAOInterface {

        private $conn;
        private $url;
        private $message;
        
        public function __construct(PDO $conn, $url){

            $this->conn = $conn;
            $this->url = $url;  
        }
        public function buildUser($data){
            $func = new func();

            $func->id = $data["id"];
            $func->name_func = $data["nome_func"];
            $func->cargo = $data["cargo"];
            $func->dataCon = $data["dataCon"];
            $func->id_func = $data["id_func"];

            return $func;
        }
        public function create(func $func){
                

            $stmt = $this->conn->prepare("INSERT INTO func (
                nome_func, cpf, cargo, dataCon, id_func ) VALUES (
                    :nome_func, :cpf, :cargo, :dataCon, :id_func )");
            
            $stmt->bindParam("nome_func", $func->nome_func);
            $stmt->bindParam("cpf", $func->cpf);
            $stmt->bindParam("cargo", $func->cargo);
            $stmt->bindParam("dataCon", $func->dataCon);
            $stmt->bindParam("id_func", $func->id_func);

        }
        public function update(func $func){

        }
        public function destroy($id){     

        }

    }
