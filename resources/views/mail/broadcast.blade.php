<x-layout>
    <x-slot:title>
        Broadcast Email
    </x-slot:title>

    <div class="flex flex-col gap-4">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h1 class="card-title">Send Broadcast Email</h1>
                <p>
                    Send an email update to all users with a valid email address.
                </p>
                <p class="text-sm opacity-70">
                    Current recipients: {{ $recipientCount }}
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('mail.broadcast.send') }}" class="card bg-base-100 shadow-sm">
            @csrf
            <div class="card-body gap-4">
                <label class="floating-label w-full">
                    <input
                        type="text"
                        name="subject"
                        placeholder="Subject"
                        value="{{ old('subject') }}"
                        class="input input-bordered w-full @error('subject') input-error @enderror"
                        maxlength="120"
                        required
                    >
                    <span>Subject</span>
                </label>

                <label class="floating-label w-full">
                    <textarea
                        name="message"
                        placeholder="Message"
                        rows="10"
                        class="textarea textarea-bordered w-full @error('message') textarea-error @enderror"
                        maxlength="5000"
                        required
                    >{{ old('message') }}</textarea>
                    <span>Message</span>
                </label>

                @if ($errors->any())
                    <div class="alert alert-error alert-soft">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-actions justify-end">
                    <button type="submit" class="btn btn-primary">
                        Send Broadcast
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout>