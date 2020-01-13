<template>
    <section class="contact-form row justify-content-center">
        <div class="col-6 row">
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
              type: Object, required: true
            }
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
            sending: false,
            approved: false,
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