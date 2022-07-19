<template>
  <v-card class="mx-auto" max-width="100%" max-height="500px" tile>
    <v-row align="end" class="fill-height">
      <v-col align-self="start" class="pa-0" cols="4">
        <v-avatar class="profile" color="grey" size="164" tile>
          <v-img v-bind:src="this.$store.getters.authUser.image"></v-img>
        </v-avatar>
      </v-col>
      <v-col class="py-0">
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title class="text-h6">
              {{ this.$store.getters.authUser.first_name }}
              {{ this.$store.getters.authUser.last_name }}
            </v-list-item-title>
            <v-list-item-subtitle>{{ specialite }}</v-list-item-subtitle>
            <v-list-item-subtitle>{{ sous_specialite }}</v-list-item-subtitle>
            <v-list-item-subtitle>{{
              this.$store.getters.authUser.email
            }}</v-list-item-subtitle>
            <v-list-item-subtitle>{{
              this.$store.getters.authUser.adresse
            }}</v-list-item-subtitle>
            <v-list-item-subtitle>{{
              this.$store.getters.authUser.phone_number
            }}</v-list-item-subtitle>
            <v-list-item-subtitle
              >Je suis un jeune diplomé en informatique industrielle, je suis
              actif, ponctuelle</v-list-item-subtitle
            >
          </v-list-item-content>
        </v-list-item>
      </v-col>
    </v-row>
  </v-card>
</template>
<script>
// import { mapGetters } from "vuex";

export default {
  name: "gererProfile",

  data: () => ({
    authUser: {
      //   first_name: this.$store.getters.authUser.first_name,
    },
    idSpecialite: null,
    idSous_specialite: null,
    specialite: "",
    sous_specialite: "",
  }),

  methods: {},
  created() {
    console.log(this.$store.getters.authUser.roles[0].pivot.specialite);
    this.idSpecialite = this.$store.getters.authUser.roles[0].pivot.specialite;
    console.log(this.idSpecialite);
    this.idSous_specialite =
      this.$store.getters.authUser.roles[0].pivot.sous_specialite;
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
