import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/App'
import Makanan from '@/components/Makanan'
import MakananForm from '@/components/MakananForm'

Vue.use(VueRouter)

export default new VueRouter({
	routes: [
		{
			path: '/',
			name: 'Home',
			components: Home
		},
		{
			path: '/makanan',
			name: 'Makanan',
			components: Makanan
		},
		{
			path: '/makanan/create',
			name: 'MakananCreate',
			component: MakananForm
		},
		{
			path: '/makanan/:id',
			name: 'MakananEdit',
			component: MakananForm
		}
	]
})