<template>
  <div>
    <br />
    <section class="section about-section gray-bg" id="about">
      <div class="container">
        <div class="row align-items-center flex-row-reverse">
          <table>
            <tr>
              <td>
                <div class="about-avatar">
                  <img
                    :src="prestataire.image"
                    title=""
                    alt=""
                    height="350px"
                    width="400px"
                  />
                </div>
              </td>
              <td>
                <br /><br />
                <div class="about-text go-to">
                  <h3 class="dark-color">
                    <i class="fa-solid fa-user-gear"></i>
                    {{ prestataire.first_name }} {{ prestataire.last_name }}
                  </h3>
                  <h6 class="theme-color lead">
                    <i class="fa-solid fa-toolbox"></i> Spécialité:
                    {{ nomspecialite }} <br />
                    <i class="fa-solid fa-toolbox"></i> Sous spécialité:
                    {{ nomSousSpecialite }}
                  </h6>
                  <p>
                    {{ description }}
                  </p>

                  <div class="row about-list">
                    <div class="col-md-6">
                      <table>
                        <tr>
                          <td>
                            <div class="media">
                              <label>
                                <i class="fa-solid fa-phone"></i>
                                Téléphone</label
                              >
                              <p>
                                {{ prestataire.phone_number }}
                              </p>
                            </div>
                          </td>
                          <td>
                            <div class="media">
                              <label>
                                <i class="fa-solid fa-envelope"></i>
                                Email</label
                              >
                              <p>
                                {{ prestataire.email }}
                              </p>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="media">
                              <label>
                                <i class="fa-solid fa-location-dot"></i> Adresse
                              </label>
                              <p>
                                {{ prestataire.adresse }}
                              </p>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td></td>
                          <td>
                            <v-rating
                              v-model="rating"
                              v-if="this.$store.getters.isClient"
                              @input="getRate(prestataire.id)"
                              value="rating"
                              color="warning"
                            ></v-rating>
                          </td>
                        </tr>
                      </table>
                      <div class="float-right">{{ moyenne }}/5</div>
                      <br />
                      <div class="float-right">
                        <v-btn
                          color="#e76f51"
                          style="color: white"
                          v-if="
                            this.$store.getters.isClient ||
                            this.$store.getters.isAdmin
                          "
                          right
                          @click="dialog = !dialog"
                        >
                          Prendre rendez-vous
                        </v-btn>
                        <v-dialog v-model="dialog" max-width="500px">
                          <v-card>
                            <v-card-text>
                              <label>Choisir une date</label><br /><br />
                              <input type="datetime-local" v-model="dateRDV" />
                            </v-card-text>

                            <v-card-actions>
                              <v-spacer></v-spacer>

                              <v-btn text color="primary" @click="createRDV()">
                                Submit
                              </v-btn>
                            </v-card-actions>
                          </v-card>
                        </v-dialog>
                        <v-simple-table
                          v-if="
                            this.$store.getters.isClient ||
                            this.$store.getters.isAdmin
                          "
                        >
                          <template
                            v-slot:default
                            v-if="
                              this.$store.getters.isClient ||
                              this.$store.getters.isAdmin
                            "
                          >
                            <thead>
                              <tr>
                                <th class="text-left">Date</th>

                                <th class="text-left">Action</th>
                                <th class="text-left">Result</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="item in myRDV" :key="item.id">
                                <td>{{ item.date_rdv }}</td>
                                <td>
                                  <v-btn
                                    color="#e9c46a"
                                    class="mr-4"
                                    :disabled="
                                      item.status == 1 || item.status == 2
                                    "
                                    @click="deleteRDV(item.id)"
                                  >
                                    <fontawesome
                                      class="fa-solid fa-trash-can"
                                    ></fontawesome>
                                  </v-btn>
                                </td>
                                <td>
                                  <div v-if="item.status == 0">
                                    Pas de réponse disponible
                                  </div>
                                  <div v-if="item.status == 1">
                                    Rendez-vous confirmé !
                                  </div>
                                  <div v-if="item.status == 2">
                                    Désolé je ne suis pas disponible
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </template>
                        </v-simple-table>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
import myModal from "./myModal.vue";

export default {
  name: "moreDetailsPrestataire",
  components: myModal,
  data: () => ({
    loading: false,
    selection: 1,
    nomSousSpecialite: "",
    nomspecialite: "",
    prestataire: "",
    description: "",
    moyenne: 0,
    rating: 0,
    hiddenForm: false,
    dialog: false,
    dateRDV: null,
    rdv: {},
    myRDV: {},
    idRDV: null,
  }),

  methods: {
    getRate(idPrestataire) {
      let newRate = {
        prestataire_id: idPrestataire,
        note: this.rating,
      };
      this.$http
        .post("http://localhost:8000/api/notes/create", newRate)
        .then(() => {});
    },
    valider() {
      this.hiddenForm = false;
    },
    annuler() {
      this.hiddenForm = true;
    },
    createRDV() {
      this.dialog = false;
      this.rdv = {
        prestataire_id: this.prestataire.id,
        date_rdv: this.dateRDV,
      };

      this.$http
        .post("http://localhost:8000/api/client/createRDV", this.rdv)
        .then((response) => {
          this.myRDV = response.data;
          this.$http
            .get("http://localhost:8000/api/client/myRendezVous")
            .then((response) => {
              this.myRDV = response.data.data;
            });
        });
    },
    deleteRDV(id) {
      this.$http
        .delete("http://localhost:8000/api/client/deleteRDV/" + id)
        .then(() => {
          this.$http
            .get("http://localhost:8000/api/client/myRendezVous")
            .then((response) => {
              this.myRDV = response.data.data;
            });
        });
    },
  },
  created() {
    if (this.$route.params.prestataire == undefined) {
      this.$router.push({
        name: "Home",
      });
    }
    this.nomSousSpecialite = this.$route.params.sous_specialite;
    this.nomspecialite = this.$route.params.specialite;
    this.prestataire = this.$route.params.prestataire;
    this.description = this.$route.params.description;
    this.moyenne = this.$route.params.moyenne;

    this.$http
      .get("http://localhost:8000/api/client/myRendezVous")
      .then((response) => {
        this.myRDV = response.data.data;
      });
  },
};
</script>
<style >
#about body {
  color: #6f8ba4;
  margin-top: 20px;
}
#about .section {
  padding: 100px 0;
  position: relative;
}
#about .gray-bg {
  background-color: #f5f5f5;
}
#about img {
  max-width: 100%;
}
#about img {
  vertical-align: middle;
  border-style: none;
}
/* About Me 
---------------------*/
#about .about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
#about .about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
#about .about-text p {
  font-size: 18px;
  max-width: 450px;
}
#about .about-text p mark {
  font-weight: 600;
  color: #20247b;
}

#about .about-list {
  padding-top: 10px;
}
#about .about-list .media {
  padding: 5px 0;
}
#about .about-list label {
  color: #f4a261;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
#about .about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
#about .about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

#about .about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
#about .about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
#about .about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
#about .about-section .counter p {
  font-weight: 600;
  margin: 0;
}
#about mark {
  background-image: linear-gradient(
    rgba(252, 83, 86, 0.6),
    rgba(252, 83, 86, 0.6)
  );
  background-size: 100% 3px;
  background-repeat: no-repeat;
  background-position: 0 bottom;
  background-color: transparent;
  padding: 0;
  color: currentColor;
}
#about .theme-color {
  color: #2a9d8f;
}
#about .dark-color {
  color: #264653;
}
</style>
