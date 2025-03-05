<script setup>

import { Link,usePage } from '@inertiajs/vue3';


</script>


<template>

        <nav class="bg-white border border-gray-200 dark:border-gray-700 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800 shadow">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
        <Link :href="route('admin.index')" class="flex items-center">
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
        Dashboard
        </span>
        </Link>
  
        <div class="w-full md:block md:w-auto hidden" >
        <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
        <li>
        <Link
        :href="route('books.index')"
        class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
        aria-current="page"
        >
        Books Listing
        </Link>
        </li>
        <li>
        <Link
       :href="route('category.index')"
        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
        >
        Categories Listing
        </Link>
        </li>
        <li>
        <Link
       :href="route('checkedout')"
        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
        >
        Checked out Books 
        </Link>
        </li>
        </ul>
        </div>
  
        </div>
        </nav>
        <slot>Default</slot>

</template>