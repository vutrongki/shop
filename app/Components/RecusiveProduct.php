<?php
namespace App\Components;
class RecusiveProduct {

    public $htmlSelect = '';
    public function __construct() {

    }

    public function categoryProductRecusive($data, $parent_id = 0, $char = '', $category) {
            foreach($data as $value) {
                if($value->parent_id == $parent_id) {
                    isset($category) && $value->id == $category ? $this->htmlSelect .= '<option value="'.$value->id.'" selected>'
                    .$char. $value->name . '</option>' : $this->htmlSelect .= '<option value="'.$value->id.'">'
                    .$char. $value->name . '</option>' ;

                    $this->categoryProductRecusive($data, $value->id, $char .  '--', $category);
                }
            }
        return $this->htmlSelect;
    }
}

?>