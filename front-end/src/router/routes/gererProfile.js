const gererProfile = () => import("../../components/gererProfile.vue");

export default [
    {
        path: "/gererProfile",
        component: gererProfile,
        name: "gererProfile",
        meta: { requiresAuth: true },

    },
];