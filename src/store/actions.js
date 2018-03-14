import * as types from './mutation-types';
import axios from 'axios';

export const actions = {
    getPages({commit, dispatch, context, state}, info) {
        console.log('getPages dispatched');
        axios.get('http://data.ingenuity.ca/wp-json/wp/v2/pages?_embed')
        .then(function (response) {
            commit(types.SET_PAGE_LIST, response.data);
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    getActivePage({commit, dispatch, context, state}, info) {
        console.log('getActivePage dispatched');
        commit(types.SET_ACTIVE_PAGE, response.data);
    },
    getContacts({commit, dispatch, context, state}, info) {
        console.log('getContacts dispatched');
        axios.get('http://data.ingenuity.ca/wp-json/wp/v2/contact?_embed')
        .then(function (response) {
            commit(types.SET_CONTACT_LIST, response.data);
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    getProjects({commit, dispatch, context, state}, info) {
        console.log('getProjects dispatched');
        axios.get('http://data.ingenuity.ca/wp-json/wp/v2/project?per_page=20&_embed')
        .then(function (response) {
            commit(types.SET_PROJECT_LIST, response.data);
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    getServices({commit, dispatch, context, state}, info) {
        console.log('getServices dispatched');
        axios.get('http://data.ingenuity.ca/wp-json/wp/v2/service?_embed')
        .then(function (response) {
            commit(types.SET_SERVICE_LIST, response.data);
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    getTeam({commit, dispatch, context, state}, info) {
        console.log('getTeam dispatched');
        axios.get('http://data.ingenuity.ca/wp-json/wp/v2/team?per_page=15&_embed')
        .then(function (response) {
            commit(types.SET_TEAM_LIST, response.data);
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    getBlogPosts({commit, dispatch, context, state}, info) {
        console.log('getBlogPosts dispatched');
        axios.get('http://data.ingenuity.ca/wp-json/wp/v2/posts?_embed')
        .then(function (response) {
            commit(types.SET_BLOG_LIST, response.data);
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    getMenu({commit, dispatch, context, state}, info) {
        console.log('getMenu dispatched');
        axios.get('http://data.ingenuity.ca/wp-json/wp-api-menus/v2/menus/2')
        .then(function (response) {
            commit(types.SET_MENU_ITEMS, response.data);
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    checkMenuState({commit, dispatch, context, state}, info) {
        console.log('checkMenuState dispatched');
    },
}