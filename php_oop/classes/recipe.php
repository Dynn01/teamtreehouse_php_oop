<?php

class Recipe
{
    private $title;
    private $ingredients=[];
    private $instructions=[];
    private $yield;
    private $tag=[];
    private $source="Khoirudin";

    private $measurements=[
        "tsp",
        "tbsp",
        "cup",
        "oz",
        "lb",
        "fl oz",
        "pint",
        "quart",
        "gallon"
    ];

    // Setters
    public function setTitle($title)
    {
         $this->title=ucwords($title);
    }

    //Getters

    public function getTitle()
    {
        return $this->title;
    }

    public function addIngredients($item, $amount=null, $measure=null)
    {
        if($amount!=null && !is_float($amount) && !is_int($amount))
        {
             exit ("The amount must be a float :". gettype($amount)."$amount given");
        }
        if($measure!=null && !in_array(strtolower($measure), $this->measurements))
        {
            exit ("Please enter a valid measurements :".implode(", ", $this->measurements));
        }
        $this->ingredients[]=[
            "item"=>ucwords($item),
            "amount"=>$amount,
            "measure"=>strtolower($measure)
        ];
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function addInstructions($string)
    {
        $this->instructions[]=$string;
    }

    public function displayRecipe()
    {
        return $this->title."by".$this->source; //$this = scope elements in class
    }
}

