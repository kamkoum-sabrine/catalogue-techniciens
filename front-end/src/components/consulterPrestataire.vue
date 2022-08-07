<template>
  <div>
    <v-card class="mx-auto container" max-width="95%" tile>
      <form class="example" @submit.prevent="rechercherNom">
        <input
          type="text"
          v-model="search"
          placeholder="Rechercher un prestataire"
          name="search"
        />
        <button type="submit" id="button">
          <v-icon color="white">mdi-magnify</v-icon> Rechercher
        </button>
      </form>
      <br />
      <button
        class="float-right"
        @click="filter()"
        id="button"
        style="background-color: #e9c46a"
      >
        Filtrer par nombre d'étoiles
      </button>
      <v-list v-if="recherche == false" three-line>
        <template v-for="(item, index) in prestataire">
          <v-list-item :key="index">
            <v-list-item-avatar height="200" width="200">
              <v-img :src="item.user.image"></v-img>
            </v-list-item-avatar>

            <ul style="list-style-type: none">
              <li>
                <br />
                <i class="fa-solid fa-user"></i> Nom et prénom :
                {{ item.user.first_name }}
                {{ item.user.last_name }}
              </li>
              <li>
                <br />
                <i class="fa-solid fa-toolbox"></i>
                Spécialité :
                {{ nomspecialite }}
              </li>
              <li>
                <br />
                <i class="fa-solid fa-toolbox"></i>
                Sous spécialité :
                {{ nomSousSpecialite }}
              </li>
              <li>
                <br />
                <i class="fa-solid fa-star"></i>
                Le nombre d'étoiles :
                {{ item.moyenne }}
              </li>

              <br />
              <v-btn
                class="ma-2"
                color="#2a9d8f"
                right
                dark
                @click="toDetails(item.user, item.description, item.moyenne)"
              >
                <v-icon dark right> mdi-arrow-right </v-icon> Plus de détails
              </v-btn>
            </ul>
          </v-list-item>
          <v-divider
            v-if="divider"
            :key="index + 'C'"
            :inset="inset"
          ></v-divider>
        </template>
      </v-list>
      <v-list v-if="recherche == true" three-line>
        <template v-for="(item, index) in prestataireRecherche">
          <v-list-item :key="index">
            <v-list-item-avatar height="200" width="200">
              <v-img :src="item.image"></v-img>
            </v-list-item-avatar>

            <ul style="list-style-type: none">
              <li>
                <br />
                <i class="fa-solid fa-user"></i> Nom et prénom :{{
                  item.first_name
                }}
                {{ item.last_name }}
              </li>
              <li>
                <br />
                <i class="fa-solid fa-toolbox"></i>
                Spécialité :
                {{ nomspecialite }}
              </li>
              <li>
                <br />
                <i class="fa-solid fa-toolbox"></i>
                Sous spécialité :
                {{ nomSousSpecialite }}
              </li>
              <li>
                <br />
                <i class="fa-solid fa-star"></i>
                Le nombre d'étoiles :
                {{ item.roles[0].pivot.moyenne }}
              </li>
              <li>
                <br />
                <v-btn
                  class="ma-2"
                  color="#2a9d8f"
                  dark
                  @click="toDetails(item, item.description, item.moyenne)"
                >
                  <v-icon dark right> mdi-arrow-right </v-icon> Plus de détails
                </v-btn>
              </li>
            </ul>
          </v-list-item>
          <v-divider
            v-if="divider"
            :key="index + 'C'"
            :inset="inset"
          ></v-divider>
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
    searched: {},
    remove: null,
    recherche: false,
    prestataireRecherche: {},
    rating: 0,
    client: false,
  }),
  created() {
    this.client = this.$store.getters.isClient;
    if (this.$route.params.idSous_specialite == undefined) {
      this.$router.push({
        name: "Home",
      });
    }
    this.idSous_specialite = this.$route.params.idSous_specialite;
    this.idSpecialite = this.$route.params.idSpecialite;
    this.nomSousSpecialite = this.$route.params.sous_specialite;
    this.nomspecialite = this.$route.params.specialite;

    this.$http
      .get(
        "http://localhost:8000/api/prestataire/parSousSpecialite/" +
          this.idSpecialite +
          "/" +
          this.idSous_specialite
      )
      .then((response) => {
        this.prestataire = response.data;
        console.log(this.prestataire);
      });
  },
  methods: {
    rechercherNom() {
      this.searched = {
        search: this.search,
        specialite: this.idSpecialite,
        sous_specialite: this.idSous_specialite,
      };
      this.recherche = true;
      this.$http
        .post("http://localhost:8000/api/prestataire/search", this.searched)
        .then((response) => {
          this.prestataireRecherche = response.data.data;
          for (let index = 0; index < response.data.data.length; index++) {
            this.prestataireRecherche[index].description =
              response.data.data[index].roles[0].pivot.description;
          }
          console.log(this.prestataireRecherche);
        });
    },
    getRate(idPrestataire) {
      let newRate = {
        prestataire_id: idPrestataire,
        note: this.rating,
      };
      this.$http
        .post("http://localhost:8000/api/notes/create", newRate)
        .then(() => {});
    },
    toDetails(prestataire, description, moyenne) {
      this.$router.push({
        name: "moreDetailsPrestataires",
        params: {
          prestataire: prestataire,
          specialite: this.nomspecialite,
          sous_specialite: this.nomSousSpecialite,
          description: description,
          moyenne: moyenne,
        },
      });
    },
    filter() {
      this.$http
        .get(
          "http://localhost:8000/api/prestataire/ordered/" +
            this.idSpecialite +
            "/" +
            this.idSous_specialite
        )
        .then((response) => {
          this.prestataire = response.data;
          console.log(this.prestataire);
        });
    },
  },
};
</script>
<style scoped>
form.example input[type="text"] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid rgb(255, 255, 255);
  float: left;
  width: 80%;
  background: #f1f1f1;
}

#button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #f4a261;
  color: white;
  font-size: 17px;
  border: 1px solid rgb(255, 255, 255);
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #f4a261;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
