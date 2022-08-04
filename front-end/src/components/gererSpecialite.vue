<template>
  <div class="container">
    <v-form ref="form" v-if="edit == false" @submit.prevent="ajouterSpecialite">
      <v-text-field
        v-model="name"
        :counter="10"
        label="Nom spécialité"
        required
      ></v-text-field>

      <v-btn color="#2a9d8f" style="color: white" type="submit" class="mr-4">
        Ajouter
      </v-btn>
    </v-form>
    <v-form v-if="edit == true" ref="form" @submit.prevent="updateSpecialite">
      <v-text-field
        v-model="name"
        :counter="10"
        label="Nom spécialité"
        required
      ></v-text-field>

      <v-btn color="#2a9d8f" style="color: white" type="submit" class="mr-4">
        Editer
      </v-btn>
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
              <v-btn
                color="#f4a261"
                style="color: white"
                class="mr-4"
                @click="deleteSpecialite(item.id)"
              >
                Supprimer
              </v-btn>
              <v-btn
                color="#f4a261"
                style="color: white"
                class="mr-4"
                @click="editSpecialite(item.id)"
              >
                Editer
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
      edit: false,
      id: null,
    };
  },
  created() {
    this.$http
      .get("http://localhost:8000/api/specialites/getAll")
      .then((response) => {
        this.specialites = response.data;
      });
  },
  methods: {
    ajouterSpecialite() {
      this.newSpecialite = {
        name: this.name,
      };

      this.$http
        .post(
          "http://localhost:8000/api/specialites/create/",
          this.newSpecialite
        )
        .then(() => {
          this.$http
            .get("http://localhost:8000/api/specialites/getAll")
            .then((response) => {
              this.specialites = response.data;
            });
        });
    },
    deleteSpecialite(id) {
      this.$http
        .delete("http://localhost:8000/api/specialites/delete/" + id)
        .then(() => {
          this.$http
            .get("http://localhost:8000/api/specialites/getAll")
            .then((response) => {
              this.specialites = response.data;
            });
        });
    },
    updateSpecialite() {
      this.newSpecialite = {
        name: this.name,
      };
      this.$http
        .put(
          "http://localhost:8000/api/specialites/update/" + this.id,
          this.newSpecialite
        )
        .then(() => {
          this.edit = false;
          this.name = "";
        });
      this.$http
        .get("http://localhost:8000/api/specialites/getAll")
        .then((response) => {
          this.specialites = response.data;
        });
    },
    editSpecialite(id) {
      this.edit = true;
      this.id = id;
      this.$http
        .get("http://localhost:8000/api/specialites/getAll")
        .then((response) => {
          this.specialites = response.data;
        });
      this.$http
        .get("http://localhost:8000/api/specialites/getSpecialite/" + id)
        .then((response) => {
          this.name = response.data.attributes.name;
        });
    },
  },
};
</script>
