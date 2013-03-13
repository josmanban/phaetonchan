<?php

include_once 'commons/class/Category.class.php';
include_once 'persistence/CategoryDB.php';

class CategoryAbm {

    public static function listCategory($parameters) {
        $rows = CategoryDB::selectCategory($parameters);
        if (isset($parameters['id'])) {
            $row = $rows;
            $category = new Category($row->id, $row->name, $row->idFatherCategory);
            return $category;
        }
        $categories = array();

        foreach ($rows as $row) {
            $category = new Category($row->id, $row->name, $row->idFatherCategory);
            array_push($categories, $category);
        }
        return $categories;
    }

}

?>
