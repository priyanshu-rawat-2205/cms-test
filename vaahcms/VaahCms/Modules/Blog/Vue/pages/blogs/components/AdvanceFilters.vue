<script  setup>

import { useBlogStore } from '../../../stores/store-blogs'
import VhFieldVertical from './../../../vaahvue/vue-three/primeflex/VhFieldVertical.vue'

const store = useBlogStore();

</script>

<template>
    <div class="col-3" v-if="store.show_advance_filters">

            <Panel class="is-small">

                <template class="p-1" #header>

                    <div class="flex flex-row">
                        <div >
                            <b class="mr-1">Advance Filters</b>
                        </div>

                    </div>

                </template>

                <template #icons>

                    <div class="p-inputgroup">

                        <Button data-testid="blogs-hide-filter"
                                class="p-button-sm"
                                @click="store.show_advance_filters = false">
                            <i class="pi pi-times"></i>
                        </Button>

                    </div>

                </template>

            <VhFieldVertical>

                <template #label>
                    <b>Filter By Categories:</b>
                </template>

                <MultiSelect 
                    v-model="store.query.filter.categories" 
                    display="chip" 
                    filter
                    :options="store.assets.bl_category" 
                    optionLabel="name"
                    optionValue="id"
                    placeholder="Select Categories"
                    class="w-full" 
                />

            </VhFieldVertical>

            <Divider/>

            <VhFieldVertical>

                <template #label>
                    <b>Filter By Status:</b>
                </template>

                <MultiSelect 
                    v-model="store.query.filter.status" 
                    display="chip" 
                    filter
                    :options="store.assets.vh_taxonomy_status" 
                    optionLabel="name"
                    optionValue="id"
                    placeholder="Select Status"
                    :maxSelectedLabels="3" 
                    class="w-full" 
                />

            </VhFieldVertical>

            <Divider/>

            <VhFieldVertical>

                <template #label>
                    <b>Filter By Tags:</b>
                </template>

                <MultiSelect 
                    v-model="store.query.filter.tags" 
                    display="chip" 
                    filter
                    :options="store.assets.bl_tags" 
                    optionLabel="name"
                    optionValue="id"
                    placeholder="Select Status"
                    :maxSelectedLabels="3" 
                    class="w-full" 
                />

            </VhFieldVertical>


        </Panel>

    </div>
</template>
