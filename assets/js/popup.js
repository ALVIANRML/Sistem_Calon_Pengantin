function showPopup1(popupId) {
	document.getElementById(popupId).classList.add('show');
	document.getElementById('overlay1').classList.add('show');
	document.body.style.overflow = 'hidden';

	document.getElementById('overlay1').addEventListener('click', function () {
		closePopup1(popupId);
	});
}

function closePopup1(popupId) {
	document.getElementById(popupId).classList.remove('show');
	document.getElementById('overlay1').classList.remove('show');
	document.body.style.overflow = 'auto';
}

function showPopup2(popupId) {
	document.getElementById(popupId).classList.add('show');
	document.getElementById('overlay2').classList.add('show');
	document.body.style.overflow = 'hidden';

	// Menambahkan event listener untuk menutup popup ketika overlay diklik
	document.getElementById('overlay2').addEventListener('click', function () {
		closePopup2(popupId);
	});
}

function closePopup2(popupId) {
	document.getElementById(popupId).classList.remove('show');
	document.getElementById('overlay2').classList.remove('show');
	document.body.style.overflow = 'auto';
}

function showPopup3(popupId) {
	document.getElementById(popupId).classList.add('show');
	document.getElementById('overlay3').classList.add('show');
	document.body.style.overflow = 'hidden';
	document.getElementById('overlay3').addEventListener('click', function () {
		closePopup3(popupId);
	});
}

function closePopup3(popupId) {
	document.getElementById(popupId).classList.remove('show');
	document.getElementById('overlay3').classList.remove('show');
	document.body.style.overflow = 'auto';
}

function showPopup4(popupId) {
	document.getElementById(popupId).classList.add('show');
	document.getElementById('overlay4').classList.add('show');
	document.body.style.overflow = 'hidden';
	document.getElementById('overlay4').addEventListener('click', function () {
		closePopup4(popupId);
	});
}

function closePopup4(popupId) {
	document.getElementById(popupId).classList.remove('show');
	document.getElementById('overlay4').classList.remove('show');
	document.body.style.overflow = 'auto';
}


function showPopup5(popupId) {
	document.getElementById(popupId).classList.add('show');
	document.getElementById('overlay5').classList.add('show');
	document.body.style.overflow = 'hidden';
	document.getElementById('overlay5').addEventListener('click', function () {
		closePopup5(popupId);
	});
}

function closePopup5(popupId) {
	document.getElementById(popupId).classList.remove('show');
	document.getElementById('overlay5').classList.remove('show');
	document.body.style.overflow = 'auto';
}

function showPopup6(popupId) {
	document.getElementById(popupId).classList.add('show');
	document.getElementById('overlay6').classList.add('show');
	document.body.style.overflow = 'hidden';
	document.getElementById('overlay6').addEventListener('click', function () {
		closePopup6(popupId);
	});
}

function closePopup6(popupId) {
	document.getElementById(popupId).classList.remove('show');
	document.getElementById('overlay6').classList.remove('show');
	document.body.style.overflow = 'auto';
}

function showPopup7() {
	$('#overlay7').css('display', 'block');
	$('#popup7').css('display', 'block');
	document.body.style.overflow = 'hidden';
}

// Function to close popup 1
function closePopup7() {
	$('#overlay7').css('display', 'none');
	$('#popup7').css('display', 'none');
	document.body.style.overflow = 'auto';
}

// Function to show popup 2
function showPopup8() {
	$('#overlay8').css('display', 'block');
	$('#popup8').css('display', 'block');
	document.body.style.overflow = 'hidden';
	// Set the date and captcha in the form
	$('#tanggal_hapus_data').text(sessionStorage.getItem('tanggal_hapus_data'));
	$('#captcha_text').text(sessionStorage.getItem('captcha'));
}

// Function to close popup 2
function closePopup8() {
	$('#overlay8').css('display', 'none');
	$('#popup8').css('display', 'none');
	location.reload(); // Refresh the page
	document.body.style.overflow = 'auto';
}

function showPopup9() {
	document.getElementById('popup9').classList.add('show');
	document.getElementById('overlay9').classList.add('show');
	document.body.style.overflow = 'hidden';
}

function closePopup9() {
	document.getElementById('popup9').classList.remove('show');
	document.getElementById('overlay9').classList.remove('show');
	document.body.style.overflow = 'auto';
}


function showPopup10(popupId) {
	document.getElementById(popupId).classList.add('show');
	document.getElementById('overlay10').classList.add('show');
	document.body.style.overflow = 'hidden';
	document.getElementById('overlay10').addEventListener('click', function () {
		closePopup10(popupId);
	});
}

function closePopup10(popupId) {
	document.getElementById(popupId).classList.remove('show');
	document.getElementById('overlay10').classList.remove('show');
	document.body.style.overflow = 'auto';
}


function showPopup11(popupId) {
	document.getElementById(popupId).classList.add('show');
	document.getElementById('overlay11').classList.add('show');
	document.body.style.overflow = 'hidden';
	document.getElementById('overlay11').addEventListener('click', function () {
		closePopup11(popupId);
	});
}

function closePopup11(popupId) {
	document.getElementById(popupId).classList.remove('show');
	document.getElementById('overlay11').classList.remove('show');
	document.body.style.overflow = 'auto';
}
