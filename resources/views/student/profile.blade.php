<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile: ') . $student->initials . ' ' . $student->f_name . ' ' . $student->l_name }}
        </h2>
    </x-slot>

    <x-slot name="goTo">students</x-slot>
    <div class="py-12 flex justify-center">
        <div class="w-full m-4 lg:w-1/3 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-5 border-b border-gray-200 sm:px-6">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Student Profile
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                            Personal details and bio.
                        </p>
                    </div>
                    <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                        </path>
                    </svg>
                </div>
                <div>
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="leading-5 text-gray-500">
                                Full name
                            </dt>
                            <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $student->initials . ' ' . $student->f_name . ' ' . $student->l_name }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="leading-5 text-gray-500">
                                Registration Number
                            </dt>
                            <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $student->reg_no }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="leading-5 font-medium text-gray-500">
                                Date of birth
                            </dt>
                            <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $student->dob }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="leading-5 font-medium text-gray-500">
                                Age
                            </dt>
                            <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $student->age }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="leading-5 font-medium text-gray-500">
                                Class
                            </dt>
                            <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $student->grade->grade . '-' . $student->grade->class }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="leading-5 font-medium text-gray-500">
                                Gender
                            </dt>
                            <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if ($student->gender == 'M')
                                    Male
                                @else
                                    Female
                                @endif
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="leading-5 font-medium text-gray-500">
                                Guardian
                            </dt>
                            <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $student->guardian }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="leading-5 font-medium text-gray-500">
                                Address
                            </dt>
                            <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $student->address }}
                            </dd>
                        </div>
                    </dl>
                    <div class="flex items-center justify-between px-4 py-5 border-t border-gray-200 sm:px-6">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Student Profile
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                                Personal details and bio.
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('student.edit', $student->id) }}"
                                class="flex items-center py-2 px-4 bg-gray-900 rounded-md text-sm uppercase text-white shadow hover:bg-cool-gray-800">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
