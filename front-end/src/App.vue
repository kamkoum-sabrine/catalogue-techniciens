<template>
  <div>
    <sidebar-menu :menu="menu" />
    <!-- <div>
      <div id="wrapper">
        <navbar />
        <div id="content-wrapper" className="d-flex flex-column">
          <div id="content">
           
          </div>
        </div>
      </div> -->
  </div>
  <!-- <ul
      className="navbar-nav  sidebar sidebar-dark accordion"
      id="accordionSidebar"
    >
      <a
        className="sidebar-brand d-flex align-items-center justify-content-center"
        href="/"
      >
        <div className="sidebar-brand-icon ">
          <img src="{logo}" height="70" width="70" alt="..." />
        </div>
        <div className="sidebar-brand-text ">XD-META</div>
      </a>

      <hr className="sidebar-divider my-0" />

      <li className="nav-item">
        <a className="nav-link" href="/dashboard">
          <i className="fas fa-fw fa-tachometer-alt"></i>
          <span>Tableau de bord</span></a
        >
      </li>

      <hr className="sidebar-divider" />

      <div className="sidebar-heading">Composantes</div>

      <li className="nav-item">
        <a
          className="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapseTwo"
          aria-expanded="true"
          aria-controls="collapseTwo"
        >
          <i className="bi bi-gear "></i>
          <span>Services</span>
        </a>
        <div
          id="collapseTwo"
          className="collapse"
          aria-labelledby="headingTwo"
          data-parent="#accordionSidebar"
        >
          <div className="bg-white py-2 collapse-inner rounded">
            <h6 className="collapse-header">Bloc services</h6>
            <a className="collapse-item" href="/dashboard/services/manage"
              >Gérer</a
            >
            <a className="collapse-item" href="/dashboard/services/add"
              >Ajouter</a
            >
          </div>
        </div>
      </li>

      <li className="nav-item">
        <a
          className="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapseUtilities"
          aria-expanded="true"
          aria-controls="collapseUtilities"
        >
          <i className="bi bi-people"></i>
          <span>Equipe</span>
        </a>
        <div
          id="collapseUtilities"
          className="collapse"
          aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar"
        >
          <div className="bg-white py-2 collapse-inner rounded">
            <h6 className="collapse-header">Bloc Teams</h6>
            <a className="collapse-item" href="/dashboard/teams/manage"
              >Gérer</a
            >
            <a className="collapse-item" href="/dashboard/teams/add">Ajouter</a>
          </div>
        </div>
      </li>
      <li className="nav-item">
        <a
          className="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapsePages"
          aria-expanded="true"
          aria-controls="collapsePages"
        >
          <i className="bi bi-people"></i>
          <span>Clients</span>
        </a>
        <div
          id="collapsePages"
          className="collapse"
          aria-labelledby="headingPages"
          data-parent="#accordionSidebar"
        >
          <div className="bg-white py-2 collapse-inner rounded">
            <h6 className="collapse-header">Bloc clients</h6>
            <a className="collapse-item" href="/dashboard/clients/manage"
              >Gérer</a
            >
            <a className="collapse-item" href="/dashboard/clients/add"
              >Ajouter</a
            >
          </div>
        </div>
      </li>
      <li className="nav-item">
        <a
          className="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapseNews"
          aria-expanded="true"
          aria-controls="collapseNews"
        >
          <i className="fas fa-comments"></i>
          <span>Actualités</span>
        </a>
        <div
          id="collapseNews"
          className="collapse"
          aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar"
        >
          <div className="bg-white py-2 collapse-inner rounded">
            <h6 className="collapse-header">Bloc News</h6>
            <a className="collapse-item" href="/dashboard/news/manage">Gérer</a>
            <a className="collapse-item" href="/dashboard/news/add">Ajouter</a>
          </div>
        </div>
      </li>
    </ul> -->

  <!-- <div>
    <v-app-bar app color="blue" dark>
      <div class="d-flex align-center">
        <v-img
          alt="Vuetify Logo"
          class="shrink mr-2"
          contain
          src="./assets/images/white-logo.png"
          transition="scale-transition"
          width="150"
        />
      </div>

      <v-spacer></v-spacer>

      <v-btn target="_blank" text>
        <span class="mr-2">Depanini</span>
      </v-btn>

      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <button type="submit" class="btn-primary" @click="role">get role</button>
      <button class="btn-primary" @click="onItemClick">log out</button>
      <button class="btn-primary" @click="loged">logged in</button>

      <button v-if="this.$store.getters.isLoggedIn">
        <v-avatar>
          <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John" />
        </v-avatar>
      </button>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" absolute bottom temporary>
      <v-list nav dense>
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
          <v-list-item>
            <v-list-item-title>Foo</v-list-item-title>
          </v-list-item>

          <v-list-item
            v-if="this.$store.getters.isLoggedIn"
            @click="onItemClick"
          >
            <v-list-item-title>Log out</v-list-item-title>
          </v-list-item>

          <v-list-item
            v-if="this.$store.getters.isAdmin"
            href="/managePrestataire/"
          >
            <v-list-item-title>Manage prestataire</v-list-item-title>
          </v-list-item>

          <v-list-item>
            <v-list-item-title>Buzz</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>

    <router-view />
  </div> -->
</template>

<script>
// import navbar from "./components/layout/navbar.vue";
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
        icon: "fa fa-user",
      },
      {
        href: "/charts",
        title: "Charts",
        icon: "fa fa-chart-area",
        child: [
          {
            href: "/charts/sublink",
            title: "Sub Link",
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
/* @import "./assets/sb-admin-2.css"; */
</style>

