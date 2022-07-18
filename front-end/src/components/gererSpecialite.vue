<template>
  <div class="container">
    <v-form ref="form" @submit.prevent="ajouterSpecialite">
      <v-text-field
        v-model="name"
        :counter="10"
        label="Nom spécialité"
        required
      ></v-text-field>

      <v-btn color="#7CB342" class="mr-4"> Validate </v-btn>
    </v-form>
    <br />
    <br />
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
              <!-- <button @click="deleteSpecialite(item.id)"></button> -->
              <v-btn
                color="#F48FB1"
                class="mr-4"
                @click="deleteSpecialite(item.id)"
              >
                Validate
              </v-btn>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>
<script>
export default {
  name: "gererSpecialite",
  data() {
    return {
      specialites: [],
      name: "",
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
        .delete("http://localhost:8000/api/specialites/delete/" + id)
        .then((response) => {
          console.log(response.data);
          this.specialites = response.data;
        });
    },
  },
};
</script>
