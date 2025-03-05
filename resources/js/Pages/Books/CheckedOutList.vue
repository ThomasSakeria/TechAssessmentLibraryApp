<script setup>
import { useForm,usePage } from '@inertiajs/vue3';
import { defineComponent } from 'vue';
import MainLayout from '@/Components/MainLayout.vue';
import { Link,Head } from '@inertiajs/vue3';
import AdminDashboard from '@/Components/AdminDashboard.vue';


const form = useForm({ book_id : ''});
const page = usePage();

console.log(page.props.flash)
const returnBook = (id) => {
    form.book_id = id;
    form.post('/return-book', {
        preserveScroll:true,
    });
}

</script>

<script>
export default defineComponent({
    layout : MainLayout,
        components: {
        Head,
        Link,
        AdminDashboard
},
props:{
    books:Object,
},
})

</script>








<template>
            <div v-if="page.props.flash?.message" class="mb-4 bg-green text-white rounded">
                {{ page.props.flash.message }}
               </div>

          <AdminDashboard>
                <div class="max-w-7xl mx-auto py-2  border border-gray-500">

               


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
               
                            @click="returnBook(book.id)"
                            >
                            Mark As Returned
                            </button>
                                                  
                        </td>
                        
                </tr>
          
        </tbody>

      </table>
      <div v-else class="bg-red-100 border border-red-400 p-3 rounded-lg text-red-800 text-left mgt-5">There are no Books to display in the Checked out List!!</div>
                   

                </div>
            </div>
                
          </AdminDashboard>
</template>