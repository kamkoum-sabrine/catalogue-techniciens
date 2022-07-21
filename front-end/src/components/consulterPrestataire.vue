<template>
  <div>
    <v-card class="mx-auto container" max-width="95%" tile>
      <!-- <form @submit.prevent="rechercherNom">
        <input v-model="search" placeholder="rechercher un prestataire" />
        <button type="submit">Rechercher</button>
      </form> -->
      <form class="example" @submit.prevent="rechercherNom">
        <input
          type="text"
          v-model="search"
          placeholder="Rechercher un prestataire"
          name="search"
        />
        <button type="submit">Rechercher</button>
      </form>
      <v-list v-if="recherche == false" three-line>
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
      <v-list v-if="recherche == true" three-line>
        <template v-for="(item, index) in prestataireRecherche">
          <v-list-item :key="index">
            <v-list-item-avatar height="200" width="200">
              <v-img :src="item.image"></v-img>
            </v-list-item-avatar>

            <ul>
              <li>
                Nom et prénom : {{ item.first_name }}
                {{ item.last_name }}
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
                {{ item.phone_number }}
              </li>
              <li>
                Email :
                {{ item.email }}
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
    searched: {},
    remove: null,
    recherche: false,
    prestataireRecherche: [],
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

    this.$http
      .get(
        "http://localhost:8000/api/prestataire/parSousSpecialite/" +
          this.idSpecialite +
          this.idSous_specialite
      )
      .then((response) => {
        console.log(response.data);
        this.prestataire = response.data;
        // for (let index = 0; index < response.data.length; index++) {
        //   // const element = array[index];
        //   this.prestataire[index] = response.data[index].user;
        // }
        // this.prestataire = response.data;
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
          console.log(response.data.data);
          this.prestataireRecherche = response.data.data;
          // this.prestataire = {};
          // console.log(response.data.data.length);
          // console.log(this.prestataire.length);
          // this.remove = this.prestataire.length - response.data.data.length;
          // for (let index = 0; index < this.prestataire.length; index++) {
          //   this.prestataire[index] = {};
          // }
          // console.log(this.prestataire);
          // for (let index = 0; index < response.data.data.length; index++) {
          //   this.prestataire[index] = response.data.data[index];
          // }

          // this.prestataire.splice(this.remove, this.prestataire.length);
        });
    },
  },
};
</script>
<style scoped>
form.example input[type="text"] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #b89ac0;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #92689c;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
