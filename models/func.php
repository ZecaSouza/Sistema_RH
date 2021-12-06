<?php

    class func {

        public $id;
        public $nome_func;
        public $cpf;
        public $cargo;
        public $dataCon;
        public $id_func;
    }

    interface FuncDAOInterface {

        public function create(func $func);
        public function update(func $func);
        public function destroy($id);
    }