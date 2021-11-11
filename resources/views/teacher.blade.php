@extends('layouts.app')

@section('content')
<h1 class="pb-6 text-3xl text-black">Dashboard</h1>
<table class="min-w-full bg-white ">
    <thead class="text-white bg-gray-800">
        <tr>
            {{-- <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Teacher</th> --}}
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Course</th>
            <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Schedule</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
        @forelse ($schedule as $data )
            <tr>
                {{-- <td class="w-1/3 px-4 py-3 text-left">{{$data->teacher->name}}</td> --}}
                <td class="w-1/3 px-4 py-3 text-left">{{$data->course->course_nm}}</td>
                <td class="w-1/3 px-4 py-3 text-left">{{date('F d, Y h:i:s A',strtotime($data->schedule))}}</td>
            </tr>   
        @empty
        <tr>
            <td class="w-1/3 px-4 py-3 text-left">Schedule Not Available</td>
        </tr>   
        @endforelse
    </tbody>
</table>
@endsection
