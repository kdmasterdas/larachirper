<x-layout>
    <x-slot:title>
        Edit Chirp
    </x-slot:title>
        <div class="card bg-base-100 shadow mt-8 mb-2">
            <div class="card-body">
                
                <form method="POST" action="/chirps/{{ $chirp->id }}/update">
                    @csrf
                    @method('PUT')
                    <div class="form-control w-full">
                        <x-forms.tinymce-editor name="message" :value="$chirp->message" />
                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Chirp
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-layout>