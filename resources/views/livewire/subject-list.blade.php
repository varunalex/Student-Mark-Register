<div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    #
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Subject Code
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Subject Name
                </th>
                <th class="px-6 py-3 bg-gray-50"></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($subjects as $subject)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div class="leading-5 font-medium text-gray-900">
                                {{ $loop->index + 1 }}
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="leading-5 text-gray-900">{{ $subject['code'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="leading-5 text-gray-900">{{ $subject['subject'] }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-right leading-5 font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap" colspan="4">
                        <div class="flex items-center">
                            <div class="leading-5 font-medium text-gray-900">
                                No sujbects available! <a class="text-blue-700 hover:underline"
                                    href="{{ route('subject.create') }}">Create one?</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse


            <!-- More rows... -->
        </tbody>
    </table>
    {{ $subjects->links() }}
</div>
