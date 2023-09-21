@props(['disabled' => false, 'errors', 'label' => false])

@php
    $errorClasses = 'border-red-600 focus:border-red-600 ring-1 ring-red-600 focus:ring-red-600';
    $successClasses = 'border-emerald-600 focus:border-emerald-600 ring-1 ring-emerald-600 focus:ring-emerald-600';
    $defaultClasses = '';

@endphp

@if($label)
    <label>{{ $label }}</label>

@endif

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full ' . ($errors->has($attributes['name']) ? $errors : (old($attributes['name']) ? $successClasses :  $defaultClasses) )]) !!}>

@error($attributes['name'])
<small class="text-red-600">{{ $message }}</small>
@enderror