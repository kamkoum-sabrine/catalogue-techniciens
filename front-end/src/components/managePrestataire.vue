<template>
  <div>
    <v-toolbar elevation="4"></v-toolbar>

    <v-simple-table class="container">
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Image</th>
            <th class="text-left">Nom</th>
            <th class="text-left">Prénom</th>
            <th class="text-left">Spécialité</th>
            <th class="text-left">Sous spécialité</th>
            <th class="text-left">Date d'inscription</th>
            <th class="text-left">Date de dernier paiement</th>
            <th class="text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items" :key="item.id">
            <td><img height="75px" width="75px" :src="item.image" /></td>
            <td>{{ item.first_name }}</td>
            <td>{{ item.last_name }}</td>

            <td>{{ item.roles[0].role_user.specialite.name }}</td>
            <td>{{ item.roles[0].role_user.sous_specialite.name }}</td>
            <td>{{ item.created_at }}</td>
            <td>{{ item.roles[0].pivot.date_dernier_paiement }}</td>

            <td>
              <div>
                <button
                  style="color: green"
                  :disabled="item.roles[0].pivot.status == 1"
                  @click="accept(item.id)"
                >
                  <i class="fa-solid fa-circle-check" style="color: green"></i
                  >Accepter
                </button>
              </div>
              <div>
                <button
                  @click="decline(item.id)"
                  style="color: red"
                  :disabled="item.roles[0].pivot.status == 2"
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
  name: "managePrestataire",

  data: () => ({
    drawer: false,
    group: null,
    items: [],
    specialite: "",
  }),
  mounted() {
    this.$http
      .get("http://localhost:8000/api/prestataire/show")
      .then((response) => {
        this.items = response.data;
      });
  },
  methods: {
    accept(id) {
      if (confirm("Etes-vous sur d'accepter ce prestataire ?"))
        this.$http
          .put("http://localhost:8000/api/prestataire/accept/" + id)
          .then(() => {
            this.accepted = true;
            this.$http
              .get("http://localhost:8000/api/prestataire/show")
              .then((response) => {
                this.items = response.data;
              });
          });
    },
    decline(id) {
      if (confirm("Etes-vous sur de refuser ce prestataire ?"))
        this.$http
          .put("http://localhost:8000/api/prestataire/refuse/" + id)
          .then(() => {
            this.declined = true;
            this.$http
              .get("http://localhost:8000/api/prestataire/show")
              .then((response) => {
                this.items = response.data;
              });
          });
    },
  },
};
</script>
