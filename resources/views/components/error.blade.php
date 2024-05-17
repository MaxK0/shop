@props(['name' => ''])

@error($name)
    <p style="color: red; margin-top: 0.2rem">{{ $message }}</p>
@enderror
