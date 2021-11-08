@props(['align'=>'center','color'=>'','fw'=>""])

@php
    $textAlignClass  = (new App\Support\TextAlignment($align))->className();
@endphp
    
    <td class="{{ $textAlignClass }} {{$color}} {{$fw}}" >
        {{ $slot }}
    </td>
   