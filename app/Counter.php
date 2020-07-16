<?php


namespace App;


class Counter
{
    public function sum($numbers)
    {
        return array_sum(explode(",", $numbers)) ;
    }

}
