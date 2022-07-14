<template>
  <v-app>
    <v-app-bar app color="green" dark>
      <div class="d-flex align-center">
        <v-img
          alt="Vuetify Logo"
          class="shrink mr-2"
          contain
          src="./assets/logo.png"
          transition="scale-transition"
          width="150"
        />
      </div>

      <v-spacer></v-spacer>

      <v-btn
        href="https://github.com/vuetifyjs/vuetify/releases/latest"
        target="_blank"
        text
      >
        <span class="mr-2">Latest Release</span>
        <v-icon>mdi-open-in-new</v-icon>
      </v-btn>
      <button type="submit" class="btn-primary" @click="role">get role</button>
      <button class="btn-primary" @click="onItemClick">log out</button>
    </v-app-bar>

    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "App",

  data: () => ({
    //
  }),
  created() {
    // console.log(this.state.isAdmin);
    // console.log(this.state.isPrestataire);
    // console.log(this.state.isClient);
  },
  methods: {
    onItemClick() {
      this.$store.dispatch("logout");
    },
    role() {
      console.log(this.$store.getters);
    },
  },
};
</script>

