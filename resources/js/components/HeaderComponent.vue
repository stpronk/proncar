<template>
    <header :class="{'d-none d-md-block': this.content.logo}" class="masthead text-white text-center">

        <div v-if="this.content.overlay" class="overlay"></div>

        <div v-if="this.content.logo" class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <img class="mb-6 " width="auto" height="auto" :alt="this.content.logo.alt" :src="this.content.logo.src">
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