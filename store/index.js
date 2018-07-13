import Vue from 'vue'
import Vuex from 'vuex'
//import { state } from './state'
//import { mutations } from './mutations'
//import { actions } from './actions'
// import plugins from './plugins'

import axios from 'axios';

const SET_PAGE_LIST = 'SET_PAGE_LIST'
const SET_ACTIVE_PAGE = 'SET_ACTIVE_PAGE'
const SET_CONTACT_LIST = 'SET_CONTACT_LIST'
const SET_PROJECT_LIST = 'SET_PROJECT_LIST'
const SET_SERVICE_LIST = 'SET_SERVICE_LIST'
const SET_TEAM_LIST = 'SET_TEAM_LIST'
const SET_BLOG_LIST = 'SET_BLOG_LIST'
const SET_MENU_ITEMS = 'SET_MENU_ITEMS'
const SET_MENU_STATE = 'SET_MENU_STATE'

Vue.use(Vuex)


const store = () => {
    return new Vuex.Store({
        state:{
            blogList: null,
            contactList: null,
            menuCheck: false,
            menuList: null,
            pageList: null,
            projectList: null,
            serviceList: null,
            teamList: null,
            initialLoad: null,
        },
        mutations:{
            SET_PAGE_LIST(state, list) {
                console.log('Mutation: SET_PAGE_LIST');
                state.pageList = list;
            },
            SET_ACTIVE_PAGE(state, page) {
                console.log('Mutation: SET_ACTIVE_PAGE');
                state.activePage = page;
            },
            SET_PROJECT_LIST(state, list) {
                console.log('Mutation: SET_PROJECT_LIST');
                state.projectList = list;
            },
            SET_CONTACT_LIST(state, list) {
                console.log('Mutation: SET_CONTACT_LIST');
                state.contactList = list;
            },
            SET_SERVICE_LIST(state, list) {
                console.log('Mutation: SET_SERVICE_LIST');
                state.serviceList = list;
            },
            SET_TEAM_LIST(state, list) {
                console.log('Mutation: SET_TEAM_LIST');
                state.teamList = list;
            },
            SET_BLOG_LIST(state, list) {
                console.log('Mutation: SET_BLOG_LIST');
                state.blogList = list;
            },
            SET_MENU_ITEMS(state, list) {
                console.log('Mutation: SET_MENU_ITEMS');
                state.menuList = list;
            },
            SET_MENU_STATE(state, status) {
                console.log('Mutation: SET_MENU_STATE');
                state.menuCheck = status;
            },
            SET_LOADED(state){
                console.log('Mutation: SET_LOADED');
                state.initalLoad = true;
            }
        },
        actions:{
            async nuxtServerInit({dispatch}){
                console.log('nuxtServerInit');
                await dispatch("checkMenuState");
            },
            getPages({commit, dispatch, context, state}, info) {
                console.log('getPages dispatched');
                axios.get('https://data.ingenuity.ca/wp-json/wp/v2/pages?_embed')
                    .then(function (response) {
                    //console.log(response);
                    commit(SET_PAGE_LIST, response.data);
                })
                    .catch(function (error) {
                    console.log(error)
                })
            },
            getActivePage({commit, dispatch, context, state}, info) {
                console.log('getActivePage dispatched');
                commit(SET_ACTIVE_PAGE, response.data);
            },
            getContacts({commit, dispatch, context, state}, info) {
                console.log('getContacts dispatched');
                axios.get('https://data.ingenuity.ca/wp-json/wp/v2/contact?_embed')
                    .then(function (response) {
                    commit(SET_CONTACT_LIST, response.data);
                })
                    .catch(function (error) {
                    console.log(error)
                })
            },
            getProjects({commit, dispatch, context, state}, info) {
                console.log('getProjects dispatched');
                axios.get('https://data.ingenuity.ca/wp-json/wp/v2/project?per_page=20&_embed')
                    .then(function (response) {
                    commit(SET_PROJECT_LIST, response.data);
                })
                    .catch(function (error) {
                    console.log(error)
                })
            },
            getServices({commit, dispatch, context, state}, info) {
                console.log('getServices dispatched');
                axios.get('https://data.ingenuity.ca/wp-json/wp/v2/service?_embed')
                    .then(function (response) {
                    commit(SET_SERVICE_LIST, response.data);
                })
                    .catch(function (error) {
                    console.log(error)
                })
            },
            getTeam({commit, dispatch, context, state}, info) {
                console.log('getTeam dispatched');
                axios.get('https://data.ingenuity.ca/wp-json/wp/v2/team?per_page=20&_embed')
                    .then(function (response) {
                    commit(SET_TEAM_LIST, response.data);
                })
                    .catch(function (error) {
                    console.log(error)
                })
            },
            getBlogPosts({commit, dispatch, context, state}, info) {
                console.log('getBlogPosts dispatched');
                axios.get('https://data.ingenuity.ca/wp-json/wp/v2/posts?_embed')
                    .then(function (response) {
                    commit(SET_BLOG_LIST, response.data);
                })
                    .catch(function (error) {
                    console.log(error)
                })
            },
            getMenu({commit, dispatch, context, state}, info) {
                console.log('getMenu dispatched');
                axios.get('https://data.ingenuity.ca/wp-json/wp-api-menus/v2/menus/2')
                    .then(function (response) {
                    commit(SET_MENU_ITEMS, response.data);
                })
                    .catch(function (error) {
                    console.log(error)
                })
            },
            checkMenuState({commit, dispatch, context, state}, info) {
                return new Promise(resolve => {
                    setTimeout(() => {
                        dispatch("getMenu", {'type': 'initial-load'});
                        dispatch("getPages", {'type': 'initial-load'});
                        dispatch("getProjects", {'type': 'initial-load'});
                        dispatch("getBlogPosts", {'type': 'initial-load'});
                        dispatch("getContacts", {'type': 'initial-load'});
                        dispatch("getServices", {'type': 'initial-load'});
                        dispatch("getTeam", {'type': 'initial-load'});
                        commit("SET_LOADED");
                        resolve()
                    }, 1000)
                })
            },
            dummy({commit, dispatch, context, state}, info) {
                console.log("dummy");
                return new Promise(resolve => {
                    setTimeout(() => {
                        resolve()
                    }, 1000)
                })
            },
        }
    })
}

export default store;

