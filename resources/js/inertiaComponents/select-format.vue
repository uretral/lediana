<template>

    <div class="lg:min-w-[17rem] lg:max-w-[30rem] ml-20 relative"  @click="open = false">
        <div
            @click="open = !open" :class="open ? 'select--focus' : '' "
            class="select select--sm md:select--md select--rounded-sm select--no-border select--caret-position  ">
            <div class="select__primary">
                <button v-if="size" type="button" class="select-selected-option select-selected-option--single">
                    {{size.sizes}} см
                </button>
                <button v-else type="button" class="select__control select__control--button">Размеры</button>
            </div>
            <div class="select__actions">
                <div class="select__arrow"></div>
            </div>
            <div class="select-dropdown" :class="open ? 'select-dropdown--active' : '' ">
                <ul tabindex="-1" role="listbox" aria-labelledby="" id="test-list" class="select__options" v-if="groupedSizes">

                    <div v-for="(sizes, title) in groupedSizes" class="select-optgroup" aria-disabled="false">

                        <div class="select-optgroup__title">{{sizes.format.title}}</div>
                        <div class="select-optgroup__list">
<!--                            <li  v-for="size in sizes"
                                class="select-option @if($this->printout->size->id === $size->size_id) select-option&#45;&#45;focused @endif"
                               @click="onFormatChanged(size.size_id)">
                                {{size.size.sizes}} см
                            </li>-->
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>


</template>

<script>
export default {
    name: "select-format",
    props: {
        size: Object,
        sizes: Array
    },
    data() {
        return {
            open: false
        }
    },
    computed: {
        groupedSizes() {
            return this.sizes.filter( i => i.size.ratio_id == this.size.ratio_id)
        }
    },
    methods: {
        onFormatChanged: (size_id) => {},
    },
}
</script>
<!--

    public function groupedSizes()
    {
        return $this->printout->sizes
            ->where('size.ratio_id', $this->printout->size->ratio_id)
            ->groupBy('format.title');
    }

-->


