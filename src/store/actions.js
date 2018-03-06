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
    getProjects({commit, dispatch, context, state}, info) {
        console.log('getPages dispatched');
        axios.get('http://data.ingenuity.ca/wp-json/wp/v2/project?_embed')
        .then(function (response) {
            commit(types.SET_PROJECT_LIST, response.data);
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