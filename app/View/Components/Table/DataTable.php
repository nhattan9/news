<?php

namespace App\View\Components\Table;

use App\Support\TextAlignment;
use Illuminate\View\Component;

class DataTable extends Component
{
    public $headers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headers)
    {
        // dd($this->formatHeaders($headers));
        $this->headers = $this->formatHeaders($headers);

    }
    public function formatHeaders($headers): array
    {
        // dd($headers);
        return array_map(function($header){
            $name =is_array($header) ? $header['name'] : $header;

            return [
               'name' =>$name,
               'sortClass'=> $header['sort'] ?? '',
               'classes'=> $this->textAlignClasses($header['align'] ?? 'center'),
               'width'=> $header['width'] ?? 'auto',
            ];
        },$headers);
    }
    private function textAlignClasses($align): string
{
    return (new TextAlignment($align))->className();
 
}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table.data-table');
    }
}