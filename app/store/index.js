
export const state = () => ({
    pages: null,
    menus: null,
    projects: null,
    gallery: null,
    galleries: null,
    services: null,
    team: null,
    blogs: null,
    recentPosts: null,
    contacts: null,
})

export const mutations = {
    setPages: (state, payload) => state.pages = payload,
    setMenus: (state, payload) => state.menus = payload,
    setProjects: (state, payload) => state.projects = payload,
    setGallery: (state, payload) => state.gallery = payload,
    setGalleries: (state, payload) => state.galleries = payload,
    setServices: (state, payload) => state.services = payload,
    setTeam: (state, payload) => state.team = payload,
    setBlogs: (state, payload) => state.blogs = payload,
    setContacts: (state, payload) => state.contacts = payload,
}

export const actions = {
    async apiPages({commit}) {
        // console.log('apiPages dispatched');
        try {
            const response = await this.$axios.$get(process.env.DB_URL + '/wp/v2/pages?per_page=100&_embed')
            commit('setPages', response)
        } catch (error) {
            console.error(error);
        }
    },

    async apiMenu({commit}) {
        // console.log('apiMenu dispatched');
        try {
            const response = await this.$axios.$get(process.env.DB_URL + '/wp-api-menus/v2/menus/2')
            commit('setMenus', response)
        } catch (error) {
            console.error(error);
        }
    },

    async apiProjects({commit}) {
        // console.log('apiProjects dispatched');
        try {
            const response = await this.$axios.$get(process.env.DB_URL + '/wp/v2/project?per_page=20&_embed')
            commit('setProjects', response)
        } catch (error) {
            console.error(error);
        }
    },

    async apiGalleries({commit}) {
        // console.log('apiGalleries dispatched');
        try {
            const response = await this.$axios.$get(process.env.DB_URL + '/wp/v2/gallery?per_page=100')
            commit('setGalleries', response)
        } catch (error) {
            console.error(error);
        }
    },

    async apiServices({commit}) {
        // console.log('apiServices dispatched');
        try {
            const response = await this.$axios.$get(process.env.DB_URL + '/wp/v2/service?_embed')
            commit('setServices', response)
        } catch (error) {
            console.error(error);
        }
    },

    async apiTeam({commit}) {
        // console.log('apiTeam dispatched');
        try {
            const response = await this.$axios.$get(process.env.DB_URL + '/wp/v2/team?per_page=100&_embed')
            commit('setTeam', response)
        } catch (error) {
            console.error(error);
        }
    },

    async apiBlogs({commit}) {
        // console.log('apiBlogs dispatched');
        try {
            const response = await this.$axios.$get(process.env.DB_URL + '/wp/v2/posts?per_page=100&_embed')
            commit('setBlogs', response)
        } catch (error) {
            console.error(error);
        }
    },

    async apiContacts({commit}) {
        // console.log('apiContacts dispatched');
        try {
            const response = await this.$axios.$get(process.env.DB_URL + '/wp/v2/contact?_embed')
            commit('setContacts', response)
        } catch (error) {
            console.error(error);
        }
    },

    changeActiveTab: ({commit, state}, info) => {
        commit('SET_ACTIVE_TAB', state.services[info]);
    }
}

export const getters = {
    getPages: state => state.pages,
    getPage: state => slug => state.pages.filter(p=>p.slug == slug)[0],
    getMenu: state => state.menus,
    getProjects: state => state.projects,
    getGallery: state => slug => state.gallery.filter(g=>g.slug == slug)[0],
    getGalleries: state => state.galleries,
    getServices: state => state.services,
    getTeam: state => state.team,
    getBlogs: state => state.blogs,
    getRecentPosts: state => state.blogs.slice(0, 3),
    getContacts: state => state.contacts,
}

