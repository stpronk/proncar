<template>
    <section class="my-5 row justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 row" v-for="content in items">
            <div class="form-group col-12 align-middle lead d-flex flex-column">

                <h2 v-html="content.title" class="d-flex my-2"></h2>
                <div v-html="content.body" class="d-flex my-2"></div>
                <div class="d-flex flex-column">
                    <div class="d-flex my-2 mx-2 mx-md-0">
                        <i class="mx-2 my-auto text-primary icon-phone"></i>
                        <div class="flex-fill" v-html="content.phone"></div>
                    </div>
                    <div class="d-flex my-2 mx-2 mx-md-0">
                        <i class="mx-2 my-auto text-primary icon-envelope"></i>
                        <div class="flex-fill" v-html="content.email"></div>
                    </div>
                    <div class="d-flex my-2 mx-2 mx-md-0">
                        <i class="mx-2 my-auto text-primary icon-home">
                        </i><div class="flex-fill" v-html="content.kvk"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7 col-lg-6 row">
            <div class="form-group col-12">
                <label for="name" class="col-form-label d-none">Name </label>
                <input id="name"
                       name="name"
                       placeholder="Naam"
                       class="form-control"
                       :class=" validation.name ? 'is-invalid' : ''"
                       v-model="form.name"
                />
                <small v-if="validation.name" v-for="error in validation.name" class="invalid-feedback">
                    {{ error }}
                </small>
            </div>

            <div class="form-group col-12">
                <label for="email" class="col-form-label d-none">E-mail </label>
                <input id="email"
                       name="email"
                       placeholder="E-mail"
                       class="form-control"
                       :class=" validation.email ? 'is-invalid' : ''"
                       v-model="form.email"
                />
                <small v-if="validation.email" v-for="error in validation.email" class="invalid-feedback">
                    {{ error }}
                </small>
            </div>

            <div class="form-group col-12">
                <label for="phone" class="col-form-label d-none">Telefoon </label>
                <input id="phone"
                       name="phone"
                       placeholder="Telefoon"
                       class="form-control"
                       :class=" validation.phone ? 'is-invalid' : ''"
                       v-model="form.phone"
                />
                <small v-if="validation.phone" v-for="error in validation.phone" class="invalid-feedback">
                    {{ error }}
                </small>
            </div>

            <div class="form-group col-12">
                <label for="subject" class="col-form-label d-none">Onderwerp </label>
                <input id="subject"
                       name="subject"
                       placeholder="Onderwerp"
                       class="form-control"
                       :class=" validation.subject ? 'is-invalid' : ''"
                       v-model="form.subject"
                />
                <small v-if="validation.subject" v-for="error in validation.subject" class="invalid-feedback">
                    {{ error }}
                </small>
            </div>

            <div class="form-group col-12">
                <label for="message" class="col-form-label d-none">Bericht </label>
                <textarea id="message"
                          name="message"
                          placeholder="Bericht..."
                          rows="5"
                          required="required"
                          class="form-control"
                          :class=" validation.message ? 'is-invalid' : ''"
                          v-model="form.message"
                >
                </textarea>
                <small v-if="validation.message" v-for="error in validation.message" class="invalid-feedback">
                    {{ error }}
                </small>
            </div>

            <div class="form-group col-12">
                <button type="submit" class="form-control btn btn-block btn-primary" v-on:click="send($routes)" :disabled="sending">
                    Verstuur
                </button>
                <small v-if="approved" v-text="" class="d-block valid-feedback">
                    Bericht is verstuurd, we proberen zo snel mogelijk contact met je op te nemen.
                </small>
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
        },
      },
        data () {
          return {
            '$routes': window.$routes,
            validation: {},
            form: {
              name: '',
              email: '',
              phone: '',
              subject: '',
              message: ''
            },
            path: this.uuid+'.content',
            sending: false,
            approved: false,
          }
        },
        computed: {
          items: function () {
            const array = [];
            Object.entries(this.content).forEach(([key, content]) => {
              array.push({
                page: this.page,
                path: this.uuid+'.content',
                uuid: key,
                title: content.title,
                body: content.body,
                phone: content.phone,
                email: content.email,
                kvk: content.kvk,
              })
            });
            return array;
          }
        },
        methods: {
          send ($routes) {
            this.sending = true;

            axios.post($routes.route('contact.send'), {
              name: this.form.name,
              email: this.form.email,
              phone: this.form.phone,
              subject: this.form.subject,
              message: this.form.message
            }).then(response => {
              this.validation = {};
              this.form = {};
              this.approved = true;
            }).catch(error => {
              this.validation = error.response.data.errors;
              this.sending = false;
            })
          }
        }
    }
</script>