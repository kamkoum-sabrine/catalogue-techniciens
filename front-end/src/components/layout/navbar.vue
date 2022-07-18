<template>
  <div>
    <!-- <sidebar-menu :menu="menu" :width="'200px'" /> -->
    <sidebar-menu
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
              hidden: this.$store.getters.isAuthenticated,
            },
            {
              href: '/register',
              title: 'S\'inscrire',
              hidden: this.$store.getters.isAuthenticated,
            },
            {
              title: 'Logout',
              hidden: !this.$store.getters.isAuthenticated,
            },
          ],
        },
        {
          href: '/',
          title: 'Home',
          icon: 'fas fa-home',
        },
        {
          title: 'Prestataire',
          icon: 'fas fa-home',
          hidden: !this.$store.getters.isAdmin,
          child: [
            {
              href: '/managePrestataire',
              title: 'Gérer inscription ',
            },
          ],
        },
      ]"
      :collapsed="false"
      style="transition: 0.5s max-width ease !important"
    />
    <button @click="getGetter">get getters</button>
  </div>
</template>

<script>
import { SidebarMenu } from "vue-sidebar-menu";
import { mapGetters } from "vuex";

export default {
  name: "navbar",
  components: {
    SidebarMenu,
  },
  props: {
    // to: [
    //   {
    //     type: St,
    //   },
    // ],
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
    onItemClick(event, item) {
      if (item.title == "Logout") {
        this.$store.dispatch("logout");
      }
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
  computed: {
    ...mapGetters({
      auth: "isAuthenticated",
      admin: "isAdmin",
      client: "isClient",
      prestataire: "isPrestataire",
    }),
    isAuth: function () {
      return this.auth;
    },
    isAdmin: function () {
      return this.admin;
    },
    isClient: function () {
      return this.client;
    },
    isPrestataire: function () {
      return this.prestataire;
    },
  },
};
</script>
<style >
</style>

