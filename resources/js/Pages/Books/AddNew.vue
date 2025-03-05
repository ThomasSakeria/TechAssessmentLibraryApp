

<script setup>

import { useForm } from '@inertiajs/vue3'

const form = useForm({
        images: '',
        'title' : '',
        'author' : '',
        'description': '',
        'publisher': '',
        'category' : '',
        'pageCount' : '',
        'quantity' : 1,

});

const upload = () => {
  form.post(
    route('books.store'),
    {
      onSuccess: () => form.reset('images'),
    }
  )
}


const addFiles = (event) => {
    form.images  = event.target.files[0];

}

</script>

<script>
import { Link,Head } from '@inertiajs/vue3';
import { defineComponent } from 'vue';
import MainLayout from '@/Components/MainLayout.vue';
import AdminDashboard from '@/Components/AdminDashboard.vue';
export default defineComponent({
    layout :  MainLayout,
        components: {
        Head,
        Link,
        AdminDashboard,
},
props:{
        categories: Object,

    },

});
</script>


<template #header>
<AdminDashboard>
    <div class="mx-auto grid max-w-4xl grid-cols-12 p-1">
         <div class="col-span-1"></div>
    <div class="col-span-10 rounded-lg border border-gray-500 bg-gray-200">
        <form @submit.prevent="upload">
        <div class="bg-white rounded-lg p-4 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Add New Book</h2>
                <div class="relative mb-2">
                    <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                    <input type="text" id="title" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required
                    v-model="form.title"
                    >
                </div>
                <div class="relative mb-2">
                    <label for="author" class="leading-7 text-sm text-gray-600">Author</label>
                    <input type="text" id="author" name="author" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required
                    v-model="form.author"

                    >
                </div>
                <div class="relative mb-2">
                    <label for="publisher" class="leading-7 text-sm text-gray-600">Publisher</label>
                    <input type="text" id="publisher" name="publisher" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required
                    v-model="form.publisher"
                    >
                </div>
                <div class="relative mb-2">
                    <label for="category" class="leading-7 text-sm text-gray-600">Category</label>
                    <select
                            v-model="form.category"
                            id="category"
                            name="category"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-lg"
                            >
                            <option value="" disabled>Select Book Category</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">
                                {{ category.title }}
                            </option>
                            </select>

                </div>
                <div class="relative mb-2">
                    <label for="pageCount" class="leading-7 text-sm text-gray-600">Page Count</label>
                    <input type="text" id="pageCount" name="pageCount" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                    v-model="form.pageCount" required

                    >
                </div>
                <div class="relative mb-2">
                    <label for="coverImage" class="leading-7 text-sm text-gray-600">Cover Image</label>
                    <input type="file"   id="coverImage" name="coverImage" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                    required @input="addFiles"
                    >
                </div>
                <div class="relative mb-2">
                    <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
                    <textarea id="description" name="description" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                    v-model="form.description" required
                    ></textarea>
                </div>
                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                :disabled="form.processing"
                >
                <span class="animate-spin mr-1" v-show="form.processing">&#9696</span>
                <span v-show="!form.processing">Submit</span>
                </button>
                
                
        </div>

    </form>
  

    </div>
</div>

</AdminDashboard>

    
</template>

