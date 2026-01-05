
<x-layout>
    <x-slot:title>
        Edit Alert
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Edit Alert</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="{{ route('alerts.update', $alert) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <textarea
                            name="title"
                            class="textarea textarea-bordered w-full resize-none @error('title') textarea-error @enderror"
                            rows="2"
                            maxlength="100"
                            required
                        >{{ old('title', $alert->title) }}</textarea>
                        
                        @error('title')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $title }}</span>
                            </div>
                        @enderror

                    </div>
                    <div class="form-control w-full mt-4">
                        <label class="label">
                            <span class="label-text ">Message</span>
                        </label> 
                        <textarea
                            name="message"
                            class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                            rows="4"
                            maxlength="1027"
                            required
                        >{{ old('message', $alert->message) }}</textarea>

                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="card-actions justify-between mt-4">
                        <a href="/" class="btn btn btn-sm">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update Alert
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>