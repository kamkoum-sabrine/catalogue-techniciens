<template>
  <div>
    <b-alert
      class="mt-4"
      :show="alert.dismissCountDown"
      dismissible
      :variant="alert.variant"
      @dismissed="alert.dismissCountDown = 0"
    >
      <p>{{ alert.msg }}</p>
    </b-alert>
    <v-form
      ref="form"
      lazy-validation
      class="container"
      @submit.prevent="validate"
    >
      <v-text-field
        v-model="first_name"
        :counter="10"
        label="First name"
        required
      ></v-text-field>
      <v-text-field
        v-model="last_name"
        :counter="10"
        label="Last name"
        required
      ></v-text-field>

      <v-text-field v-model="email" label="E-mail" required></v-text-field>
      <v-text-field
        v-model="password"
        label="Password"
        type="password"
        required
      ></v-text-field>
      <v-text-field
        v-model="confirm_password"
        label="Confirm password"
        type="password"
        required
      ></v-text-field>
      <v-text-field
        v-model="birth_date"
        label="Birth date"
        type="date"
        required
      ></v-text-field>
      <v-text-field
        v-model="phone_number"
        label="Phone number"
        type="number"
        required
      ></v-text-field>
      <v-text-field v-model="adresse" label="Adresse" required></v-text-field
      ><v-text-field v-model="cin" label="CIN" required></v-text-field>

      <!-- <v-select :roles="roles" v-model="roles" label="Standard"> </v-select> -->
      <v-select
        required
        class="form-control w-auto"
        name="roles"
        id="roles"
        v-model="role"
        label="Role"
        :items="roles"
        item-value="roles.id"
      >
        <!-- <option v-for="item in roles" :value="item.name" :key="item.id">
          {{ item.name }}
        </option> -->
      </v-select>
      <!-- <v-select
      v-model="select"
      :items="items"
      :rules="[(v) => !!v || 'Item is required']"
      label="Item"
      required
    ></v-select> -->

      <v-checkbox label="Do you agree?" required></v-checkbox>

      <v-btn color="success" class="mr-4" type="submit"> Validate </v-btn>
    </v-form>
  </div>
</template>
<script>
import { mapActions } from "vuex";

export default {
  data() {
    return {
      first_name: "",
      last_name: "",
      cin: "",
      birth_date: "",
      phone_number: "",
      email: "",
      adresse: "",
      password: "",
      confirm_password: "",
      role: "",
      roles: [],
      form: {},
      idRole: "",
      defaultRole: [],
      alert: {
        dismissCountDown: null,
        variant: null,
        msg: null,
      },
    };
  },
  created() {
    this.$http
      .get("http://localhost:8000/api/role/getAll")
      .then((response) => {
        console.log(response.data[0].name);
        this.defaultRole = response.data;
        for (let i = 0; i < response.data.length; i++) {
          // this.roles[i] = response.data[i].name;
          this.roles.push(response.data[i].name);
        }
        console.log(this.roles);
      })
      .catch((err) => {
        console.log(err);
      });
  },
  methods: {
    ...mapActions(["register"]),
    validate() {
      for (let i = 0; i < this.defaultRole.length; i++) {
        if (this.defaultRole[i].name == this.role) {
          this.idRole = this.defaultRole[i].id;
        }
      }
      this.form = {
        first_name: this.first_name,
        last_name: this.last_name,
        cin: this.cin,
        birth_date: this.birth_date,
        phone_number: this.phone_number,
        email: this.email,
        adresse: this.adresse,
        password: this.password,
        confirm_password: this.confirm_password,
        role: this.idRole,
      };
      console.log(this.form);
      if (this.form.password != this.form.confirm_password) {
        this.alert.dismissCountDown = 5;
        this.alert.variant = "danger";
        this.alert.msg = "Password and Confirm Password are not the same";
        return;
      } else {
        this.register(this.form).then(() => {
          console.log("apres exec register !");
          if (this.$store.getters.regStatus == 2) {
            this.alert.dismissCountDown = 3;
            this.alert.variant = "danger";
            this.alert.msg = this.$store.getters.regMessage;
          }
        });
      }
    },
  },
};
</script>
<style >
.error {
  color: white !important;
}
</style>