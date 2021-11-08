<?php
namespace App\Support;

class TextAlignment{

    private $align;
    public function __construct(string $align ='center')
    {
        $this->align=$align;
    }

    public function className(): string
    {
        return[
            'left'=> 'text-left',
            'right'=> 'text-right',
            'center'=> 'text-center',
    
        ][$this->align] ?? 'text-center';
    }
}