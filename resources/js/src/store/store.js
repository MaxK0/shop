import { createStore } from "vuex";

const store = createStore({
    state: {
        isAuth: false,
        user: null,
    },
    mutations: {
        setIsAuth(state, value) {
            state.isAuth = value;
        },
        setUser(state, user) {
            state.user = user;
        },
    },
    getters: {
        isAuth: (state) => state.isAuth,
    },
});

export default store;
