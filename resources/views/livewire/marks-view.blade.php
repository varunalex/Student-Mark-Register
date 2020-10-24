<div class="py-12 flex justify-center overflow-visible">
    <form wire:submit.prevent="fetch" class="w-1/3">
        <div class="flex flex-col justify-center mb-6">
            <div x-data="searchBoxReg()" class="mb-2 ml-4">
                <label class="block font-medium text-base text-gray-700">
                    Registration Number *
                </label>
                <input type="text" class="mt-1 block w-full form-input rounded-md shadow-sm" x-on:click="open"
                    name="searchReg" wire:model.debounce.300ms="searchReg" x-model="reg_no"
                    placeholder="Type Registration Number..." />
                <input type="hidden" x-model="uid" />
                <div x-show="isOpen()" x-on:click.away="close" class="w-full relative">
                    <div class="absolute mt-1 w-full rounded-md bg-white shadow-lg">
                        <ul
                            class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                            @if (strlen($searchReg) >= 2)

                                @forelse ($students as $item)
                                    <li id="sts-item-{{ $item['id'] }}" role="option"
                                        x-on:click="selectItem({{ $item['id'] }}, '{{ $item['reg_no'] }}')"
                                        class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-100">
                                        <div class="flex items-center space-x-3">
                                            {{ $item['reg_no'] }}
                                        </div>
                                    </li>
                                @empty
                                    <li role="option" class="text-gray-900 select-none relative py-2 pl-3 pr-9">
                                        <div class="flex items-center space-x-3">
                                            -- no result --
                                        </div>
                                    </li>
                            @endforelse

                        @else
                            <li role="option" class="text-gray-900 select-none relative py-2 pl-3 pr-9">
                                <div class="flex items-center space-x-3">
                                    Type to search...
                                </div>
                            </li>
                            @endif

                            <!-- More options... -->
                        </ul>
                    </div>
                </div>
                @error('searchReg')
                <p class="text-sm text-red-600 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <div x-data="searchBoxGrade()" class="mb-2 ml-4">
                <label class="block font-medium text-base text-gray-700">
                    Class *
                </label>
                <input type="text" class="mt-1 block w-full form-input rounded-md shadow-sm" x-on:click="open"
                    name="searchGrade" wire:model.debounce.300ms="searchGrade" x-model="grade"
                    placeholder="Type Grade..." />
                <input type="hidden" x-model="grade" />
                <div x-show="isOpen()" x-on:click.away="close" class="w-full relative">
                    <div class="absolute mt-1 w-full rounded-md bg-white shadow-lg">
                        <ul
                            class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                            @if (strlen($searchGrade) >= 1)

                                @forelse ($grades as $item)
                                    <li id="stg-item-{{ $item['id'] }}" role="option"
                                        x-on:click="selectItem({{ $item['grade'] }}, '{{ $item['class'] }}')"
                                        class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-100">
                                        <div class="flex items-center space-x-3">
                                            {{ $item['grade'] . '-' . $item['class'] }}
                                        </div>
                                    </li>
                                @empty
                                    <li role="option" class="text-gray-900 select-none relative py-2 pl-3 pr-9">
                                        <div class="flex items-center space-x-3">
                                            -- no result --
                                        </div>
                                    </li>
                            @endforelse

                        @else
                            <li role="option" class="text-gray-900 select-none relative py-2 pl-3 pr-9">
                                <div class="flex items-center space-x-3">
                                    Type to search...
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                @error('searchGrade')
                <p class="text-sm text-red-600 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="ml-4">
                <x-package-select name="term" label="Term *" class="mt-1 block w-full" wire:model.defer="term"
                    :options="$terms" required="required">
                </x-package-select>
            </div>
            <div class="ml-4">
                <x-package-button class="text-base" type="submit">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>

                </x-package-button>
            </div>
        </div>
    </form>
    <div class="w-2/3 m-4 bg-white shadow-md overflow-visible sm:rounded-lg pb-12" id="printMe">

        @if (isset($results[0]->initials))

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-5 border-b border-gray-200 sm:px-6">
                    <div>
                        <h3 class="text-lg leading-6 font-bold text-gray-900">
                            @if (is_array($results))
                                {{ $results[0]->initials . ' ' . $results[0]->f_name . ' ' . $results[0]->l_name }}
                            @else
                                Results not found!
                            @endif
                        </h3>
                        <p class="mt-1 max-w-2xl text-base leading-5 text-gray-500">
                            @if (count($results) > -1)
                                Term: {{ $term }} ({{ $searchGrade }})
                            @endif
                        </p>
                    </div>
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                        </path>
                    </svg>
                </div>
                <div>
                    <dl>
                        @php
                        $sum = 0;
                        @endphp
                        @foreach ($results as $item)
                            @php
                            $sum = $sum + $item->marks;
                            @endphp
                            @if ($loop->index % 2 == 0)
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="leading-5 text-gray-500">
                                        {{ $item->subject }}
                                    </dt>
                                    <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $item->marks }}
                                    </dd>
                                </div>
                            @else
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="leading-5 text-gray-500">
                                        {{ $item->subject }}
                                    </dt>
                                    <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $item->marks }}
                                    </dd>
                                </div>
                            @endif
                        @endforeach

                        <div class="bg-gray-300 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="leading-5 text-gray-900 font-bold">
                                Total Marks
                            </dt>
                            <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                                {{ $sum }}
                            </dd>
                        </div>

                        <div class="bg-gray-300 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="leading-5 text-gray-900 font-bold">
                                Avarage
                            </dt>
                            <dd class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                                {{ round($sum / count($results), 2) }}
                            </dd>
                        </div>

                    </dl>
                    <div class="flex items-center justify-between px-4 py-5 border-t border-gray-200 sm:px-6">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                            </h3>
                            <p class="mt-1 max-w-2xl text-base leading-5 text-gray-900">
                            </p>
                        </div>
                        <div>
                            <button onclick="printDiv('printMe')"
                                class="flex items-center py-2 px-4 bg-gray-900 rounded-md text-sm uppercase text-white shadow hover:bg-cool-gray-800">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                    </path>
                                </svg>
                                Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="w-full text-cool-gray-600 text-center my-8">
                - Data not available -
            </div>
        @endif
        <div wire:loading wire:target="fetch" class="w-full text-cool-gray-400 text-center">
            Fetching...
        </div>
    </div>
</div>

<script>
    function searchBoxReg() {
        return {
            show: false,
            uid: 0,
            reg_no: '',
            open() {
                this.show = true
            },
            close() {
                this.show = false
            },
            selectItem(id, reg_no) {
                this.show = false;
                this.reg_no = reg_no;
                this.uid = id;
                Livewire.emit('setRegNo', reg_no);
            },
            isOpen() {
                return this.show === true
            },
        }
    }

    function searchBoxGrade() {
        return {
            show: false,
            grade: '',
            open() {
                this.show = true
            },
            close() {
                this.show = false
            },
            selectItem(grade, cl) {
                this.show = false;
                this.grade = grade + '-' + cl;
                Livewire.emit('setGrade', this.grade);
            },
            isOpen() {
                return this.show === true
            },
        }
    }

    function searchBoxSubject() {
        return {
            show: false,
            code: '',
            open() {
                this.show = true
            },
            close() {
                this.show = false
            },
            selectItem(code) {
                this.show = false;
                this.code = code;
                Livewire.emit('setSub', code);
            },
            isOpen() {
                return this.show === true
            },
        }
    }

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

    }

</script>
