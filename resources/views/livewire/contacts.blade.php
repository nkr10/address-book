<div class="p-6">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    {{--Contacts page livewire component --}}
    <div class="flex item-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="addShowModal">
            {{ __('Add') }}
        </x-jet-button>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">


                    {{--Data Table--}}
                    <table class="min-w-full divide-y divide-gray-200"> {{--not working--}}
                        <thead>
                        <th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Date of Birth</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Physical Address</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if ($data->count())
                            @foreach($data as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{$item->first_name . " " . $item->last_name}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{$item->e_mail}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{$item->phone_number}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{$item->date_of_birth}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{$item->physical_address}}</td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                            {{ __('Update') }}
                                        </x-jet-button>

                                        <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                                            {{ __('Delete') }}
                                        </x-jet-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap" colspan="5">No contacts added.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <br />

    {{ $data->links()}}

    {{-- Modal form --}}
<!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Save Contact') }} {{ $modelId }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="first_name" value="{{ __('First name') }}"/>
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="first_name" />
                @error('first_name') <span class="error"> {{ $message }} </span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('Last name') }}"/>
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="last_name" />
                @error('last_name') <span class="error"> {{ $message }} </span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="e_mail" value="{{ __('E-mail') }}"/>
                <x-jet-input id="e_mail" class="block mt-1 w-full" type="email" wire:model.debounce.800ms="e_mail" placeholder="you@example.com"/>
                @error('e_mail') <span class="error"> {{ $message }} </span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="phone_number" value="{{ __('Phone number') }}"/>
                <x-jet-input id="phone_number" class="block mt-1 w-full" type="tel" wire:model.debounce.800ms="phone_number" />
            </div>

            <div class="mt-4">
                <x-jet-label for="date_of_birth" value="{{ __('Date of Birth') }}"/>
                <x-jet-input id="date_of_birth" class="block mt-1 w-full" type="date" wire:model.debounce.800ms="date_of_birth" />
            </div>

            <div class="mt-4">
                <x-jet-label for="physical_address" value="{{ __('Physical Address') }}"/>
                <x-jet-input id="physical_address" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="physical_address" />
            </div>


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancelUpdate" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-button>
            @endif

            {{--x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>--}}
        </x-slot>
    </x-jet-dialog-modal>

    {{--Delete modal--}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Contact') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this contact? Once the contact is deleted, all of its data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancelDelete" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


</div>
