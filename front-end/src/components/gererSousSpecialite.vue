<template>
  <div class="container" data-app>
    <v-form
      ref="form"
      v-if="edit == false"
      @submit.prevent="ajouterSousSpecialite"
    >
      <v-text-field
        v-model="name"
        :counter="10"
        label="Nom sous spécialité"
        required
      ></v-text-field>
      <v-select
        required
        name="specialite"
        v-model="specialite"
        label="Spécialité"
        :items="specialites"
      >
      </v-select>
      <v-btn color="#2a9d8f" style="color: white" type="submit" class="mr-4">
        Ajouter
      </v-btn>
    </v-form>
    <v-form
      v-if="edit == true"
      ref="form"
      @submit.prevent="updateSousSpecialite"
    >
      <v-text-field
        v-model="name"
        :counter="10"
        label="Nom sous spécialité"
        required
      ></v-text-field>
      <v-select
        required
        name="specialite"
        v-model="specialite"
        label="Spécialité"
        :items="specialites"
      >
      </v-select>

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
            <th class="text-left">Nom specialite</th>
            <th class="text-left">Nom sous specialite</th>

            <th class="text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in sous_specialites" :key="item.id">
            <td>{{ item.name }}</td>
            <td>{{ item.specialite.name }}</td>
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
  name: "gererSousSpecialite",
  data() {
    return {
      sous_specialites: [],
      specialites: [],
      name: "",
      specialite: "",
      newSpecialite: {},
      edit: false,
      id: null,
      idSpecialite: null,
    };
  },
  created() {
    this.$http
      .get("http://localhost:8000/api/specialites/getAll")
      .then((response) => {
        for (let i = 0; i < response.data.length; i++) {
          this.specialites.push(response.data[i].name);
        }
      })
      .catch((err) => {
        console.log(err);
      });
    this.$http
      .get("http://localhost:8000/api/sousSpecialite/getAll")
      .then((response) => {
        for (let i = 0; i < response.data.length; i++) {
          this.sous_specialites.push(response.data[i]);
        }
      })
      .catch((err) => {
        console.log(err);
      });
  },
  methods: {
    ajouterSousSpecialite() {
      this.$http
        .get("http://localhost:8000/api/specialites/find/" + this.specialite)
        .then((response) => {
          this.idSpecialite = response.data.attribute[0].id;
          this.$http
            .post("http://localhost:8000/api/sousSpecialite/create/", {
              name: this.name,
              specialite_id: this.idSpecialite,
            })
            .then(() => {
              this.$http
                .get("http://localhost:8000/api/sousSpecialite/getAll")
                .then((response) => {
                  this.sous_specialites = response.data;
                  this.name = "";
                  this.specialite = "";
                });
            });
        });
    },
    deleteSpecialite(id) {
      this.$http
        .delete("http://localhost:8000/api/sousSpecialite/delete/" + id)
        .then(() => {
          this.$http
            .get("http://localhost:8000/api/sousSpecialite/getAll")
            .then((response) => {
              this.sous_specialites = response.data;
            });
        });
    },
    updateSousSpecialite() {
      this.$http
        .get("http://localhost:8000/api/specialites/find/" + this.specialite)
        .then((response) => {
          this.idSpecialite = response.data.attribute[0].id;
          this.newSpecialite = {
            name: this.name,
            specialite_id: this.idSpecialite,
          };
          this.$http
            .put("http://localhost:8000/api/sousSpecialite/update/" + this.id, {
              name: this.name,
              specialite_id: this.idSpecialite,
            })
            .then(() => {
              this.edit = false;
              this.name = "";
              this.specialite = "";
            });
          this.$http
            .get("http://localhost:8000/api/sousSpecialite/getAll")
            .then((response) => {
              this.sous_specialites = response.data;
            });
        });
    },
    editSpecialite(id) {
      this.edit = true;
      this.id = id;
      this.$http
        .get("http://localhost:8000/api/sousSpecialite/getAll")
        .then((response) => {
          this.sous_specialites = response.data;
        });
      this.$http
        .get("http://localhost:8000/api/sousSpecialite/find/" + id)
        .then((response) => {
          this.name = response.data.attribute.name;
          this.specialite = response.data.attribute.specialite;
          this.idSpecialite = response.data.attribute.specialite_id;
          this.newSpecialite = {
            name: this.name,
            specialite_id: this.idSpecialite,
          };
        });
    },
  },
};
</script>
