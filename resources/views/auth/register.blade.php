
<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center">Create Account</h1>
                    <p class="text-xs text-error text-center mb-2">* required field</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="name"
                                   placeholder="Name*"
                                   value="{{ old('name') }}"
                                   class="input input-bordered @error('name') input-error @enderror"
                                   required
                                   maxlength="255">
                            <span>Name<span class="text-error">*</span></span>
                        </label>

                        <!-- Email -->
                        <label class="floating-label mb-6">
                            <input type="email"
                                   name="email"
                                   placeholder="Email Address*"
                                   value="{{ old('email') }}"
                                   class="input input-bordered @error('email') input-error @enderror"
                                   required
                                   maxlength="255">
                            <span>Email Address<span class="text-error">*</span></span>
                        </label>
                        
                        <!-- Phone -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="phone"
                                   placeholder="Phone Number*"
                                   value="{{ old('phone') }}"
                                   class="input input-bordered @error('phone') input-error @enderror"
                                   required 
                                   minlength="10"
                                   maxlength="255">
                            <span>Phone Number<span class="text-error">*</span></span>
                        </label>
                        
                        <!-- mail-address -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="mail_address"
                                   placeholder="Mailing Address*"
                                   value="{{ old('mail_address') }}"
                                   class="input input-bordered @error('mail_address') input-error @enderror"
                                   required 
                                   minlength="10"
                                   maxlength="255">
                            <span>Mailing Address<span class="text-error">*</span></span>
                        </label>
                        
                        <!-- bill-address -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="bill_address"
                                   placeholder="Billing Address*"
                                   value="{{ old('bill_address') }}"
                                   class="input input-bordered @error('bill_address') input-error @enderror"
                                   required 
                                   minlength="10"
                                   maxlength="255">
                            <span>Billing Address<span class="text-error">*</span></span>
                        </label>

                        <!-- Emergency Name -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="emergency_name"
                                   placeholder="Emergency Contact*"
                                   value="{{ old('emergency_name') }}"
                                   class="input input-bordered @error('emergency_name') input-error @enderror"
                                   required
                                   maxlength="255">
                            <span>Emergency Contact<span class="text-error">*</span></span>
                        </label>
                        
                        <!-- Emergency Phone -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="emergency_phone"
                                   placeholder="Emergency Contact Number*"
                                   value="{{ old('emergency_phone') }}"
                                   class="input input-bordered @error('emergency_phone') input-error @enderror"
                                   required
                                   maxlength="255">
                            <span>Emergency Contact Number<span class="text-error">*</span></span>
                        </label>
                        
                        <!-- Lot -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="lot"
                                   placeholder="Lot Number" 
                                   value="{{ old('lot') }}"
                                   class="input input-bordered @error('lot') input-error @enderror"
                                   maxlength="255">
                            <span>Lot Number</span>
                        </label>

                        <!-- Password -->
                        <label class="floating-label mb-6">
                            <input type="password"
                                   name="password"
                                   placeholder="Password*"
                                   class="input input-bordered @error('password') input-error @enderror"
                                   required>
                            <span>Password<span class="text-error">*</span></span>
                        </label>

                        <!-- Password Confirmation -->
                        <label class="floating-label mb-6">
                            <input type="password"
                                   name="password_confirmation"
                                   placeholder="Confirm Password*"
                                   class="input input-bordered"
                                   required
                                   minlength="8">
                            <span>Confirm Password<span class="text-error">*</span></span>
                        </label>

                        <label class="label">
                            <input type="checkbox" name="ecommunication" class="checkbox" />
                            Electronic communications
                        </label>

                        @foreach($errors->all() as $error)
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $error }}</span>
                            </div>
                        @endforeach

                        <!-- Submit Button -->
                        <div class="form-control mt-8">
                            <button type="submit" class="btn btn-primary btn-sm w-full">
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="divider">OR</div>
                    <p class="text-center text-sm">
                        Already have an account?
                        <a href="/login" class="link link-primary">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>