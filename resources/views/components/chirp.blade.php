@props(['chirp'])

<div class="card mt-8 mb-2 bg-base-100 shadow">
    <div class="card-body p-0 flex flex-col md:flex-row md:justify-between items-start gap-10">
        
        <!-- Left Column -->
        <div class="flex-1 p-4">
            <div>
                <h2 class="card-title">
                    <img src="https://avatars.laravel.cloud/{{ $chirp['user']->name ??'Anonymous' }}" alt="{{ $chirp['user']->name ?? 'Anonymous' }}" class="rounded-full" width="20" height="20" /> 
                    &nbsp; {{ $chirp['user']->name ?? 'Anonymous' }} &nbsp; 
                    <span class="text-sm text-gray-500">{{ $chirp->created_at->diffForHumans() }}</span>
                    @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                        <span class="text-sm text-gray-500">Edited</span>
                    @endif
                </h2>
            </div>
                <p>{!! html_entity_decode($chirp['message']) !!}</p>
            <p class="text-sm text-gray-500"></p>
        </div>

        <!-- Right Column -->
        {{-- @dd(@can('update', $chirps)) --}}
        {{-- @can('update', $chirp) --}}
        @if ($chirp['user_id'] == auth()->id())
            <div class="flex-1 p-4 flex md:justify-end gap-4">
                <span class="cursor-pointer"><a href="chirps/{{ $chirp['id'] }}/edit" class="btn btn-ghost btn-xs">Edit</a></span>
                <form method="post" action="/chirps/{{ $chirp['id'] }}/delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-ghost btn-xs">Delete</button>
                </form>
            </div>
        @endif
        {{-- @endcan --}}
    </div>
</div>