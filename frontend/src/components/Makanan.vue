<template>
	<div>
		<router-link to="/makanan/create">Add Data</router-link>
		<center>
		<table border="1">
			<tr>
				<th>No</th>
				<th>Nama Makanan</th>
				<th>Harga</th>
				<th>Qty</th>
				<th>Action</th>
			</tr>
			<tr v-for="(makanan, i) in data_makanan" :key="i">
				<td>{{ i + 1 }}</td>
				<td>{{ makanan.nama_makanan }}</td>
				<td>{{ makanan.harga }}</td>
				<td>{{ makanan.qty }}</td>
				<td>
					<button @click="edit(makanan.id)">Edit</button>
					<button @click="deleteRow(makanan.id)">Delete</button>
				</td>
			</tr>
		</table>
	</center>
	</div>
</template>

<script>
	import { api } from '@/helper/api'

	export default {
		name: 'Makanan',
		data() {
			return {
				data_makanan: []
			}
		},
		
		mounted () {
			this.get()
		},

		methods: {
			get() {
				api.get('makanan').then(res => {
					if (res.data.status === 'success') {
						this.data_makanan = res.data.result
					} else {
						console.log(res.data.message)
					}
				}).catch(err => {
					console.log(err)
				}) 
			},
			deleteRow (id) {
				api.delete('siswa/' + id).then(res => {
					if (res.data.status === 'success') {
						this.get()
					} else {
						console.log(res.data.message)
					}
				}).catch(err => {
					console.log(err)
				})
			},
			edit (id) {
				this.$router.push('makanan/' + id)
			},
		}
	}
</script>