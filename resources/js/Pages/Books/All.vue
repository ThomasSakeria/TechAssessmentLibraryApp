<script>
import { defineComponent } from 'vue';
import Modal from '@/Components/Modal.vue';
import MainLayout from '@/Components/MainLayout.vue';
import { Link,Head } from '@inertiajs/vue3';
import AdminDashboard from '@/Components/AdminDashboard.vue';

export default defineComponent({
    layout : MainLayout,
        components: {
        Modal,
        Head,
        Link,
        AdminDashboard
},
props:{
    books:Object,
},
methods:{
    submit(){
        this.form.submit(this.method, this.action,{
            onSuccess: () => {
                this.form.reset('title');
                this.form.reset('author');
                this.acting = false;
            }
        }
    );
    }

},
data(){
        return {
            acting :false,
            method : null,
            action : null,
            closeable: true,
            form: this.$inertia.form({
                'title' : '',
                'author' : '',
                'description': '',
                'publisher': '',
                'category' : '',
                'pageCount' : '',
                'coverImage' : '',
                'quantity' : 1,

            })
        }
    }
})

</script>

<template>
          <AdminDashboard>
                <div class="max-w-7xl mx-auto py-2  border border-gray-500">
                    <div class="flex justify-start py-2">
                    <button
                    class="middle none center mr-4 rounded-lg border border-grteen-500 text-green-500 py-2 px-4 font-sans text-xs font-bold uppercase shadow-md shadow-gray-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true">
                    <Link
                    :href="route('books.create')">
                    Add New Book
                    </Link>
                    </button> 
                </div>
                <div class="bg-white shadow-xl sm:rounded-lg">
                      
                <table v-if="books.length > 0" class="items-center bg-transparent w-full border-collapse">
                <thead>
                <tr>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Book Title
                                </th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Author
                                </th>
                   
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Publisher
                                </th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Category
                                </th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Actions
                                </th>
                   
                </tr>
                </thead>

                <tbody  v-for="book in books">
                <tr>
                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 capitalize">
                        {{ book.title }}
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 capitalize">
                        {{ book.author }}
                        </td>
                       
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 capitalize">
                        {{ book.publisher }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 capitalize">
                        {{ book.category ? book.category.title : "Uncategorized" }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <button
                            class="middle none center mr-4 rounded-lg border border-blue-500 py-2 px-4 text-blue-500 font-sans text-xs font-bold uppercase  shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-gray-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-light="true"
               
                            @click="acting =true;
                            method = 'put';
                            action = route('books.update', [book.id])
                            form.title = book.title;
                            form.author = book.author;
                            form.publisher = book.publisher;
                            form.description = book.description;
                            form.category = book.category;
                            form.coverImage = book.coverImage;
                            form.pageCount = book.pageCount;
                            "
                            >
                            Edit
                            </button>
                            <button
                            class="middle none center mr-4 rounded-lg border border-red-500 py-2 px-4 font-sans text-xs font-bold uppercase text-red-500 shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-light="true"

                            @click = "method = 'delete';
                            action = route('books.destroy', [book.id]);
                            submit();"
                            >
                            Delete
                            </button>                        
                        </td>
                        
                </tr>
          
        </tbody>

      </table>
      <div v-else class="bg-red-100 border border-red-400 p-3 rounded-lg text-red-800 text-left mgt-5">There are no Books to display!! Add one to List..</div>
                   

                </div>
            </div>
                
            <Modal :show="acting" :closeable="true" @close="acting=false">
                 <form @submit.prevent = "submit" >
                    <div class="bg-white rounded-lg p-4 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Edit Book</h2>
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
                    <input type="text" id="category" name="category" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required
                    v-model="form.category"

                    >
                </div>
                <div class="relative mb-2">
                    <label for="pageCount" class="leading-7 text-sm text-gray-600">Page Count</label>
                    <input type="text" id="pageCount" name="pageCount" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                    v-model="form.pageCount" required

                    >
                </div>
                <div class="relative mb-2">
                    <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
                    <textarea id="description" name="description" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                    v-model="form.description" required

                    ></textarea>
                </div>
                <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                :disabled="form.processing"
                >
                <span class="animate-spin mr-1" v-show="form.processing">&#9696</span>
                <span v-show="!form.processing">Submit</span></button>
                </div>
                 </form>      
               
                <p class="text-xs text-gray-500 mt-3"></p>
               
                
            </Modal>
          </AdminDashboard>

        
</template>

