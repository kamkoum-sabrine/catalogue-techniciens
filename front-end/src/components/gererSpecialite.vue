<template>
  <div class="container">
    <v-form ref="form" @submit.prevent="ajouterSpecialite">
      <v-text-field
        v-model="name"
        :counter="10"
        label="Nom spécialité"
        required
      ></v-text-field>

      <v-btn color="#7CB342" type="submit" class="mr-4"> Validate </v-btn>
    </v-form>
    <br />
    <br />
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Nom Specialite</th>

            <th class="text-left">Action</th>
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
                Supprimer
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
      newSpecialite: {},
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
    ajouterSpecialite() {
      console.log(this.name);
      this.newSpecialite = {
        name: this.name,
      };
      this.$http
        .post(
          "http://localhost:8000/api/specialites/create/",
          this.newSpecialite
        )
        .then((response) => {
          console.log(response.data);
          this.$http
            .get("http://localhost:8000/api/specialites/getAll")
            .then((response) => {
              console.log(response.data);
              this.specialites = response.data;
            });
        });
    },
    deleteSpecialite(id) {
      this.$http
        .delete("http://localhost:8000/api/specialites/delete/" + id)
        .then((response) => {
          console.log(response.data);
          this.$http
            .get("http://localhost:8000/api/specialites/getAll")
            .then((response) => {
              console.log(response.data);
              this.specialites = response.data;
            });
        });
    },
  },
};
</script>
