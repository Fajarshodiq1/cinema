@extends('layouts.app')
@section('content')
    <div class="h-[112px] bg-white">
        <x-nav />
    </div>
    <h1 class="mt-5 font-bold text-3xl text-center">ALL FILMS</h1>
    <section class="w-full max-w-[1480px] mx-auto px-5 lg:px-[52px] mt-[100px]">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @forelse ($newWorkshops as $film)
                <a href="{{ route('front.details', $film->slug) }}" class="rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($film->thumbnail) }}" alt="Film Cover" class="w-full h-auto rounded-lg">
                    <div class="p-2 text-center">
                        <h2 class="text-lg font-semibold">{{ $film->name }}</h2>
                    </div>
                </a>
            @empty
                <p>Belum Ada Data Film</p>
            @endforelse

        </div>
    </section>
@endsection
