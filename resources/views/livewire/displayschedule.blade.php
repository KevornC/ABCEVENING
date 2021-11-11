<div>
{{-- <h1 class="mt-8 text-3xl font-bold text-center">view</h1> --}}
@if ($successMsg=="Added Successfully")
<div class="p-4 mt-8 rounded-md bg-green-50">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="w-5 h-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium leading-5 text-green-800">
                {{ $successMsg }}
            </p>
        </div>
        <div class="pl-3 ml-auto">
            <div class="-mx-1.5 -my-1.5">
                <button
                    type="button"
                    wire:click="$set('successMsg', null)"
                    class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
                    aria-label="Dismiss">
                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endif
@if ($approveMsg=="Successfully Updated")
<div class="p-4 mt-8 rounded-md bg-green-50">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="w-5 h-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium leading-5 text-green-800">
                {{ $approveMsg }}
            </p>
        </div>
        <div class="pl-3 ml-auto">
            <div class="-mx-1.5 -my-1.5">
                <button
                    type="button"
                    wire:click="$set('approveMsg', null)"
                    class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
                    aria-label="Dismiss">
                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endif
<div class="">
    <a class="hover:bg-cool-gray-600 hover:text-yellow-400" href="" wire:click.prevent="add()">Add Schedule</a><br><br>
    {{-- <input type="text"  class="form-control" placeholder="Search" wire:model.fire="searchTerm" /> --}}
<table clas="text-left">
    <thead>
        <tr>
            <th class="p-10">Teacher</th>
            <th class="p-3">Course</th>
            <th class="p-3">Schedule</th>
            <th class="p-3">Action</th>
        </tr>
    </thead>
    <tbody> 
        @forelse ( $classes as $data )
        <tr class="">
            <td class="p-3">{{$data->teacher->name}}</td>
            <td class="p-3">{{$data->course->course_nm}}</td>
            <td class="p-3">{{date('F d, Y h:i:s A',strtotime($data->schedule))}}</td>
            <td><a class="hover:bg-cool-gray-600 hover:text-yellow-400" wire:click.prevent="editmode({{$data->id}})" href="">Edit</a></td>
 
        </tr>
        @empty
            <tr>
                <td>No Records Available</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
<div class="w-full">
    {{-- @section('paginator') --}}
    {{-- {{$teachers->links()}} --}}
    {{-- @endsection --}}
</div>
</div>