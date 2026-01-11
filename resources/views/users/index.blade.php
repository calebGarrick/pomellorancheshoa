<x-layout>
    <x-slot:title>
        Users
    </x-slot:title>
    <div class="flex flex-col items-center">
        <form action="{{ route('user.index') }}" method="GET">
            <div class="flex flex-row justify-center gap-4">
                <label class="input">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g
                        stroke-linejoin="round"
                        stroke-linecap="round"
                        stroke-width="2.5"
                        fill="none"
                        stroke="currentColor"
                        >
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                        </g>
                    </svg>
                    <input name="search" value="{{ request('search') }}" type="search" placeholder="Search: name, email, or phone" id="user-search"/>
                </label>
                <button class="btn btn-success">
                    GO
                </button>
            </div>
        </form>
        <div class="card w-full">
            <div class="card-body font-bold grid grid-cols-4 pb-0 mb-1">
                <p>Name</p>
                <p>Email</p>
                <p>Phone</p>
                <p></p>
            </div>
        </div>
        @foreach($users as $user)
            <div class="card bg-base-100 w-full mb-2">
                <div class="card-body grid grid-cols-4 items-center">
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->phone }}</p>
                    <span class="flex gap-2">
                        <a href={{ route('user.edit', $user) }} class="btn btn-success">Edit</a>
                        <form method="POST" action={{ route('user.destroy', $user) }} onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-error">
                                Delete
                            </button>
                        </form>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>