<template>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Nom</th>
          <th class="text-left">Prénom</th>

          <th class="text-left">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.id">
          <td>{{ item.first_name }}</td>
          <td>{{ item.last_name }}</td>

          <td>
            <div>
              <button @click="activate(item.id)" color="success">
                Activer compte
              </button>
            </div>
            <div>
              <button @click="desactivate(item.id)" color="success">
                Désactiver compte
              </button>
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
  name: "gererClients",

  data: () => ({
    drawer: false,
    group: null,
    items: [],
    specialite: "",
  }),
  mounted() {
    this.$http
      .get("http://localhost:8000/api/client/getAll")
      .then((response) => {
        // console.log(response.data);
        this.items = response.data;

        console.log(this.items);
      });
  },
  methods: {
    activate(id) {
      console.log(id);
      this.$http
        .put("http://localhost:8000/api/client/activate/" + id)
        .then((response) => {
          console.log(response.data);
          this.accepted = true;
        });
    },
    desactivate(id) {
      console.log(id);
      this.$http
        .put("http://localhost:8000/api/client/desactivate/" + id)
        .then((response) => {
          console.log(response.data);
          this.declined = true;
        });
    },
  },
};
</script>
