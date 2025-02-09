<nav class="fixed start-0 top-0 z-50 w-full border-b border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-900">
    <div class="_max-w-screen-xl _p-4 container mx-auto flex flex-wrap items-center justify-between py-4">
        <a
            href="https://flowbite.com/"
            class="flex items-center space-x-3 rtl:space-x-reverse"
        >
            <span class="self-center whitespace-nowrap text-2xl font-semibold dark:text-white">Agathe Grinwis</span>
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            {{-- <button
                type="button"
                class="rounded-lg bg-blue-700 px-4 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >Get started</button> --}}
            @auth
                <livewire:ui.auth.logout />
            @endauth

            @guest
                <a
                    href="{{ route('login') }}"
                    class="rounded-lg bg-blue-700 px-4 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >Login</a>
            @endguest
            <button
                data-collapse-toggle="navbar-sticky"
                type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="h-5 w-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
            </button>


            {{-- <div class="grid grid-cols-2 gap-2 p-2">
                <button
                    class="button"
                    data-drawer-target="drawer-left"
                >
                    Drawer Left
                </button>
                <button
                    class="button"
                    data-drawer-target="drawer-right"
                >
                    Drawer Right
                </button>
                <button
                    class="button"
                    data-drawer-target="drawer-top"
                >
                    Drawer Top
                </button>
                <button
                    class="button"
                    data-drawer-target="drawer-bottom"
                >
                    Drawer Bottom
                </button>
                <button
                    class="button"
                    data-drawer-target="drawer-backdrop-blur"
                >
                    Drawer Backdrop Blur
                </button>
                <button
                    class="button"
                    data-drawer-target="drawer-shadow"
                >
                    Drawer Shadow
                </button>
            </div>

            <dialog
                id="drawer-left"
                class="drawer drawer-left drawer-backdrop-blur drawer-shadow"
                data-drawer-position="left"
            >
                <button data-drawer-close>close</button>
                <p>content left</p>
            </dialog>
            <dialog
                id="drawer-right"
                class="drawer drawer-right drawer-backdrop-blur drawer-shadow"
                data-drawer-position="right"
            >
                <button data-drawer-close>close</button>
                <p>content right</p>
            </dialog>
            <dialog
                id="drawer-top"
                class="drawer drawer-top drawer-backdrop-blur drawer-shadow"
                data-drawer-position="top"
            >
                <button data-drawer-close>close</button>
                <p>content top</p>
            </dialog>
            <dialog
                id="drawer-bottom"
                class="drawer drawer-bottom drawer-backdrop-blur drawer-shadow"
                data-drawer-position="bottom"
            >
                <button data-drawer-close>close</button>
                <p>content bottom</p>
            </dialog>

            <dialog
                id="drawer-backdrop-blur"
                class="drawer"
                data-drawer-backdrop-blur="true"
                data-drawer-position="left"
            >
                <button data-drawer-close>close</button>
                <p>content backdrop blur</p>
            </dialog>

            <dialog
                id="drawer-shadow"
                class="drawer"
                data-drawer-shadow="true"
                data-drawer-position="left"
            >
                <button data-drawer-close>close</button>
                <p>content shadow</p>
            </dialog> --}}



        </div>
        <div
            class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto"
            id="navbar-sticky"
        >
            <ul
                class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0 rtl:space-x-reverse dark:border-gray-700 dark:bg-gray-800 md:dark:bg-gray-900">
                <li>
                    <a
                        href="{{ route('home') }}"
                        class="block rounded-sm bg-blue-700 px-3 py-2 text-white md:bg-transparent md:p-0 md:text-blue-700 md:dark:text-blue-500"
                        aria-current="page"
                    >Home</a>
                </li>
                <li>
                    <a
                        href="{{ route('products.list') }}"
                        class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                    >Shop</a>
                </li>
                <li>
                    <a
                        href="#"
                        class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                    >About</a>
                </li>
                <li>
                    <a
                        href="#"
                        class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                    >Services</a>
                </li>
                <li>
                    <a
                        href="#"
                        class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                    >Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
