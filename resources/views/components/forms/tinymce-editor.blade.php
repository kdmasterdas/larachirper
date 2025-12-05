@props(['value' => ''])
<textarea
    id="message"
    name="message"
    placeholder="What's on your mind?"
    class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
    rows="4"
    maxlength="255"
    required
>{{ old('message') ?? $value ?? '' }}</textarea>
