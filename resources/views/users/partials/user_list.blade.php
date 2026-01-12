<div id="user-list" class="flex flex-col gap-4 w-full">
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
                <span class="flex gap-2 justify-end">
                    @can('update', $user)
                        <a href={{ route('user.edit', $user) }} class="btn btn-success">Edit</a>
                    @endcan
                    @can('delete', $user)
                        <form method="POST" action={{ route('user.destroy', $user) }} onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-error">
                                Delete
                            </button>
                        </form>
                    @endcan
                </span>
            </div>
        </div>
    @endforeach

    <!-- Pagination Links -->
    <div class="mt-4 w-full">
        {{ $users->links() }}
    </div>
</div>