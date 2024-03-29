import router from '../../router'
import axios from "axios";
const state = {
    csrfToken: null,
    isLoggedIn:
        localStorage.getItem("user") !== null &&
        localStorage.getItem("token") !== null,
    authUser: JSON.parse(localStorage.getItem("user")) ?? null,
    token: localStorage.getItem("token") ?? null,
    // authUser: null,
    // token: null,
    isAuthenticated: false,
    isAdmin: JSON.parse(localStorage.getItem("isAdmin")) ?? null,
    isClient: JSON.parse(localStorage.getItem("isClient")) ?? null,
    isPrestataire: JSON.parse(localStorage.getItem("isPrestataire")) ?? null,
    // isVisiteur: false,
    regStatus: null,
    regMessage: null,
    authStatus: null,
    authMessage: null,
    // roles: JSON.parse(localStorage.getItem("roles")) ?? null,
    // status: JSON.parse(localStorage.getItem("status")) ?? null,
};
const getters = {
    isAuthenticated: (state) => state.authUser !== null,
    isAdmin: (state) => state.isAdmin,
    isClient: (state) => state.isClient,
    isPrestataire: (state) => state.isPrestataire,
    userName: (state) => state.authUser !== null ? state.authUser.first_name : "User",
    // isVisiteur: (state) => state.isVisiteur,
    isLoggedIn: (state) => state.isLoggedIn,
    authStatus: (state) => state.authStatus,
    authMessage: (state) => state.authMessage,
    authUser: (state) => state.authUser,
    token: (state) => state.token,
    regStatus: (state) => state.regStatus,
    regMessage: (state) => state.regMessage,
};
const mutations = {
    resetAll(state) {
        state.authUser = null;

        state.token = null;
        state.csrfToken = null;
        state.secrets = null;
        state.isAuthenticated = false;
        state.isAdmin = false;
        state.isClient = false;
        state.isPrestataire = false;
        state.isVisiteur = false;
        state.message = null;
        state.authStatus = null;
        state.authMessage = null;
    },
    setLoggedIn(state, payload) {
        state.isLoggedIn = payload;
    },
    setAuthUser(state, payload) {
        state.authUser = payload;
        localStorage.setItem("user", JSON.stringify(payload));
    },
    setAdmin(state, payload) {
        state.isAdmin = payload;
        localStorage.setItem("isAdmin", JSON.stringify(payload));

    },

    setClient(state, payload) {
        state.isClient = payload;
        localStorage.setItem("isClient", JSON.stringify(payload));

    },
    setPrestataire(state, payload) {
        state.isPrestataire = payload;
        localStorage.setItem("isPrestataire", JSON.stringify(payload));

    },
    // setVisiteur(state) {
    //     state.isVisiteur = true;
    // },
    setToken(state, payload) {
        state.token = payload;
        localStorage.setItem("token", payload);
    },
    setRegStatus(state, payload) {
        state.regStatus = payload;
    },
    setRegMessage(state, payload) {
        state.regMessage = payload;
    },
    setRoles(state, payload) {
        state.roles = payload;
        localStorage.setItem("roles", JSON.stringify(payload));
    },
    setStatus(state, payload) {
        state.status = payload;
        localStorage.setItem("status", payload);
    },
    setAuthStatus(state, authStatus) {
        state.authStatus = authStatus;
    },
    setAuthMessage(state, authMessage) {
        state.authMessage = authMessage;
    },

};
const actions = {
    login({ commit }, payload) {
        axios
            .get("http://localhost:8000/sanctum/csrf-cookie", {
                withCredentials: true
            })
            .then(() => { })
            .catch(() => { });
        return new Promise(() => {
            axios
                .post("/login", payload)
                .then((response) => {
                    console.log(response);
                    if (response.data.success == true) {
                        console.log(response.data.data.isAdmin)

                        this.token = response.data.data.token;
                        console.log(this.token)
                        localStorage.setItem("token", this.token);
                        commit("setAdmin", response.data.data.isAdmin);
                        commit("setPrestataire", response.data.data.isPrestataire);
                        commit("setClient", response.data.data.isClient);
                        commit("setStatus", response.data.status);
                        // commit("setRoles", response.data.roles);
                        commit("setAuthUser", response.data.data.user);
                        commit("setAuthStatus", 1);
                        commit("setLoggedIn", true);

                        commit("setToken", response.data.data.token);
                        router.push("/");
                    } else {


                        commit('setAuthStatus', 2);
                        commit('setAuthMessage', 'Merci de verifier vos identifiants! '); // this is the main part. Use the response property from the error object

                    }


                }).catch(function (error) {
                    console.log(error.response.data.data.error);
                    commit('setAuthStatus', 2);
                    commit('setAuthMessage', error.response.data.data.error); // this is the main part. Use the response property from the error object
                });
        });
    },
    logout({ commit }) {
        // return new Promise((resolve) => {
        //     commit("setLoggedIn", false);
        //     commit("setAuthUser", null);
        //     commit("setToken", null);

        //     router.push("/login");

        //     resolve();
        // });
        localStorage.removeItem("token");
        localStorage.removeItem("isAdmin");
        localStorage.removeItem("isClient");
        localStorage.removeItem("isPrestataire");

        commit("resetAll");
        router.push("/login");
    },
    // async register({ commit },
    //     User) {
    //     console.log(User);
    //     await axios
    //         .post("/register", User, {
    //             headers: {
    //                 "Content-Type": "application/json"
    //             },
    //             withCredentials: true
    //         })
    //         .then((response) => {
    //             if (response.status == 200) {
    //                 router.push("/login");
    //                 commit("setRegStatus", 1);

    //             }
    //         })
    //         .catch((error) => {
    //             commit('setRegStatus', 2);
    //             commit('setRegMessage', error.response.data.data); // this is the main part. Use the response property from the error object
    //         });
    // }
    async register(
        { commit },
        User) {
        console.log("register")
        axios
            .get("http://localhost:8000/sanctum/csrf-cookie", {
                withCredentials: true
            })
            .then(() => {
                axios
                    .post("/register", User, {
                        headers: {
                            "Content-Type": "application/json"
                        },
                        withCredentials: true
                    })
                    .then((response) => {
                        if (response.status == 200) {
                            // this.tkn = response.data.data.token;
                            // localStorage.setItem("token", this.tkn);
                            // commit("setUser", response.data.data.user);
                            // commit("setToken", response.data.data.token);
                            router.push("/login");

                            commit("setRegStatus", 1);
                            console.log("jaweek beehy! ")

                        }
                    })
                    .catch((error) => {
                        commit('setRegStatus', 2);
                        commit('setRegMessage', error.response.data.data.error); // this is the main part. Use the response property from the error object
                        console.log("famaa ghaaltaa! ")
                    });
            })


    }
};

export default {
    state,
    getters,
    actions,
    mutations
};