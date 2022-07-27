<template>
  <v-app>
    <div data-app>
      <!-- <v-app-bar elevation="4"></v-app-bar> -->
      <!-- <div>
      <v-toolbar
        dark
        src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
      >
        <v-toolbar-title>depanini</v-toolbar-title>
        
        <v-spacer></v-spacer>

        <v-btn icon>
          <v-icon>mdi-export</v-icon>
        </v-btn>
      </v-toolbar>
    </div>-->
      <navbar />

      <router-view></router-view>
    </div>
  </v-app>
</template>

<script>
// import { SidebarMenu } from "vue-sidebar-menu";
import navbar from "./components/layout/navbar.vue";
export default {
  name: "App",
  components: {
    navbar,
  },
  data() {
    return {
      collapse: true,
    };
  },
  created() {
    window.document.body.style.marginLeft = this.collapse ? "200px" : "50px";
  },

  watch: {
    watch: {
      collapse(val) {
        window.document.body.style.marginLeft = val ? "200px" : "50px";
      },
    },
  },

  methods: {
    onItemClick() {
      this.$store.dispatch("logout");
    },
    role() {
      console.log(this.$store.getters);
    },
    loged() {
      console.log(this.$store.getters.isLoggedIn);
    },
    getGetter() {
      console.log(this.$store.getters);
    },
  },
};
</script>


