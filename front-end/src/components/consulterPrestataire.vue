<template>
  <div>
    <v-card class="mx-auto container" max-width="95%" tile
      ><form @submit.prevent="rechercherNom">
        <input v-model="search" placeholder="rechercher un prestataire" />
        <button type="submit">Rechercher</button>
      </form>
      <v-list three-line>
        <template v-for="(item, index) in prestataire">
          <v-list-item :key="index">
            <v-list-item-avatar height="200" width="200">
              <v-img :src="item.user.image"></v-img>
            </v-list-item-avatar>

            <ul>
              <li>
                Nom et prénom : {{ item.user.first_name }}
                {{ item.user.last_name }}
              </li>
              <li>
                Spécialité :
                {{ nomspecialite }}
              </li>
              <li>
                Sous spécialité :
                {{ nomSousSpecialite }}
              </li>
              <li>
                Numéro de télephone:
                {{ item.user.phone_number }}
              </li>
              <li>
                Email :
                {{ item.user.email }}
              </li>
              <li>
                <!-- <v-rating
                  background-color="#eee"
                  color="teal"
                  empty-icon="$mdiStarOutline"
                  full-icon="$mdiStar"
                  half-icon="$mdiHeartHalfFull"
                  hover
                  length="5"
                  size="35"
                  value="3"
                ></v-rating> -->
              </li>
            </ul>
          </v-list-item>
          <v-divider
            v-if="divider"
            :key="index + 'C'"
            :inset="inset"
          ></v-divider>

          <!-- <v-divider :key="item.id"></v-divider> -->
        </template>
      </v-list>
    </v-card>
  </div>
</template>
<script>
export default {
  name: "consulterPrestataire",
  data: () => ({
    items: [
      //
    ],
    prestataire: [],
    idSous_specialite: null,
    idSpecialite: null,
    nomSousSpecialite: "",
    nomspecialite: "",
    divider: true,
    inset: true,
    search: "",
  }),
  created() {
    if (this.$route.params.idSous_specialite == undefined) {
      this.$router.push({
        name: "Home",
      });
    }
    this.idSous_specialite = this.$route.params.idSous_specialite;
    this.idSpecialite = this.$route.params.idSpecialite;
    this.nomSousSpecialite = this.$route.params.sous_specialite;
    this.nomspecialite = this.$route.params.specialite;
    console.log(this.$route.params);
    this.$http
      .get(
        "http://localhost:8000/api/prestataire/parSousSpecialite/" +
          this.idSpecialite +
          this.idSous_specialite
      )
      .then((response) => {
        console.log(response.data);
        this.prestataire = response.data;
      });
  },
  methods: {
    rechercherNom() {
      console.log(this.search);
      this.$http
        .post("http://localhost:8000/api/prestataire/search", this.search)
        .then((response) => {
          console.log(response.data);
        });
    },
  },
};
</script>
