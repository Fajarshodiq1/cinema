  @extends('layouts.app')
  @section('title')
      Booking Finished
  @endsection
  @section('content')
      <div class="h-[112px]">
          <x-nav />
      </div>
      <section id="Header" class="w-full max-w-[1280px] mx-auto px-5 lg:px-[52px] my-16">
          <div class="flex flex-col gap-16">
              <div class="flex flex-col items-center gap-1">
                  <p class="font-bold text-[32px] leading-[48px] capitalize text-black">View Your Booking</p>
                  <p class="text-black">Enter the booking code sent to your email to check the status of your booking.</p>
              </div>
              <main class="flex gap-8">
                  <form action="{{ route('front.check_booking_details') }}" method="POST"
                      class="flex flex-col sm:flex-row items-center justify-between w-full rounded-3xl lg:rounded-full p-10 lg:p-3 pl-8 gap-6 bg-white overflow-hidden">
                      @csrf
                      <label class="flex items-center gap-2 w-full">
                          <img src="{{ asset('assets/images/icons/receipt-black.svg') }}" class="w-8 h-8 flex shrink-0"
                              alt="icon">
                          <input type="text" name="booking_trx_id" id="bookingid"
                              class="w-full appearance-none outline-none font-semibold text-base sm:text-lg leading-[24px] sm:leading-[27px] placeholder:text-aktiv-black"
                              placeholder="Booking ID">
                      </label>
                      <div class="hidden sm:block h-12 border-[1.5px] border-[#E6E7EB]"></div>
                      <label class="flex items-center gap-2 w-full">
                          <img src="{{ asset('assets/images/icons/call-black.svg') }}" class="w-8 h-8 flex shrink-0"
                              alt="icon">
                          <input type="tel" name="phone" id="phone"
                              class="w-full appearance-none outline-none font-semibold text-base sm:text-lg leading-[24px] sm:leading-[27px] placeholder:text-aktiv-black"
                              placeholder="Phone No">
                      </label>
                      <button type="submit"
                          class="flex items-center shrink-0 gap-2 rounded-full py-4 px-8 bg-aktiv-orange w-full sm:w-auto justify-center">
                          <img src="{{ asset('assets/images/icons/search-normal.svg') }}" class="w-8 h-8 flex shrink-0"
                              alt="icon">
                          <span
                              class="font-semibold text-base sm:text-lg leading-[24px] sm:leading-[27px] text-white text-nowrap">View
                              My Booking</span>
                      </button>
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
      </script>
  @endpush
