<template>
    <section class="showcase">
        <div v-for="item in content.items" class="container-fluid p-0">
            <div v-if="iteration() === true" class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img background-cover"
                    :style="'background: url('+ item.image+') no-repeat center center;'"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2 v-text="item.head"></h2>
                    <p v-text="item.body" class="lead mb-0"></p>
                    <div class="mt-4 mr-auto">
                        <a :href="$routes.route(item.route_key)">
                            <button class="btn btn-lg btn-primary font-weight-bold" v-text="item.route_name"></button>
                        </a>
                    </div>
                </div>
            </div>

            <div v-else class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img background-cover"
                    :style="'background: url('+ item.image+') no-repeat center center;'"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2 v-text="item.head"></h2>
                    <p v-text="item.body" class="lead mb-0"></p>
                    <div class="mt-4 mr-auto">
                        <a :href="$routes.route(item.route_key)">
                            <button class="btn btn-lg btn-primary font-weight-bold" v-text="item.route_name"></button>
                        </a>
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
        },
        methods: {
            iteration: function () {
                return this.content.side = !this.content.side;
            }
        }
    }
</script>
