import { state } from './state'

import { 
    SET_PAGE_LIST,
    SET_ACTIVE_PAGE,
    SET_PROJECT_LIST,
    SET_BLOG_LIST,
    SET_MENU_ITEMS,
    SET_MENU_STATE
} from './mutation-types'

export const mutations = {
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
}