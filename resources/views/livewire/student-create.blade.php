<div class="py-12 flex justify-center">
    <div class="w-full m-4 lg:w-1/3 bg-white shadow-md overflow-hidden sm:rounded-lg">

        <x-package-form class="flex flex-col">
            <x-slot name="title">
                {{ __('Add a new student') }}
            </x-slot>
            <x-slot name="description">
                {{ __('* All fields required.') }}
            </x-slot>
            <x-slot name="form">
                <form wire:submit.prevent="save">

                    @if ($alert)
                        <script>
                            alert('Student Added');

                        </script>
                    @endif
                    @if ($alert)
                        <x-package-alert-msg on="save" class="text-white bg-green-500">
                            Subject Created 🤙
                        </x-package-alert-msg>
                    @endif
                    <x-package-input name="student.f_name" label="First Name *" type="text" class="mt-1 block w-full"
                        wire:model.defer="student.f_name" placeholder="Varuna" required="required">
                    </x-package-input>
                    <div class="flex">
                        <div>
                            <x-package-input name="student.l_name" label="Last Name *" type="text"
                                class="mt-1 block w-full" wire:model.defer="student.l_name" placeholder="Prageeth"
                                required="required">
                            </x-package-input>
                        </div>
                        <div class="ml-6">
                            <x-package-input name="student.initials" label="Initials *" type="text"
                                class="mt-1 block w-full" wire:model.defer="student.initials" placeholder="E. R"
                                required="required">
                            </x-package-input>
                        </div>
                    </div>
                    <div class="flex">
                        <div>
                            <x-package-input name="student.reg_no" label="Registration No *" type="text"
                                class="mt-1 block w-full" wire:model.defer="student.reg_no" placeholder="STU-1505"
                                required="required">
                            </x-package-input>
                        </div>
                        <div class="ml-6">
                            <x-package-input name="student.dob" label="Date of Birth *" type="date"
                                class="mt-1 block w-full" wire:model.defer="student.dob" required="required">
                            </x-package-input>
                        </div>
                    </div>
                    <div class="flex">
                        <div>
                            <x-package-select name="student.gender" label="Gender *" class="mt-1 block w-full"
                                wire:model.defer="student.gender" :options="$genders" required="required">
                            </x-package-select>
                        </div>
                        <div class="ml-6">
                            <x-package-input name="student.guardian" label="Guardian Name*" type="text"
                                class="mt-1 block w-full" wire:model.defer="student.guardian" required="required">
                            </x-package-input>
                        </div>
                        <div class="ml-6">
                            <x-package-select name="student.grade_id" label="Class *" class="mt-1 block w-full"
                                wire:model.defer="student.grade_id" :options="$grades" required="required">
                            </x-package-select>
                        </div>
                    </div>

                    <x-package-input name="student.address" row="3" textArea="true" label="Address *"
                        class="mt-1 w-full" wire:model.defer="student.address" required="required">
                    </x-package-input>

                    <div class="flex items-center justify-end mt-4">
                        <x-package-button type="submit">
                            Add
                        </x-package-button>
                    </div>
                </form>
            </x-slot>
        </x-package-form>
    </div>
</div>
