<template>
  <div>
    <v-toolbar elevation="4"></v-toolbar>

    <v-simple-table class="container">
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Nom</th>
            <th class="text-left">Prénom</th>

            <th class="text-left">Date souhaité</th>
            <th class="text-left">Numéro de téléphone</th>
            <th class="text-left">Adresse</th>
            <th class="text-left">Réponse</th>

            <th class="text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items" :key="item.id">
            <td>{{ item.client.first_name }}</td>
            <td>{{ item.client.last_name }}</td>
            <td>{{ item.date_rdv }}</td>
            <td>{{ item.client.phone_number }}</td>
            <td>{{ item.client.adresse }}</td>
            <td>
              <div v-if="item.status == 0">Pas de réponse !</div>
              <div v-if="item.status == 1">
                Vous avez accepté ce rendez-vous !
              </div>
              <div v-if="item.status == 2">
                Vous avez rejeté ce rendez-vous !
              </div>
            </td>
            <td>
              <div>
                <button :disabled="item.status == 1" @click="accept(item.id)">
                  <i class="fa-solid fa-circle-check" style="color: green"></i>
                  Accepter
                </button>
              </div>
              <div>
                <button
                  @click="decline(item.id)"
                  style="color: red"
                  :disabled="item.status == 2"
                >
                  <i class="fa fa-circle-xmark"></i> Refuser
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>
<script>
export default {
  name: "manageRDV",

  data: () => ({
    drawer: false,
    group: null,
    items: [],
    specialite: "",
  }),
  mounted() {
    this.$http
      .get("http://localhost:8000/api/prestataire/myRendezVous")
      .then((response) => {
        this.items = response.data.data;
      });
  },
  methods: {
    accept(id) {
      if (confirm("Etes-vous sur d'accepter ce rendez-vous ?"))
        this.$http
          .put("http://localhost:8000/api/prestataire/acceptRDV/" + id)
          .then(() => {
            this.accepted = true;
            this.$http
              .get("http://localhost:8000/api/prestataire/myRendezVous")
              .then((response) => {
                this.items = response.data.data;
              });
          });
    },
    decline(id) {
      if (confirm("Etes-vous sur de refuser ce rendez-vous ?"))
        this.$http
          .put("http://localhost:8000/api/prestataire/refuseRDV/" + id)
          .then(() => {
            this.declined = true;
            this.$http
              .get("http://localhost:8000/api/prestataire/myRendezVous")
              .then((response) => {
                this.items = response.data.data;
              });
          });
    },
  },
};
</script>
