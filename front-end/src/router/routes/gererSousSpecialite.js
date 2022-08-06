const gererSousSpecialite = () => import("../../components/gererSousSpecialite.vue");

export default [
    {
        path: "/gererSousSpecialite",
        component: gererSousSpecialite,
        name: "gererSousSpecialite",
        meta: { requiresAuth: true },

    },
];