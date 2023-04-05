<template>

    <div class="main-wrapper bg-divider">


        <div class="mt-32 sm:my-64">
            <div class="container">
                <div class="flex items-center mb-8 sm:mb-16">

                    <h2 class="text-xl sm:text-2xl md:text-3xl font-black -translate-y-5">Фотокнига</h2>
                    <!--  format  -->
                    <select-format :size="service.size" :sizes="service.sizes"/>
<!--                    <x-editor.a-row.select-format/>-->

                    <!--  delete-block  -->
<!--                    <x-editor.a-row.save-delete-block/>-->

                </div>

                <!-- spread-buttons -->
<!--                <x-editor.b-row.spread-buttons/>-->

                <div x-data="cropper" class="grid lg:grid-cols-[1fr,26rem] gap-20 xl:gap-40">
                    <!-- spread-editor -->
<!--                    <x-editor.c-row.spread-editor wire:key="spread-editor"/>-->
                    <!-- photo-uploader -->
<!--                    <x-editor.c-row.photo-uploader/>-->
                </div>

            </div>
        </div>



    </div>

</template>

<script>

import SelectFormat from "../inertiaComponents/select-format";
export default {
    props: {
        service: Array
    },
    components: {
        SelectFormat

    }

}
</script>
