<div
    x-data="{
        confirmationModalOpen: false,
        userToDeleteId: null,
        deleteMethod: @js($deleteMethod),
        objectLabel: @js($deleteObjectLabel),
        get modalTitle() {
            return 'Confirmation'
        },
        get modalSubtitle() {
            return `Are you sure you want to delete this ${this.objectLabel}?`
        },
        confirmDelete() {
            if (this.userToDeleteId && this.deleteMethod) {
                $wire.call(this.deleteMethod, this.userToDeleteId)
                this.confirmationModalOpen = false
                this.userToDeleteId = null
            }
        }
    }"
    x-on:close-modal.window="
        confirmationModalOpen = false;
        userToDeleteId = null;
    "
    class="bg-white rounded-xl px-4 py-2 shadow"
>
    <table class="table-auto w-full text-sm">
        <thead class="border-b-2 border-b-indigo-50">
            <tr>
                @foreach ($headers as $key => $label)
                    <th class="text-left py-2 text-gray-600">{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if (count($rows) > 0)
                @foreach ($rows as $index => $row)
                    <tr>
                        @foreach ($headers as $key => $label)
                            <td wire:key="item-{{ $key }}-{{ $index }}-{{ $row['id'] }}" class="py-2 text-gray-600">
                                @switch($key)
                                    @case('no')
                                        {{ $loop->parent->iteration }}
                                        @break

                                    @case('action')
                                        {{-- If data was not created by system (0) then it should be controllable --}}
                                        @if (is_null($row['created_by']) || $row['created_by'] > 0)
                                            <div class="flex items-center gap-1">
                                                <x-shared.button wire:click="$dispatch('{{ $editEvent }}', [{{ json_encode($row) }}])" icon="pencil" size="small">Edit</x-shared.button>
                                                <x-shared.button 
                                                    @click="
                                                        confirmationModalOpen = true;
                                                        userToDeleteId = {{ $row['id'] }};
                                                    "
                                                    icon="trash"
                                                    size="small" 
                                                    variant="danger"
                                                >
                                                    Delete
                                                </x-shared.button>
                                            </div>
                                        @else
                                            -
                                        @endif
                                        @break

                                    @default
                                        {{ $row[$key] ?? '-' }}
                                @endswitch
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="{{ count($headers) }}" class="py-2 text-center text-gray-400">No data found</td>
                </tr>
            @endif
        </tbody>
    </table>

    <x-ui.modal 
        x-bind:title="modalTitle" 
        x-bind:subtitle="modalSubtitle" 
        :show="'confirmationModalOpen'"
    >
        <div class="flex justify-end gap-2">
            <x-shared.button variant="primary" @click="confirmationModalOpen = false">Cancel</x-shared.button>
            <x-shared.button variant="danger" @click="confirmDelete()">Delete</x-shared.button>
        </div>
    </x-ui.modal>
</div>