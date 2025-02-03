<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					<?= $judul; ?>
				</h1>

			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start about-info Area -->
<section class="destinations-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-40 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Layanan Kami</h1>
					<p>Kami berikan layanan terbaik untuk anda</p>
				</div>
			</div>
		</div>
		<div class="row">

		</div>
	</div>
</section>


<div class="modal" id="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Booking</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?php
			echo validation_errors();
			echo form_open('user/booking'); ?>

			<!-- Modal body -->
			<div class="modal-body">
				<div class="mb-3">
					<input type="hidden" class="form-control" name="id_service" id="id" required>
					<label for="exampleInputEmail1">Nama Service</label>
					<input type="text" class="form-control" id="nama_service" readonly>

				</div>
				<div class="mb-3">

					<label for="exampleInputEmail1">Tanggal Booking</label>
					<input type="date" class="form-control" id="inputTanggal" name="tgl_booking" required>

				</div>
				<div class="mb-3">

					<label for="exampleInputEmail1">Jam Booking</label>
					<div class="form-group">
						<a href="#" onclick="checkSlot(10)" class="btn-info btn-sm jam" id="btn-10">10:00</a>
						<a href="#" onclick="checkSlot(11)" class="btn-info btn-sm jam" id="btn-11">11:00</a>
						<a href="#" onclick="checkSlot(13)" class="btn-info btn-sm jam" id="btn-13">13:00</a>
						<a href="#" onclick="checkSlot(14)" class="btn-info btn-sm jam" id="btn-14">14:00</a>
						<a href="#" onclick="checkSlot(15)" class="btn-info btn-sm jam" id="btn-15">15:00</a>
						<a href="#" onclick="checkSlot(16)" class="btn-info btn-sm jam" id="btn-16">16:00</a>
						<a href="#" onclick="checkSlot(17)" class="btn-info btn-sm jam" id="btn-17">17:00</a>

						<input type="hidden" id="jam" name="jam">
					</div>
				</div>
			<div class="mb-3">
					<p id="keterangan_slot"></p>
				</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">

				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<input type="submit" id="submit_booking" name="submit" class="btn btn-info btn-pill" value="Submit">

			</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
    // document.getElementById("submit_booking").disabled = true;

    $('#edit').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget);
        var modal = $(this);
        modal.find('#id').val(div.data('id'));
        modal.find('#nama_service').val(div.data('nama_service'));
    });
});

function checkSlot(jam) {
    $(".jam").removeClass("btn-success").addClass("btn-info");
    var tanggalBooking = $("#inputTanggal").val();
    
    if (!tanggalBooking) {
        alert('Pilih Tanggal Booking terlebih dahulu');
        $("#inputTanggal").focus();
    } else {
        $("#btn-" + jam).removeClass("btn-info").addClass("btn-success");
        $("#jam").val(jam);
        
        $.ajax({
            url: "check_slot", // Sesuaikan dengan URL controller Anda
            type: "POST",
            data: {
                tanggal: tanggalBooking,
                jam: jam,
                id_service: $("#id").val()
            },
            success: function(response) {
                console.log(response); // Cek respon dari server
                var data = JSON.parse(response); // Mengubah respons JSON menjadi objek JavaScript
                
                // if (data.tersedia) {
                //     $("#keterangan_slot").text(data.keterangan); // Slot tersedia
                //     console.log("Submit button enabled"); // Debugging log
                //     document.getElementById("submit_booking").disabled = false; // Enable submit button
                // } else {
                //     $("#keterangan_slot").text(data.keterangan); // Slot tidak tersedia
                //     console.log("Submit button disabled"); // Debugging log
                //     document.getElementById("submit_booking").disabled = true; // Disable submit button
                // }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Handle error if needed
            }
        });
    }
}


</script>