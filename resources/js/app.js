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
    let entries = document.querySelector('a[href$="entries"]')
    let forecast = document.querySelector('a[href$="forecast"]')
    let payees = document.querySelector('a[href$="payees"]')
    let key = event.key.toLowerCase()

    event ??= window.event

    // Escape key to collapse expandables
    if(key === 'escape' || key === 'esc') {
      Livewire.emit('escapeKeyPressed')
    }

    // A key to expand add new item
    if(
      key === 'a'
      &&
      add
      &&
      !adder.classList.contains('expanded')
      &&
      document.activeElement.tagName.toLowerCase() !== 'input'
    ) {
      add.dispatchEvent(new Event('click'))
    }

    // E key to go to entries page
    if(
      key === 'e'
      &&
      document.activeElement.tagName.toLowerCase() !== 'input'
    ) {
      window.location = entries.href
    }

    // F key to go to forecast page
    if(
      key === 'f'
      &&
      document.activeElement.tagName.toLowerCase() !== 'input'
    ) {
      window.location = forecast.href
    }

    // P key to go to payees page
    if(
      key === 'p'
      &&
      document.activeElement.tagName.toLowerCase() !== 'input'
    ) {
      window.location = payees.href
    }
  }
}
