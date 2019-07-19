<template>
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h2 class="mb-5" v-text="content.head"></h2>
                    <div class="col-xl-9 mx-auto">
                        <div class="row">
                            <div v-for="item in content.items" :class="'col-' + (12 / content.item_count)">
                                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                    <a class="text-decoration-none features-icons-icon d-flex" :href="item.href" target="_blank">
                                        <i :class="'icon-'+item.icon" class="m-auto text-primary"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="row" v-if="content.contact">
                            <div class="col-md-11 mx-auto mt-5">
                                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                    <a class="text-decoration-none d-flex text-center" :href="$routes.route(content.contact.route)">
                                        <button class="btn btn-lg btn-outline-primary w-100" v-text="content.contact.head"></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        props: {
            content: {type: Object, required: true}
        }
    }
</script>