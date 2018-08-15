import Vue from 'vue'
import Vuex from 'vuex'

import axios from 'axios';

Vue.use(Vuex)


const store = () => {
    return new Vuex.Store({
        state:{
            siteUrl: "http://172.104.208.23",
            pageList: null,
            menuList: null,
            projectList: null,
            serviceList: null,
            teamList: null,
            blogList: null,
        },
        mutations:{
            setPageList(state, list) {
                console.log('Mutation: setPageList');
                state.pageList = list;
            },
            
            setMenuList(state, list) {
                console.log('Mutation: setMenuList');
                state.menuList = list;
            },
            
            setProjectList(state, list) {
                console.log('Mutation: setProjectList');
                state.projectList = list;
            },
            
            setServiceList(state, list) {
                console.log('Mutation: setServiceList');
                state.serviceList = list;
            },
            
            setTeamList(state, list) {
                console.log('Mutation: setTeamList');
                state.teamList = list;
            },
            
            setBlogList(state, list) {
                console.log('Mutation: setBlogList');
                state.blogList = list;
            },
        },
        actions:{
            async apiPages({commit}) {
                console.log('apiPages dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/pages?_embed')
                commit('setPageList', data)
            },
            
            async apiMenu({commit}) {
                console.log('apiMenu dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp-api-menus/v2/menus/2')
                commit('setMenuList', data)
            },
            
            async apiProjects({commit}) {
                console.log('apiProjects dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/project?per_page=20&_embed')
                commit('setProjectList', data)
            },
            
            async apiServices({commit}) {
                console.log('apiServices dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/service?_embed')
                commit('setServiceList', data)
            },
            
            async apiTeam({commit}) {
                console.log('apiTeams dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/team?per_page=20&_embed')
                commit('setTeamList', data)
            },
            
            async apiBlogs({commit}) {
                console.log('apiBlogs dispatched');
                let {data} = await axios.get('https://data.ingenuity.ca/wp-json/wp/v2/posts?_embed')
                commit('setBlogList', data)
            },
            
        },
        getters:{
            getPages: state => {
                return state.pageList
            },
            getMenu: state => {
                return state.menuList
            },
            getProjects: state => {
                return state.projectList
            },
            getServices: state => {
                return state.serviceList
            },
            getTeam: state => {
                return state.teamList
            },
            getBlogs: state => {
                return state.blogList
            },
        }
    })
}

export default store;

