<template>
  <!-- <div class="container">
    <v-list three-line>
      <template v-for="(item, index) in items">
        <v-subheader
          v-if="item.header"
          :key="item.header"
          v-text="item.header"
        ></v-subheader>

        <v-divider
          v-else-if="item.divider"
          :key="index"
          :inset="item.inset"
        ></v-divider>

        <v-list-item v-else :key="item.title">
          <v-list-item-avatar>
            <v-img :src="item.image"></v-img>
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title v-html="item.first_name"></v-list-item-title>
            <v-list-item-subtitle
              v-html="item.specialite"
            ></v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </template>
    </v-list>
  </div> -->
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Nom</th>
          <th class="text-left">Prénom</th>
          <th class="text-left">Spécialité</th>
          <th class="text-left">Sous spécialité</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.id">
          <td>{{ item.first_name }}</td>
          <td>{{ item.last_name }}</td>
          <td>{{ item.specialite }}</td>
          <td>{{ item.sous_specialite }}</td>
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
  }),
  created() {
    this.$http
      .get("http://localhost:8000/api/prestataire/show")
      .then((response) => {
        console.log(response.data);
        this.items = response.data;
        this.items.forEach((item) => {
          console.log(item.roles[0].pivot.specialite);
        });
      });
  },
};
</script>
