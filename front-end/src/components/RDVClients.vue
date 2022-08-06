<template>
  <div>
    <v-toolbar elevation="4"></v-toolbar>

    <v-simple-table class="container">
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Nom Prestataire</th>
            <th class="text-left">Prénom Prestataire</th>
            <th class="text-left">Spécialité</th>
            <th class="text-left">Sous spécialité</th>

            <th class="text-left">Date souhaité</th>
            <th class="text-left">Numéro de téléphone</th>
            <th class="text-left">Adresse</th>
            <th class="text-left">Réponse</th>

            <th class="text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items" :key="item.id">
            <td>{{ item.prestataire.first_name }}</td>
            <td>{{ item.prestataire.last_name }}</td>
            <td>{{ item.prestataire.roles[0].role_user.specialite.name }}</td>
            <td>
              {{ item.prestataire.roles[0].role_user.sous_specialite.name }}
            </td>
            <td>{{ item.date_rdv }}</td>
            <td>{{ item.prestataire.phone_number }}</td>
            <td>{{ item.prestataire.adresse }}</td>

            <td>
              <div v-if="item.status == 0">Pas de réponse !</div>
              <div v-if="item.status == 1">Rendez-vous accepté !</div>
              <div v-if="item.status == 2">
                Désolé je ne suis pas disponible !
              </div>
            </td>
            <td>
              <div>
                <v-btn
                  color="#e9c46a"
                  class="mr-4"
                  :disabled="item.status == 1 || item.status == 2"
                  @click="deleteRDV(item.id)"
                >
                  <fontawesome class="fa-solid fa-trash-can"></fontawesome>
                </v-btn>
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
  name: "RDVClients",

  data: () => ({
    drawer: false,
    group: null,
    items: [],
  }),
  mounted() {
    this.$http
      .get("http://localhost:8000/api/client/myRendezVous")
      .then((response) => {
        this.items = response.data.data;
        console.log(response.data.data);
      });
  },
  methods: {
    deleteRDV(id) {
      this.$http
        .delete("http://localhost:8000/api/client/deleteRDV/" + id)
        .then(() => {
          this.$http
            .get("http://localhost:8000/api/client/myRendezVous")
            .then((response) => {
              this.items = response.data.data;
            });
        });
    },
  },
};
</script>
