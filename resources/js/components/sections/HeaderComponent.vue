<template>
    <header class="masthead text-white text-center">

        <div v-if="this.content.overlay" class="overlay"></div>

        <div v-if="this.content.logo" class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <img class="mb-6 " width="100%" height="auto" :alt="this.content.alt" :src="this.content.src">
                </div>
            </div>
        </div>

    </header>
</template>

<script>
    export default {
        props: {
            content: {type: Object, required: true}
        }
    }
</script>