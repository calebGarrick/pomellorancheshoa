
<x-layout>
    <x-slot:title>
        About Us
    </x-slot:title>
    <div class="hero bg-base-200 rounded-xl my-4">
        <div class="hero-content flex-col lg:flex-row">
            <div>
                <h1 class="text-3xl font-bold mb-4">Our Community</h1>
                <p class="py-4">
                    Pomello Ranches is a rural / residential community located in Myakka City, Florida. 
                    The Pomello Ranches Homeowners Association is committed to preserving the quality of life in our
                    community. We work closely with residents to address concerns, enforce community guidelines, and    
                    maintain the aesthetic appeal of our neighborhood.
                </p>    
            </div>
            <img
            src="{{Vite::asset('resources/images/farm.jpg')}}"
            class="max-w-sm rounded-lg shadow-2xl"
            />
        </div>
    </div>

    <div class="flex w-full flex-col xl:flex-row mb-6 gap-6">
        <div class="card bg-base-100 rounded-box grid min-h-48 grow place-items-center px-12">
            <div class="card-body">
                <h1 class="card-title text-2xl font-bold">Our amenities</h1>
                <ul class="list-disc">
                    <li>Large, spacious lots with a true rural atmosphere</li>
                    <li>An equestrian and agricultural lifestyle</li>
                    <li>A strong respect for privacy and peaceful living</li>
                    <li>Neighbors who look out for one another</li>
                </ul>
            </div>
        </div>
        <div class="card bg-base-100 rounded-box grid min-h-48 grow place-items-center px-12">
            <div class="card-body">
                <h1 class=" card-title text-2xl font-bold">Our role as an HOA</h1>
                <ul class="list-disc">
                    <li>Maintain common areas and landscaping</li>
                    <li>Enforce community rules and regulations</li>
                    <li>Organize community events and activities</li>
                    <li>Manage the community budget and finances</li>
                    <li>Communicate with residents about important updates and news</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card bg-neutral text-white rounded-box grid max-h-140 min-h-98 grow place-items-center px-12">
        <h1 class="text-2xl font-bold">Your Board of Directors</h1>
        <p>Effective as of November 22, 2025, your HOA Board members are:</p>
        <ul class="list-disc">
            <li>President/Treasurer/Website Operations: 
                <a class="underline text-info cursor-pointer hover:text-secondary h-4 align-baseline" onclick="joeModal.showModal()">
                    Joe Ricciardi
                </a>
                <dialog id="joeModal" class="modal">
                    <div class="modal-box card text-black">
                        <div class="flex justify-between items-baseline mb-4">
                            <h3 class="font-bold text-lg mb-4">About Joe Ricciardi</h3>
                            <button class="btn btn-error btn-circle" type="button" onclick="joeModal.close()">
                                x
                            </button>
                        </div>
                        <p>
                            I'm Joe Ricciardi. I'm a resident here since 2021 
                            and currently serving on the HOA board. I've been 
                            self-employed since 1989, with a background in 
                            operations and financial management/loss prevention. 
                            Earlier in my career, I owned and operated four 
                            cellular phone retail stores under The Phone Zone, 
                            Inc. in Yonkers, Bedford Hills, Brewster (NY), and 
                            Skillman (NJ), which I sold in 2004. In 2009, I 
                            founded Velocity REOs, Inc., a nationwide company 
                            providing services for real estate professionals, 
                            supported by a network of over 2,300 field agents 
                            operating in more than 8,500 cities across the USA.

                            I bring this experience into my role on the board 
                            by focusing on organization, clear communication, 
                            and making sure things run efficiently and fairly for the community. 
                        </p>
                    </div>
                </dialog>
            </li>
            <li>Vice President: Karen McAllister</li>
            <li>Secretary: Lisa Blakeley</li>
            <li>Director: Camille Sarppraicone</li>
        </ul>
        <p class="mb-4">
            We are a volunteer board made up of your neighbors. We live here too, 
            and we are committed to following through on what we say we will do. 
            We are a peaceful, cooperative group dedicated to making our community 
            a safe and enjoyable place to live. We will always treat residents 
            with respect and kindness, and we kindly expect the same in return.
            For everyone’s privacy and comfort, we respectfully ask that you do 
            not come onto our personal properties with community concerns. 
            Please use the contact form or bring your questions to the upcoming 
            meetings, where they can be addressed properly.
        </p>
    </div>
</x-layout>