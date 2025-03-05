<script>
import { Head, Link } from '@inertiajs/vue3';
import Book from '@/Components/Book.vue';
import Modal from "@/Components/Modal.vue"
import { defineComponent } from 'vue';
import Section from '@/Components/Section.vue';
import MainLayout from '@/Components/MainLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { defineProps, ref } from 'vue';

export default defineComponent({
    layout : MainLayout,
    
    components: {
        Head,
        Link,
        Book,
        Modal,
        Section,
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

<script setup>
const  form = useForm({ book_id:'' });

const  checkoutBook =(id) => {
            form.book_id = id;
            form.post('/checkout', {
                onSuccess: () => {
                    alert('Book Checked out');
                },
                OnError: (errors) => {
                    alert('Something went wrong!');
                }
            });
        }

</script>


<template>
                <section>
                    <div class="grid grid-cols-3">
                            <div v-for="book in books">
                                <Book 
                                :title="book.title"
                                :author="book.author"
                                :description="book.description"
                                :image_url = "book.image"
                                > 
                              
                                <button
                                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                                type="submit"
                               
                                @click="

                                contacting =true;
                                method = 'get';
                                action = route('books.show', [book.id])
                                    id = book.id;
                                    title = book.title;
                                    author = book.author;
                                    publisher = book.publisher;
                                    pageCount = book.pageCount;
                                    description = book.description;
                                    category = book.category;
                                    coverImage = book.coverImage;
                                    image_url   = book.image;
                                    stock   = book.quantity;
                                    checkout = book.checkout;
                                "
                                >
                                Read More
                                </button>
                                </Book>
                               
                            </div>
                </div>
                </section>
                


                <Modal :show="contacting" :closeable="true" @close="contacting=false">
                    <form @submit.prevent = "submit" >

                    <div class="bg-white rounded-lg p-4 flex flex-col ">
                    
                        <div class="relative flex bg-clip-border rounded-xl bg-white text-gray-700 shadow-md w-full max-w-[48rem] flex-row">
                        <div class="relative w-2/5 m-0 overflow-hidden text-gray-700 bg-white rounded-r-none  bg-clip-border rounded-xl shrink-0">
                        <img
                           :src="image_url"
                            alt="card-image" class="object-cover w-full h-full" />
                        </div>
                    <div class="p-6">
                        <h6
                            class="block mb-4 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-gray-700 capitalize">Publisher:
                        {{ publisher }}
                        </h6>
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 capitalize">
                        {{ title  }}
                        </h4>
                        <p class="capitalize py-2">Author:  {{ author }}</p>
                        <p class="normal-case py-2">Summary: {{ description }}</p>
                        <p class="py-2"> Page Count: {{ pageCount }}</p>
                        <p class="capitalize py-2"> Category: {{ category ? category.title : "Uncategorized" }}</p>

                        <div class="flex flex-col justify-end">
                            <div class="py-2">
                            <button
                            
                            type="button"

                            @click="checkoutBook(id)" :disabled="stock === 0 || checkout"
                            
                            class="flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none hover:bg-gray-900/10 active:bg-gray-900/20"

                            :class="stock === 0 || checkout ? 'bg-gray-400 cursor-not-allowed': ''"                     
                            >
                            Check Out
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"></path>
                            </svg>
                            </button>

                            </div>
                           
                            <div class="py-2">
                           <p class="py-2" v-if="stock===0"><span  class="text-red-400 font-medium ml-2">Note: Book is out of stock</span></p> 
                           </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </form>  
                </Modal>
</template>
