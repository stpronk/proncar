<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-light static-top shadow-sm">
            <div class="container">
                <a class="nav navbar-brand" :href="$routes.route('welcome')">
                    <img width="auto" height="30px" src="images/Logo_web_transparant.png">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li v-for="item in this.items" class="nav-item p-2">
                            <a :class="item.class" class="nav-link" :href="$routes.route(item.url)">{{ item.name }}</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>


        <nav v-if="this.auth" class="navbar navbar-expand-md navbar-light bg-dark sticky-top-top shadow-sm py-0 h-auto">
            <div class="container">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">


                    <li v-if="editable" class="nav-item px-1">
                        <a class="nav-link" :href="$routes.route(this.editable+'.edit')">
                            <i class="icon-pencil text-primary"></i>
                        </a>
                    </li>

                    <li class="nav-item px-1">
                        <a class="nav-link" :href="$routes.route('dashboard.index')">
                            <i class="icon-settings text-primary"></i>
                        </a>
                    </li>


                    <li class="nav-item px-1">
                        <button class="nav-link btn btn-link" type="button" v-on:click="logout($routes)">
                            <i class="icon-logout text-primary"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</template>

<script>
    export default {
        props: {
            items: {
              type: Object,
              required: true
            },
            page: {
              type: String,
              required: false
            },
            auth: {
              type: Boolean,
              required: false
            }
        },
        mounted(){},
        data() {
            return {
                '$routes': window.$routes
            }
        },
        methods: {
            logout: ($routes) => {
                axios.post($routes.route('logout')).then((response) => {
                    window.location.href = $routes.route('welcome')
                }).catch(error => {
                    window.location.reload()
                });
            }
        }
    }
</script>