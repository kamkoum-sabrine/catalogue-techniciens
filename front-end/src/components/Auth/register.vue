<template>
  <div>
    <!-- <div class="container" style="max-width: 500px; text-align: left">
      <div class="alert alert-success" role="alert">
        <h2 class="alert-heading">Vue Form Validation Example</h2>
      </div> -->
    <!-- <form @submit.prevent="handleSubmit">
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            v-model="userForm.name"
            id="name"
            name="name"
            class="form-control"
            :class="{ 'is-invalid': isSubmitted && $v.userForm.name.$error }"
          />
          <div
            v-if="isSubmitted && !$v.userForm.name.required"
            class="invalid-feedback"
          >
            Name field is required
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            v-model="userForm.email"
            id="email"
            name="email"
            class="form-control"
            :class="{ 'is-invalid': isSubmitted && $v.userForm.email.$error }"
          />
          <div
            v-if="isSubmitted && $v.userForm.email.$error"
            class="invalid-feedback"
          >
            <span v-if="!$v.userForm.email.required"
              >Email field is required</span
            >
            <span v-if="!$v.userForm.email.email"
              >Please provide valid email</span
            >
          </div>
        </div>
        <div class="form-group">
          <label for="mobile">Mobile</label>
          <input
            type="text"
            v-model="userForm.mobile"
            id="mobile"
            name="mobile"
            class="form-control"
            :class="{ 'is-invalid': isSubmitted && $v.userForm.mobile.$error }"
          />
          <div
            v-if="isSubmitted && $v.userForm.mobile.$error"
            class="invalid-feedback"
          >
            <span v-if="!$v.userForm.mobile.required"
              >Mobile field is required</span
            >
          </div>
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <div
            class="form-group"
            :class="{ 'is-invalid': isSubmitted && $v.userForm.gender.$error }"
          >
            <div
              class="form-check form-check-inline"
              :class="{
                'is-invalid': isSubmitted && $v.userForm.gender.$error,
              }"
            >
              <input
                class="form-check-input"
                type="radio"
                name="gender"
                v-model="userForm.gender"
                id="gender1"
                value="male"
              />
              <label class="form-check-label" for="gender1">Male</label>
            </div>
            <div
              class="form-check form-check-inline"
              :class="{
                'is-invalid': isSubmitted && $v.userForm.gender.$error,
              }"
            >
              <input
                class="form-check-input"
                type="radio"
                name="gender"
                v-model="userForm.gender"
                id="gender2"
                value="female"
              />
              <label class="form-check-label" for="gender2">Female</label>
            </div>
            <div
              v-if="isSubmitted && $v.userForm.gender.$error"
              class="invalid-feedback"
            >
              <span v-if="!$v.userForm.gender.required"
                >This field is required</span
              >
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            v-model="userForm.password"
            id="password"
            name="password"
            class="form-control"
            :class="{
              'is-invalid': isSubmitted && $v.userForm.password.$error,
            }"
          />
          <div
            v-if="isSubmitted && $v.userForm.password.$error"
            class="invalid-feedback"
          >
            <span v-if="!$v.userForm.password.required"
              >Password field is required</span
            >
            <span v-if="!$v.userForm.password.minLength"
              >Password should be 5 characters long</span
            >
          </div>
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm Password</label>
          <input
            type="password"
            v-model="userForm.confirmPassword"
            id="confirmPassword"
            name="confirmPassword"
            class="form-control"
            :class="{
              'is-invalid': isSubmitted && $v.userForm.confirmPassword.$error,
            }"
          />
          <div
            v-if="isSubmitted && $v.userForm.confirmPassword.$error"
            class="invalid-feedback"
          >
            <span v-if="!$v.userForm.confirmPassword.required"
              >Confirm Password field is required</span
            >
            <span v-else-if="!$v.userForm.confirmPassword.sameAsPassword"
              >Passwords should be matched</span
            >
          </div>
        </div>
        <div class="form-group form-check">
          <input
            type="checkbox"
            v-model="userForm.accept"
            @change="$v.userForm.accept.$touch()"
            id="accept"
            class="form-check-input"
          />
          <label
            class="form-check-label"
            :class="{ 'is-invalid': isSubmitted && $v.userForm.accept.$error }"
            for="accept"
            >Accept terms &nbsp; conditions</label
          >
          <div
            v-if="isSubmitted && $v.userForm.accept.$error"
            class="invalid-feedback"
          >
            <span v-if="!$v.userForm.accept.required"
              >Accept terms and conditions</span
            >
          </div>
        </div>
        <div class="form-group">
          <button class="btn btn-danger btn-block">Register</button>
        </div>
      </form>
    </div> -->
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
      <!-- <div
        class="form-group"
        :class="{ 'form-group--error': first_name.$error }"
      >
        <label class="form__label" for="first_name">Name</label>
        <input class="form__input" v-model.trim="first_name" />
      </div> -->
      <v-text-field
        v-model="first_name"
        :counter="10"
        label="First name"
        required
        @change="$v.first_name.$touch()"
      ></v-text-field>
      <div
        v-if="isSubmitted && !$v.first_name.required"
        class="invalid-feedback danger"
      >
        <v-alert dense outlined type="error">
          <strong>First name</strong> field is
          <strong>required</strong>
        </v-alert>
      </div>

      <!-- <div v-if="hasError('first_name')" class="invalid-feedback">
        <div class="error" v-if="!$v.first_name.required">
          الرجاء ادخال اسمك.
        </div>
      </div> -->
      <v-text-field
        v-model="last_name"
        :counter="10"
        label="Last name"
        required
        @change="$v.last_name.$touch()"
      ></v-text-field>
      <div
        v-if="isSubmitted && !$v.last_name.required"
        class="invalid-feedback danger"
      >
        <v-alert dense outlined type="error">
          <strong>Last name</strong> field is
          <strong>required</strong>
        </v-alert>
      </div>
      <v-text-field
        v-model="email"
        label="E-mail"
        required
        @change="$v.email.$touch()"
        :class="{ 'is-invalid': isSubmitted && $v.email.$error }"
      ></v-text-field>
      <div v-if="isSubmitted && $v.email.$error" class="invalid-feedback">
        <span v-if="!$v.email.required">
          <v-alert dense outlined type="error">
            <strong>Email</strong> field is
            <strong>required</strong>
          </v-alert></span
        >
        <span v-if="!$v.email.email">
          <v-alert dense outlined type="error">
            Please provide a valid email
          </v-alert></span
        >
      </div>

      <v-text-field
        v-model="password"
        label="Password"
        type="password"
        required
        @change="$v.password.$touch()"
        :class="{
          'is-invalid': isSubmitted && $v.password.$error,
        }"
      ></v-text-field>
      <div
        v-if="isSubmitted && !$v.password.required"
        class="invalid-feedback danger"
      >
        <v-alert dense outlined type="error">
          <strong>Password</strong> field is
          <strong>required</strong>
        </v-alert>
      </div>
      <v-text-field
        v-model="confirm_password"
        label="Confirm password"
        type="password"
        required
        @change="$v.confirm_password.$touch()"
        :class="{
          'is-invalid': isSubmitted && $v.confirm_password.$error,
        }"
      ></v-text-field>
      <div
        v-if="isSubmitted && $v.confirm_password.$error"
        class="invalid-feedback"
      >
        <span v-if="!$v.confirm_password.required">
          <v-alert dense outlined type="error">
            <strong>Confirm password</strong> field is
            <strong>required</strong>
          </v-alert></span
        >
        <span v-else-if="!$v.confirm_password.sameAsPassword">
          <v-alert dense outlined type="error">
            <strong>Password</strong> should be matched
          </v-alert></span
        >
      </div>
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
        @change="$v.phone_number.$touch()"
        required
        :class="{
          'is-invalid': isSubmitted && $v.password.$error,
        }"
      ></v-text-field>
      <div
        v-if="isSubmitted && $v.phone_number.$error"
        class="invalid-feedback"
      >
        <span v-if="!$v.phone_number.required">
          <v-alert dense outlined type="error">
            <strong>Phone number </strong> field is
            <strong>required</strong>
          </v-alert></span
        >
        <span v-if="!$v.phone_number.minLength">
          <v-alert dense outlined type="error">
            <strong>Phone number</strong> should be
            <strong>8 numbers long</strong>
          </v-alert></span
        >
      </div>
      <v-text-field
        v-model="adresse"
        label="Adresse"
        @change="$v.adresse.$touch()"
        :class="{
          'is-invalid': isSubmitted && $v.adresse.$error,
        }"
        required
      ></v-text-field>
      <div v-if="isSubmitted && $v.adresse.$error" class="invalid-feedback">
        <span v-if="!$v.adresse.required">
          <v-alert dense outlined type="error">
            <strong>Adresse</strong> field is <strong>required</strong>
          </v-alert></span
        >
      </div>
      <v-text-field
        v-model="cin"
        label="CIN"
        @change="$v.cin.$touch()"
        :class="{
          'is-invalid': isSubmitted && $v.cin.$error,
        }"
        required
      ></v-text-field>
      <div v-if="isSubmitted && $v.cin.$error" class="invalid-feedback">
        <span v-if="!$v.cin.required">
          <v-alert dense outlined type="error">
            <strong>CIN</strong> field is
            <strong>required</strong>
          </v-alert></span
        >
        <span v-if="!$v.cin.minLength">
          <v-alert dense outlined type="error">
            <strong>CIN</strong> should be
            <strong>8 numbers long</strong>
          </v-alert></span
        >
      </div>

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
// import { validationMixin } from "vuelidate";
// import { required, minLength } from "vuelidate/lib/validators";
import { required, email, minLength, sameAs } from "vuelidate/lib/validators";

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
      // userForm: {
      //   name: "",
      //   email: "",
      //   mobile: "",
      //   gender: "",
      //   password: "",
      //   confirmPassword: "",
      //   accept: "",
      // },
      isSubmitted: false,
    };
  },

  validations: {
    first_name: {
      required,
    },
    last_name: {
      required,
    },
    adresse: {
      required,
    },
    email: {
      required,
      email,
    },
    phone_number: {
      required,
      minLength: minLength(6),
    },
    cin: {
      required,
      minLength: minLength(6),
    },

    password: {
      required,
      minLength: minLength(5),
    },
    confirm_password: {
      required,
      sameAsPassword: sameAs("password"),
    },
    accept: {
      required(val) {
        return val;
      },
    },
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
      this.isSubmitted = true;
      this.$v.$touch();
      if (this.$v.$invalid) {
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
      }
      alert("SUCCESS!" + JSON.stringify(this.userForm));
      // console.log(this.form);
      // if (this.form.password != this.form.confirm_password) {
      //   this.alert.dismissCountDown = 5;
      //   this.alert.variant = "danger";
      //   this.alert.msg = "Password and Confirm Password are not the same";
      //   return;
      // } else {
      //   this.register(this.form).then(() => {
      //     console.log("apres exec register !");
      //     if (this.$store.getters.regStatus == 2) {
      //       this.alert.dismissCountDown = 3;
      //       this.alert.variant = "danger";
      //       this.alert.msg = this.$store.getters.regMessage;
      //     }
      //   });
      // }
    },
    handleSubmit() {
      this.isSubmitted = true;
      this.$v.$touch();
      if (this.$v.$invalid) {
        return;
      }
      alert("SUCCESS!" + JSON.stringify(this.userForm));
    },
  },
};
</script>
<style >
.error {
  color: white !important;
}
</style>