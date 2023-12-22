<x-layout>

    <div class="min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Add/edit your social platform profile links</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form id="addform" class="space-y-6" action="/add-links" method="POST">
                @csrf

                {{--Facebook--}}
             <div class="grid grid-cols-3 divide-x divide-none">
                 <div class="col-start-1 col-span-2 pr-1">
                    <label for="facebookl" class=" block text-sm font-medium leading-6 text-gray-900">Facebook</label>
                    <div class="mt-2">
                        <input id="facebookl" name="facebook-link" value="{{old('facebook-link')}}" type="text" autocomplete="facebook-link" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                     <p id="facebook-link" class="m-0 text-red-500 error"></p>
                </div>
                 <div class="col-start-3 col-span-1 pl-1">
                     <label for="facebookr" class=" block text-sm font-medium leading-6 text-gray-900">Rank</label>
                     <div class="mt-2">
                         <input id="facebookr" name="rank-f" value="{{old('rank-f')}}" type="number" autocomplete="rank-f" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     </div>
                     <p id="rank-f" class="m-0 text-red-500 error"></p>
                 </div>

                {{--LinkedIn--}}
                <div class="col-start-1 col-span-2 pr-1">
                    <label for="linkedinl" class="block text-sm font-medium leading-6 text-gray-900">LinkedIn</label>
                    <div class="mt-2">
                        <input id="linkedinl" name="linkedin-link" value="{{old('linkedin-link')}}" type="text" autocomplete="linkedin-link" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <p id="linkedin-link" class="m-0 text-red-500 error"></p>
                </div>
                 <div class="col-start-3 col-span-1 pl-1">
                     <label for="linkedinr" class=" block text-sm font-medium leading-6 text-gray-900">Rank</label>
                     <div class="mt-2">
                         <input id="linkedinr" name="rank-l" value="{{old('rank-l')}}" type="number" min="1" max="100" autocomplete="rank-l" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     </div>
                     <p id="rank-l" class="m-0 text-red-500 error"></p>
                 </div>

                {{--X--}}
                 <div class="col-start-1 col-span-2 pr-1">
                     <label for="xl" class="block text-sm font-medium leading-6 text-gray-900">X</label>
                     <div class="mt-2">
                         <input id="xl" name="x-link" value="{{old('x-link')}}" type="text" autocomplete="x-link" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     </div>
                     <p id="x-link" class="m-0 text-red-500 error"></p>
                 </div>
                 <div class="col-start-3 col-span-1 pl-1">
                     <label for="xr" class=" block text-sm font-medium leading-6 text-gray-900">Rank</label>
                     <div class="mt-2">
                         <input id="xr" name="rank-x" value="{{old('rank-x')}}" type="number" min="1" max="100" autocomplete="rank-x" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     </div>
                     <p id="rank-x" class="m-0 text-red-500 error"></p>
                 </div>

                {{--Instagram--}}
                 <div class="col-start-1 col-span-2 pr-1">
                     <label for="instagraml" class="block text-sm font-medium leading-6 text-gray-900">Instagram</label>
                     <div class="mt-2">
                         <input id="instagraml" name="instagram-link" value="{{old('instagram-link')}}" type="text" autocomplete="instagram-link" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     </div>
                     <p id="instagram-link" class="m-0 text-red-500 error"></p>
                 </div>
                 <div class="col-start-3 col-span-1 pl-1">
                     <label for="instagramr" class=" block text-sm font-medium leading-6 text-gray-900">Rank</label>
                     <div class="mt-2">
                         <input id="instagramr" name="rank-i" value="{{old('rank-i')}}" type="number" min="1" max="100" autocomplete="rank-i" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     </div>
                     <p id="rank-i" class="m-0 text-red-500 error"></p>
                 </div>

                 {{--Reddit--}}
                 <div class="col-start-1 col-span-2 pr-1">
                     <label for="redditl" class="block text-sm font-medium leading-6 text-gray-900">Reddit</label>
                     <div class="mt-2">
                         <input id="redditl" name="reddit-link" value="{{old('reddit-link')}}" type="text" min="1" max="100" autocomplete="reddit-link" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     </div>
                     <p id="reddit-link" class="m-0 text-red-500 error"></p>
                 </div>
                 <div class="col-start-3 col-span-1 pl-1">
                     <label for="redditr" class=" block text-sm font-medium leading-6 text-gray-900">Rank</label>
                     <div class="mt-2">
                         <input id="redditr" name="rank-r" value="{{old('rank-r')}}" type="number" min="1" max="100" autocomplete="rank-r" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     </div>
                     <p id="rank-r" class="m-0 text-red-500 error"></p>
                 </div>
             </div>

                <div>
                    <input type="submit" value="Save" class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-lg font-semibold leading-6 text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                </div>
            </form>

        </div>
    </div>

</x-layout>
