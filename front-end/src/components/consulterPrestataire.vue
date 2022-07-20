<template>
  <div>
    <v-card class="mx-auto container" max-width="95%" tile>
      <v-list three-line>
        <template v-for="(item, index) in prestataire">
          <v-list-item :key="item.id">
            <v-list-item-avatar height="200" width="200">
              <v-img :src="item.user.image"></v-img>
            </v-list-item-avatar>

            <!-- <v-list-item-content>
              Nom
              <v-list-item-title
                v-html="item.user.first_name"
              ></v-list-item-title>
              <v-list-item-subtitle
                v-html="item.description"
              ></v-list-item-subtitle>
              <v-list-item-subtitle
                v-html="item.user.phone_number"
              ></v-list-item-subtitle>
            </v-list-item-content> -->
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
                <v-rating
                  background-color="#eee"
                  color="teal"
                  empty-icon="$mdiStarOutline"
                  full-icon="$mdiStar"
                  half-icon="$mdiHeartHalfFull"
                  hover
                  length="5"
                  size="35"
                  value="3"
                ></v-rating>
              </li>
            </ul>
          </v-list-item>
          <v-divider v-if="divider" :key="index" :inset="inset"></v-divider>

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
    nomSousSpecialite: "",
    nomspecialite: "",
    divider: true,
    inset: true,
  }),
  created() {
    if (this.$route.params.id == undefined) {
      this.$router.push({
        name: "Home",
      });
    }
    this.idSous_specialite = this.$route.params.id;
    this.nomSousSpecialite = this.$route.params.sous_specialite;
    this.nomspecialite = this.$route.params.specialite;
    console.log(this.$route.params.name);
    this.$http
      .get(
        "http://localhost:8000/api/prestataire/parSousSpecialite/" +
          this.idSous_specialite
      )
      .then((response) => {
        console.log(response.data);
        this.prestataire = response.data;
      });
  },
};
</script>
