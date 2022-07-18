<template>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Nom Specialite</th>

          <th class="text-left">Action</th>
          <th class="text-left">Sous specialites</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in specialites" :key="item.id">
          <td>{{ item.name }}</td>
          <td>
            <!-- <tr v-for="i in item.sous_specialite" :key="i.id">
              <td>{{ i.name }}</td>
            </tr> -->
            <button @click="deleteSpecialite(item.id)"></button>
          </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>
<script>
export default {
  name: "gererSpecialite",
  data() {
    return {
      specialites: [],
    };
  },
  created() {
    this.$http
      .get("http://localhost:8000/api/specialites/getAll")
      .then((response) => {
        console.log(response.data);
        this.specialites = response.data;
      });
  },
  methods: {
    deleteSpecialite(id) {
      this.$http
        .get("http://localhost:8000/api/delete/" + id)
        .then((response) => {
          console.log(response.data);
          this.specialites = response.data;
        });
    },
  },
};
</script>
