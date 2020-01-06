<template>
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div v-for="item in items" :class="'col-md-'+ (12 / content.item_count)">
                    <div class="features-icons-item mx-auto mb-5 mb-md-0 mb-md-3 text-center">
                        <div class="features-icons-icon d-flex">
                            <i class="m-auto text-primary" :class="'icon-'+ item.icon"></i>
                        </div>

                        <h3 v-if="auth">
                            <text-edit-component :page="item.page" :path="item.path" :uuid="item.uuid" :change="'head'" :body="item.head" :options="{
                                link: true,
                                bold: true
                            }"></text-edit-component>
                        </h3>
                        <h3 v-else v-text="item.head"></h3>

                        <p class="lead mb-0" v-if="auth">
                            <text-edit-component :page="item.page" :path="item.path" :uuid="item.uuid" :change="'body'" :body="item.body" :options="{
                                link: true,
                                bold: true
                            }"></text-edit-component>
                        </p>
                        <p class="lead mb-0" v-else v-text="item.body"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import { uuid } from 'vue-uuid';

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
        computed: {
          items: function () {
            const array = [];
            Object.entries(this.content.items).forEach(([key, item]) => {
              array.push({
                page: this.page,
                path: this.uuid+'.content.items',
                uuid: key,
                icon: item.icon,
                head: item.head,
                body: item.body
              })
            });
            return array;
          }
        }
    }
</script>
