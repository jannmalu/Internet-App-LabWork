<?php
   // Implemented by any class
    interface Crud{
        public function save($target_file);
        public function readAll();
        public function readUnique();
        public function search();
        public function update();
        public function removeOne();
        public function removeAll();

        public function validateForm();
        public function createFormErrorSession();
    }
?>