@extends('layouts.main')

@section('content')

    <div class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ asset('images/poster.jpg') }}" alt="poster" class="w-64 lg:w-96" width="24rem">
            </div>

            <div class="md:ml-24">
                <h2 class="text-4xl"> Film 1 </h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    <span class="ml-1">84%</span>
                    <span class="mx-2">|</span>
                    <span>10/06/2020</span>
                    <span class="mx-2">|</span>
                    <span>Action</span>
                </div>
                <p class="text-gray-300 mt-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur impedit molestiae alias nostrum cupiditate corrupti libero eaque quis.
                    Non sint saepe earum quae libero eveniet laborum consequatur deleniti et asperiores?Fuga veniam cum similique ratione tempora architecto hic!
                    Sunt repudiandae, temporibus repellendus doloribus tempore aut ipsam dolore doloremque quod odit obcaecati quidem? Sapiente nesciunt enim dolorum
                    maxime sequi, modi explicabo!
                </p>
            </div>
            
        </div>
    </div>

@endsection