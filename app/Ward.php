<?php

namespace App;

class Ward
{
    public $items=null;
    public $date;


    public function __construct($oldWard)
    {
        if($oldWard){
            $this->items=$oldWard->items;

        }else{
            $this->items=null;
        }
    }
    public function add($item,$id){
        $storedItem=['item'=>$item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem=$this->items[$id];
            }
        }
        $this->items[$id]=$storedItem;
    }

}
