<template>
    <section class="showcase">
        <div v-for="item in items" class="container-fluid p-0">
            <div v-if="iteration() === true" class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img background-cover"
                    :style="'background: url('+ item.image+') no-repeat center center;'"></div>
                <div class="col-lg-6 my-auto showcase-text">

                    <h2 v-if="auth">
                        <text-edit-component :page="item.page" :path="item.path" :uuid="item.uuid" :change="'head'" :body="item.head" :options="{
                                bold: true,
                                italic: true,
                                strike: true,
                                underline: true
                            }"></text-edit-component>
                    </h2>
                    <h2 v-else v-html="item.head"></h2>

                    <p v-if="auth" class="lead mb-0">
                        <text-edit-component :page="item.page" :path="item.path" :uuid="item.uuid" :change="'body'" :body="item.body" :options="{
                                bold: true,
                                italic: true,
                                strike: true,
                                underline: true
                            }"></text-edit-component>
                    </p>
                    <p v-else class="lead mb-0" v-html="item.body">

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

                    <h2 v-if="auth">
                        <text-edit-component :page="item.page" :path="item.path" :uuid="item.uuid" :change="'head'" :body="item.head" :options="{
                                bold: true,
                                italic: true,
                                strike: true,
                                underline: true
                            }"></text-edit-component>
                    </h2>
                    <h2 v-else v-html="item.head"></h2>

                    <p v-if="auth" class="lead mb-0">
                        <text-edit-component :page="item.page" :path="item.path" :uuid="item.uuid" :change="'body'" :body="item.body" :options="{
                                bold: true,
                                italic: true,
                                strike: true,
                                underline: true
                            }"></text-edit-component>
                    </p>
                    <p v-else class="lead mb-0" v-html="item.body">

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
            content: {
              type: Object,
              required: true
            },
            page: {
              type: String,
              required: true
            },
            uuid: {
              type: String,
              required: true
            },
            auth: {
              required: true
            }
        },
        methods: {
            iteration: function () {
                return this.content.side = !this.content.side;
            }
        },
        computed: {
          items: function () {
            const array = [];
            Object.entries(this.content.items).forEach(([key, item]) => {
              array.push({
                page: this.page,
                path: this.uuid+'.content.items',
                uuid: key,
                image: item.image,
                head: item.head,
                body: item.body,
                route_key: item.route_key,
                route_name: item.route_name
              })
            });
            return array;
          }
        }
    }
</script>
