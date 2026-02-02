
<x-layout>
    <x-slot:title>
        Reset Password
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center mb-6">Reset Your Password</h1>

                    <form method="POST" action="/reset-password/{{ $token }}">
                        @csrf
                       
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="email"
                                   placeholder="Email"
                                   class="input input-bordered @error('email') input-error @enderror"
                                   required
                                   autofocus>
                            <span>Email</span>
                        </label>
                        <label class="floating-label mb-6">
                            <input type="password"
                                   name="password"
                                   placeholder="New Password"
                                   class="input input-bordered @error('password') input-error @enderror"
                                   required
                                   autofocus>
                            <span>New Password</span>
                        </label>
                        <label class="floating-label mb-6">
                            <input type="password"
                            name="password_confirmation"
                            placeholder="Confirm New Password"
                            class="input input-bordered @error('password_confirmation') input-error @enderror"
                            required
                            autofocus>
                            <span>Confirm New Password</span>
                        </label>
                        @error('token')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                        @error('password')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                        @error('password_confirmation')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                        @error('email')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                        <!-- Submit Button -->
                        <div class="form-control mt-8">
                            <button type="submit" class="btn btn-primary btn-sm w-full">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>