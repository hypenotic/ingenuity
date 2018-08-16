import Vue from 'vue'
import Vuex from 'vuex'

import axios from 'axios';

Vue.use(Vuex)


const store = () => {
    return new Vuex.Store({
        state:{
            siteUrl: "http://172.104.208.23",
            pages: null,
            menus: null,
            projects: null,
            services: null,
            team: null,
            blogs: null,
            contacts: null,
        },
        mutations:{
            setPages(state, payload) {
                console.log('Mutation: setPages');
                state.pages = payload;
            },
            
            setMenus(state, payload) {
                console.log('Mutation: setMenus');
                state.menus = payload;
            },
            
            setProjects(state, payload) {
                console.log('Mutation: setProjects');
                state.projects = payload;
            },
            
            setServices(state, payload) {
                console.log('Mutation: setServices');
                state.services = payload;
            },
            
            setTeam(state, payload) {
                console.log('Mutation: setTeam');
                state.team = payload;
            },
            
            setBlogs(state, payload) {
                console.log('Mutation: setBlogs');
                state.blogs = payload;
            },
            
            setContacts(state, payload) {
                console.log('Mutation: setContacts');
                state.contacts = payload;
            },
        },
        actions:{
            async apiPages({commit}) {
                console.log('apiPages dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/pages?_embed')
                commit('setPages', data)
            },
            
            async apiMenu({commit}) {
                console.log('apiMenu dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp-api-menus/v2/menus/2')
                commit('setMenus', data)
            },
            
            async apiProjects({commit}) {
                console.log('apiProjects dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/project?per_page=20&_embed')
                commit('setProjects', data)
            },
            
            async apiServices({commit}) {
                console.log('apiServices dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/service?_embed')
                commit('setServices', data)
            },
            
            async apiTeam({commit}) {
                console.log('apiTeam dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/team?per_page=20&_embed')
                commit('setTeam', data)
            },
            
            async apiBlogs({commit}) {
                console.log('apiBlogs dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/posts?_embed')
                commit('setBlogs', data)
            },
            
            async apiContacts({commit}) {
                console.log('apiContacts dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/contact?_embed')
                commit('setContacts', data)
            },
            
        },
        getters:{
            getPages: state => {
                return state.pages
            },
            getMenu: state => {
                return state.menus
            },
            getProjects: state => {
                return state.projects
            },
            getServices: state => {
                return state.services
            },
            getTeam: state => {
                return state.team
            },
            getBlogs: state => {
                return state.blogs
            },
            getContacts: state => {
                return state.contacts
            },
        }
    })
}

export default store;

