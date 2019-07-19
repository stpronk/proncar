<template>
    <main>
        <component v-for="component in components" v-bind:key="component.id" v-bind:is="component.name" :content="component.content"></component>
    </main>
</template>

<script>
    export default {
        props: {
            items: {type: Array, required: true}
        },
        data() {
            return {}
        },
        computed: {
            components: function(){
                let i = 0;
                return this.items.map(function(item){
                    i++;
                    return {
                        id: i,
                        name: item.blade+'-component',
                        content: item.content
                    }
                })
            }
        }

    }
</script>