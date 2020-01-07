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

                <!-- Left side of Navabr -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item px-1">
                        <a class="nav-link" :href="$routes.route('dashboard.index')">
                            <i class="icon-home text-primary align-middle"></i>
                        </a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <li v-if="page !== 'admin'" class="nav-item px-1">
                        <button class="nav-link btn btn-link" :class="this.publishing ? 'animate-rotation' : ''" type="button"
                                v-on:click="publish($routes)"
                                :disabled="this.publishing">
                            <i v-if="!this.publishing" class="icon-rocket text-primary align-middle"></i>
                            <i v-else class="icon-reload text-primary align-middle"></i>
                        </button>
                    </li>

                    <li v-if="page !== 'admin'" class="nav-item px-1">
                        <button :class="this.advancedEdit && this.valueStore === '' ? 'animate-rotation' : ''"
                                class="nav-link btn btn-link"
                                v-on:click="advanced($routes)"
                                :disabled="this.advancedEdit"
                                type="button">
                            <i v-if="!this.advancedEdit || this.valueStore !== ''" class="icon-settings text-primary align-middle"></i>
                            <i v-else class="icon-reload text-primary align-middle"></i>
                        </button>
                    </li>


                    <li class="nav-item px-1">
                        <button class="nav-link btn btn-link" type="button" v-on:click="logout($routes)" :disabled="this.loggingout">
                            <i class="icon-logout text-primary align-middle"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </nav>

        <div v-if="advancedEdit && valueStore !== ''"
             class="position-absolute p-sm-2 p-md-3 p-lg-5 my-2 bg-white w-100 h-auto row no-gutters"
             style="z-index: 5000;">
            <div class="col-12">
                <textarea v-model="valueStore" style="width: 100%; height: 200px;"></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary btn-block" v-on:click="advancedSave($routes)">
                    Save
                </button>
                <button class="btn btn-secondary btn-block" v-on:click="advancedCancel()">
                    Cancel
                </button>
            </div>
        </div>
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
              required: false
            }
        },
        mounted(){},
        data() {
            return {
                '$routes': window.$routes,
                publishing: false,
                loggingout: false,
                advancedEdit: false,
                valueStore: ''
            }
        },
        methods: {

            logout ($routes) {
                this.loggingout = true;
                axios.post($routes.route('logout')).then((response) => {
                    window.location.href = $routes.route('welcome');
                    this.logout = false;
                }).catch(error => {
                    window.location.reload();
                    this.logout = false;
                });
            },

            publish ($routes) {
                this.publishing = true;
                axios.post($routes.route('content.publish'), {
                    page: this.page
                }).then((response) => {
                  console.log(response.data);
                  this.publishing = false;
                }).catch(error => {
                  alert('Publish failed');
                  this.publishing = false;
                });
            },

            advanced ($routes) {
              this.advancedEdit = true;

              if(this.valueStore === '') {
                axios.post($routes.route('content.advanced'), {
                  page: this.page
                }).then(response => {
                  this.valueStore = JSON.stringify(response.data);
                }).catch(error => {
                  alert('Something went wrong while getting data!')
                });
              }
            },

            advancedSave ($routes) {
              return axios.post($routes.route('content.advanced.store', {
                page: this.page,
                data: this.valueStore
              })).then(response => {
                console.log(response);
                return window.location.reload();
              }).catch(error => {
                alert('Something went wrong while storing!')
              })
            },

            advancedCancel () {
              this.advancedEdit = false;
            },
        }
    }
</script>