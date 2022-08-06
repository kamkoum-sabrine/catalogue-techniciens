const RDVClients = () => import("../../components/RDVClients.vue");

export default [
    {
        path: "/RDVClients",
        component: RDVClients,
        name: "RDVClients",
        meta: { requiresAuth: true },

    },
];