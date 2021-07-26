    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-800 sm:text-5xl dark:text-white">
                        Get in touch
                    </h1>
                    <p class="mt-2 text-lg font-medium text-gray-600 text-normal sm:text-2xl dark:text-gray-400">
                        Fill in the form to start a conversation
                    </p>

                    <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div class="w-40 ml-4 font-semibold tracking-wide text-md">
                            Acme Inc, Street, State,
                            Postal Code
                        </div>
                    </div>

                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <div class="w-40 ml-4 font-semibold tracking-wide text-md">
                            +44 1234567890
                        </div>
                    </div>

                    <div class="flex items-center mt-2 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <div class="w-40 ml-4 font-semibold tracking-wide text-md">
                            info@acme.org
                        </div>
                    </div>
                </div>

                <form class="flex flex-col justify-center ml-5" method="POST" wire:submit.prevent="formSubmit" >

                    @if ($success_message)
                    <div class="flex items-center p-2 leading-none text-green-100 bg-green-700 lg:rounded-full lg:inline-flex" role="alert">
                        <span class="flex px-2 py-1 mr-3 text-xs font-bold uppercase bg-green-400 rounded-full">Sent</span>
                        <span class="flex-auto mr-2 font-semibold text-left">{{$success_message}}</span>
                         <svg wire:click="$set('success_message',null)" class="w-6 h-6 text-green-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                    </div>
                    @endif

                    <div class="flex flex-col">
                        <label for="name" class="hidden">Full Name</label>
                        <input type="name" name="name" id="name"  wire:model.defer="name" value="{{old('name')}}" placeholder="Full Name" class="@error('name') border border-red-500 @enderror px-3 py-3 mt-2 font-semibold text-gray-800 bg-white border border-gray-400 rounded-lg w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none">
                    </div>
                    @error('name')
                        <p class="mt-1 text-red-500">{{$message}}</p>
                    @enderror

                    <div class="flex flex-col mt-2">
                        <label for="email" class="hidden">Email</label>
                        <input type="email" name="email" id="email" wire:model.defer="email" value="{{old('email')}}" placeholder="Email" class="@error('email') border border-red-500 @enderror px-3 py-3 mt-2 font-semibold text-gray-800 bg-white border border-gray-400 rounded-lg w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none">
                    </div>
                    @error('email')
                        <p class="mt-1 text-red-500">{{$message}}</p>
                    @enderror

                    <div class="flex flex-col mt-2">
                        <label for="tel" class="hidden">Number</label>
                        <input type="tel" name="tel" id="tel" wire:model.defer='telephone' value="{{old('telephone')}}" placeholder="Telephone Number" class="@error('telephone') border border-red-500 @enderror px-3 py-3 mt-2 font-semibold text-gray-800 bg-white border border-gray-400 rounded-lg w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none">
                    </div>
                    @error('telephone')
                        <p class="mt-1 text-red-500">{{$message}}</p>
                    @enderror

                    <div class="flex flex-col mt-2">
                        <label for="Message" class="hidden">Message</label>
                        <textarea rows="4" name="message" wire:model.defer='message' id="message" placeholder="Message" class="@error('message') border-8  @enderror px-3 py-3 mt-2 font-semibold text-gray-800 bg-white border border-gray-400 rounded-lg w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none"> </textarea>
                    </div>
                    @error('message')
                        <p class="mt-1 text-red-500">{{$message}}</p>
                    @enderror

                    <button type="submit"  class="px-6 py-3 mt-3 font-bold text-white transition duration-300 ease-in-out bg-indigo-600 rounded-lg disabled:opacity-60 md:w-32 hover:bg-blue-dark hover:bg-indigo-500">
                        <svg wire:loading class="inline w-5 h-5 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                          </svg> Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

