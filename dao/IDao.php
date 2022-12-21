<?php

interface IDao {
    //put your code here
    function create($o);
    function delete($o);
    function update($o);
    function findAll();
    function findById($id);
    
}

