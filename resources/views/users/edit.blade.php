<x-layout>
    <x-slot:title>
        Settings
    </x-slot:title>
    <div class="flex flex-col items-center">
        <h1 class="text-2xl font-bold mb-4">Account Settings</h1>
        <form class="card flex max-w-140 w-full flex-cols justify-center items-start p-4 bg-base-100 gap-6" method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')
            <label class="floating-label w-full">
                <input type="name"
                        name="name"
                        placeholder="Name"
                        value="{{ $user->name }}"
                        class="input input-bordered w-full @error('name') input-error @enderror"
                        required
                        autofocus>
                <span>Name</span>
            </label>
            <label class="floating-label w-full">
                <input type="email"
                        name="email"
                        placeholder="Email Address"
                        value="{{ $user->email }}"
                        class="input input-bordered w-full @error('email') input-error @enderror"
                        required
                        autofocus>
                <span>Email Address</span>
            </label>
            <label class="floating-label w-full">
                <input type="text"
                        name="phone"
                        placeholder="Phone"
                        value="{{ $user->phone }}"
                        class="input input-bordered w-full @error('phone') input-error @enderror"
                        required
                        autofocus>
                <span>Phone</span>
            </label>
            <label class="floating-label w-full">
                <input type="text"
                        name="mail_address"
                        placeholder="Mailing Address"
                        value="{{ $user->mail_address }}"
                        class="input input-bordered w-full @error('mail_address') input-error @enderror"
                        required
                        autofocus>
                <span>Mailing Address</span>
            </label>
            <label class="floating-label w-full">
                <input type="text"
                        name="bill_address"
                        placeholder="Billing Address"
                        value="{{ $user->bill_address }}"
                        class="input input-bordered w-full @error('bill_address') input-error @enderror"
                        required
                        autofocus>
                <span>Billing Address</span>
            </label>
            <label class="floating-label w-full">
                <input type="text"
                        name="lot"
                        placeholder="Lot Number"
                        value="{{ $user->lot }}"
                        class="input input-bordered w-full @error('lot') input-error @enderror"
                        required
                        autofocus>
                <span>Lot Number</span>
            </label>
            <label class="floating-label w-full">
                <input type="text"
                        name="emergency_name"
                        placeholder="Emergency Contact Name"
                        value="{{ $user->emergency_name }}"
                        class="input input-bordered w-full @error('emergency_name') input-error @enderror"
                        required
                        autofocus>
                <span>Emergency Contact</span>
            </label>
            <label class="floating-label w-full">
                <input type="text"
                        name="emergency_phone"
                        placeholder="Emergency Contact Number"
                        value="{{ $user->emergency_phone }}"
                        class="input input-bordered w-full @error('emergency_phone') input-error @enderror"
                        required
                        autofocus>
                <span>Emergency Phone</span>
            </label>
            <label class="label w-full">
                <input type="checkbox" name="ecommunication" class="checkbox"  @checked(old('ecommunication', $user->ecommunication))/>
                Electronic communications
            </label>
            @foreach($errors->all() as $error)
                <div class="label">
                    <span class="label-text-alt text-error">{{ $error }}</span>
                </div>
            @endforeach
            <button type="submit" class="btn btn-success mt-2">Update</button>
        </form>
    </div>
</x-layout>