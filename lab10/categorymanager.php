<?php

// classes/CategoryManager.php
class CategoryManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function DodajKategorie($name, $parent_id = 0) {
        $query = $this->db->prepare("INSERT INTO categories (name, parent_id) VALUES (?, ?)");
        $query->execute([$name, $parent_id]);
    }

    public function UsunKategorie($category_id) {
        $query = $this->db->prepare("DELETE FROM categories WHERE id = ?");
        $query->execute([$category_id]);
    }

    public function EdytujKategorie($category_id, $new_name) {
        $query = $this->db->prepare("UPDATE categories SET name = ? WHERE id = ?");
        $query->execute([$new_name, $category_id]);
    }

    public function PokazKategorie() {
        $categories = $this->GetCategories();
        $this->DisplayCategories($categories);
    }

    private function GetCategories($parent_id = 0) {
        $query = $this->db->prepare("SELECT * FROM categories WHERE parent_id = ?");
        $query->execute([$parent_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    private function DisplayCategories($categories, $parent_id = 0, $level = 0) {
        foreach ($categories as $category) {
            if ($category['parent_id'] == $parent_id) {
                echo str_repeat("&nbsp;&nbsp;", $level) . $category['name'] . "<br>";
                $this->DisplayCategories($categories, $category['id'], $level + 1);
            }
        }
    }
}

?>