<?php

	namespace App;

	Use Illuminate\Database\Eloquent\Model;

	class Makanan extends Model {
		public $table = 't_makanan';

		protected $fillable = [
			'nama_makanan', 'harga', 'qty'
		];
	}