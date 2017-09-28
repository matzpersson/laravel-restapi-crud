import VueRouter from 'vue-router';

let routes = [
	{
		name: "Home",
		path: '/',
		component: require('./components/Home.vue')
	},
	{
		name: "Login",
		path: '/login',
		component: require('./components/Login.vue')
	},
	{
		name: "Register",
		path: '/register',
		component: require('./components/Register.vue')
	},
	{
		name: "Users",
		path: '/users',
		component: require('./components/Users.vue')
	},
	{
		name: "Jobs",
		path: '/jobs',
		component: require('./components/Jobs.vue')
	}

]

export default new VueRouter({

	routes: routes,
	mode: 'history',
  	base: __dirname,
	linkIsActive: 'is-active'
})