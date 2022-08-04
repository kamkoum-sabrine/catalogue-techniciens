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
          title: this.$store.getters.userName,
          child: [
            {
              href: '/login',
              title: 'Se connecter',
              hidden: this.isAuth,
            },
            {
              href: '/register',
              title: 'S\'inscrire',
              hidden: this.isAuth,
            },
            {
              title: 'Logout',
              hidden: !this.isAuth,
            },
          ],
        },
        {
          href: '/',
          title: 'Acceuil',
          icon: 'fa fa-house-user',
        },
        {
          href: '/gererProfile',
          title: 'Profile',
          icon: 'fa fa-user',
          hidden: !this.isAuth,
        },
        {
          title: 'Prestataire',
          icon: 'fa fa-user-gear',
          hidden: !this.isAdmin,
          child: [
            {
              href: '/managePrestataire',
              title: 'Gérer inscription ',
            },
          ],
        },
        {
          href: '/gererSpecialite',
          title: 'Specialite',
          icon: 'fa fa-screwdriver-wrench',
          hidden: !this.isAdmin,
        },
        {
          href: '/gererSousSpecialite',
          title: 'Sous specialité',
          hidden: !this.isAdmin,
          icon: 'fa fa-screwdriver-wrench',
        },
        {
          href: '/gererClient',
          title: 'Clients',
          hidden: !this.isAdmin,
          icon: 'fa fa-users',
        },
        {
          href: '/manageRDV',
          title: 'Les rendez-vous',
          hidden: !this.isPrestataire,
          icon: 'fas fa-calendar-check',
        },
      ]"
      :collapsed="false"
      style="transition: 0.5s max-width ease !important"
    />
  </div>
</template>

<script>
import { SidebarMenu } from "vue-sidebar-menu";
// import { mapGetters } from "vuex";
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
    console.log(this.$store.getters.isAuthenticated);
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
      prestataire: "isPrestataire",
      client: "isClient",
    }),
    isAuth: function () {
      return this.auth;
    },
    isAdmin: function () {
      return this.admin;
    },
    isPrestataire: function () {
      return this.prestataire;
    },
    isClient: function () {
      return this.client;
    },
  },
};
</script>
<style >
/* .v-sidebar-menu.vsm_collapsed {
  background-color: #ffb74d;
}
.v-sidebar-menu .vsm--item {
  background-color: #ffb74d;
}
.v-sidebar-menu .vsm--title {
  color: black;
}
.v-sidebar-menu .vsm--icon {
  color: black;
  background-color: #ffb84d00;
} */
</style>

