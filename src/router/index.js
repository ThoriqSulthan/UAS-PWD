import Vue from 'vue'
import VueRouter from 'vue-router'
import Makanan from '@/components/Makanan'
import MakananForm from '@/components/MakananForm'

Vue.use(VueRouter)

const router = new VueRouter({
	routes: [
		{
			path: '',
			name: 'Home',
			component: Makanan
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

export default router