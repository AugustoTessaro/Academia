<?php

require_once __DIR__ . "/../connection/Connection.php";
require_once __DIR__ . "/../models/UserModel.php";

class UserRepository {

    public PDO $conn;

    function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function create(StudentsModel $student) {

        try {

            $query = "INSERT INTO students (studentname, email, password, weight, height, age, cpf, rg) VALUES (:username, :email, :password, :weight, :height, :age, :cpf, :rg)";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":studentname", $student->$getStudentName());
            $prepare->bindValue(":email", $student->getEmail());
            $prepare->bindValue(":password", $student->getPassword());
            $prepare->bindValue(":height", $student->getHeight());
            $prepare->bindValue(":age", $student->getAge());
            $prepare->bindValue(":cpf", $student->getCpf());
            $prepare->bindValue(":rg", $student->getRg());
            $prepare->execute();

            return $this->conn->lastInsertId();
            
        } catch(Exception $e) {
                print("Erro ao inserir usuário no banco de dados");
        }
   }

    public function findAll(): array {

            $table = $this->conn->query("SELECT * FROM students");
            $estudantes  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $estudantes;
        }

        public function findStudentById(int $studentId) {

            $query = "SELECT * FROM students WHERE student.id = ?";
            
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $userId, PDO::PARAM_INT);

            if($prepare->execute()){
            
                $estudante  = $prepare->fetchObject("StudentModel");
            
            } else {
                $estudante = null;
            }

            return $estudante;
        }

        public function update(StudentModel $student) {

            $query = "UPDATE students SET studentname = :studentname, email = :email, password = :password , weight = :weight, height = :height, age = :age, cpf = :cpf, rg = :rg  WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":studentname", $student->$getStudentName());
            $prepare->bindValue(":email", $student->getEmail());
            $prepare->bindValue(":password", $student->getPassword());
            $prepare->bindValue(":height", $student->getHeight());
            $prepare->bindValue(":age", $student->getAge());
            $prepare->bindValue(":cpf", $student->getCpf());
            $prepare->bindValue(":rg", $student->getRg());
            $prepare->bindValue(":id", $student->getId());
            $prepare->execute();
        }

        public function deleteById( int $id) {

            $query = "DELETE FROM students WHERE id = :id";

            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            
        }







        



}    


