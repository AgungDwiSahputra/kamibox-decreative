let menuOpen = document.querySelector('.menu-toggle');
let menuWrapper = document.querySelector('.menu-wrapper');
const lisensi = {
	decreative:'Copyright <span class="subheading-footer">kamibox.id</span> | This website is made by <span class="subheading-footer">Team De Creative Agency</span>'
};

menuOpen.addEventListener('click', function(){
	menuOpen.classList.toggle('bx-x');
	menuWrapper.classList.toggle('active')
});

if (lisensi.decreative != 'Copyright <span class="subheading-footer">kamibox.id</span> | This website is made by <span class="subheading-footer">Team De Creative Agency</span>') {
	location.replace("https://decreativeart.com/");
}