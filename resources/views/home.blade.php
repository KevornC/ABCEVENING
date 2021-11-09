@extends('layouts.admin')

@section('content')
<h1 class="pb-6 text-3xl text-black">Dashboard</h1>
<table class="min-w-full bg-white ">
    <thead class="text-white bg-gray-800">
        <tr>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Name</th>
            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Last name</th>
            <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Phone</th>
            <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Email</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
        <tr>
            <td class="w-1/3 px-4 py-3 text-left">Lian</td>
            <td class="w-1/3 px-4 py-3 text-left">Smith</td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        </tr>
        <tr class="bg-gray-200">
            <td class="w-1/3 px-4 py-3 text-left">Emma</td>
            <td class="w-1/3 px-4 py-3 text-left">Johnson</td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        </tr>
        <tr>
            <td class="w-1/3 px-4 py-3 text-left">Oliver</td>
            <td class="w-1/3 px-4 py-3 text-left">Williams</td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        </tr>
        <tr class="bg-gray-200">
            <td class="w-1/3 px-4 py-3 text-left">Isabella</td>
            <td class="w-1/3 px-4 py-3 text-left">Brown</td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        </tr>
        <tr>
            <td class="w-1/3 px-4 py-3 text-left">Lian</td>
            <td class="w-1/3 px-4 py-3 text-left">Smith</td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        </tr>
        <tr class="bg-gray-200">
            <td class="w-1/3 px-4 py-3 text-left">Emma</td>
            <td class="w-1/3 px-4 py-3 text-left">Johnson</td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        </tr>
        <tr>
            <td class="w-1/3 px-4 py-3 text-left">Oliver</td>
            <td class="w-1/3 px-4 py-3 text-left">Williams</td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        </tr>
        <tr class="bg-gray-200">
            <td class="w-1/3 px-4 py-3 text-left">Isabella</td>
            <td class="w-1/3 px-4 py-3 text-left">Brown</td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
            <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        </tr>
    </tbody>
</table>
@endsection
