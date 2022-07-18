<template>
  <div>
    <v-app-bar elevation="4"></v-app-bar>
    <navbar />
    <!-- <sidebar-menu :menu="menu" :width="'200px'" /> -->
    <!-- <sidebar-menu
      class="position-fixed"
      @item-click="onItemClick"
      :show-one-child="true"
      @toggle-collapse="collapse = !collapse"
      :width="'200px'"
      :menu="[
        {
          header: 'Main Navigation',
          hiddenOnCollapse: true,
        },
        {
          title: this.$store.getters.authUser
            ? !null
            : this.$store.getters.first_name,
          icon: 'fas fa-user',
          child: [
            {
              href: '/user',
              title: 'User',
            },
            {
              href: '/login',
              title: 'Se connecter',
            },
            {
              href: '/register',
              title: 'S\'inscrire',
            },
            {
              title: 'Logout',
            },
          ],
        },
        {
          href: '/',
          title: 'Home',
          icon: 'fas fa-home',
        },
      ]"
      :collapsed="false"
      style="transition: 0.5s max-width ease !important"
    />
    <button @click="getGetter">get getters</button>
    <a href="/login">Login</a> -->
    <router-view></router-view>
  </div>
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


