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
                    {{ prestataire.first_name }} {{ prestataire.last_name }}
                  </h3>
                  <h6 class="theme-color lead">
                    Spécialité: {{ nomspecialite }} <br />
                    Sous spécialité: {{ nomSousSpecialite }}
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
                              <label>Téléphone</label>
                              <p>{{ prestataire.phone_number }}</p>
                            </div>
                          </td>
                          <td>
                            <div class="media">
                              <label>Email</label>
                              <p>{{ prestataire.email }}</p>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="media">
                              <label> Adresse </label>
                              <p>{{ prestataire.adresse }}</p>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td></td>
                          <td>
                            <v-rating
                              v-model="rating"
                              @input="getRate(prestataire.id)"
                              value="rating"
                              color="warning"
                            ></v-rating>
                          </td>
                        </tr>
                      </table>
                      <div class="float-right">{{ moyenne }}/5</div>
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
export default {
  name: "moreDetailsPrestataire",
  data: () => ({
    loading: false,
    selection: 1,
    nomSousSpecialite: "",
    nomspecialite: "",
    prestataire: "",
    description: "",
    moyenne: 0,
    rating: 0,
  }),

  methods: {
    getRate(idPrestataire) {
      console.log(this.rating);
      let newRate = {
        prestataire_id: idPrestataire,
        note: this.rating,
      };
      this.$http
        .post("http://localhost:8000/api/notes/create", newRate)
        .then(() => {});
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
  color: #20247b;
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
  color: #fc5356;
}
#about .dark-color {
  color: #20247b;
}
</style>
