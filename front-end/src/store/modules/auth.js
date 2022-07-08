import router from '../../router'
import axios from "axios";
const state = {
    csrfToken: null,
    isLoggedIn: false,
    authUser: null,
    token: null,
    regStatus: null,
    regMessage: null,
};
const getters = {
    isLoggedIn: (state) => state.isLoggedIn,
    authUser: (state) => state.authUser,
    token: (state) => state.token,
    regStatus: (state) => state.regStatus,
    regMessage: (state) => state.regMessage,
};
const mutations = {
    setLoggedIn(state, payload) {
        state.isLoggedIn = payload;
    },
    setAuthUser(state, payload) {
        state.authUser = payload;
    },
    setToken(state, payload) {
        state.token = payload;
    },
    setRegStatus(state, payload) {
        state.regStatus = payload;
    },
    setRegMessage(state, payload) {
        state.regMessage = payload;
    }

};
const actions = {
    login({ commit }, payload) {
        axios
            .get("http://localhost:8000/sanctum/csrf-cookie", {
                withCredentials: true
            })
            .then(() => { })
            .catch(() => { });
        return new Promise((resolve, reject) => {
            axios
                .post("/login", payload)
                .then((response) => {
                    commit("setLoggedIn", true);
                    commit("setAuthUser", response.data.user);
                    commit("setToken", response.data.token);
                    resolve(response);
                })
                .catch((error) => {
                    reject(error);
                });
        });
    },
    logout({ commit }) {
        return new Promise((resolve) => {
            commit("setLoggedIn", false);
            commit("setAuthUser", null);
            commit("setToken", null);
            resolve();
        });
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