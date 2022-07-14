const register = () => import("../../components/Auth/register.vue");

export default [
    {
        path: "/register",
        component: register,
        name: "register"
    },
];