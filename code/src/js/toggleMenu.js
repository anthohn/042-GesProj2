//  ETML
//	Author      : Younes Sayeh
//	Date        : 01.02.2021
//	Description : Active / désactive le hamburger menu.

const toggleButton = document.getElementsByClassName('toggleButton')[0]
const navBarLinks = document.getElementsByClassName('navBarLink')[0]
let isMenuOpen = false;

toggleButton.addEventListener('click', () => {
	navBarLinks.classList.toggle('active')
	if(!isMenuOpen) {
		toggleButton.classList.add('open');
		isMenuOpen = true;
	}
	else {
		toggleButton.classList.remove('open');
		isMenuOpen = false;
	}
})