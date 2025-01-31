@extends('layouts.app')
@section('title')
    Booking {{ $workshop->name }}
@endsection
@section('content')
    <div class="h-[112px]">
        <x-nav />
    </div>
    <section id="Content" class="w-full max-w-[1280px] mx-auto px-5 lg:px-[52px] mt-16 mb-[100px] overflow-x-hidden">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col items-center gap-1">
                <p class="font-bold text-2xl lg:text-[32px] leading-[48px] capitalize text-black">Booking Film</p>
                <div class="flex items-center gap-2 text-black">
                    <a class="last:font-semibold text-[12px] lg:text-xs">Homepage</a>
                    <span>></span>
                    <a class="last:font-semibold text-[12px] lg:text-xs">Film Details</a>
                    <span>></span>
                    <a class="last:font-semibold text-[12px] lg:text-xs">Booking Film</a>
                </div>
            </div>
            <main class="flex flex-col lg:flex-row gap-8">
                <section id="Sidebar" class="group flex flex-col w-full lg:w-[420px] h-fit rounded-3xl p-8 bg-white">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Film Details</h2>
                        <div class="thumbnail-container relative h-[240px] rounded-xl bg-[#D9D9D9] overflow-hidden">
                            <img src="{{ Storage::url($workshop->thumbnail) }}" class="w-full h-full object-cover"
                                alt="thumbnail">
                        </div>
                        <div class="card-detail flex flex-col gap-2">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-1">
                                    <img src="{{ asset('assets/images/icons/calendar-2.svg') }}"
                                        class="w-6 h-6 flex shrink-0" alt="icon">
                                    <span
                                        class="font-medium text-aktiv-grey text-xs md:text-base">{{ $workshop->started_at->format('M d, Y') }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <img src="{{ asset('assets/images/icons/timer.svg') }}" class="w-6 h-6 flex shrink-0"
                                        alt="icon">
                                    <span class="font-medium text-aktiv-grey text-xs md:text-base">
                                        {{ $workshop->time_at->format('h:i A') }} -
                                        Finish</span>
                                </div>
                            </div>
                            <h3 class="font-Neue-Plak-bold text-xl">{{ $workshop->name }}</h3>
                        </div>
                    </div>
                    <div id="closes-section"
                        class="accordion flex flex-col gap-8 transition-all duration-300 mt-8 group-has-[:checked]:mt-0 group-has-[:checked]:!h-0 overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Sutradara</h2>
                            <div class="flex items-center gap-3 rounded-xl border border-[#E6E7EB] p-4">
                                <div class="flex w-16 h-16 shrink-0 rounded-full overflow-hidden bg-[#D9D9D9]">
                                    <img src="{{ Storage::url($workshop->instructor->avatar) }}"
                                        class="w-full h-full object-cover" alt="photo">
                                </div>
                                <div class="flex flex-col gap-[2px] flex-1">
                                    <p class="font-semibold text-sm md:text-lg leading-[27px]">
                                        {{ $workshop->instructor->name }}</p>
                                    <p class="font-medium text-aktiv-grey">{{ $workshop->instructor->occupation }}</p>
                                </div>
                                <img src="{{ asset('assets/images/icons/verify.svg') }}"
                                    class="flex w-9 md:w-[62px] h-[62px] shrink-0" alt="icon">
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Telah Bekerjasama Dengan</h2>
                            @forelse ($workshop->benefits as $itemBenefit)
                                <div class="flex flex-col gap-6">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('assets/images/icons/tick-circle.svg') }}"
                                            class="w-6 h-6 flex shrink-0" alt="icon">
                                        <p class="font-semibold text-sm md:text-lg leading-[27px]">{{ $itemBenefit->name }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <p>Belum ada data benefit</p>
                            @endforelse
                        </div>
                    </div>
                    <label class="group mt-8">
                        <input type="checkbox" class="hidden">
                        <p
                            class="before:content-['Show_Less'] group-has-[:checked]:before:content-['Show_More'] before:font-semibold before:text-lg before:leading-[27px] flex items-center justify-center gap-[6px]">
                            <img src="{{ asset('assets/images/icons/arrow-up.svg') }}"
                                class="w-6 h-6 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
                        </p>
                    </label>
                </section>
                <form id="Form" method="POST" action="{{ route('front.booking_store', $workshop->slug) }}"
                    class="flex flex-col w-full max-w-[724px] gap-8 mx-auto px-4 sm:px-8">
                    @csrf
                    <!-- Secure Section -->
                    <div class="flex items-center rounded-3xl p-8 gap-4 bg-white">
                        <img src="{{ asset('assets/images/icons/shield-tick.svg') }}"
                            class="w-[62px] h-[62px] flex shrink-0" alt="icon">
                        <div class="flex flex-col gap-[2px]">
                            <p class="font-semibold text-[1rem] leading-[1.4]">Safe Security Pro Max+</p>
                            <p class="font-medium text-aktiv-grey text-sm">Don’t worry, your data will be kept private and
                                protected.</p>
                        </div>
                    </div>

                    <!-- Personal Information Section -->
                    <div class="flex flex-col rounded-3xl p-8 gap-4 bg-white">
                        <h2 class="font-Neue-Plak-bold text-xl sm:text-lg leading-[1.4]">Personal Information</h2>
                        <div class="flex flex-col gap-6">
                            <p
                                class="w-full border-l-[5px] border-aktiv-red py-4 px-3 bg-[linear-gradient(270deg,rgba(235,87,87,0)_0%,rgba(235,87,87,0.09)_100%)] font-semibold text-aktiv-red text-sm">
                                Please enter data correctly. We will send the order receipt to your email.</p>
                            <!-- Name Input -->
                            <label class="flex flex-col gap-4">
                                <p class="font-medium text-aktiv-grey text-sm">Full Name</p>
                                <div
                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                    <img src="{{ asset('assets/images/icons/profile-circle.svg') }}"
                                        class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                        alt="icon">
                                    <img src="{{ asset('assets/images/icons/profile-circle-black.svg') }}"
                                        class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                        alt="icon">
                                    <input type="text" name="name" id="name"
                                        class="appearance-none bg-transparent w-full outline-none text-xs sm:text-base leading-[1.4] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                        placeholder="Write your complete name" required>
                                </div>
                            </label>
                            <!-- Phone Input -->
                            <label class="flex flex-col gap-4">
                                <p class="font-medium text-aktiv-grey text-sm">Phone no.</p>
                                <div
                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                    <img src="{{ asset('assets/images/icons/call.svg') }}"
                                        class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                        alt="icon">
                                    <img src="{{ asset('assets/images/icons/call-black.svg') }}"
                                        class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                        alt="icon">
                                    <input type="tel" name="phone" id="phone"
                                        class="appearance-none bg-transparent w-full outline-none text-xs sm:text-base leading-[1.4] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                        placeholder="Give us your phone number" required>
                                </div>
                            </label>
                            <!-- Email Input -->
                            <label class="flex flex-col gap-4">
                                <p class="font-medium text-aktiv-grey text-sm">Email Address</p>
                                <div
                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                    <img src="{{ asset('assets/images/icons/sms.svg') }}"
                                        class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                        alt="icon">
                                    <img src="{{ asset('assets/images/icons/sms-black.svg') }}"
                                        class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                        alt="icon">
                                    <input type="email" name="email" id="email"
                                        class="appearance-none bg-transparent w-full outline-none text-xs sm:text-base leading-[1.4] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                        placeholder="Write your email address" required>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Workshop Price Section -->
                    <div class="flex flex-col rounded-3xl p-8 gap-8 bg-white">
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-lg leading-[1.4]">Price</h2>
                            <div class="flex items-center justify-between gap-x-2">
                                <div class="flex items-center gap-[6px]">
                                    <p class="font-bold text-2xl lg:text-[32px] leading-[48px] text-aktiv-red">
                                        {{ number_format($workshop->price, 0, '.', ',') }}</p>
                                    <p class="font-semibold text-aktiv-grey text-sm">/person</p>
                                </div>
                                <div
                                    class="counter relative flex items-center w-fit rounded-lg border border-[#E6E7EB] p-2 lg:p-3 gap-2 lg:gap-3">
                                    <button type="button" id="decrement" class="lg:w-6 lg:h-6">
                                        <img src="{{ asset('assets/images/icons/minus.svg') }}" alt="icon">
                                    </button>
                                    <p id="quantity" class="font-semibold text-sm lg:text-xl leading-[30px] w-fit">1</p>
                                    <input type="number" name="quantity" id="quantity_input"
                                        class="absolute top-0 left-1/2 opacity-0 -z-10" value="1">
                                    <button type="button" id="increment" class="increment w-6 h-6">
                                        <img src="{{ asset('assets/images/icons/add.svg') }}" alt="icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">
                                Attendants Details
                            </h2>
                            <div id="Attendants-Section" class="flex flex-col gap-6">
                                <div class="attendant-wrapper flex flex-col gap-[10px]">
                                    <div id="Attendant-1"
                                        class="group/accordion peer flex flex-col rounded-2xl border border-[#E6E7EB] p-6 has-[.invalid]:text-aktiv-black has-[.invalid]:has-[:checked]:border-aktiv-red has-[.invalid]:border-aktiv-grey has-[.invalid]:has-[:checked]:text-aktiv-red transition-all duration-300">
                                        <label class="relative flex items-center justify-between">
                                            <p class="font-semibold text-lg leading-[27px]">
                                                Attendants 1
                                            </p>
                                            <input type="checkbox" name="accodion" class="hidden" />
                                            <img src="{{ asset('assets/images/icons/arrow-square-up.svg') }}"
                                                class="absolute right-0 top-1/2 transform -translate-y-1/2 w-6 h-6 transition-all duration-300 opacity-100 group-has-[:checked]/accordion:rotate-180 group-has-[.invalid]/accordion:group-has-[:checked]/accordion:opacity-0"
                                                alt="icon" />
                                            <img src="{{ asset('assets/images/icons/arrow-square-down-red.svg') }}"
                                                class="absolute right-0 top-1/2 transform -translate-y-1/2 w-6 h-6 transition-all duration-300 opacity-0 group-has-[.invalid]/accordion:group-has-[:checked]/accordion:opacity-100"
                                                alt="icon" />
                                        </label>
                                        <div
                                            class="accordion flex flex-col gap-6 mt-6 transition-all duration-300 group-has-[:checked]/accordion:!h-0 group-has-[:checked]/accordion:mt-0 overflow-y-hidden">
                                            <hr class="border-[#E6E7EB]" />
                                            <label class="flex flex-col gap-4">
                                                <p class="font-medium text-aktiv-grey">Full Name</p>
                                                <div
                                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                                    <img src="{{ asset('assets/images/icons/profile-circle.svg') }}"
                                                        class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                                        alt="icon" />
                                                    <img src="{{ asset('assets/images/icons/profile-circle-black.svg') }}"
                                                        class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                                        alt="icon" />
                                                    <input type="text" name="participants[0][name]"
                                                        class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                                        placeholder="Write your complete name" />
                                                </div>
                                            </label>
                                            <label class="flex flex-col gap-4">
                                                <p class="font-medium text-aktiv-grey">Occupation</p>
                                                <div
                                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                                    <img src="{{ asset('assets/images/icons/briefcase.svg') }}"
                                                        class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                                        alt="icon" />
                                                    <img src="{{ asset('assets/images/icons/briefcase-black.svg') }}"
                                                        class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                                        alt="icon" />
                                                    <input type="text" name="participants[0][occupation]"
                                                        class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                                        placeholder="Attendant Status" />
                                                </div>
                                            </label>
                                            <label class="flex flex-col gap-4">
                                                <p class="font-medium text-aktiv-grey">
                                                    Email Address
                                                </p>
                                                <div
                                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                                    <img src="{{ asset('assets/images/icons/sms.svg') }}"
                                                        class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                                        alt="icon" />
                                                    <img src="{{ asset('assets/images/icons/sms-black.svg') }}"
                                                        class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                                        alt="icon" />
                                                    <input type="email" name="participants[0][email]"
                                                        class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                                        placeholder="Attendant Email Address" />
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <span class="hidden font-medium text-aktiv-red peer-has-[.invalid]:block">Please fill
                                        in the attendant’s data before
                                        proceeding.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Details Section -->
                    <div class="flex flex-col rounded-3xl p-8 gap-8 bg-white">
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-sm sm:text-lg leading-[1.4]">Payments Details</h2>
                            <div class="flex flex-col rounded-xl border border-[#E6E7EB] p-6 gap-4">
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey text-sm">Quantity</p>
                                    <p id="display_quantity"
                                        class="font-semibold text-sm sm:text-base leading-[1.4] text-right"></p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey text-sm">Price</p>
                                    <p id="sub_total" class="font-semibold text-sm sm:text-base leading-[1.4] text-right">
                                    </p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey text-sm">PPN 11%</p>
                                    <p id="tax" class="font-semibold text-sm sm:text-base leading-[1.4] text-right">
                                    </p>
                                </div>
                                <hr class="border-[#E6E7EB]">
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey text-sm">Total Price</p>
                                    <p id="total_amount"
                                        class="font-semibold text-sm sm:text-base leading-[1.4] text-right text-aktiv-red">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="workshopPrice" id="workshopPrice" value="{{ $workshop->price }}">
                        <button type="submit"
                            class="w-full rounded-xl h-16 px-6 text-center bg-aktiv-orange font-semibold text-sm sm:text-base leading-[1.4] text-white">Pay
                            Now</button>
                    </div>
                </form>

            </main>
        </div>
    </section>
@endsection

@push('after-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Function to calculate and set heights of accordions
            function calculateAccordionHeights() {
                const accordions = document.querySelectorAll('.accordion');

                accordions.forEach((accordion) => {
                    // Calculate the height of each accordion element
                    const height = accordion.scrollHeight;

                    // Set the height as an inline style
                    accordion.style.height = `${height}px`;
                });
            }

            // Initial calculation when the DOM is fully loaded
            calculateAccordionHeights();

            // Recalculate when a new participant is added
            document.addEventListener('newParticipantAdded', () => {
                calculateAccordionHeights();
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            const decrementButton = document.querySelector("#decrement");
            const incrementButton = document.querySelector("#increment");
            const countDisplay = document.querySelector("#quantity");
            const hiddenInput = document.querySelector("#quantity_input");

            // Payment details elements
            const displayQuantity = document.getElementById("display_quantity");
            const priceDisplay = document.getElementById("sub_total");
            const taxDisplay = document.getElementById("tax");
            const totalPriceDisplay = document.getElementById("total_amount");
            const workshopPrice = document.getElementById("workshopPrice");

            const participantsSection = document.getElementById("Attendants-Section");

            // Constants
            const unitPrice = workshopPrice.value; // Price per item
            const ppnRate = 0.11; // PPN rate (11%)

            function updatePaymentDetails(count) {
                const price = unitPrice * count;
                const ppn = Math.round(price * ppnRate);
                const totalPrice = price + ppn;

                displayQuantity.textContent = count;
                priceDisplay.textContent = `Rp${price.toLocaleString("id-ID")}`;
                taxDisplay.textContent = `Rp${ppn.toLocaleString("id-ID")}`;
                totalPriceDisplay.textContent = `Rp${totalPrice.toLocaleString(
            "id-ID"
        )}`;
            }

            // Add a new participant form group
            function addParticipant() {
                const participantCount =
                    participantsSection.querySelectorAll(".attendant-wrapper").length;
                const newParticipantHTML = `
            <div class="attendant-wrapper flex flex-col gap-[10px]">
                <div id="Attendant-${
                    participantCount + 1
                }" class="group/accordion peer flex flex-col rounded-2xl border border-[#E6E7EB] p-6 has-[.invalid]:text-aktiv-black has-[.invalid]:has-[:checked]:border-aktiv-red has-[.invalid]:border-aktiv-grey has-[.invalid]:has-[:checked]:text-aktiv-red transition-all duration-300">
                    <label class="relative flex items-center justify-between">
                        <p class="font-semibold text-lg leading-[27px]">Attendants ${
                            participantCount + 1
                        }</p>
                        <input type="checkbox" name="accodion" class="hidden">
                        <img src="http://127.0.0.1:8000/assets/images/icons/arrow-square-up.svg" class="absolute right-0 top-1/2 transform -translate-y-1/2 w-6 h-6 transition-all duration-300 opacity-100 group-has-[:checked]/accordion:rotate-180 group-has-[.invalid]/accordion:group-has-[:checked]/accordion:opacity-0" alt="icon">
                        <img src="http://127.0.0.1:8000/assets/images/icons/arrow-square-down-red.svg" class="absolute right-0 top-1/2 transform -translate-y-1/2 w-6 h-6 transition-all duration-300 opacity-0 group-has-[.invalid]/accordion:group-has-[:checked]/accordion:opacity-100" alt="icon">
                    </label>
                    <div class="accordion flex flex-col gap-6 mt-6 transition-all duration-300 group-has-[:checked]/accordion:!h-0 group-has-[:checked]/accordion:mt-0 overflow-y-hidden">
                        <hr class="border-[#E6E7EB]">
                        <label class="flex flex-col gap-4">
                            <p class="font-medium text-aktiv-grey">Full Name</p>
                            <div class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                <img src="http://127.0.0.1:8000/assets/images/icons/profile-circle.svg" class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden" alt="icon">
                                <img src="http://127.0.0.1:8000/assets/images/icons/profile-circle-black.svg" class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex" alt="icon">
                                <input type="text" name="participants[${participantCount}][name]" class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey" placeholder="Write your complete name" required>
                            </div>
                        </label>
                        <label class="flex flex-col gap-4">
                            <p class="font-medium text-aktiv-grey">Occupation</p>
                            <div class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                <img src="http://127.0.0.1:8000/assets/images/icons/briefcase.svg" class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden" alt="icon">
                                <img src="http://127.0.0.1:8000/assets/images/icons/briefcase-black.svg" class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex" alt="icon">
                                <input type="text" name="participants[${participantCount}][occupation]" class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey" placeholder="Attendant Status" required>
                            </div>
                        </label>
                        <label class="flex flex-col gap-4">
                            <p class="font-medium text-aktiv-grey">Email Address</p>
                            <div class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                <img src="http://127.0.0.1:8000/assets/images/icons/sms.svg" class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden" alt="icon">
                                <img src="http://127.0.0.1:8000/assets/images/icons/sms-black.svg" class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex" alt="icon">
                                <input type="email" name="participants[${participantCount}][email]" class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey" placeholder="Attendant Email Address" required>
                            </div>
                        </label>
                    </div>
                </div>
                <span class="hidden font-medium text-aktiv-red peer-has-[.invalid]:block">Please fill in the attendant’s data before proceeding.</span>
            </div>
        `;
                participantsSection.insertAdjacentHTML("beforeend", newParticipantHTML);

                // Dispatch a custom event after adding a new participant
                const event = new Event("newParticipantAdded");
                document.dispatchEvent(event);
            }

            // Remove the last participant form group
            function removeParticipant() {
                const participantCount =
                    participantsSection.querySelectorAll(".attendant-wrapper").length;
                if (participantCount > 1) {
                    participantsSection.removeChild(
                        participantsSection.lastElementChild
                    );
                }
            }

            decrementButton.addEventListener("click", () => {
                let count = parseInt(countDisplay.textContent);
                if (count > 1) {
                    count--;
                    countDisplay.textContent = count;
                    hiddenInput.value = count;
                    removeParticipant();
                    updatePaymentDetails(count);
                }
            });

            incrementButton.addEventListener("click", () => {
                let count = parseInt(countDisplay.textContent);
                count++;
                countDisplay.textContent = count;
                hiddenInput.value = count;
                addParticipant();
                updatePaymentDetails(count);
            });

            // Initialize the payment details on page load
            updatePaymentDetails(parseInt(countDisplay.textContent));
        });

        document.addEventListener("DOMContentLoaded", function() {
            const payButton = document.querySelector('button[type="submit"]');

            if (payButton) {
                payButton.addEventListener("click", function(event) {
                    // event.preventDefault(); // Prevent form submission for demo purposes

                    let isValid = true;

                    // Select all inputs inside the form
                    const inputs = document.querySelectorAll(".input-wrapper input");

                    inputs.forEach((input) => {
                        const wrapper = input.closest(".input-wrapper");

                        // Reset previous validation states
                        wrapper.classList.remove("invalid");

                        // Example validation: check if input is empty
                        if (!input.checkValidity()) {
                            wrapper.classList.add("invalid");
                            isValid = false;
                        }

                        // You can add more specific validation checks here
                    });

                    if (isValid) {
                        console.log("Form is valid and ready to submit!");
                    } else {
                        console.log("Please fill out all required fields.");
                    }
                });
            } else {
                console.log("Pay Now button not found");
            }
        });
    </script>
@endpush
