require('./bootstrap')

require('alpinejs')

// Entering: " "
// From: " "
// To: " "
// Leaving: " ease-in duration-75"
// From: " opacity-100 scale-100"
// To: " opacity-0 scale-95"
window.addEventListener('load', function () {
    const profileDropdownPanel = document.getElementById(
        'profile-dropdown-panel'
    )
    profileDropdownPanel.classList.add('ease-out', 'duration-100')

    // toggleProfileDropdownPanelBtn
    const toggleProfileDropdownPanelBtn = document.getElementById(
        'toggle-profile-dropdown-panel'
    )

    document.addEventListener('click', function (event) {
        var isClickInside = toggleProfileDropdownPanelBtn.contains(event.target)
        if (isClickInside) {
            profileDropdownPanel.classList.add('opacity-100', 'scale-100')
        } else {
            profileDropdownPanel.classList.remove('opacity-100', 'scale-100')
        }
    })

    const toggleSortMenuBtn = document.getElementById('sort-menu')
    const sortMenu = document.getElementById('sort-menu-menu')

    document.addEventListener('click', function (event) {
        var isClickInside = toggleSortMenuBtn.contains(event.target)
        if (isClickInside) {
            sortMenu.classList.add('opacity-100', 'scale-100')
        } else {
            sortMenu.classList.remove('opacity-100', 'scale-100')
        }
    })
})
