<template>
    <footer class="footer bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <p class="small mb-4 mb-lg-0">&copy; Proncar ~ 2017. <br>
                        Made with love by <a class="text-white" target="_target" href="https://stpronk.nl/">StPronk</a></p>
                </div>
                <div class="col-lg-6 h-100 text-center small text-lg-right my-auto">
                    <a class="text-white" :href="$routes.route('voorwaarden')">
                        Algemene voorwaarden
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        props: {},
        mounted(){},
        data() {
            return {}
        },
    }
</script>
