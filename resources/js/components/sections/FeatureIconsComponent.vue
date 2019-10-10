<template>
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div v-for="item in content.items" :class="'col-md-'+ (12 / content.item_count)">
                    <div class="features-icons-item mx-auto mb-5 mb-md-0 mb-md-3 text-center">
                        <div class="features-icons-icon d-flex">
                            <i class="m-auto text-primary" :class="'icon-'+ item.icon"></i>
                        </div>
                        <h3 v-if="auth">
                            <text-edit-component selector="some" :body="item.head" :options="{
                                link: true,
                                bold: true
                            }"></text-edit-component>
                        </h3>
                        <h3 v-else v-text="item.head"></h3>
                        <p v-text="item.body" class="lead mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        props: {
            content: {type: Object, required: true},
            auth: {}
        }
    }
</script>
