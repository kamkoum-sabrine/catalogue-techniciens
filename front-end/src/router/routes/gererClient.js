const gererClient = () => import("../../components/gererClients.vue");

export default [
    {
        path: "/gererClient",
        component: gererClient,
        name: "gererClient",
        meta: { requiresAuth: true },

    },
];