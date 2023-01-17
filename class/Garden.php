<?php

interface iGarden{
    public function AddTrees($count);
    public function PickFruit(array $trees);
}

class Garden implements iGarden{
    protected $typeOfTree;
    protected $treesID;
    protected $countTrees;
    protected $trees = [];
    protected $fruitCount;
    protected $fruitBox = [];
    protected $fruitweigth;

    public function AddTrees($count)
    {
        // TODO: Implement AddTrees() method.

        $this->typeOfTree = $count < 15 ? 'apple' : 'pear';
        $this->fruitCount = $this->typeOfTree == 'apple' ? $this->CountFruit(40, 50) : $this->CountFruit(0, 20);
        $this->countTrees = $count+1;
        $this->treesID = $this->countTrees.'_'.$this->typeOfTree;
        $this->trees[$this->treesID]['type'] = $this->typeOfTree;
        $this->trees[$this->treesID]['fruitCount'] = $this->fruitCount;
        for($i = 0; $i < $this->fruitCount; $i++){
            $this->fruitweigth = $this->typeOfTree == 'apple' ? $this->WeightFruit(150, 180) : $this->WeightFruit(130, 170);
            $this->trees[$this->treesID]['weight'][$i] = $this->fruitweigth;
        }
        return $this->trees;

    }

    public function PickFruit(array $trees)
    {
        // TODO: Implement PickFruit() method.
        foreach($trees as $tree){
            if($tree['type'] == 'pear'){
                $this->fruitBox['pear'] += $tree['fruitCount'];
            }
            else{
                $this->fruitBox['apple'] += $tree['fruitCount'];
            }
        }
        return $this->fruitBox;
    }

    public function getWeigth(array $trees){
        foreach($trees as $tree){
            $this->fruitweigth += array_sum($tree['weight']);
        }
        return $this->fruitweigth;
    }

    protected function CountFruit($start, $end)
    {
        return rand($start, $end);
    }

    public function WeightFruit($start, $end)
    {
        return rand($start, $end);
    }

}