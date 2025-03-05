
<script>
export default {
    props: [
        'title',
        'description',
        'author',
        'image_url',
    ]
}
</script>

<template>
    <section>
        <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96 h-80 ">
            <div
                class="relative h-64 mx-4  overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                <img :src="image_url"
                    alt="card-image" />
            </div>
            <div class="p-3">
                <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 capitalize">
                {{ title }}
                </h5>
                <p class="block mb-2 font-sans text-sm antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                Author : {{ author }}
                </p>
                <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                {{ description }}
                </p>
            </div>
            <div class="p-3 pt-0 my-auto">
                <slot></slot>  
            </div>
        </div>
    </section>
</template>

