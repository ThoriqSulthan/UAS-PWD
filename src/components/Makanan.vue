<template>
	<center>
	<div class="bground">
		<div class="rlink"><router-link to="/makanan/create">Tambah Data</router-link></div>
		<table>
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
					<img src="../assets/editlogo.png" @click="edit(makanan.id)">
					<img src="../assets/deletelogo.png" @click="deleteRow(makanan.id)">
				</td>
			</tr>
		</table>
	</div>
	</center>
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
						this.get()
					}
				}).catch(() => {

				}) 
			},
			deleteRow (id) {
				api.delete('makanan/' + id).then(res => {
					if (res.data.status === 'success') {
						this.get()
					}
				}).catch(() => {

				})
			},
			edit (id) {
				this.$router.push('makanan/' + id)
			},
		}
	}
</script>

<style>
body {
	background-color: #888;
}

.rlink table tr, td, th {
	padding: 10px;
	border: 1px solid black;
	border-radius: 6px;
	text-align: center;
	font-family: Rockwell;
}

.rlink {
	padding: 20px;
	padding-left: 52px;
	text-align: left;
}

img {
	width: 20px;
	height: 20px;
	margin-left: 5px;
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
		padding-bottom: 40px;
		background-color: white;
		box-shadow: 4px 4px 10px #444;
	}
</style>