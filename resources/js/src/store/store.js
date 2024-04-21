import { createStore } from "vuex";

const store = createStore({
    state() {
        return {
            isAuth: false,
            user: null,
        };
    },
    mutations: {
        setIsAuth(state, value) {
            state.isAuth = value;
        },
        setUser(state, user) {
            state.user = user;
        },
        setAuth(state, user) {
            localStorage.setItem("user", JSON.stringify(user));
            localStorage.setItem("isAuth", true);
            store.commit("setIsAuth", true);
            store.commit("setUser", user);
        },
        setFromStorage(state) {
            store.commit("setUser", JSON.parse(localStorage.getItem("user")));
            store.commit("setIsAuth", localStorage.getItem("isAuth"));
        },
    },
});

export default store;
