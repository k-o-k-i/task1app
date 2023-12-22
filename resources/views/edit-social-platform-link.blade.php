<x-layout>

    <div class="min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Edit your {{$link->social_platform_name}} link</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form id="editform" class="space-y-6" action="/link/{{$link->id}}" method="POST">
                @csrf
                @method('PUT')
                {{--Link--}}
                <div class="grid grid-cols-3 divide-x divide-none">
                    <div class="col-start-1 col-span-2 pr-1">
                        <label for="link" class=" block text-sm font-medium leading-6 text-gray-900">{{ucfirst($link->social_platform_name)}}</label>
                        <div class="mt-2">
                            <input id="link" name="{{$link->social_platform_name}}-link" value="{{old('link', $link->profile_link)}}" type="text" autocomplete="link" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error($link->social_platform_name.'-link')
                        <p class="m-0 text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-start-3 col-span-1 pl-1">
                        <label for="rank" class=" block text-sm font-medium leading-6 text-gray-900">Rank</label>
                        <div class="mt-2">
                            <input id="rank" name="rank" value="{{old('rank', $link->ranking)}}" type="number" autocomplete="rank" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('rank')
                        <p  class="m-0 text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <input type="submit" value="Update" class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-lg font-semibold leading-6 text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                </div>
            </form>

        </div>
    </div>

</x-layout>
