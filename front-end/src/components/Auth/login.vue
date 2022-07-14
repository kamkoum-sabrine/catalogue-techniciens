<template>
  <div style="margin-top: 10%">
    <v-container>
      <v-row justify="space-between">
        <v-col cols="12" md="4">
          <!-- <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field
              v-model="name"
              :counter="10"
            
              label="Name"
              required
            ></v-text-field>

            <v-text-field
              v-model="email"
              :rules="emailRules"
              label="E-mail"
              required
            ></v-text-field>

            <v-select
              v-model="select"
              :items="items"
              :rules="[(v) => !!v || 'Item is required']"
              label="Item"
              required
            ></v-select>

            <v-checkbox
              v-model="checkbox"
              :rules="[(v) => !!v || 'You must agree to continue!']"
              label="Do you agree?"
              required
            ></v-checkbox>

            <v-btn
              :disabled="!valid"
              color="success"
              class="mr-4"
              @click="validate"
            >
              Validate
            </v-btn>

            <v-btn color="error" class="mr-4" @click="reset">
              Reset Form
            </v-btn>

            <v-btn color="warning" @click="resetValidation">
              Reset Validation
            </v-btn>
          </v-form> -->
          <v-form ref="form">
            <!-- <v-text-field
              v-model="model"
              :counter="max"
              :rules="rules"
              label="First name"
            ></v-text-field> -->
            <v-img src="../.././assets/images/depanini.png"></v-img>
          </v-form>
        </v-col>

        <v-col cols="12" md="6">
          <div class="col-6 col-xl-4 offset-xl-1">
            <b-alert
              class="mt-4"
              :show="alert.dismissCountDown"
              dismissible
              :variant="alert.variant"
              @dismissed="alert.dismissCountDown = 0"
            >
              <p>{{ alert.msg }}</p>
            </b-alert>
            <form @submit.prevent="logIn">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <v-text-field
                  label="Email"
                  v-model="form.email"
                  type="email"
                  required
                ></v-text-field>
                <!-- <input
                  v-model="form.email"
                  type="email"
                  id="form3Example3"
                  class="form-control form-control-lg"
                /> -->
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <v-text-field
                  label="Password"
                  type="password"
                  v-model="form.password"
                  autocomplete
                  required
                ></v-text-field>
                <!-- <input
                  type="password"
                  v-model="form.password"
                  autocomplete
                  id="form3Example4"
                  class="form-control form-control-lg"
                />
                <label
                  v-if="!form.password"
                  class="form-label"
                  for="form3Example4"
                  >Password</label
                > -->
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <!-- <v-btn color="success" class="mr-4"> Validate </v-btn> -->
                <button
                  class="btn btn-primary"
                  style="padding-left: 2.5rem; padding-right: 2.5rem"
                >
                  Login
                </button>
                <p class="small fw-bold mt-2 pt-1 mb-0">
                  Vous n'avez pas de compte ?
                  <router-link to="/register" class="link-danger">
                    s'inscrire</router-link
                  >
                </p>
              </div>
            </form>
          </div>
          <!-- <v-slider v-model="max" label="Max characters"> </v-slider>

          <v-checkbox v-model="allowSpaces" label="Allow spaces"></v-checkbox>

          <v-text-field v-model="match" label="Value must match"></v-text-field> -->
        </v-col>
      </v-row>
    </v-container>
    <!-- <section class="container h-100 bg-white card" style="border-radius: 25px">
      <div class="container my-5">
        <div class="row justify-content-center align-items-center">
          <div class="col-6 col-xl-5">
            <img
              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
              class="img-fluid"
              alt="Sample image"
            />
          </div>
          <div class="col-6 col-xl-4 offset-xl-1">
            <b-alert
              class="mt-4"
              :show="alert.dismissCountDown"
              dismissible
              :variant="alert.variant"
              @dismissed="alert.dismissCountDown = 0"
            >
              <p>{{ alert.msg }}</p>
            </b-alert>
            <form @submit.prevent="logIn">
              
              <div class="form-outline mb-4">
                <input
                  v-model="form.email"
                  type="email"
                  id="form3Example3"
                  class="form-control form-control-lg"
                />
                <label v-if="!form.email" class="form-label" for="form3Example3"
                  >Email address</label
                >
              </div>

                            <div class="form-outline mb-3">
                <input
                  type="password"
                  v-model="form.password"
                  autocomplete
                  id="form3Example4"
                  class="form-control form-control-lg"
                />
                <label
                  v-if="!form.password"
                  class="form-label"
                  for="form3Example4"
                  >Password</label
                >
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <button
                  class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem"
                >
                  Login
                </button>
                <p class="small fw-bold mt-2 pt-1 mb-0">
                  Vous n'avez pas de compte ?
                  <router-link to="/register" class="link-danger">
                    s'inscrire</router-link
                  >
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section> -->
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      alert: {
        dismissCountDown: 0,
        variant: "",
        msg: "",
      },
    };
  },
  methods: {
    ...mapActions(["login"]),
    logIn() {
      try {
        this.login(this.form).then(() => {
          console.log(this.$store.getters.authStatus);
          if (this.$store.getters.authStatus == 2) {
            console.log(this.$store.getters.authStatus);
            this.alert.dismissCountDown = 3;
            this.alert.variant = "danger";
            this.alert.msg = this.$store.getters.authMessage;
            console.log(this.$store.getters.authMessage);
          } else {
            if (this.$store.getters.authStatus == 1) {
              console.log(this.$store.getters.authStatus);

              this.alert.dismissCountDown = 3;
              this.alert.variant = "danger";
              this.alert.msg = this.$store.getters.authMessage;
              console.log(this.$store.getters.authMessage);
            }
          }
        });
      } catch (e) {
        console.log(e.response.data.data.error);
      }
      console.log(this.$store.getters.authStatus);

      if (this.$store.getters.authStatus == 2) {
        console.log(this.$store.getters.authStatus);
        this.alert.dismissCountDown = 3;
        this.alert.variant = "danger";
        this.alert.msg = this.$store.getters.authMessage;
        console.log(this.$store.getters.authMessage);
      }

      // console.log(this.$store.getters.authStatus);
      // console.log(this.$store.getters.authMessage);
      // this.alert.dismissCountDown = 3;
      // this.alert.variant = "danger";
      // this.alert.msg = this.$store.getters.authMessage;
    },
  },
  computed: {
    error() {
      return this.$route.params.msg;
    },
  },
};
</script>
