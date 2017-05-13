<?php 

require_once 'data/data_categories.php';

$categories = unserialize(preg_replace_callback('/(?<=^|\{|;)s:(\d+):\"(.*?)\";(?=[asbdiO]\:\d|N;|\}|$)/s',function($m) { 
return 's:' . strlen($m[2]) . ':"' . $m[2] . '";'; 
},$clear_categories));

if($clear_categories){
    $categories = unserialize($clear_categories);
    function CategoriesTree($categories) {
        $tree = new stdClass();
        $tree->subcategories = array();
        // Указатели на узлы дерева
        $pointers = array();
        $pointers[0] = &$tree;
        $finish = false;
        // Не кончаем, пока не кончатся категории, или пока ниодну из оставшихся некуда приткнуть
        while(!empty($categories)  && !$finish) {
            $flag = false;
            // Проходим все выбранные категории
            foreach($categories as $k=>$category) {
                if(isset($pointers[$category->parent_id])) {
                    // В дерево категорий (через указатель) добавляем текущую категорию
                    $pointers[$category->id] = $pointers[$category->parent_id]->subcategories[] = $category;
                    // Убираем использованную категорию из массива категорий
                    unset($categories[$k]);
                    $flag = true;
                }
            }
            if(!$flag) {
                $finish = true;
            }
        }
        return reset($tree);
    }
    function PrintCategories($categories, $level=1) {
        if($categories) { // проверка лишней не бывает
            echo "<ul style='padding-left:". $level*10 ."px'>";
            foreach ($categories as $category) {
                if($category->visible) { //важная проверка, которая позволит выводит только включенные категории на сайте
                    echo "<li>$category->name </li>";
                    if($category->subcategories) {
                        // проверяем есть ли подкатегории и вызываем заново функцию для вывода
                        PrintCategories($category->subcategories, $level+1); // передаем в функцию уже массив обьектов покатегорий
                    }
                }
            }
            echo "</ul>";
        }
    }
    $tree_categories = CategoriesTree($categories);
    PrintCategories($tree_categories);
} else {
    print "<b>error_categories</b>";
}

?>