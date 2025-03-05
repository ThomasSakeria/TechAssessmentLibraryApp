<template>

        <nav class="bg-gray-800">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="flex h-16 items-center justify-between">
                            <div class="flex items-center">
                            <div class="shrink-0">

                                <Link :href="'/'">
        <svg
            class="size-12"
            viewBox="0 0 48 48"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5" />
            <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5" />
        </svg>
    </Link>

                            </div>
                            </div>
                
                            <div class="ml-4 flex items-center md:ml-6">
                                
                                <div v-if="user"> 
                                    <span class="text-white mr-5 capitalize">{{ user.name }} </span>
                                    <Link :href="route('logout')" method="delete" as="button">   
                                        <span class="text-white mr-5">Log Out</span>
                                    </Link>
                                </div>

                                <div v-else>  
                                    <Link :href="route('login')">
                                    <span class="text-white mr-5">Login</span>   
                                    </Link>
                                    <Link :href="route('user-account.create')">   
                                    <span class="text-white mr-5">Register</span>
                                    </Link>
                                </div>

                            </div>
                    </div>
                </div>
        </nav>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <slot>Default</slot>
        </div>

</template>

<script setup>

import { Link,usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import ApplicationMark from './ApplicationMark.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

 

const page = usePage();
const flashSuccess = computed(
    () => page.props.flashSuccess,
)

const user = computed(
    () => page.props.user,
)

defineProps({


});

</script>