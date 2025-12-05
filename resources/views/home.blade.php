<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <!-- Chirp Form -->
        <div class="card bg-base-100 shadow mt-8 mb-2">
            <div class="card-body">
                
                <form method="POST" action="/chirps">
                    @csrf
                    @method('POST')
                    <div class="form-control w-full">
                        <x-forms.tinymce-editor/>
                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <button type="submit" class="btn btn-primary btn-sm" onClick="tinymce.triggerSave();">
                            Chirp
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <h2 class="text-3xl font-bold mt-8">Latest Chirps</h2>

        <div class="space-y-4 mt-10 shadow">
            @foreach ($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @endforeach
        </div>

        {{ $chirps->onEachSide(5)->links() }}
        
    </div>
</x-layout>