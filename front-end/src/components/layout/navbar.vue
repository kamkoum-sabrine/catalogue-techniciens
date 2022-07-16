<template>
  <div>
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
      <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="/"
      >
        <div class="sidebar-brand-icon">
          <img src="{logo}" height="70" width="70" alt="..." />
        </div>
        <div class="sidebar-brand-text">XD-META</div>
      </a>

      <hr class="sidebar-divider my-0" />

      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tableau de bord</span></a
        >
      </li>

      <hr class="sidebar-divider" />

      <div class="sidebar-heading">Composantes</div>

      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapseTwo"
          aria-expanded="true"
          aria-controls="collapseTwo"
        >
          <i class="bi bi-gear"></i>
          <span>Services</span>
        </a>
        <div
          id="collapseTwo"
          class="collapse"
          aria-labelledby="headingTwo"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bloc services</h6>
            <a class="collapse-item" href="/">Gérer</a>
            <a class="collapse-item" href="/">Ajouter</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapseUtilities"
          aria-expanded="true"
          aria-controls="collapseUtilities"
        >
          <i class="bi bi-people"></i>
          <span>Equipe</span>
        </a>
        <div
          id="collapseUtilities"
          class="collapse"
          aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bloc Teams</h6>
            <a class="collapse-item" href="/">Gérer</a>
            <a class="collapse-item" href="/">Ajouter</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapsePages"
          aria-expanded="true"
          aria-controls="collapsePages"
        >
          <i class="bi bi-people"></i>
          <span>Clients</span>
        </a>
        <div
          id="collapsePages"
          class="collapse"
          aria-labelledby="headingPages"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bloc clients</h6>
            <a class="collapse-item" href="/">Gérer</a>
            <a class="collapse-item" href="/">Ajouter</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapseNews"
          aria-expanded="true"
          aria-controls="collapseNews"
        >
          <i class="fas fa-comments"></i>
          <span>Actualités</span>
        </a>
        <div
          id="collapseNews"
          class="collapse"
          aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bloc News</h6>
            <a class="collapse-item" href="/">Gérer</a>
            <a class="collapse-item" href="/">Ajouter</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>
<script>
// import { mapGetters } from "vuex";
// import JQuery from "jquery";
// window.$ = JQuery;
import JQuery from "jquery";
// import $ from "jquery";
export default {
  name: "navbar",

  data: () => ({
    drawer: false,
    group: null,
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
  mounted() {
    (function ($) {
      "use strict"; // Start of use strict

      // Toggle the side navigation

      $("#sidebarToggle, #sidebarToggleTop").on("click", function () {
        console.log("collapse sidebar");
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
          $(".sidebar .collapse").collapse("hide");
        }
      });

      // Close any open menu accordions when window is resized below 768px
      $(window).resize(function () {
        if ($(window).width() < 768) {
          $(".sidebar .collapse").collapse("hide");
        }

        // Toggle the side navigation when window is resized below 480px
        if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
          $("body").addClass("sidebar-toggled");
          $(".sidebar").addClass("toggled");
          $(".sidebar .collapse").collapse("hide");
        }
      });

      // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
      $("body.fixed-nav .sidebar").on(
        "mousewheel DOMMouseScroll wheel",
        function (e) {
          if ($(window).width() > 768) {
            var e0 = e.originalEvent,
              delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
          }
        }
      );

      // Scroll to top button appear
      $(document).on("scroll", function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
          $(".scroll-to-top").fadeIn();
        } else {
          $(".scroll-to-top").fadeOut();
        }
      });

      // Smooth scrolling using jQuery easing
      $(document).on("click", "a.scroll-to-top", function (e) {
        var $anchor = $(this);
        $("html, body")
          .stop()
          .animate(
            {
              scrollTop: $($anchor.attr("href")).offset().top,
            },
            1000,
            "easeInOutExpo"
          );
        e.preventDefault();
      });
    })(JQuery); // End of use strict
  },
};
</script>
