const managePrestataire = () => import("../../components/managePrestataire.vue");

export default [
    {
        path: "/managePrestataire",
        component: managePrestataire,
        name: "managePrestataire",
        meta: { requiresAuth: true },

    },
];