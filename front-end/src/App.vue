<template>
  <div>
    <v-app-bar elevation="4"></v-app-bar>
    <sidebar-menu :menu="menu" />
    <font-awesome-icon icon="fa-regular fa-coffee"></font-awesome-icon>
    <router-view></router-view>
  </div>
</template>

<script>
import { SidebarMenu } from "vue-sidebar-menu";
export default {
  name: "App",
  components: {
    SidebarMenu,
  },
  // props: {
  //   // Sidebar menu (required)
  //   menu: {
  //     type: Array,
  //     required: true,
  //   },

  //   // Sidebar Collapse state
  //   collapsed: {
  //     type: Boolean,
  //     default: false,
  //   },

  //   // Sidebar width (expanded)
  //   width: {
  //     type: String,
  //     default: "350px",
  //   },

  //   // Sidebar width (collapsed)
  //   widthCollapsed: {
  //     type: String,
  //     default: "50px",
  //   },

  //   // Keep only one child opened at a time (first level only)
  //   showOneChild: {
  //     type: Boolean,
  //     default: false,
  //   },

  //   // Keep all child open
  //   showChild: {
  //     type: Boolean,
  //     default: false,
  //   },

  //   // Sidebar right to left
  //   rtl: {
  //     type: Boolean,
  //     default: false,
  //   },

  //   // Make sidebar relative to the parent (by default the sidebar is relative to the viewport)
  //   relative: {
  //     type: Boolean,
  //     default: false,
  //   },

  //   // Hide toggle collapse btn
  //   hideToggle: {
  //     type: Boolean,
  //     default: false,
  //   },

  //   // Sidebar theme (available themes: 'white-theme')
  //   theme: {
  //     type: String,
  //     default: "",
  //   },

  //   // Disable hover on collapse mode
  //   disableHover: {
  //     type: Boolean,
  //     default: false,
  //   },
  // },
  data: () => ({
    drawer: false,
    group: null,
    menu: [
      {
        header: true,
        title: "Main Navigation",
        hiddenOnCollapse: true,
      },
      {
        href: "/",
        title: "Dashboard",
        icon: "bi bi-speedometer",
      },
      {
        // href: "/managePrestataire",
        title: "Prestataires",
        icon: "bi bi-people-fill",
        child: [
          {
            href: "/managePrestataire",
            title: "Gérer demande d'inscription",
          },
        ],
      },
    ],
  }),
  watch: {
    group() {
      this.drawer = false;
    },
  },
  created() {
    console.log(this.$store.getters.isLoggedIn);
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
  },
};
</script>
<style >
</style>

