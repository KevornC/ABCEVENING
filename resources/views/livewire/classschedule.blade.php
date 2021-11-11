<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div>
        <?php
        date_default_timezone_set("jamaica");
        ?>
        @if ($editmode===true)
        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" wire:submit.prevent="update" autocomplete="off">
            {{-- @csrf --}}
            
            @if($successMsg=="Failed")
            <div class="p-4 mt-8 rounded-md bg-red-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium leading-5 text-red-800">
                            {{ $successMsg }}
                        </p>
                    </div>
                    <div class="pl-3 ml-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button
                                type="button"
                                wire:click="$set('successMsg', null)"
                                class="inline-flex rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100 transition ease-in-out duration-150"
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
            <div class="flex flex-wrap">
                <label for="course" class="block mt-8 mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Course') }}:
                </label>

                {{-- <input id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror"
                wire:model="title" autofocus> --}}
                <select class="form-input w-full @error('course')  border-red-500 @enderror" wire:model="course"> 
                    {{-- <option value="$course">Select a Course</option> --}}
                    @forelse ($courses as $item)
                        @if($item->id==$course)
                            <option selected value="{{$course}}">Old Value:{{$item->course_nm}}</option>
                        @endif
                        <option value={{$item->id}}>{{$item->course_nm}}</option>
                        @empty
                        <option>****Not Availalble****</option>
                    @endforelse
                </select>
                @error('course')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <label for="dateandtime" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Class Date and Time') }}:
                </label>

                <input type="text" readonly class="form-input w-full @error('dateandtime')  border-red-500 @enderror" value="{{$dateandtime}}">
                
                <input type="datetime-local" id="class-time" class="form-input w-full @error('dateandtime')  border-red-500 @enderror"
                wire:model="dateandtime"
                min="2021-10-11T00:00" >
                
                @error('dateandtime')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>


            <div class="flex flex-wrap justify-center w-full align-items-center">
                <button type="submit"
                class="inline-flex items-center justify-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 disabled:opacity-50">
                <svg wire:loading wire:target="Onsubmit" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span>Edit</span>
            </button>

            </div>
        </form>

        @elseif ($addmode===true)
        <a class="hover:bg-cool-gray-600 hover:text-yellow-400" href="" wire:click.prevent="view()">View Schedule</a>
            <div>
                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" wire:submit.prevent="Onsubmit" autocomplete="off">
                        {{-- @csrf --}}
                        
                        @if($successMsg=="Failed")
                        <div class="p-4 mt-8 rounded-md bg-red-50">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium leading-5 text-red-800">
                                        {{ $successMsg }}
                                    </p>
                                </div>
                                <div class="pl-3 ml-auto">
                                    <div class="-mx-1.5 -my-1.5">
                                        <button
                                            type="button"
                                            wire:click="$set('successMsg', null)"
                                            class="inline-flex rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100 transition ease-in-out duration-150"
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
            
                        <div class="flex flex-wrap">
                            <label for="course" class="block mt-8 mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                {{ __('Course') }}:
                            </label>
            
                            {{-- <input id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror"
                            wire:model="title" autofocus> --}}
                            <select class="form-input w-full @error('course')  border-red-500 @enderror" wire:model="course"> 
                                <option value="">Select a Course</option>
                                @forelse ($courses as $item)
                                    <option value={{$item->id}}>{{$item->course_nm}}</option>
                                    @empty
                                    <option>****Not Availalble****</option>
                                @endforelse
                            </select>
                            @error('course')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="dateandtime" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                {{ __('Class Date and Time') }}:
                            </label>
            
                        
                            <input type="datetime-local" id="class-time" class="form-input w-full @error('dateandtime')  border-red-500 @enderror"
                            wire:model="dateandtime"
                            min="2021-10-11T00:00" >
                            
                            @error('dateandtime')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                                                
                        <div class="flex flex-wrap justify-center w-full align-items-center">
                            <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 disabled:opacity-50">
                            <svg wire:loading wire:target="Onsubmit" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span>Add</span>
                        </button>
          
                        </div>
                    </form>
            </div>
    
                    @elseif($addmode===false)
                    @include('livewire.displayschedule')
                    @endif
                    {{-- @endif
                    @endif --}}
    
    </div>
{{-- </div>
<input type="time" id="appt" name="appt"
       min="09:00" max="18:00" required>


       <input type="datetime-local" id="class-time"
       name="class-time" value="2018-06-12T19:30"
       min="2021-10-11T00:00" > --}}