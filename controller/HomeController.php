<?php

require(ROOT . "model/HomeModel.php");

// http://localhost/manege/home/index
function index(){
    render("home/index", array(
        'planned' => getAllPlanned()
    ));
}
function plannen(){
    render("home/plannen");
}
function edit(){
    render("home/edit");
}
function delete(){
    render("home/delete");
}
