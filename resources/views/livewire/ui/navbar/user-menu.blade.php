<div>
    @guest
        <button
            class="relative inline-flex h-10 items-center justify-center gap-1 rounded-md px-2 text-sm font-semibold hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200"
            data-drawer-target="user-menu__drawer"
        >
            <span class="sr-only">Open User Menu</span>
            <svg
                class="size-6"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    fill-rule="evenodd"
                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                    clip-rule="evenodd"
                />
            </svg>
            <span class="hidden md:inline-flex">Log-In</span>
            <span
                class="absolute -top-1 left-[25px] flex size-4 items-center justify-center rounded-full bg-red-500 text-white"
            >
                <svg
                    class="size-3 text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"
                    />
                </svg>
            </span>
        </button>

        <dialog
            id="user-menu__drawer"
            class="drawer drawer-right drawer-backdrop-blur drawer-shadow w-96 p-4"
            data-drawer-position="right"
        >
            <button data-drawer-close>close</button>
            <p>content right</p>
            <livewire:ui.auth.login />
        </dialog>
    @endguest


    @auth
        <button
            class="user-menu__button relative inline-flex h-10 items-center justify-center gap-1 rounded-md px-2 text-sm font-semibold hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200"
            popovertarget="user-menu__popover"
        >
            <span class="sr-only">Open User Menu</span>
            <svg
                class="size-6"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    fill-rule="evenodd"
                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                    clip-rule="evenodd"
                />
            </svg>
            <span class="hidden md:inline-flex">{{ $user->name }}</span>
            <span
                class="absolute -top-1 left-[25px] flex size-4 items-center justify-center rounded-full bg-green-400 text-white"
            >
                <svg
                    class="size-3 text-white"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 11.917 9.724 16.5 19 7.5"
                    />
                </svg>
            </span>
        </button>

        <dialog
            id="user-menu__popover"
            class="menu__popover user-menu__popover custom-shadow ml-4 mt-1 w-[calc(100%-2rem)] rounded-md p-4 sm:w-96"
            popover
        >
            user menu
            <livewire:ui.auth.logout />
        </dialog>
    @endauth














    {{-- <button
        class="user-menu__button relative inline-flex h-10 items-center justify-center gap-1 rounded-md px-2 text-sm font-semibold hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200"
        popovertarget="user-menu__popover"
    >
        <span class="sr-only">Open login menu</span>
        <svg
            class="size-6"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                fill-rule="evenodd"
                d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                clip-rule="evenodd"
            />
        </svg>
        <!-- <span class="hidden md:inline-flex">Log In</span> -->

        @auth
            <span class="hidden md:inline-flex">Jaco Grinwis</span>
        @endauth

        @guest
            <span class="hidden md:inline-flex">Log In</span>
        @endguest

        <span
            class="absolute -top-1 left-[25px] flex size-4 items-center justify-center rounded-full bg-green-400 text-white"
        >
            <svg
                class="size-3 text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
            >
                <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 11.917 9.724 16.5 19 7.5"
                />
            </svg>
        </span>
    </button>

    <button
        class="button"
        data-drawer-target="drawer-right"
    >
        Drawer Right
    </button>
    <dialog
        id="user-menu__popover"
        class="menu__popover user-menu__popover custom-shadow ml-4 mt-1 w-[calc(100%-2rem)] rounded-md p-4 sm:w-96"
        popover
    >
        user menu
    </dialog> --}}
</div>
