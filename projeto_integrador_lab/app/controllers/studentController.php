<?php

// Exibe os erros em uma página web (DEVERIA ESTAR AQUI?).
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/Controller.php";

function create(){

    $student = new StudentModel();
    $student->setStudentName("teste");
    $student->setEmail("jefferson.chaves@ifpr.edu.br");
    $student->setPassword("123456");

    $studentRepository = new StudentRepository();
    $id = $studentRepository->create($student);
    
    findAll();
}

function findAll()
{
    $studentRepository = new StudentRepository();

    $students = $studentRepository->findAll();

    $data['titulo'] = "listar alunos";
    $data['students'] = $students;

    Controller::loadView("student/list.php", $data);
}

function findUserById()
{
    $idParam = $_GET['id'];

    $userRepository = new UserRepository();
    $usuario = $userRepository->findUserById($idParam);

    print "<pre>";
    print_r($usuario);
    print "</pre>";

    //Controller::loadView("users/list.php");
}

function deleteUserById()
{
    $idParam = $_GET['id'];
    $userRepository = new UserRepository();    

    $userRepository->deleteById($idParam);

    //Controller::loadView("users/list.php", $data);
}

function preventDefault() {
    $userRepository = new UserRepository();

    $data = $userRepository->findAll();

    print "call preventDefault()";
    // Controller::loadView("users/list.php", $data);
}
