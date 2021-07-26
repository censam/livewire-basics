<div>
<style>
    [x-cloak] {
        display: none;
    }

    [type="checkbox"] {
        box-sizing: border-box;
        padding: 0;
    }

    .form-checkbox {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
        display: inline-block;
        vertical-align: middle;
        background-origin: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        flex-shrink: 0;
        color: currentColor;
        background-color: #fff;
        border-color: #e2e8f0;
        border-width: 1px;
        border-radius: 0.25rem;
        height: 1.2em;
        width: 1.2em;
    }

    .form-checkbox:checked {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
        border-color: transparent;
        background-color: currentColor;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<div class="container px-4 py-6 mx-auto" x-data="datatables()" x-cloak>
    <h1 class="py-4 mb-10 text-3xl border-b">Datatable</h1>

    <div x-show="selectedRows.length" class="fixed top-0 left-0 right-0 z-40 w-full bg-teal-200 shadow">
        <div class="container px-4 py-4 mx-auto">
            <div class="flex md:items-center">
                <div class="flex-shrink-0 mr-4">
                    <svg class="w-8 h-8 text-teal-600"  viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                </div>
                <div x-html="selectedRows.length + ' rows are selected'" class="text-lg text-teal-800"></div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between mb-4">
        <div class="flex-1 pr-4">
            <div class="relative md:w-1/3">
                <input type="search"
                    class="w-full py-2 pl-10 pr-4 font-medium text-gray-600 rounded-lg shadow focus:outline-none focus:shadow-outline"
                    placeholder="Search...">
                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </div>
            </div>
        </div>
        <div>
            <div class="flex rounded-lg shadow">
                <div class="relative">
                    <button @click.prevent="open = !open"
                        class="inline-flex items-center px-2 py-2 font-semibold text-gray-500 bg-white rounded-lg hover:text-blue-500 focus:outline-none focus:shadow-outline md:px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:hidden" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                            <path
                                d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" />
                        </svg>
                        <span class="hidden md:block">Display</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false"
                        class="absolute top-0 right-0 z-40 block w-40 py-1 mt-12 -mr-1 overflow-hidden bg-white rounded-lg shadow-lg">
                        <template x-for="heading in headings">
                            <label
                                class="flex items-center justify-start px-4 py-2 text-truncate hover:bg-gray-100">
                                <div class="mr-3 text-teal-600">
                                    <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" checked @click="toggleColumn(heading.key)">
                                </div>
                                <div class="text-gray-700 select-none" x-text="heading.value"></div>
                            </label>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative mb-5 overflow-x-auto overflow-y-auto bg-white rounded-lg shadow"
        style="height: 405px;">
        <table class="relative w-full whitespace-no-wrap bg-white border-collapse table-auto table-striped">
            <thead>
                <tr class="text-left">
                    <th class="sticky top-0 px-3 py-2 bg-gray-100 border-b border-gray-200">
                        <label
                            class="inline-flex items-center justify-between px-2 py-2 text-teal-500 rounded-lg cursor-pointer hover:bg-gray-200">
                            <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" @click="selectAllCheckbox($event);">
                        </label>
                    </th>
                    <template x-for="heading in headings">
                        <th class="sticky top-0 px-6 py-2 text-xs font-bold tracking-wider text-gray-600 uppercase bg-gray-100 border-b border-gray-200"
                            x-text="heading.value" :x-ref="heading.key" :class="{ [heading.key]: true }"></th>
                    </template>
                </tr>
            </thead>
            <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="px-3 border-t border-gray-200 border-dashed">
                            <label
                            class="inline-flex items-center justify-between px-2 py-2 text-teal-500 rounded-lg cursor-pointer hover:bg-gray-200">
                            <input type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline" :name="{{$user->id}}"
                            @click="getRowDetail($event, user.userId)">
                            </label>
                        </td>
                        <td class="border-t border-gray-200 border-dashed userId">
                            <span class="flex items-center px-6 py-3 text-gray-700">{{$user->id}}</span>
                        </td>
                        <td class="border-t border-gray-200 border-dashed firstName">
                            <span class="flex items-center px-6 py-3 text-gray-700">{{$user->name}}</span>
                        </td>
                        <td class="border-t border-gray-200 border-dashed lastName">
                            <span class="flex items-center px-6 py-3 text-gray-700">{{strrev($user->name)}}</span>
                        </td>
                        <td class="border-t border-gray-200 border-dashed emailAddress">
                            <span class="flex items-center px-6 py-3 text-gray-700">{{$user->email}}</span>
                        </td>
                        <td class="border-t border-gray-200 border-dashed gender">
                            <span class="flex items-center px-6 py-3 text-gray-700">Male</span>
                        </td>
                        <td class="border-t border-gray-200 border-dashed phoneNumber">
                            <span class="flex items-center px-6 py-3 text-gray-700">{{$user->id}}626v3246634</span>
                        </td>
                    </tr>
                    @endforeach

            </tbody>
        </table>

    </div>
    {{$users->links()}}
</div>

<script>
    function datatables() {
        return {
            headings: [
                {
                    'key': 'userId',
                    'value': 'User ID'
                },
                {
                    'key': 'firstName',
                    'value': 'Firstname'
                },
                {
                    'key': 'lastName',
                    'value': 'Lastname'
                },
                {
                    'key': 'emailAddress',
                    'value': 'Email'
                },
                {
                    'key': 'gender',
                    'value': 'Gender'
                },
                {
                    'key': 'phoneNumber',
                    'value': 'Phone'
                }
            ],
            users: [],
            selectedRows: [],

            open: false,

            toggleColumn(key) {
                // Note: All td must have the same class name as the headings key!
                let columns = document.querySelectorAll('.' + key);

                if (this.$refs[key].classList.contains('hidden') && this.$refs[key].classList.contains(key)) {
                    columns.forEach(column => {
                        column.classList.remove('hidden');
                    });
                } else {
                    columns.forEach(column => {
                        column.classList.add('hidden');
                    });
                }
            },

            getRowDetail($event, id) {
                let rows = this.selectedRows;

                if (rows.includes(id)) {
                    let index = rows.indexOf(id);
                    rows.splice(index, 1);
                } else {
                    rows.push(id);
                }
            },

            selectAllCheckbox($event) {
                let columns = document.querySelectorAll('.rowCheckbox');

                this.selectedRows = [];

                if ($event.target.checked == true) {
                    columns.forEach(column => {
                        column.checked = true
                        this.selectedRows.push(parseInt(column.name))
                    });
                } else {
                    columns.forEach(column => {
                        column.checked = false
                    });
                    this.selectedRows = [];
                }
            }
        }
    }
</script>
</div>
