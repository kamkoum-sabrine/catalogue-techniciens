<template>
  <div style="margin-left: 100px">
    <div style="margin-top: 10%">
      <v-container>
        <v-row justify="space-between">
          <v-col cols="12" md="4">
            <v-form ref="form">
              <v-img src="../.././assets/images/depanini.png"></v-img>
            </v-form>
          </v-col>
          <v-col cols="16" md="6">
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
              <v-form
                ref="form"
                lazy-validation
                class="container"
                @submit.prevent="validate"
              >
                <v-text-field
                  v-model="first_name"
                  :counter="10"
                  label="Prénom"
                  required
                  @change="$v.first_name.$touch()"
                ></v-text-field>
                <div
                  v-if="isSubmitted && !$v.first_name.required"
                  class="invalid-feedback danger"
                >
                  <v-alert dense outlined type="error">
                    Le champ <strong>Prénom</strong> est
                    <strong>obligatoire</strong>
                  </v-alert>
                </div>

                <v-text-field
                  v-model="last_name"
                  :counter="10"
                  label="Nom"
                  required
                  @change="$v.last_name.$touch()"
                ></v-text-field>
                <div
                  v-if="isSubmitted && !$v.last_name.required"
                  class="invalid-feedback danger"
                >
                  <v-alert dense outlined type="error">
                    Le champ <strong>Nom</strong> est
                    <strong>obligatoire</strong>
                  </v-alert>
                </div>
                <v-text-field
                  v-model="email"
                  label="Adresse email"
                  required
                  @change="$v.email.$touch()"
                  :class="{ 'is-invalid': isSubmitted && $v.email.$error }"
                ></v-text-field>
                <div
                  v-if="isSubmitted && $v.email.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.email.required">
                    <v-alert dense outlined type="error">
                      Le champ <strong>Email</strong> est
                      <strong>obligatoire</strong>
                    </v-alert></span
                  >
                  <span v-if="!$v.email.email">
                    <v-alert dense outlined type="error">
                      Veuillez saisir une adresse email valide
                    </v-alert></span
                  >
                </div>

                <v-text-field
                  v-model="password"
                  label="Mot de passe"
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
                    Le champ <strong>Mot de passe</strong> est
                    <strong>obligatoire</strong>
                  </v-alert>
                </div>
                <v-text-field
                  v-model="confirm_password"
                  label="Confirmer mot de passe"
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
                      Le champ <strong>Confirmer mot de passe</strong> est
                      <strong>obligatoire</strong>
                    </v-alert></span
                  >
                  <span v-else-if="!$v.confirm_password.sameAsPassword">
                    <v-alert dense outlined type="error">
                      <strong>Le mot de passe et confirmer mot de passe</strong>
                      ne sont pas les memes
                    </v-alert></span
                  >
                </div>
                <v-text-field
                  v-model="birth_date"
                  label="Date de naissance"
                  type="date"
                  required
                ></v-text-field>
                <v-text-field
                  v-model="phone_number"
                  label="Numero de téléphone"
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
                      Le champ <strong>Numero de téléphone</strong> est
                      <strong>obligatoire</strong>
                    </v-alert></span
                  >
                  <span v-if="!$v.phone_number.minLength">
                    <v-alert dense outlined type="error">
                      <strong>Numero de télephone</strong> doit avoir
                      <strong>8 chiffres</strong>
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
                <div
                  v-if="isSubmitted && $v.adresse.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.adresse.required">
                    <v-alert dense outlined type="error">
                      Le champ <strong>Adresse</strong> est
                      <strong>obligatoire</strong>
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
                <div
                  v-if="isSubmitted && $v.cin.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.cin.required">
                    <v-alert dense outlined type="error">
                      Le champ <strong>CIN</strong> est
                      <strong>obligatoire</strong>
                    </v-alert></span
                  >
                  <span v-if="!$v.cin.minLength">
                    <v-alert dense outlined type="error">
                      <strong>CIN</strong> doit avoir
                      <strong>8 chiffres</strong>
                    </v-alert></span
                  >
                </div>

                <input
                  id="image"
                  type="file"
                  name="image"
                  class="form-control"
                  @change="convert64"
                  ref="file"
                />

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
                </v-select>

                <v-select
                  required
                  v-if="role == 'prestataire'"
                  class="form-control w-auto"
                  name="specialite"
                  v-model="specialite"
                  label="Spécialité"
                  :items="specialites"
                  @change="selectSpecialite"
                >
                </v-select>
                <v-select
                  required
                  v-if="hasSousSpecialite"
                  class="form-control w-auto"
                  name="sous_specialite"
                  v-model="sous_specialite"
                  label="Sous specialiée"
                  :items="defaultSous_specialite"
                  @change="getIDSousSpecialite"
                >
                </v-select>
                <v-checkbox label="Do you agree?" required></v-checkbox>

                <v-btn color="success" class="mr-4" type="submit">
                  Valider
                </v-btn>
              </v-form>
            </div>
          </v-col>
        </v-row>
      </v-container>
    </div>
  </div>
</template>
<script>
import { mapActions } from "vuex";

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
      image: "",
      srcImage: "",
      alert: {
        dismissCountDown: null,
        variant: null,
        msg: null,
      },
      specialites: [],
      specialite: "",

      idSpecialite: "",
      defaultSpecialite: [],
      defaultSous_specialite: [],
      sous_specialite: "",
      hasSousSpecialite: false,
      idSous_specialite: "",

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
  },
  created() {
    this.$http
      .get("http://localhost:8000/api/roles/getAll")
      .then((response) => {
        this.defaultRole = response.data;
        for (let i = 0; i < response.data.length; i++) {
          this.roles.push(response.data[i].name);
        }
      })
      .catch((err) => {
        console.log(err);
      });
    this.$http
      .get("http://localhost:8000/api/specialites/getAll")
      .then((response) => {
        this.defaultSpecialite = response.data;
        console.log(this.defaultSpecialite);
        for (let i = 0; i < response.data.length; i++) {
          this.specialites.push(response.data[i].name);
        }
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

      for (let i = 0; i < this.defaultSpecialite.length; i++) {
        if (this.defaultSpecialite[i].name == this.specialite) {
          this.idSpecialite = this.defaultSpecialite[i].id;
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
        specialite: this.idSpecialite,
        sous_specialite: this.idSous_specialite,
        image: this.image,
      };
      this.isSubmitted = true;
      this.$v.$touch();
      if (!this.$v.$invalid) {
        if (this.form.password != this.form.confirm_password) {
          this.alert.dismissCountDown = 5;
          this.alert.variant = "danger";
          this.alert.msg = "Password and Confirm Password are not the same";
          return;
        } else {
          this.register(this.form).then(() => {
            if (this.$store.getters.regStatus == 2) {
              this.alert.dismissCountDown = 3;
              this.alert.variant = "danger";
              this.alert.msg = this.$store.getters.regMessage;
            }
          });
        }
      }
    },
    selectSpecialite() {
      console.log(this.defaultSpecialite);
      for (let i = 0; i < this.defaultSpecialite.length; i++) {
        if (this.defaultSpecialite[i].name == this.specialite) {
          this.idSpecialite = this.defaultSpecialite[i].id;
        }
      }
      this.$http
        .get(
          "http://localhost:8000/api/specialites/getSpecialite/" +
            this.idSpecialite
        )
        .then((response) => {
          console.log(response.data.data);
          for (
            let index = 0;
            index < response.data.attributes.sous_specialites.length;
            index++
          ) {
            this.defaultSous_specialite.push(
              response.data.attributes.sous_specialites[index].name
            );
          }
          console.log(this.defaultSous_specialite);
          if (this.defaultSous_specialite.length != 0)
            this.hasSousSpecialite = true;
        })
        .catch((error) => {
          console.log(error.message);
        });
    },
    getIDSousSpecialite() {
      this.$http
        .get(
          "http://localhost:8000/api/sousSpecialite/index/" +
            this.sous_specialite
        )
        .then((response) => {
          this.idSous_specialite = response.data.attribute[0].id;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    handleSubmit() {
      this.isSubmitted = true;
      this.$v.$touch();
      if (this.$v.$invalid) {
        return;
      }
      alert("SUCCESS!" + JSON.stringify(this.userForm));
    },
    convert64(e) {
      var file = e.target.files[0];
      this.srcImage = file;

      var reader = new FileReader();
      reader.onloadend = () => {
        this.image = reader.result;
      };
      reader.readAsDataURL(file);
    },
  },
};
</script>
<style >
.error {
  color: white !important;
}
</style>