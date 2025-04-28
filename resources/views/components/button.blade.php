@props(['type' => 'primary', 'text' => '', 'class' => ''])

<button {{ $attributes->merge(['class' => "btn btn-{$type} {$class}"]) }}>
    {{ $text ?? $slot }}
</button> 