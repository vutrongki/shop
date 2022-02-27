<?php
namespace App\Components;
class Recusive {

    public $htmlSelect = '';
    public function __construct() {

    }

    public function categoryRecusive($data, $parent_id = 0, $char = '', $category) {
            foreach($data as $value) {
                if($value->parent_id == $parent_id) {
                    isset($category) && $value->id == $category->parent_id ? $this->htmlSelect .= '<option value="'.$value->id.'" selected>'
                    .$char. $value->name . '</option>' : $this->htmlSelect .= '<option value="'.$value->id.'">'
                    .$char. $value->name . '</option>' ;

                    $this->categoryRecusive($data, $value->id, $char .  '--', $category);
                }
            }
        return $this->htmlSelect;
    }
}

?>