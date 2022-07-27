<template>
  <div style="margin-top: 10%">
    <v-container>
      <v-row justify="space-between">
        <v-col cols="12" md="4">
          <v-form ref="form">
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
        </v-col>
      </v-row>
    </v-container>
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
    getGetter() {
      console.log(this.$store.getters);
    },
  },
  computed: {
    error() {
      return this.$route.params.msg;
    },
  },
};
</script>
