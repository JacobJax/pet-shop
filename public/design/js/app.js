const tabs = document.querySelectorAll("[data-tab-target]")
const contents = document.querySelectorAll("[data-tab-content]")

tabs.forEach(tab => tab.addEventListener('click', () => {
    const target = document.querySelector(tab.dataset.tabTarget)

    contents.forEach(content => 
        content.classList.remove('current'))
    tabs.forEach(newTab => 
        newTab.classList.remove('active'))
        
    target.classList.add('current')
    tab.classList.add('active')
}))