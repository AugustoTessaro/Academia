<?php 

    class UserModel {

        private $id;
        private string $studentname;
        private string $email;
        private string $password;
        private string $weight;
        private string $height;
        private string $age;
        private string $cpf;
        private string $rg;
    


        public function setId(int $id) {
            $this->id = $id;
        }

        public function getId(): int {
            return $this->id;
        }



        public function setStudentName(string $studentname){
            $this->studentname = $studentname;
        }

        public function getStudentName(){
            return $this->studentname;
        }



        public function setEmail(string $email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }



        public function setPassword(string $password){
            $this->password = $password;
        }

        public function getPassword(){
            return $this->password;
        }


        
        public function setWeight(string $weight){
            $this->weight = $weight;
        }

        public function getWeight(){
            return $this->weight;
        }


        public function setHeight(string $height){
            $this->height = $height;
        }

        public function getHeight(){
            return $this->height;
        }


        public function setAge(string $age){
            $this->age = $age;
        }

        public function getAge(){
            return $this->age;
        }



        public function setCpf(string $cpf){
            $this->cpf = $cpf;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setRg(string $rg){
            $this->rg = $rg;
        }

        public function getRg(){
            return $this->rg;
        }

    }