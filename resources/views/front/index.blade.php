@extends('layouts.app')

@section('content')
    <div class="h-[112px] bg-white">
        <x-nav />
    </div>
    <section class="relative w-full h-screen">
        <div class="swiper-container w-full h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex items-center justify-center bg-cover bg-center h-full"
                    style="background-image: url('https://asset.tix.id/microsite_v2/22f0e954-f680-4a6b-8a21-afae9d78520e.webp')">
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.swiper-container', {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
    {{-- <section class="py-24 relative w-full max-w-[1280px] mx-auto px-5 lg:px-[52px] z-10">
        <div class="flex flex-col gap-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <h2
                    class="font-['Neue_Plak_bold'] text-xl sm:text-2xl lg:text-[32px] leading-[30px] sm:leading-[38px] lg:leading-[44.54px] capitalize">
                    Why choose 🌟 <br class="hidden md:block"> Mindfuel?
                </h2>
            </div>
            <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
                <div class="w-full justify-start items-center gap-12 grid lg:grid-cols-2 grid-cols-1">
                    <div
                        class="w-full justify-center items-start gap-6 grid sm:grid-cols-2 grid-cols-1 lg:order-first order-last">
                        <div class="pt-24 lg:justify-center sm:justify-end justify-start items-start gap-2.5 flex">
                            <img class=" rounded-xl object-cover"
                                src="https://plus.unsplash.com/premium_photo-1679547202440-356042e564a3?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="about Us image" />
                        </div>
                        <img class="sm:ml-0 ml-auto rounded-xl object-cover"
                            src="https://plus.unsplash.com/premium_photo-1661326274569-dd8337c5e6cf?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="about Us image" />
                    </div>
                    <div class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex">
                        <div class="w-full flex-col justify-center items-start gap-8 flex">
                            <div class="w-full flex-col justify-start lg:items-start items-center gap-3 flex">
                                <h2
                                    class="text-gray-900 text-4xl font-bold font-manrope leading-normal lg:text-start text-center">
                                    Lorem ipsum dolor sit amet.</h2>
                                <p class="text-gray-500 text-base font-normal leading-relaxed lg:text-start text-center">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit odit sed dolor provident
                                    facilis beatae, error, architecto atque distinctio ipsa quo quidem voluptatibus aliquid
                                    dolore officia inventore asperiores nostrum veritatis impedit pariatur quod sequi!
                                    Officiis odit laudantium consectetur, delectus fugit mollitia id tenetur rerum non
                                    voluptas ea tempore, voluptate dolorum?</p>
                            </div>
                            <div class="w-full lg:justify-start justify-center items-center sm:gap-10 gap-5 inline-flex">
                                <div class="flex-col justify-start items-start inline-flex">
                                    <h3 class="text-gray-900 text-4xl font-bold font-manrope leading-normal">33+</h3>
                                    <h6 class="text-gray-500 text-base font-normal leading-relaxed">Years of Experience</h6>
                                </div>
                                <div class="flex-col justify-start items-start inline-flex">
                                    <h4 class="text-gray-900 text-4xl font-bold font-manrope leading-normal">125+</h4>
                                    <h6 class="text-gray-500 text-base font-normal leading-relaxed">Successful Projects</h6>
                                </div>
                                <div class="flex-col justify-start items-start inline-flex">
                                    <h4 class="text-gray-900 text-4xl font-bold font-manrope leading-normal">52+</h4>
                                    <h6 class="text-gray-500 text-base font-normal leading-relaxed">Happy Clients</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <section id="Categories" class="w-full max-w-[1280px] mx-auto px-5 lg:px-[52px] mt-[100px]">
        <div class="flex flex-col gap-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <h2
                    class="font-['Neue_Plak_bold'] text-xl sm:text-2xl lg:text-[32px] leading-[30px] sm:leading-[38px] lg:leading-[44.54px] capitalize">
                    We have several 🌟 <br class="hidden md:block"> workshop categories
                </h2>
            </div>
            <!-- Categories Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($categories as $itemCategory)
                    <a href="{{ route('front.category', $itemCategory->slug) }}" class="card hover:shadow-lg transition">
                        <div class="flex items-center h-full rounded-3xl p-5 gap-3 bg-white">
                            <img src="{{ Storage::url($itemCategory->icon) }}" class="w-[56px] h-[56px] flex-shrink-0"
                                alt="icon">
                            <div class="flex flex-col gap-1 overflow-hidden">
                                <h3 class="font-semibold text-lg sm:text-xl leading-[24px] sm:leading-[27px] break-words">
                                    {{ $itemCategory->name }}
                                </h3>
                                <p class="font-medium text-sm sm:text-base text-aktiv-grey">{{ $itemCategory->tagline }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center text-aktiv-grey">Belum ada data category</p>
                @endforelse
            </div>
        </div>
    </section> --}}

    {{-- <section id="Trending" class="w-full max-w-[1480px] mx-auto px-5 lg:px-[52px] mt-[100px]">
        <div class="flex flex-col gap-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <h2
                    class="font-['Neue_Plak_bold'] text-[20px] sm:text-[24px] lg:text-[32px] leading-[30px] sm:leading-[38px] lg:leading-[44.54px] capitalize">
                    Now Showing in Cinemas🔥</h2>
            </div>
            <!-- Workshops Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($newWorkshops as $itemNewWorkshop)
                    <a href="{{ route('front.details', $itemNewWorkshop->slug) }}" class="card hover:shadow-lg transition">
                        <div class="flex flex-col h-full justify-between rounded-3xl p-6 gap-6 bg-white">
                            <!-- Instructor Details -->
                            <div class="flex items-center gap-3">
                                <div class="w-16 h-16 rounded-full overflow-hidden">
                                    <img src="{{ Storage::url($itemNewWorkshop->instructor->avatar) }}"
                                        class="w-full h-full object-cover" alt="avatar">
                                </div>
                                <div class="flex flex-col gap-1">
                                    <p class="font-semibold text-base md:text-lg leading-[27px]">
                                        {{ $itemNewWorkshop->instructor->name }}</p>
                                    <p class="font-medium text-sm md:text-base text-aktiv-grey">
                                        {{ $itemNewWorkshop->instructor->occupation }}
                                    </p>
                                </div>
                            </div>
                            <!-- Workshop Thumbnail -->
                            <div class="relative h-[200px] rounded-xl bg-[#D9D9D9] overflow-hidden">
                                <img src="{{ Storage::url($itemNewWorkshop->thumbnail) }}"
                                    class="w-full h-full object-cover" alt="thumbnail">
                                @if ($itemNewWorkshop->is_open)
                                    <div
                                        class="absolute top-3 left-3 flex items-center rounded-full py-2 px-4 gap-2 text-white z-10
                                    {{ $itemNewWorkshop->has_started ? 'bg-aktiv-orange' : 'bg-aktiv-green' }}">
                                        <img src="{{ asset($itemNewWorkshop->has_started ? 'assets/images/icons/timer-start.svg' : 'assets/images/icons/medal-star.svg') }}"
                                            class="w-6 h-6" alt="icon">
                                        <span class="font-semibold text-sm md:text-base">
                                            {{ $itemNewWorkshop->has_started ? 'STARTED' : 'OPEN' }}
                                        </span>
                                    </div>
                                @else
                                    <div
                                        class="absolute top-3 left-3 flex items-center rounded-full py-2 px-4 gap-2 bg-aktiv-red text-white z-10">
                                        <img src="{{ asset('assets/images/icons/sand-timer.svg') }}" class="w-6 h-6"
                                            alt="icon">
                                        <span class="font-semibold">CLOSED</span>
                                    </div>
                                @endif
                            </div>
                            <!-- Workshop Details -->
                            <div class="flex flex-col gap-3">
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('assets/images/icons/calendar-2.svg') }}"
                                            class="w-3 md:w-5 h-3 md:h-5" alt="icon">
                                        <span class="font-medium text-aktiv-grey text-xs md:text-base">
                                            {{ $itemNewWorkshop->started_at->format('M d, Y') }}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('assets/images/icons/timer.svg') }}"
                                            class="w-3 md:w-5 h-3 md:h-5" alt="icon">
                                        <span class="font-medium text-aktiv-grey text-xs md:text-base">
                                            {{ $itemNewWorkshop->time_at->format('h:i A') }}
                                        </span>
                                    </div>
                                </div>
                                <h3 class="font-semibold text-xl leading-6 line-clamp-2 hover:line-clamp-none transition">
                                    {{ $itemNewWorkshop->name }}
                                </h3>
                                <p class="font-medium text-aktiv-grey text-sm md:text-base">
                                    {{ $itemNewWorkshop->category->name }}</p>
                            </div>
                            <!-- Pricing -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="font-semibold text-2xl leading-8 text-aktiv-red">Rp
                                        {{ number_format($itemNewWorkshop->price, 0, '.', ',') }}</p>
                                    <p class="font-medium text-aktiv-grey">/person</p>
                                </div>
                                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" class="w-10 h-10"
                                    alt="icon">
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center text-aktiv-grey">Belum ada data workshop terbaru</p>
                @endforelse
            </div>
        </div>
    </section> --}}

    <section class="w-full max-w-[1480px] mx-auto px-5 lg:px-[52px] mt-[100px]">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @forelse ($newWorkshops as $itemNewWorkshop)
                <a href="{{ route('front.details', $itemNewWorkshop->slug) }}" class="rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($itemNewWorkshop->thumbnail) }}" alt="Film Cover"
                        class="w-full h-auto rounded-lg">
                    <div class="p-2 text-center">
                        <h2 class="text-lg font-semibold">{{ $itemNewWorkshop->name }}</h2>
                    </div>
                </a>
            @empty
                <p>Belum Ada Data Film</p>
            @endforelse

        </div>
    </section>
    <section class="antialiased text-gray-900">
        <div class="bg-gray-200 max-w-[1480px] p-8 flex flex-col items-center">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Foods & Drinks</h1>
            <div class="flex flex-col md:flex-row items-center gap-10">
                @forelse ($products as $product)
                    <div class="bg-white rounded-lg overflow-hidden shadow-2xl md:w-1/3 sm:w-1/2">
                        <img class="h-48 w-full object-cover object-end" src="{{ Storage::url($product->thumbnail) }}"
                            alt="Home in Countryside" />
                        <div class="p-6">
                            <div class="flex items-baseline">
                                <span
                                    class="inline-block bg-teal-200 text-teal-800 py-1 px-4 text-xs rounded-full uppercase font-semibold tracking-wide">New</span>
                            </div>
                            <h4 class="mt-2 font-semibold text-lg leading-tight truncate">{{ $product->name }}</h4>
                            <div class="my-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                                {{ $product->about }}
                            </div>
                            <div class="mt-1">
                                <span>Rp. {{ $product->price }}</span>
                            </div>
                            <button class="mt-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700"
                                onclick="openModal('{{ $product->id }}', '{{ $product->name }}')">
                                Beli
                            </button>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-700">Makanan Belum Tersedia</p>
                @endforelse
            </div>
        </div>
        <div id="orderModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-semibold mb-4">Form Pembelian</h2>
                <form id="orderForm" action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id">

                    <label class="block mb-2">Nama Produk:</label>
                    <input type="text" id="product_name" class="w-full p-2 border rounded-lg bg-gray-200" disabled>

                    <label class="block mt-4">Nama Anda:</label>
                    <input type="text" name="name" class="w-full p-2 border rounded-lg" required>

                    <label class="block mt-4">Jumlah Pesanan:</label>
                    <input type="number" name="quantity" class="w-full p-2 border rounded-lg" required min="1">

                    <label class="block mt-4">Email:</label>
                    <input type="email" name="email" class="w-full p-2 border rounded-lg" required>

                    <div class="flex justify-end mt-4">
                        <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 mr-2"
                            onclick="closeModal()">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <footer class="w-full p-[52px] bg-white hidden lg:block">
        <div class="flex flex-col w-full max-w-[1176px] mx-auto gap-8">
            <div class="flex flex-col items-center gap-4">
                <h1 class="text-3xl font-bold text-center">CINEMAGUNDAR</h1>
            </div>
            <hr class="border-[#E6E7EB]">
            <div class="grid lg:grid-cols-3 items-center">
                <p class="font-medium text-aktiv-grey hidden lg:flex">© 2024 Cinemagundar Copyright</p>
                <ul class="flex flex-col lg:flex-row items-center justify-center gap-6">
                    <li
                        class="font-medium text-aktiv-grey text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                        <a href="{{ route('front.film') }}">Film</a>
                    </li>
                    <li
                        class="font-medium text-aktiv-grey text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                        <a href="{{ route('front.check_booking') }}">Book</a>
                    </li>
                </ul>
                <ul class="flex flex-col items-center justify-end gap-6 mt-5">
                    <li
                        class="font-medium text-aktiv-grey text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                        <a href="#">Instagram</a>
                    </li>
                    <li
                        class="font-medium text-aktiv-grey text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                        <a href="#">Twitter</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
@endsection

@push('after-scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        function openModal(productId, productName) {
            document.getElementById('product_id').value = productId;
            document.getElementById('product_name').value = productName;
            document.getElementById('orderModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('orderModal').classList.add('hidden');
        }
        // Jika ada notifikasi sukses, tetap buka modal dan sembunyikan dalam 3 detik
        window.onload = function() {
            let successMessage = document.getElementById('successMessage');
            if (successMessage) {
                document.getElementById('orderModal').classList.remove('hidden');
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        };
    </script>
@endpush
