<x-layout>
    <x-slot:title>
        Projects
    </x-slot:title>
    <div class="card bg-base-100 border border-base-300 p-4 mb-4">
        <div class="card-title font-semibold text-2xl">Present Projects</div>
        <div class="card-content text-sm flex flex-col gap-1 m-4">
            <h2 class="text-lg font-bold underline">Main Entrances/Roads</h2>
            <div class="px-2 gap-1 flex flex-col">
                <p>
                    In the coming weeks, the HOA will begin collecting bids for the following projects:
                    <ul class="list-disc px-6">
                        <li>
                            Enhancing the appearance of both main entrances on 65th Street and 69th Street
                        </li>
                        <li>
                            Clearing and trimming overgrown vegetation along the community roadways, with 
                            particular attention given to the increasing presence of 
                            <a onclick="pepperModal.showModal()" class="link link-primary">Brazilian pepper trees</a>
                            <dialog id="pepperModal" class="modal">
                                <div class="modal-box card gap-4">
                                    <div>
                                        <div class="flex justify-between items-baseline">
                                            <h3 class="font-bold text-lg mb-4">Brazilian Pepper Tree (Schinus terebinthifolia)</h3>
                                            <button class="btn btn-error btn-circle" type="button" onclick="pepperModal.close()">
                                                x
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex flex-row gap-4 flex-wrap justify-center mb-2">
                                            <img
                                                src="{{Vite::asset('resources/images/peppers.jpg')}}"
                                                alt="Brazilian Pepper Tree"
                                                class="rounded-lg"
                                            />
                                        </div>
                                        <p>
                                            Brazilian pepper trees are an invasive species known for their rapid growth and 
                                            ability to outcompete native vegetation. They can pose challenges to local ecosystems 
                                            and may require specialized removal techniques.
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-lg underline">
                                            What it is
                                        </p>
                                        <ul class="list-disc mx-4 mt-1">
                                            <li>Evergreen shrub/small tree, often multi-stemmed, forming dense growth.</li>
                                            <li>Shiny green compound leaves, small white flowers, and clusters of bright red berries (“drupes”).</li>
                                            <li>Belongs to the cashew/sumac family (Anacardiaceae).</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <p class="text-lg underline">
                                            Native range & where it shows up
                                        </p>
                                        <ul class="list-disc mx-4 mt-1">
                                            <li>Native to: Brazil, Argentina, and Paraguay.</li>
                                            <li>Introduced as an ornamental in places like Florida and spread widely.</li>
                                            <li>Now found in multiple warm regions (including parts of Florida, Texas, California, and Hawaii).</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <p class="text-lg underline">
                                            Why it’s a problem (invasive impacts)
                                        </p>
                                        <ul class="list-disc mx-4 mt-1">
                                            <li>Creates dense thickets that shade out and displace native plants.</li>
                                            <li>They develop aggressive root systems that monopolize: Water, nutrients and soil space.</li>
                                            <li>Can reduce biodiversity and alter natural habitats.</li>
                                            <li>Seeds are widely spread by birds and other animals.</li>
                                            <li>Resprouts strongly from cut stumps/roots, making it hard to eliminate once established.</li>
                                            <li>It releasing chemicals (allelochemicals) that stop other plants from growing, all while thriving in disturbed areas and harming native wildlife habitats.</li>
                                            <li>Brazilian pepper trees can effectively “strangle” other plants.</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <p class="text-lg underline">
                                            Identification tips
                                        </p>
                                        <ul class="list-disc mx-4 mt-1">
                                            <li>Bright red berries in clusters (often noticeable in cooler months).</li>
                                            <li>Leaves are compound (multiple leaflets on one stem) and typically glossy green.</li>
                                            <li>Often forms thick, tangled stands rather than a neat single-trunk tree.</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <p class="text-lg underline">
                                            Health & safety notes
                                        </p>
                                        <ul class="list-disc mx-4 mt-1">
                                            <li>Sap/leaves can irritate skin in sensitive people (similar to other plants in the sumac family).</li>
                                            <li>Use gloves/eye protection when cutting or handling, and avoid burning debris.</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <p class="text-lg underline">
                                            Control & management (high level)
                                        </p>
                                        <ul class="list-disc mx-4 mt-1">
                                            <li>Small plants: pull seedlings when soil is moist; keep monitoring for regrowth.</li>
                                            <li>Larger plants: cutting alone often leads to regrowth—stump treatment is commonly used in management programs.</li>
                                            <li>Integrated approach: repeated removal + targeted treatments + follow-up is usually necessary.</li>
                                        </ul>
                                    </div>
                                </div>
                            </dialog>
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
    <div class="card bg-base-100 border border-base-300 p-4 mb-4">
        <div class="card-title font-semibold text-2xl">Completed Projects</div>
        <div class="card-content text-sm flex flex-col gap-1 m-4">
            <div>
                <h2 class="text-lg font-bold underline">December 2025</h2>
                <div class="px-2 gap-1 flex flex-col">
                    <p>
                        The 
                        <a onclick="curbModal.showModal()" class="cursor-pointer text-primary hover:text-secondary">curbing</a> 
                        at both entrances has been freshly repainted by our Board members — at no cost to the community!</a>
                    </p>
                    <dialog id="curbModal" class="modal">
                        <div class="modal-box card gap-4">
                            <div class="flex justify-between items-baseline mb-4">
                                <h3 class="font-bold text-lg mb-4">Curb Painting Project</h3>
                                <button class="btn btn-error btn-circle" type="button" onclick="curbModal.close()">
                                    x
                                </button>
                            </div>
                            <div class="flex flex-row gap-4 flex-wrap justify-center">
                                <img
                                    src="{{Vite::asset('resources/images/curb65.jpg')}}"
                                    alt="Curb After Painting"
                                    class="rounded-lg mb-4"
                                />
                                <img
                                    src="{{Vite::asset('resources/images/curb69.jpg')}}"
                                    alt="Curb After Painting"
                                    class="rounded-lg mb-4"
                                />
                            </div>
                        </div>
                    </dialog>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-base-100 border border-base-300 p-4 mb-4">
        <div class="card-title font-semibold text-2xl">Delayed Projects</div>
        <div class="card-content text-sm flex flex-col gap-1 m-4">
            <div>
                <h2 class="text-lg font-bold underline">Road Repaving Update – County Response</h2>
                <div class="px-2 gap-1 flex flex-col">
                    <p>
                        The Pomello Ranches Homeowners Association recently contacted 
                        <b>Manatee County</b> to request information regarding the possibility of 
                        repaving our community roads.
                    </p>
                    <p>
                        The County reviewed the request and provided the following response:
                    </p>
                    <p class="italic text-sm">
                        “Service Request closed. Thank you for contacting Manatee County. Last paving 
                        appears to have occurred in the 1990s. While no paving is currently planned, 
                        these sections of roadway are candidates for possible inclusion in potential future 
                        resurfacing projects.”
                    </p>
                    <p>
                        Based on this response, 
                        <b>Manatee County has no current plans to repave our roads in the near future</b>. 
                        While the roads have been identified as possible candidates for future resurfacing, 
                        no timeline or commitment has been provided.
                    </p>
                    <p>
                        The Board believes it is important to keep homeowners informed of these efforts and outcomes. We will continue to monitor the situation and pursue any reasonable opportunities to advocate for improvements on behalf of the community.
                    </p>
                </div>
                <h2 class="font-bold mt-4">How You Can Help</h2>
                <div class="px-2 gap-1 flex flex-col">
                    Homeowners who wish to share their concerns or opinions may 
                    contact Manatee County directly by dialing 311 or 941-708-7450. 
                    Constructive feedback from residents is always encouraged and may help 
                    bring additional attention to our community’s needs.
                </div>
            </div>
        </div>
    </div>
</x-layout>