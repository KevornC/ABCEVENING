@extends('layouts.admin')

@section('content')
<h1 class="pb-6 text-3xl text-black">Dashboard</h1>
<table class="min-w-full bg-white ">
    <thead class="text-white bg-gray-800">
        <tr>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Total Teachers</th>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Total Courses</th>
            <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Total Students</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
        <tr>
            <td class="w-1/3 px-4 py-3 text-left">{{$teachers}}</td>
            <td class="w-1/3 px-4 py-3 text-left">{{$courses}}</td>
            <td class="w-1/3 px-4 py-3 text-left">{{$students}}</td>
        </tr>

    </tbody>
</table>
@endsection
