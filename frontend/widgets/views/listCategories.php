<?php
    if(isset($categories) && count($categories) > 0) {
        foreach($categories as $category) {
            $menuItems[] = ['label' => $category->name, 'url' => ['/category', 'id' => $category->id]];
        }
    }
?>