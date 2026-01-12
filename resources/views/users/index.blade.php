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
            </div>
        </form>
        @include('users.partials.user_list', ['users' => $users])
    </div>
    <script>
        let timeout = null;
        const searchInput = document.getElementById('user-search');
        const usersContainer = document.getElementById('user-list');

        searchInput.addEventListener('keyup', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                const query = searchInput.value;

                fetch(`{{ route('user.index') }}?search=${encodeURIComponent(query)}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.text())
                .then(html => {
                    usersContainer.innerHTML = html;
                })
                .catch(err => console.error(err));
            }, 300); // 1 second of inactivity
        });
    </script>
</x-layout>