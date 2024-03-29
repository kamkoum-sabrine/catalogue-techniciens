import Vue from "vue";
import store from "../store/index";

import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import consulterPrestataire from "./routes/consulterPrestataire";
import gererClient from "./routes/gererClient";
import gererProfile from "./routes/gererProfile";
import gererSousSpecialite from "./routes/gererSousSpecialite";
import gererSpecialite from "./routes/gererSpecialite";

import Login from "./routes/login";
import managePrestataires from "./routes/managePrestataires";
import manageRDV from "./routes/manageRDV";
import moreDetailsPrestataires from "./routes/moreDetailsPrestataires";
import Register from "./routes/register";
import RDVClients from "./routes/RDVClients";
Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/about",
        name: "About",
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import(/* webpackChunkName: "about" */ "../views/About.vue"),
    },
    ...Login,
    ...Register,
    ...managePrestataires,
    ...gererSpecialite,
    ...gererSousSpecialite,
    ...gererClient,
    ...gererProfile,
    ...consulterPrestataire,
    ...moreDetailsPrestataires,
    ...manageRDV,
    ...RDVClients
];

const router = new VueRouter({
    mode: "history",
    routes,
});
// router.beforeEach((to, from, next) => {

//         if (store.getters.isAuthenticated) {
//             next();
//             return;
//         }
//         next({ name: "login", params: { msg: "You must be logged in" } });

// })
// const isLogged = () => storeLoggedIn || loadSessionFromLocalStorage
// const storeLoggedIn = () => store.getters.isLoggedIn
// const loadSessionFromLocalStorage = () => (
//   // if localstorage has token
//   //   commit a mutation for loggedIn and then return true
//   // else return false
// )
router.beforeEach((to, from, next) => {
    console.log(to.matched.some((record) => record.meta.requiresAuth));
    console.log(store.getters.isLoggedIn)
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn) {
            next();
            return;
        }
        next({ name: "login", params: { msg: "You must be logged in" } });
    } else {
        next();
    }
    // 
});

export default router;