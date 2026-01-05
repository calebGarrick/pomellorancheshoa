
<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>

    @forelse($alerts->all() as $alert)
        <div role="alert" class="alert alert-error alert-outline flex flex-col mb-4">
            <span>{{ $error }}</span>
        </div>
    <div role="alert" class="alert alert-warning alert-outline flex flex-col mb-8">
        <h3>{{ $alert->title }}</h4>
        <span>
            {{ alert->message}}
        </span>
    </div>
    @empty
    @endforelse
    
</x-layout>
