<?php 
	
	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;

	class MakananController extends Controller {
		public function create(Request $request) {	
			$validation = Validator::make($request->all(), [
			'nama_makanan' => 'required|string',
			'harga' => 'required|max:12',
			'qty' => 'required|max:12',
			]);

			if ($validation->fails()) {
				$errors = $validation->errors();
				return [
					'status' => 'error',
					'message' => $errors,
					'result' => null
				];
			}
			
			$result = \App\Makanan::create($request->all());
			if ($result) {
				return [
					'status' => 'success',
					'message' => 'Data Berhasil Ditambahkan',
					'result' => $result
				];
			} else {
				return [
					'status' => 'error',
					'message' => 'Data Gagal Ditambahkan',
					'result' => null
				];
			}
		}

		public function read(Request $request) {
			$result = \App\Makanan::all();
			return [
				'status' => 'success',
				'message' => '',
				'result' => $result
			];
		}

		public function update(Request $request, $id) {
			$validation = Validator::make($request->all(), [
			'nama_makanan' => 'required|string',
			'harga' => 'required|max:12',
			'qty' => 'required|max:12',
			]);

			if ($validation->fails()) {
				$errors = $validation->errors();
				return [
					'status' => 'error',
					'message' => $errors,
					'result' => null	
				];
			}

			$makanan = \App\Makanan::find($id);
			if (empty($makanan)) {
				return [
					'status' => 'error',
					'message' => 'Data Tidak Ditemukan',
					'result' => null
				];
			}

			$result = $makanan->update($request->all());
			if ($result) {
				return [
					'status' => 'success',
					'message' => 'Data Berhasil Diubah',
					'result' => $result
				];
			} else {
				return [
					'status' => 'error',
					'message' => 'Data Gagal Diubah',
					'result' => null
				];
			}
		}

		public function delete(Request $request, $id) {
			$makanan = \App\Makanan::find($id);
			if (empty($makanan)) {
				return [
					'status' => 'error',
					'message' => 'Data Tidak Ditemukan',
					'result' => null
				];
			}

			$result = $makanan->delete($id);
			if ($result) {
				return [
					'status' => 'success',
					'message' => 'Data Berhasil Dihapus',
					'result' => $result
				];
			} else {
				return [
					'status' => 'error',
					'message' => 'Data Gagal Dihapus',
					'result' => null
				];
			}
		}

		public function detail($id) {
			$makanan = \App\Makanan::find($id);

			if (empty($makanan)) {
				return [
					'status' => 'error',
					'message' => 'Data Tidak Ditemukan',
					'result' => null
				];

			} 

			return [
				'status' => 'success',
				'result' => $makanan
			];
		}
	}