<template>
	<div>
		<form @submit.prevent="submitForm">
			<div>
				<label>Nama Makanan</label>
				<input type="text" v-model="makanan.nama_makanan" placeholder="Makanan">
			</div>
			<div>
				<label>Harga</label>
				<input type="text" v-model="makanan.harga" placeholder="Rp.">
			</div>
			<div>
				<label>Qty</label>
				<input type="number" v-model="makanan.qty" placeholder="Qty">
			</div>
			<button type="submit">Save</button>
		</form>
	</div>
</template>

<script>
	import { api } from '@/helper/api'

	export default {
		name: 'MakananForm',
		data() {
			return {
				makanan: {
					id: null,
					nama_makanan: '',
					harga: '',
					qty: ''
				}
			}
		},
		mounted () {
			let id = this.$route.params.id

			if (id) {
				api.get('/makanan/' + id).then(res => {
					this.makanan = res.data.result
				})
			}
		},
		methods: {
			submitForm() {
				let data = this.makanan
				let url = 'makanan'

				if (this.makanan.id) {
					url += '/' + this.makanan.id
				}

				api.post(url, data).then(res => {
					if (res.data.status === 'success') {
						this.$router.push('/makanan')
					} else {
						console.log(res.data.message)
					}
				}).catch(err => {
					console.log(err)
				})
			}
		}
	}
</script>