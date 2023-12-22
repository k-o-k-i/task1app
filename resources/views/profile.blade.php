<x-layout>

    <div class="grid grid-cols-3 divide-x divide-none flex-col justify-center">
        @if(auth()->user()->username === $username)
        <div class="col-start-2 col-span-1 min-h-fit min-w-fit flex-col py-10 lg:px-12">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h1 class="flex justify-center text-4xl text-gray-900 mt-2">Hello <strong>{{$username}}</strong></h1>
                <h1 class="flex justify-center text-xl text-gray-900 mt-1">Your list of profile links and ratings</h1>
        </div>
    </div>


    <div class="col-start-2 col-span-1 min-h-fit min-w-fit flex-col px-12  lg:px-12">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="/add-links" class="flex justify-center text-white bg-cyan-800 hover:bg-cyan-900 font-medium rounded-lg text-sm px-1 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700">Manage links</a>
        </div>
    </div>
    @else
       <div class="col-start-2 col-span-1 min-h-fit min-w-fit flex-col py-10 lg:px-12">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
             <h1 class="flex justify-center text-4xl text-gray-900 mt-2"><strong>{{$username}}'s Profile</strong></h1>
          </div>
       </div>
    @endif

    </div>

    <div class="grid grid-cols-4 divide-x divide-none flex-col justify-center">
     <div class="col-start-2 col-span-2 min-h-fit min-w-fit flex-col  py-10 lg:px-12">
      <table class=" table-auto min-w-full divide-y divide-gray-900">
        <thead class="bg-gray-50">
        <tr>
            <th class="p-4 text-left text-xl font-semibold text-gray-900 w-3/4">
                <div class="">Link</div>
            </th>
            <th class="p-4 text-left text-xl font-semibold text-gray-900 w-1/4">
                <div class="flex justify-center">Rating</div>
            </th>
            <th class="p-4 text-left text-xl font-semibold text-gray-900 w-1/4">
                <div class="flex justify-center">Action</div>
            </th>
        </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 bg-white">
            @if(count($links) === 0)
                <tr>
                <!-- Link -->
                <td class="p-4 text-lg text-gray-600">
                    <div>No links added</div>
                </td>
                    <!-- Rating -->
                    <td class="p-4 text-lg text-gray-600">
                        <div class="flex justify-center"></div>
                    </td>
                    <!-- Action -->
                    <td class="p-4 text-lg text-gray-600">
                        <div class="flex justify-center"></div>
                    </td>
                </tr>
            @else
                @foreach($links as $link)
                    <tr>
                    <!-- Link -->
                    <td class="p-4 text-lg text-gray-600">
                        <div>{{$link->profile_link}}</div>
                    </td>
                    <!-- Rating -->
                    <td class="p-4 text-lg text-gray-600">
                        <div class="flex justify-center">{{$link->ranking}}</div>
                    </td>
                    <!-- Action -->
                    <td class="p-4 text-lg text-gray-600 flex">
                        @can('update', $link)
                        <div class="flex justify-center space-x-2 ">
                        <form action="/link/{{$link->id}}/edit" method="GET" class="my-2">
                            <button class="p-2  bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </button>
                        </form>
                            <form action="/link/{{$link->id}}" method="POST" class="my-2">
                                @csrf
                                @method('delete')
                                <button type="submit" class="p-2 bg-red-50 text-xs text-red-900 hover:bg-red-500 hover:text-white transition rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        @endcan
                    </td>
                    </tr>
                @endforeach
            @endif
        </tr>
        </tbody>
    </table>
   </div>
 </div>
</x-layout>
