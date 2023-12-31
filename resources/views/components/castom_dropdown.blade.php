@props(['title' => 'title'])

<div class="relative " data-te-dropdown-hover-toggle-ref>
    <button

            class="flex items-center text-neutral-500 whitespace-nowrap bg-white text-lg font-medium  shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-osut hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none hover:text-neutral-700"


            type="button"
            id="dropdownMenuButton9"
            data-te-dropdown-toggle-ref
            aria-expanded="false"
            data-te-ripple-init>

       {{ $title }}
        <span class="ml-2 w-2">
      <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
              class="h-5 w-5">
        <path
                fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd" />
      </svg>
    </span>
    </button>
    <ul
            class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
            aria-labelledby="dropdownMenuButton9"
            data-te-dropdown-menu-ref>
        <li>
            <a
                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-lg  font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                    href="#"
                    data-te-dropdown-item-ref
            >action</a
            >
        </li>
        <li>
            <a
                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-lg  font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                    href="#"
                    data-te-dropdown-item-ref
            >another 2</a
            >
        </li>

    </ul>
</div>