<script>

import { Head, Link } from '@inertiajs/vue3';
import { defineComponent } from 'vue';
import Book from '@/Components/Book.vue';
import Modal from "@/Components/Modal.vue"
import Section from '@/Components/Section.vue';
import MainLayout from '@/Components/MainLayout.vue';
import AdminDashboard from '@/Components/AdminDashboard.vue';


export default defineComponent({
    layout : MainLayout,

    components: {
        Head,
        Link,
        Book,
        Modal,
        Section,
        AdminDashboard,
    },
    props:{
        books: Object,
    },
    data(){
        return {
            contacting :false,
            closeable: true,
            method : null,
            action : null,
        }
    }
});



</script>

<template>
    <AdminDashboard>
    <section>
                <div class="max-w-7xl mx-auto   border border-gray-500">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-gray-600 ">
                Library Book Management : Librarian Console
                </h4>
                </div>
                    <ul class="border border-gray-200 rounded overflow-hidden shadow-md">
                    <li class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                    <Link :href="route('books.index')" class="hover:text-gray-800 mt-2 text-sm text-indigo-500 border-gray-400">
                    Books Inventory
                    </Link>
                    </li>
                    <li class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                    <Link :href="route('category.index')" class="hover:text-gray-800 mt-2 text-sm text-indigo-500 border-gray-400">
                    Book Categories
                    </Link>
                    </li>
                    </ul>
                </div>
                </div>
                </div>
                </div>
                </div>
            </section>
    </AdminDashboard>      
</template>
