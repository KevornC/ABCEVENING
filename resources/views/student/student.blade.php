@extends('layouts.admin')

@section('content')
<h1 class="pb-6 text-3xl text-black">Students</h1>
<div class="flex">
    <div class="w-full">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">
            <livewire:studentlivewire />
        </section>
    </div>
</div>
@endsection
