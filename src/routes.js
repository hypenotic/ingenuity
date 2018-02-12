import Home 	from './views/Home.vue';
import About 	from './views/About.vue';
import Team 	from './views/Team.vue';
import Contact 	from './views/Contact.vue';
import Blog 	from './views/blog/Blog.vue';

export const routes = [
	// ==== DEV ====
	{ path: '/about-us', component: About, props: true },
	{ path: '/team', component: Team, props: true },
	{ path: '/contact', component: Contact, props: true },
	{ path: '/blog', component: Blog, props: true },
	{ path: '/news/:slug', component: Blog, props: true },
	{ path: '/news', component: Blog, props: true },
	{ path: '', component: Home, props: true },
	{ path: '/', component: Home, props: true },
	{ path: '*', redirect: '/' }
];