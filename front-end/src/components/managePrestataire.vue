<template>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Nom</th>
          <th class="text-left">Prénom</th>
          <th class="text-left">Spécialité</th>
          <th class="text-left">Sous spécialité</th>
          <th class="text-left">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.id">
          <td>{{ item.first_name }}</td>
          <td>{{ item.last_name }}</td>
          <!-- <td>{{ item.email }}</td> -->
          <td>{{ item.nomspecialite }}</td>
          <td>{{ item.nomsousspecialite }}</td>
          <td>
            <div>
              <i class="fa-solid fa-check"></i>

              <button @click="accept(item.id)" color="success">
                <v-icon disabled> mdi-checkbox-marked-circle </v-icon>Accept
              </button>
            </div>
            <div>
              <button @click="decline(item.id)" color="success">Decline</button>
            </div>

            <!-- <button>/</button> -->
          </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
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
        // console.log(response.data);
        this.items = response.data;
        this.items.forEach((item) => {
          // console.log(item.roles[0].pivot.specialite);
          this.$http
            .get(
              "http://localhost:8000/api/specialites/getSpecialite/" +
                item.roles[0].pivot.specialite
            )
            .then((response) => {
              this.specialite = response.data.attributes.name;
              // console.log(typeof item);
              item.nomspecialite = this.specialite;
              console.log(item.nomspecialite);
            });

          console.log(item.roles[0].pivot.sous_specialite);
          if (item.roles[0].pivot.sous_specialite != null) {
            this.$http
              .get(
                "http://localhost:8000/api/sousSpecialite/find/" +
                  item.roles[0].pivot.sous_specialite
              )
              .then((response) => {
                // this.specialite = response.data.attributes.name;
                // console.log(typeof item);
                console.log(response.data);
                item.nomsousspecialite = response.data.attribute.name;
              });
          }
        });
        console.log(this.items);
      });
  },
  methods: {
    accept(id) {
      console.log(id);
      if (confirm("Etes-vous sur d'accepter ce prestataire ?"))
        this.$http
          .put("http://localhost:8000/api/prestataire/accept/" + id)
          .then((response) => {
            console.log(response.data);
            this.accepted = true;
          });
    },
    decline(id) {
      console.log(id);
      this.$http
        .put("http://localhost:8000/api/prestataire/refuse/" + id)
        .then((response) => {
          console.log(response.data);
          this.declined = true;
        });
    },
  },
};
</script>
