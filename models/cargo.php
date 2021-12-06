<?php

    class cargo {

        public $id;
        public $title;
        public $bio;
        public $id_cargo;
    }

    interface CargoDAOInterface {

        public function create(cargo $cargo);
        public function update(cargo $cargo);
        public function destroy($id);
    }