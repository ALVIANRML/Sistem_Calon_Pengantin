const modal = document.querySelectorAll('.modal');
const open = document.querySelectorAll('.open-modal');
const close = document.querySelectorAll('.close-modal');
const overlay = document.querySelector('.overlay');

// Menggunakan let di dalam loop untuk menyelesaikan masalah scoping
for (let i = 0; i < open.length; i++) {
  open[i].addEventListener('click', () => {
    overlay.style.display = "block";
    modal[i].style.display = "block";
  });

  // Tambahkan event listener untuk tombol close di modal yang sama
  close[i].addEventListener('click', () => {
    overlay.style.display = "none";
    modal[i].style.display = "none";
  });

  overlay.addEventListener('click', () => {
    overlay.style.display = "none";
    modal[i].style.display = "none";
  })
}
