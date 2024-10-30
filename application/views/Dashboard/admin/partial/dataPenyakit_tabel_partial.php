<div class="container-content">
	<div class="container-content-data-catin-admin">
		<p>Data Penyakit</p>
		<button id="myBtn">
			<div class="tambah-data-btn" onclick="showPopup()">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path d="M12 4C11.7348 4 11.4804 4.10536 11.2929 4.29289C11.1054 4.48043 11 4.73478 11 5V11H5C4.73478 11 4.48043 11.1054 4.29289 11.2929C4.10536 11.4804 4 11.7348 4 12C4 12.2652 4.10536 12.5196 4.29289 12.7071C4.48043 12.8946 4.73478 13 5 13H11V19C11 19.2652 11.1054 19.5196 11.2929 19.7071C11.4804 19.8946 11.7348 20 12 20C12.2652 20 12.5196 19.8946 12.7071 19.7071C12.8946 19.5196 13 19.2652 13 19V13H19C19.2652 13 19.5196 12.8946 19.7071 12.7071C19.8946 12.5196 20 12.2652 20 12C20 11.7348 19.8946 11.4804 19.7071 11.2929C19.5196 11.1054 19.2652 11 19 11H13V5C13 4.73478 12.8946 4.48043 12.7071 4.29289C12.5196 4.10536 12.2652 4 12 4Z" fill="#FFFAFA" />
				</svg>
				<p>Tambah Data</p>
			</div>
		</button>

		<div class="container-tabel">
			<div class="baris-show-entries">
				<div class="show-entries">
					</Show>
				</div>
				<div class="cari-data">
					<div class="form-input-cari">
						<input type="text" name="search" id="search" placeholder="Cari data">
						<!-- <button type="submit"> -->
						<!-- Icon SVG here -->
						</button>
					</div>
				</div>
			</div>
			<!-- <div id= 'searchresult'> -->
			<table>
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Penyakit</th>
						<th>Nama Penyakit</th>
						<th>Penanganan/Pencegahan</th>
						<th>Pemeriksa</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $angka = $start; ?>
					<?php foreach ($id as $penyakit) : ?>
						<tr>
							<td><?= ++$angka; ?></td>
							<td><?= $penyakit['kode'] ?></td>
							<td><?= $penyakit['nama'] ?></td>
							<td><?= $penyakit['keterangan'] ?></td>
							<td><?= $penyakit['id_pemeriksaan'] ?></td>
							<td>
								<div class="container-2-btn">
									<div class="edit-btn" style="cursor:pointer" data-id="<?= $penyakit['id'] ?>" data-kode="<?= $penyakit['kode'] ?>" data-namaPenyakit="<?= $penyakit['nama'] ?>" data-pencegahan="<?= $penyakit['keterangan'] ?>" data-pemeriksa="<?= $penyakit['id_pemeriksaan'] ?>" onclick="showPopup2(this)">
										<p>Edit</p>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M18.988 2.01221L21.988 5.01221L19.701 7.30021L16.701 4.30021L18.988 2.01221ZM8 16.0002H11L18.287 8.71321L15.287 5.71321L8 13.0002V16.0002Z" fill="#FFFAFA" />
											<path d="M19 19H8.158C8.132 19 8.105 19.01 8.079 19.01C8.046 19.01 8.013 19.001 7.979 19H5V5H11.847L13.847 3H5C3.897 3 3 3.896 3 5V19C3 20.104 3.897 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V10.332L19 12.332V19Z" fill="#FFFAFA" />
										</svg>
									</div>

									<button type="input" name="hapus" id="hapus" data-id="<?= $penyakit['id'] ?>" onclick="showPopup1(this)">
										<div class="hapus-btn">
											<p>Hapus</p>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M20.0001 6C20.255 6.00028 20.5001 6.09788 20.6855 6.27285C20.8708 6.44782 20.9823 6.68695 20.9973 6.94139C21.0122 7.19584 20.9294 7.44638 20.7658 7.64183C20.6023 7.83729 20.3702 7.9629 20.1171 7.993L20.0001 8H19.9191L19.0001 19C19.0002 19.7652 18.7078 20.5015 18.1828 21.0583C17.6579 21.615 16.94 21.9501 16.1761 21.995L16.0001 22H8.00011C6.40211 22 5.09611 20.751 5.00811 19.25L5.00311 19.083L4.08011 8H4.00011C3.74523 7.99972 3.50008 7.90212 3.31474 7.72715C3.12941 7.55218 3.01788 7.31305 3.00294 7.05861C2.988 6.80416 3.07079 6.55362 3.23438 6.35817C3.39797 6.16271 3.63002 6.0371 3.88311 6.007L4.00011 6H20.0001ZM14.0001 2C14.5305 2 15.0393 2.21071 15.4143 2.58579C15.7894 2.96086 16.0001 3.46957 16.0001 4C15.9998 4.25488 15.9022 4.50003 15.7273 4.68537C15.5523 4.8707 15.3132 4.98223 15.0587 4.99717C14.8043 5.01211 14.5537 4.92933 14.3583 4.76574C14.1628 4.60214 14.0372 4.3701 14.0071 4.117L14.0001 4H10.0001L9.99311 4.117C9.96301 4.3701 9.8374 4.60214 9.64195 4.76574C9.44649 4.92933 9.19595 5.01211 8.94151 4.99717C8.68707 4.98223 8.44793 4.8707 8.27296 4.68537C8.09799 4.50003 8.0004 4.25488 8.00011 4C7.99995 3.49542 8.19052 3.00943 8.53361 2.63945C8.8767 2.26947 9.34696 2.04284 9.85011 2.005L10.0001 2H14.0001Z" fill="#FFFAFA" />
											</svg>
										</div>
									</button>

								</div>
							</td>
						</tr>
					<?php endforeach ?>
					<!-- Tambahkan baris data lainnya di sini -->

					<!-- KHUSUS MODAL -->
					<!-- Modal tambah data -->
					<div class="overlay" id="overlay"></div>
					<div class="popup" id="popup">
						<span class="close-btn" onclick="closePopup()">&times;</span>
						<h2>Tambah Data Penyakit</h2>
						<hr style="border-color: #015D67;">
						<form id="popupForm" action="<?= base_url('dashboard_admin/add_penyakit'); ?>" method="post">
							<div class="edit-pendaftaran-container">
								<label for="kode_penyakit"><b class="form-label">Kode Penyakit</b><br></label>
								<div class="input-form">
									<input type="text" id="kode_penyakit" class="tambah-data" name="kode_penyakit" required>
								</div>
								<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b><br></label>
								<div class="input-form">
									<input type="text" id="nama_penyakit" class="tambah-data" name="nama_penyakit" required>
								</div>
								<label for="pencegahan"><b class="form-label">Penanganan/Pencegahan</b><br></label>
								<div class="input-form">
									<textarea name="pencegahan" class="tambah-data" style="height: 90px;"></textarea>

								</div>
								<label for="Pemeriksa"><b class="form-label">Pemeriksa</b><br></label>
								<div class="input-form">
									<input type="text" id="pemeriksa" class="tambah-data" name="pemeriksa" required>
								</div>


								<button type="submit">Submit</button>
							</div>
						</form>
					</div>


					<div class="overlay" id="overlay1"></div>
					<div class="popup" id="popup1">
						<span class="close-btn" onclick="closePopup1()">&times;</span>

						<form id="popupForm" action="<?= base_url('dashboard_admin/hapus_penyakit'); ?>" method="post">
							<input type="hidden" name="penyakit_id" id="penyakit_id" />
							<h4>Apakah Anda Yakin Menghapus data ini?</h4>
							<button type="submit">Ya</button>
							<button type="button" onclick="closePopup1()">Tidak</button>
						</form>
					</div>


					<div class="overlay" id="overlay2"></div>
					<div class="popup" id="popup2">
						<span class="close-btn" onclick="closePopup2()">&times;</span>
						<h2>Tambah Data Penyakit</h2>
						<hr style="border-color: #015D67;">
						<form id="popupForm" action="<?= base_url('dashboard_admin/edit_penyakit'); ?>" method="post">
							<div class="edit-pendaftaran-container">
								<label for="kode_penyakit"><b class="form-label">Kode Penyakit</b><br></label>
								<div class="input-form">
									<input type="text" id="kode" class="tambah-data" name="kode_penyakit" required placeholder="Kode Penyakit">
								</div>
								<label for="nama"><b class="form-label">Nama Penyakit</b><br></label>
								<div class="input-form">
									<input type="text" id="nama" class="tambah-data" name="nama_penyakit" required placeholder="Nama Penyakit">
								</div>
								<label for="pencegahan"><b class="form-label">Penanganan/Pencegahan</b><br></label>
								<div class="input-form">
									<textarea id="pencegahan" name="pencegahan" class="tambah-data" style="height: 90px;" placeholder="Penanganan/Pencegahan" required></textarea>
								</div>
								<label for="pemeriksa"><b class="form-label">Pemeriksa</b><br></label>
								<div class="input-form">
									<input type="text" id="namaPemeriksa" class="tambah-data" name="pemeriksa" required placeholder="Pemeriksa">
									<input type="hidden" id="penyakitId" name="penyakitId" />
								</div>
								<button type="submit">Submit</button>
							</div>
						</form>
					</div>
				</tbody>
			</table>
			<!-- </div> -->
		</div>
		<div>
			<?= $pagination; ?>
		</div>
	</div>
