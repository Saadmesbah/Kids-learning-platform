@props(['action' => '', 'method' => 'POST', 'class' => ''])

<form 
    action="{{ $action }}" 
    method="{{ $method }}" 
    {{ $attributes->merge(['class' => "form {$class}"]) }}
>
    @csrf
    @if(strtoupper($method) === 'PUT' || strtoupper($method) === 'PATCH' || strtoupper($method) === 'DELETE')
        @method($method)
    @endif
    
    {{ $slot }}
</form> 