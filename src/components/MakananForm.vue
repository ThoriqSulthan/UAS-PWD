<template>
	<center>
	<div class="bground">
		<form @submit.prevent="submitForm">
			<tr>
				<td><label>Nama Makanan</label></td>
				<td><input type="text" v-model="makanan.nama_makanan" placeholder="Makanan"></td>
			</tr>
			<tr>
				<td><label>Harga</label></td>
				<td><input type="text" v-model="makanan.harga" placeholder="Rp."></td>
			</tr>
			<tr>
				<td><label>Qty</label></td>
				<td><input type="number" v-model="makanan.qty" placeholder="Qty"></td>
			</tr>
				<button type="submit">Save</button>
				<button @click="back(makanan.id)">Back</button>
		</form>
	</div>
	</center>
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
						this.$router.push('/')
					}
				}).catch(() => {

				})
			},

			back() {
				this.$router.push('/')
			},
		}
	}
</script>

<style>
button {
	background-color: darkgray;
	padding: 8px;
	width: 70px;
	border-radius: 5px;
	margin: 10px;
	margin-left: 10px;
	margin-right: 10px;
	text-align: center;
}

button:hover {
	background-color: gray;
}

.bground {
		border-top: 2px solid #666;
		border-left: 2px solid #666;
		border-bottom: 2px solid #333;
		border-right: 2px solid #333;
		width: 500px;
		margin-top: 80px;
		margin-bottom: 80px;
		border-radius: 10px;
		padding-bottom: 30px;
		padding-top: 40px;
		background-color: white;
		box-shadow: 4px 4px 10px #444;
	}
</style>