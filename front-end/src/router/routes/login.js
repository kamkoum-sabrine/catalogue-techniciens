const login = () => import("../../components/Auth/login.vue");

export default [
    {
        path: "/login",
        component: login,
        name: "login"
    },
];