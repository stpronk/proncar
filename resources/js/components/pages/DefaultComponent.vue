<template>
    <main>
        <component v-for="component in components"
                   v-bind:key="component.uuid"
                   v-bind:is="component.name"
                   :content="component.content"
                   :uuid="component.uuid"
                   :page="page"
                   :auth="auth"></component>
    </main>
</template>

<script>
    import { uuid } from 'vue-uuid';

    export default {
        props: {
            page: {required: true},
            items: {type: Object, required: true},
            auth: {required: true},
        },
        data() {
            return {
              uuid: uuid.v4()
            }
        },
        computed: {
            components: function () {
                const array = [];
                Object.entries(this.items).forEach(([key,item]) => {
                    array.push({
                      uuid: key ? key : this.uuid,
                      name: item.blade + '-component',
                      content: item.content
                    });
                });
                return array;
            }
        }

    }
</script>