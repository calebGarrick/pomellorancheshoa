
<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>

    @foreach($alerts->all() as $alert)
    <div role="alert" class="alert alert-error alert-soft flex flex-col mb-8">
        <div class="flex flex-col items-center">
            <p class="font-bold text-lg">{{ $alert->title }}</p>
            <p>As of {{ $alert->created_at->format('n/d') }} at {{ $alert->created_at->format('g:ia') }}</p>
        </div>
        <span>
            {{ $alert->message }}
        </span>
        @can('update', $alert)
            <div class="flex flex-row gap-4">
                <a href="{{ route('alerts.edit', $alert) }}" class="btn btn-accent mt-4">Edit</a>
                <form method="POST" action="{{ route('alerts.destroy', $alert) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary mt-4">Delete</button>
                </form>
            </div>
        @endcan
    </div>
    @endforeach
    @can('create', App\Models\Alert::class)
        <button class="btn btn-primary mb-4" onclick="alertCreateModal.showModal()">
            Create Alert
        </button>
        <dialog id="alertCreateModal" class="modal">
            <div class="modal-box card">
                <form method="POST" action="{{ route('alerts.store') }}">
                    @csrf
                    <h3 class="font-bold text-lg mb-4">Create Alert</h3>
                    <div class="form-control w-full mb-4 flex gap-2">
                        <label class="label w-20" for="title">
                            <span class="label-text">Title</span>
                        </label>
                        <input type="text" name="title" id="title" class="input input-bordered" required maxlength="100"/>
                    </div>
                    <div class="form-control mb-4 flex gap-2">
                        <label class="label w-20" for="message">
                            <span class="label-text">Message</span>
                        </label>
                        <textarea name="message" id="message" class="textarea textarea-bordered" required maxlength="1027"></textarea>
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" class="btn btn-primary">Create Alert</button>
                        <button type="button" onclick="alertCreateModal.close()" class="btn">Cancel</button>
                    </div>
                </form>
            </div>  
        </dialog>
    @endcan

    <div class="hero bg-base-200 my-4">
        <div class="hero-content flex-col lg:flex-row">
            <img
            src="{{Vite::asset('resources/images/IMG_5152.jpg')}}"
            class="max-w-sm rounded-lg shadow-2xl"
            />
            <div>
                Welcome to <h1 class="text-4xl font-bold"> Pomello Ranches Homeowners Association</h1>
                <p class="py-4">
                        The Pomello Ranches HOA exists to preserve the character of our community, protect property values, and encourage a genuine “neighbors helping neighbors” spirit.
                        Whether you’re a new resident or have lived here for years, this page will help you understand how the HOA works and how to get involved.
                </p>
                <a class="btn btn-neutral" href="{{ route('contact') }}">Meeting RSVP</a>    
            </div>
        </div>
    </div>

    
</x-layout>
