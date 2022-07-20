<template>
  <div>
    <v-card class="mx-auto" max-width="100%" max-height="500px" tile>
      <v-row align="end" class="fill-height">
        <v-col align-self="start" class="pa-0" cols="4">
          <v-avatar class="profile" color="grey" size="164" tile>
            <v-img v-bind:src="user.image"></v-img>
          </v-avatar>
        </v-col>
        <v-col class="py-0">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="text-h6">
                {{ user.first_name }}
                {{ user.last_name }}
              </v-list-item-title>
              <v-list-item-subtitle>{{ specialite }}</v-list-item-subtitle>
              <v-list-item-subtitle>{{ sous_specialite }}</v-list-item-subtitle>
              <v-list-item-subtitle>{{
                this.$store.getters.authUser.email
              }}</v-list-item-subtitle
              ><v-list-item-subtitle>{{
                this.$store.getters.authUser.cin
              }}</v-list-item-subtitle>
              <v-list-item-subtitle>{{ user.adresse }}</v-list-item-subtitle>
              <v-list-item-subtitle>{{
                user.phone_number
              }}</v-list-item-subtitle>
              <v-list-item-subtitle>{{
                user.description
              }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-col>
        <v-btn color="#7CB342" @click="AfficheForm" class="mr-4">
          Editer profile
        </v-btn>
        <v-row class="py-2">
          <v-form v-if="edit == true" @submit.prevent="editerProfile">
            <v-container>
              <v-row align="end" class="fill-height container">
                <v-col cols="12" md="4">
                  <v-text-field
                    :counter="10"
                    v-model="user.first_name"
                    label="First name"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" md="4">
                  <v-text-field
                    :counter="10"
                    v-model="user.last_name"
                    label="Last name"
                  ></v-text-field>
                  <!-- <v-btn color="#7CB342" @click="AfficheForm" class="mr-4">
                    Editer profile
                  </v-btn> -->
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field
                    :counter="10"
                    v-model="user.adresse"
                    label="Adresse"
                  ></v-text-field>
                  <!-- <v-btn color="#7CB342" @click="AfficheForm" class="mr-4">
                    Editer profile
                  </v-btn> -->
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field
                    :counter="10"
                    v-model="user.phone_number"
                    label="Numéro de télephone"
                  ></v-text-field>
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field
                    :counter="10"
                    v-model="user.description"
                    label="Description"
                  ></v-text-field>
                </v-col>
                <input
                  id="image"
                  type="file"
                  name="image"
                  class="form-control"
                  @change="convert64"
                  ref="file"
                />

                <v-col cols="12" md="4">
                  <v-btn color="#7CB342" type="submit" class="mr-4">
                    Editer profile
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        </v-row>
      </v-row>
    </v-card>
  </div>
</template>
<script>
// import { mapGetters } from "vuex";

export default {
  name: "gererProfile",

  data: () => ({
    user: {
      first_name: "",
      last_name: "",
      email: "",
      adresse: "",
      phone_number: null,
      description: "",
      cin: null,
      image: "",
    },
    image: "",
    srcImage: "",
    idSpecialite: null,
    idSous_specialite: null,
    specialite: "",
    sous_specialite: "",
    edit: false,
    description: "",
  }),

  methods: {
    AfficheForm() {
      this.edit = true;
    },
    convert64(e) {
      var file = e.target.files[0];
      this.srcImage = file;

      var reader = new FileReader();
      reader.onloadend = () => {
        this.user.image = reader.result;
      };
      reader.readAsDataURL(file);
    },
    editerProfile() {
      console.log(this.user);
      this.$http
        .put(
          "http://localhost:8000/api/prestataire/update/" +
            this.$store.getters.authUser.id,
          this.user
        )
        .then((response) => {
          console.log(response.data.data);
          this.user = response.data.data;
        });
    },
  },
  created() {
    console.log(this.$store.getters.authUser.roles[0].pivot.specialite);
    this.user.first_name = this.$store.getters.authUser.first_name;
    this.user.last_name = this.$store.getters.authUser.last_name;
    this.user.email = this.$store.getters.authUser.email;
    this.user.phone_number = this.$store.getters.authUser.phone_number;
    this.user.image = this.$store.getters.authUser.image;

    this.user.adresse = this.$store.getters.authUser.adresse;

    this.idSpecialite = this.$store.getters.authUser.roles[0].pivot.specialite;
    this.user.description =
      this.$store.getters.authUser.roles[0].pivot.description;
    console.log(this.idSpecialite);
    this.idSous_specialite =
      this.$store.getters.authUser.roles[0].pivot.sous_specialite;
    console.log(this.user);
    this.$http
      .get(
        "http://localhost:8000/api/specialites/getSpecialite/" +
          this.idSpecialite
      )
      .then((response) => {
        console.log(response.data);
        this.specialite = response.data.attributes.name;
        console.log(this.specialite);
        this.$http
          .get(
            "http://localhost:8000/api/sousSpecialite/find/" +
              this.idSous_specialite
          )
          .then((response) => {
            console.log(response.data);
            this.sous_specialite = response.data.attribute.name;
          });
      });
  },
};
</script>
