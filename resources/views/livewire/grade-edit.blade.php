<div class="py-12 flex justify-center">
    <div class="w-full m-4 lg:w-1/3 bg-white shadow-md overflow-hidden sm:rounded-lg">

        <x-package-form class="flex flex-col">
            <x-slot name="title">
                {{ __('Edit Grade') }}
            </x-slot>
            <x-slot name="description">
                {{ __('* All fields required.') }}
            </x-slot>
            <x-slot name="form">
                <form wire:submit.prevent="update">
                    @method('PATCH')

                    <div class="flex">
                        <div>
                            <x-package-input id="grade" name="grade" label="Grade *" type="number" max="13"
                                class="mt-1 block w-full" wire:model.defer="grade" placeholder="10" required="required">
                            </x-package-input>
                        </div>
                        <div class="ml-6">
                            <x-package-input id="class" name="class" label="Class *" type="text" max="1"
                                class="mt-1 block w-full" wire:model.defer="class" placeholder="A" required="required">
                            </x-package-input>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-package-button type="submit">
                            Update
                        </x-package-button>
                    </div>
                </form>
            </x-slot>
        </x-package-form>
    </div>
</div>
