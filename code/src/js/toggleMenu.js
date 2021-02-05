//  ETML
//	Author      : Younes Sayeh
//	Date        : 01.02.2021
//	Description : Active / désactive le hamburger menu.

const toggleButton = document.getElementsByClassName('toggleButton')[0]
const navBarLinks = document.getElementsByClassName('navBarLink')[0]

toggleButton.addEventListener('click', () => {
	navBarLinks.classList.toggle('active')
})