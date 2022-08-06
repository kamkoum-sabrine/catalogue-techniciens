const gererSpecialite = () => import("../../components/gererSpecialite.vue");

export default [
    {
        path: "/gererSpecialite",
        component: gererSpecialite,
        name: "gererSpecialite",
        meta: { requiresAuth: true },

    },
];