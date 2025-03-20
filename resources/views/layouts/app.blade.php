<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/190/190411.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
          @apply rounded-md px-4 py-2 text-center font-medium text-white bg-indigo-600 shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200
        }

        .btn-danger {
          @apply rounded-md px-4 py-2 text-center font-medium text-white bg-red-600 shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200
        }

        .btn-secondary {
          @apply rounded-md px-4 py-2 text-center font-medium text-gray-700 bg-white shadow-sm ring-1 ring-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200
        }

        .link {
          @apply font-medium text-indigo-600 hover:text-indigo-700 transition-colors duration-200
        }

        .form-input {
          @apply mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm
        }

        .form-label {
          @apply block text-sm font-medium text-gray-700 mb-1
        }

        .form-group {
          @apply mb-6
        }

        textarea {
          @apply leading-relaxed
        }
    </style>
    {{-- blade-formatter-enable --}}

    @yield('styles')
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-10 max-w-3xl">
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">@yield('title')</h1>

            <div x-data="{
                show: {{ session()->has('success') ? 'true' : 'false' }},
                message: '{{ session('success') }}',
                timer: null,
                init() {
                    if (this.show) {
                        this.timer = setTimeout(() => {
                            this.show = false;
                        }, 5000);
                    }
                },
                hide() {
                    this.show = false;
                    clearTimeout(this.timer);
                }
            }">
                <div x-show="show"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="mb-4 rounded-md bg-green-50 p-4">
                    <div class="flex justify-between">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800" x-text="message"></p>
                            </div>
                        </div>
                        <button @click="hide()" class="text-green-700 hover:text-green-900 focus:outline-none" aria-label="Close">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div>
                @yield('content')
            </div>
        </div>
        <footer class="text-center text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} Laravel 11 Task List</p>
        </footer>
    </div>
</body>

</html>
