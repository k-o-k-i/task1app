<x-layout>

    <div class="grid grid-cols-2 divide-x divide-none min-h-full justify-center px-6 py-10 lg:px-8">

        <div class="min-h-full min-w-fit flex-row mx-16 px-10 py-10 lg:px-12">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Search users based on their preference for social platforms</h2>
            </div>
{{--            @error('facebook')--}}
{{--            <p  class="flex justify-center m-0 text-red-500 pt-3">{{$message}}</p>--}}
{{--            @enderror--}}

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <form id="searchform" class="space-y-6" action="/search" method="POST">
            @csrf
        <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
        <select id="facebook" name="facebook"  class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>Choose</option>
            <option value="like">Like</option>
            <option value="dislike">Dislike</option>
        </select>

        <label for="linkedin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LinkedIn</label>
        <select id="linkedin" name="linkedin" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>Choose</option>
            <option value="like">Like</option>
            <option value="dislike">Dislike</option>
        </select>

        <label for="x" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">X</label>
        <select id="x" name="x" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>Choose</option>
            <option value="like">Like</option>
            <option value="dislike">Dislike</option>
        </select>

        <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
        <select id="instagram" name="instagram" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>Choose</option>
            <option value="like">Like</option>
            <option value="dislike">Dislike</option>
        </select>

        <label for="reddit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reddit</label>
        <select id="reddit" name="reddit" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>Choose</option>
            <option value="like">Like</option>
            <option value="dislike">Dislike</option>
        </select>

            <input type="submit" value="Search" class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-lg font-semibold leading-6 text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        </form>
        </div>
    </div>

    <div class="min-h-full min-w-fit flex-row mx-16 px-10 py-10 lg:px-12">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Results</h2>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <table class="table-fixed min-w-full divide-y divide-gray-900 mt-6">
                <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-left text-xl flex justify-center font-semibold text-gray-900">
                            User
                    </th>
                </tr>
                </thead>
                <tbody id="user-table-body" class="divide-y divide-gray-200 bg-white">

{{--                @isset($items)--}}
{{--                @foreach($items as $item)--}}
{{--                    <tr>--}}
{{--                        <td class="p-4 text-sm text-gray-600">--}}
{{--                            <p class="flex justify-center text-xl">{{$item['username']}}</p>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                @endisset--}}
                </tbody>
            </table>

        </div>
     </div>
    </div>
</x-layout>

