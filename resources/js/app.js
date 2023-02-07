import './bootstrap'
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

/**
 * Key listeners.
 */
document.onkeyup = (event) => {
  if(typeof event.key === 'string') {
    let adder = document.querySelector('div[class^="add-"]')
    let add = document.querySelector('a[href="#add"]')
    let key = event.key.toLowerCase()

    event ??= window.event

    // Escape key to collapse expandables
    if(key === 'escape' || key === 'esc') {
      Livewire.emit('escapeKeyPressed')
    }

    // // A key to expand add new item
    if(key === 'a' && add && !adder.classList.contains('expanded')) {
      add.dispatchEvent(new Event('click'))
    }
  }
}
