@props([
    'name' => '',
    'type' => 'text',
    'required' => false,
    'label' => '',
    'placeholder' => '',
    'values' => [],
    'value' => old($name),
    'valueOption' => 'id',
    'multiple' => false,
    'title' => 'title',
    'selectEdit' => null
])

<div class="form-group">
    <label class="{{ $required ? 'required' : '' }}" for="{{ $name }}">{{ __($label) }}</label>
    @if ($type === 'select')
        <select class="form-control select2" name="{{ $name }}" data-placeholder="{{ $placeholder }}"
            {{ $multiple ? "multiple = 'multiple'" : '' }} style="width: 100%">
            @if (!empty($values))
                @foreach ($values as $val)
                    <option value="{{ $val->$valueOption }}" {{ (old($name) ?? $selectEdit) === $val->$valueOption ? 'selected' : '' }}>
                        {{ $val->$title }}</option>
                @endforeach
            @endif
        </select>
    @else
        <input class="form-control @error('{{ $name }}') is-invalid @enderror" name="{{ $name }}"
            type="{{ $type }}" placeholder="{{ $placeholder }}" value="{{ $value }}">
    @endif
    <x-error :name=$name></x-error>
</div>
