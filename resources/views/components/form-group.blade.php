@props([
    'name' => '',
    'type' => 'text',
    'required' => false,
    'label' => '',
    'placeholder' => '',
    'value' => '',
])

<div class="form-group">
    <label class="{{ $required ? 'required' : '' }}" for="{{ $name }}">{{ __($label) }}</label>
    <input class="form-control @error('{{ $name }}') is-invalid @enderror" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
        value="{{ $value }}">
    @error('{{ $name }}')
        <span class="invalid error-feedback">{{ $message }}</span>
    @enderror
</div>
