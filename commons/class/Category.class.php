<?php

class Category {

    private $id;
    private $idFatherCategory;
    private $name;

    public function __construct($idCategory=-1,$name, $idFatherCategory=-1) {
        if (func_num_args() == 3) {
            $this->id=$idCategory;
            $this->idFatherCategory=$idFatherCategory;
            $this->name=$name;                    
        }
        elseif(func_num_args()==2){
            $this->id=$idCategory;
            $this->name=$name;                    
        }
        else{
            $this->id=-1;
            $this->name='noName';
            $this->idFatherCategory=-1;
        }
        
    }

    public function getId() {
        return $this->id;
    }

    public function getIdFatherCategory() {
        return $this->idFatherCategory;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($idCategory) {
        $this->id = $idCategory;
    }

    public function setIdFatherCategory($idFatherCategory) {
        $this->idFatherCategory = $idFatherCategory;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function toString() {
        return 'Id: ' . $this->id . ' Name: ' . $this->name.' Id Father Category: '.$this->idFatherCategory;
    }

}

?>
