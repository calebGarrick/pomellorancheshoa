
<x-layout>
    <x-slot:title>
        Contact
    </x-slot:title>

    <div class="card bg-base-100 shadow-sm">
        <div class="card-body flex flex-col gap-2 items-center">
            <h2 class="card-title">Contact - Meeting RSVP Here</h2>
            <p>
                Please use this form to submit any questions, concerns, 
                or suggestions, to the Association. You may also use 
                this section to update your contact information. Keeping 
                your contact details current is especially important in 
                the event of an emergency. 
            </p>
            <p>
                All contact information submitted will be used exclusively 
                for HOA-related purposes and will not be disclosed to any 
                individuals or third-party companies.
            </p>
            <form method="POST" class="flex flex-col gap-4" action="{{ route('contact.send') }}">
                @csrf
                <div class="form-control flex">
                    <label class="label w-24"><span class="label-text">Name *</span></label>
                    <input type="text" placeholder="Name" value="{{ $user->name ?? null }}" name="name" class="input input-bordered @error('name') textarea-error @enderror" value="{{ old('name') }}" required>
                </div>
                <div class="form-control flex">
                    <label class="label w-24"><span class="label-text">Email *</span></label>
                    <input type="email" placeholder="Email" value="{{ $user->email ?? null }}" name="email" class="input input-bordered @error('email') textarea-error @enderror" value="{{ old('email') }}" required>
                </div>
                <div class="form-control flex">
                    <label class="label w-24"><span class="label-text">Phone #</span></label>
                    <input type="tel" placeholder="Phone #" value="{{ $user->phone ?? null }}" name="phone" class="input input-bordered" value="{{ old('phone') }}">
                </div>
                <div class="form-control flex">
                    <label class="label w-24">
                        <p class="label-text">Address/ Lot</p>
                    </label>
                    <input type="text" placeholder="Address/ Lot" value="{{ $user->lot?? $user->mail_address ?? null }}" name="address" class="input input-bordered" value="{{ old('address') }}">
                </div>
                <div class="form-control flex">
                    <label class="label w-24"><span class="label-text">Topic *</span></label>
                    <select name="topic" class="select select-bordered @error('topic') textarea-error @enderror" value="{{ old('topic') }}" required>
                        <option value="">Select a topic</option>
                        <option value="general">General Question</option>
                        <option value="maintenance">Maintenance / Entrance Improvements</option>
                        <option value="financial">Budget / Dues / Estoppel</option>
                        <option value="rules">Covenants / Rules & Regulations</option>
                        <option value="compliment">Compliment / Positive Feedback</option>
                        <option value="concern">Concern / Complaint</option>
                        <option value="help">I want to help!</option>
                        <option value="update">Name / Contact Info Update</option>
                        <option value="map">Lot Map Name Change</option>    
                        <option value="rsvp">Meeting RSVP (Enter number of attendees)</option>    
                        <option value="estoppel">Estoppel Request</option>    
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-control items-start flex">
                    <label class="label w-24"><span class="label-text">Message *</span></label>
                    <textarea name="message" placeholder="Message"class="textarea textarea-bordered @error('message') textarea-error @enderror" rows="4">{{ old('message') }}</textarea>
                </div>
                <div class="form-control">
                    <label class="label w-24 mb-2"><span class="label-text">Preferred Response Method *</span></label>
                    <div class="flex gap-4">
                        <label class="cursor-pointer">
                            <input type="radio" name="response_type" value="email" class="radio @error('response_type') text-error @enderror" {{ old('response_type') == 'email' ? 'checked' : '' }}>
                            <span class="ml-2">Email</span>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="response_type" value="none" class="radio @error('response_type') text-error @enderror" {{ old('response_type') == 'none' ? 'checked' : '' }}>
                            <span class="ml-2">None</span>
                        </label>
                    </div>
                </div>
                <div class="form-control">
                    <label class="cursor-pointer">
                        <input type="checkbox" name="acknowledge_tos" class="checkbox @error('acknowledge_tos') textarea-error @enderror" required>
                        <span class="ml-2">
                            I acknowledge the <span class="underline text-primary cursor-pointer hover:text-secondary px-0" onclick="tosModal.showModal()">terms of communication</span>
                        </span>
                        <dialog id="tosModal" class="modal">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Terms of Communication</h3>
                                <p class="py-4">
                                    I understand that all communications should remain respectful 
                                    and that the Board members are volunteers. To allow us time to 
                                    properly review and respond to all inquiries, we kindly ask that 
                                    you refrain from sending repeated messages. Responses may take a 
                                    few days. Thank you for your patience and understanding. 
                                </p>
                                <div class="modal-action">
                                    <button class="btn btn-primary" onclick="tosModal.close()">Close</button>
                                </div>
                            </div>
                    </label>
                </div>
                <div class="card-actions justify-center">
                    @if ($errors->any())
                        <div class="alert alert-error alert-soft">
                            <ul >
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
