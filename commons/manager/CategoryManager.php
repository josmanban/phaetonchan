<?php

include_once 'commons/abm/CategoryAbm.php';

class CategoryManager {

    public static function getCategoryById($id) {
        $category = CategoryAbm::listCategory(array('id' => $id));
        return $category;
    }

    public static function getCategoriesByIdFatherCategory($idFatherCategory) {
        $categories = CategoryAbm::listCategory(array('idFatherCategory' => $idFatherCategory));
        return $categories;
    }

    public static function getCategoryByName($name) {
        $categories = CategoryAbm::listCategory(array('name' => $name));
        return $categories;
    }

    public static function getAllCategories() {
        $categories = CategoryAbm::listCategory(array());
        return $categories;
    }

}

?>
