<div id="user-list" class="flex flex-col gap-4 w-full">
    <div class="card w-full">
        <div class="card-body font-bold grid grid-cols-3 lg:grid-cols-4 pb-0 mb-1">
            <p>Name</p>
            <p>Email</p>
            <p>Phone</p>
            <p></p>
        </div>
    </div>
    @foreach($users as $user)
        <div class="card bg-base-100 w-full mb-2">
            <div class="card-body grid grid-cols-3 lg:grid-cols-4 items-center">
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
                <p>{{ $user->phone }}</p>
                <span class="hidden lg:flex gap-2 justify-end">
                    @can('approve', $user)
                        @if(!$user->approved)
                            <form method="POST" action="{{ route('user.approve', $user) }}" onsubmit="return confirm('Are you sure you want to approve this user?');">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success">
                                    Approve
                                </button>
                            </form>
                        @endif
                    @endcan
                    @can('update', $user)
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-success">Edit</a>
                    @endcan
                    @can('delete', $user)
                        <form method="POST" action="{{ route('user.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-error">
                                Delete
                            </button>
                        </form>
                    @endcan
                </span>
            </div>
            <div class="dropdown block lg:hidden absolute top-4 right-4 justify-end">
                <div tabindex="0" class="btn btn-ghost">
                    <img class="w-6" src={{ Vite::asset('resources/images/ellipsis.svg') }}>
                </div>
                <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-5 p-2 shadow-sm gap-2">
                    <li>
                    @can('approve', $user)
                        @if(!$user->approved)
                            <form method="POST" class="p-0" action="{{ route('user.approve', $user) }}" onsubmit="return confirm('Are you sure you want to approve this user?');">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success w-24">
                                    Approve
                                </button>
                            </form>
                        @endif
                    @endcan
                    </li>
                    <li>
                    @can('update', $user)
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-success w-24">Edit</a>
                    @endcan
                    </li>
                    <li>
                    @can('delete', $user)
                        <form method="POST" class="p-0" action="{{ route('user.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-error w-24">
                                Delete
                            </button>
                        </form>
                    @endcan
                    </li>
                </ul>
            </div>
        </div>
    @endforeach

    <!-- Pagination Links -->
    <div class="mt-4 w-full">
        {{ $users->links() }}
    </div>
</div>